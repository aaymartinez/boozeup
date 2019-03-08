<?php

namespace App\Http\Controllers\Shared;

use App\Carts;
use App\Http\Controllers\Controller;
use App\Mail\EmptyInventoryItem;
use App\Products;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = DB::table('transactions')
            ->where('transactions.users_id', '=', Auth::id())
            ->get();

        // get correct product list
        foreach ($transactions as $trans) {
            $products = DB::table('products')
                ->select('products.*', 'carts.quantity')
                ->join('carts', 'carts.products_id', '=', 'products.id')
                ->where('carts.transactions_id', '=', $trans->id)
                ->get();

            $trans->products = $products;
        }


        // shop orders
        $orders = DB::table('user_order')
            ->where('seller_name_id', '=', Auth::id())
            ->groupBy('id')
            ->get();

        // get correct product list
        foreach ($orders as $or) {
            $products = DB::table('products')
                ->select('products.*', 'carts.quantity')
                ->join('carts', 'carts.products_id', '=', 'products.id')
                ->where('carts.transactions_id', '=', $or->id)
                ->get();

            $or->products = $products;
        }


        $completed = Transaction::all()
	                            ->where('users_id', '=', Auth::id())
	                            ->where('status', '=', 'Completed')
	                            ->where('status', '=', 'Cancelled');

	    $carts = Carts::all()->where('users_id', '=', Auth::id())
	                         ->where('transactions_id', '=', '')
	                         ->where('bought', '=', false);


	    if ( Auth::user()->role_id === 3 ) {
	        $transactions = $orders;
        }
//dd($transactions);
        return view('shared.transaction', compact('carts', 'transactions', 'completed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

	    $rules = [
	    	'users_id' => 'required',
		    'status' => 'required',
		    'subtotal' => 'required',
		    'delivery_fee' => 'required',
		    'total_amount' => 'required',
		    'payment_method' => 'required',
		    'cc_type' => 'nullable|string',
		    'cc_number' => 'nullable|string',
		    'cc_expiry' => 'nullable|string',
		    'first_name' => 'required',
		    'last_name' => 'required',
		    'email' => 'required',
		    'mobile_number' => 'required',
		    'unit_floor' => 'required',
		    'building' => 'required',
		    'street' => 'required',
		    'subdivision' => 'required',
		    'barangay' => 'required',
		    'city' => 'required',
		    'province' => 'required',
		    'zip' => 'required',
		    'company_name' => 'string',
		    'landmarks' => 'string',
		    'authorized_recipient' => 'required',
	    ];

	    $this->validate($request, $rules);

	    // save the transaction
	    $transaction = Transaction::create($request->all());

	    // save the transaction id to the current list of products
	    $transaction_id = $transaction->id;
	    $carts = Carts::all()
	                  ->where('users_id', '=', Auth::id())
	                  ->where('transactions_id', '=', '')
	                  ->where('bought', '=', false);

//	    dd($carts);

		foreach ($carts as $item) {
		    $item->transactions_id = $transaction_id;
			$item->bought = true;
			$item->save();

			$products = Products::where('id', '=', $item->products_id)->firstOrFail();
			$seller = $products->seller_name_id;
			$diff = ( ($products->quantity) - ($item->quantity) > 0 ) ? ($products->quantity) - ($item->quantity) : 0;
			$products->quantity = $diff;
			$products->save();

			if ($diff < 1) {
                $this->sendMail($seller, $products);
            }
		}

	    return redirect('./transaction')
		    ->with('success', 'Order was submitted successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
	    $rules = [
		    'status' => 'required',
	    ];

	    $this->validate($request, $rules);

	    $transaction->update( $request->all() );

	    return redirect('/transaction')
		    ->with('success', 'Transaction updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    function sendMail($seller_id, $product) {
        // get seller email
        $seller = User::where('id', '=', $seller_id)->firstOrFail();
//dd($seller->email);

        Mail::to($seller->email)
            ->send(new EmptyInventoryItem($product));
    }
}
