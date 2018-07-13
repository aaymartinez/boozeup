<?php

namespace App\Http\Controllers\Shared;

use App\Carts;
use App\Http\Controllers\Controller;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$wishlist = Wishlist::all()->where('users_id', '=', Auth::id());
	    $carts = Carts::all()->where('users_id', '=', Auth::id())
	                         ->where('transactions_id', '=', '')
	                         ->where('bought', '=', false);

	    return view('shared.wishlist', compact('wishlist', 'carts'));
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
	 * @param Request $request
	 *
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
	 */
	public function store(Request $request)
    {
	    $rules = [
		    'quantity' => 'required|integer',
		    'price' => 'required',
		    'users_id' => 'required',
		    'products_id' => 'required',
	    ];

	    $this->validate($request, $rules);

	    Wishlist::create($request->all());

	    return \response('Product was added to the Wishlist successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    $wishlist = Wishlist::findOrFail($id);

	    $wishlist->delete();

	    return redirect('/wishlist')
		    ->with('success', 'Product was removed successfully!');
    }
}
