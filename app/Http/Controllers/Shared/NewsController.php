<?php

namespace App\Http\Controllers\Shared;

use App\Carts;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$news = News::paginate(4);

	    $carts = Carts::all()->where('users_id', '=', Auth::id())
	                         ->where('transactions_id', '=', '')
	                         ->where('bought', '=', false);

    	return view('shared.news', compact('news', 'carts'));
    }

	/**
	 * Show the details page
	 *
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function details($id)
    {
	    $news = News::find($id);
	    $carts = Carts::all()->where('users_id', '=', Auth::id())
	                         ->where('transactions_id', '=', '')
	                         ->where('bought', '=', false);

	    return view('shared.news-details', compact('news', 'carts'));
    }

}
