<?php

namespace App\Http\Controllers\Shared;

use App\Carts;
use App\Http\Controllers\Controller;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // search database, with result, list on page, with links to products,
        $products = Products::where('title', 'like', '%'.$request->search.'%')->get();

        $carts = Carts::all()->where('users_id', '=', Auth::id())
            ->where('transactions_id', '=', '')
            ->where('bought', '=', false);

        return view('shared.search', compact('products', 'carts'));
    }

}
