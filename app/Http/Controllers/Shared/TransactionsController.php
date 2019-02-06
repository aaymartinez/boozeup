<?php

namespace App\Http\Controllers\Shared;

use App\Carts;
use App\Http\Controllers\Controller;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

	    $completed = Transaction::all()
	                            ->where('users_id', '=', Auth::id())
	                            ->where('status', '=', 'Completed')
	                            ->where('status', '=', 'Cancelled');

	    $carts = Carts::all()->where('users_id', '=', Auth::id())
	                         ->where('transactions_id', '=', '')
	                         ->where('bought', '=', false);



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

		foreach ($carts as $item) {
			$item->transactions_id = $transaction_id;
			$item->bought = true;
			$item->save();
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
}
