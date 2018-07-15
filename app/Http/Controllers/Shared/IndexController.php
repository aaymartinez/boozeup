<?php

namespace App\Http\Controllers\Shared;

use App\BoozeTypes;
use App\Carts;
use App\Http\Controllers\Controller;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$booze = BoozeTypes::paginate(4);
	    $carts = Carts::all()->where('users_id', '=', Auth::id())
	                  ->where('transactions_id', '=', '')
	                  ->where('bought', '=', 0);

	    $all_products = Products::all();
	    $products = [];
	    $ratings = [];

	    $i = 0;
	    foreach ($all_products as $product) {
	    	$ratings[$i] = $product->ratings()->avg('rating');
	    	$products[$i] = $product;
			$i++;
	    }

	    array_multisort($ratings, SORT_DESC, $products);
	    array_splice($products, 4);

        return view('shared.index', compact('booze', 'carts', 'products'));
    }
}
