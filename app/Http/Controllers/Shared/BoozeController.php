<?php

namespace App\Http\Controllers\Shared;

use App\Carts;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BoozeController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$carts = Carts::all()->where('users_id', '=', Auth::id())
		              ->where('transactions_id', '=', '')
		              ->where('bought', '=', false);

		return view('shared.booze', compact('carts'));
	}
}
