<?php

namespace App\Http\Controllers;

use App\Carts;
use App\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$uri = $_SERVER['REQUEST_URI'];
    	if ($uri == '/contact-us') {
		    $carts = Carts::all()->where('users_id', '=', Auth::id());

		    return view('Shared.contact', compact('carts'));
	    } else {
		    return view('contact');
	    }

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
    		'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|',
			'mobile_number' => 'required|digits:11',
		    'message' => 'required|string|',
	    ];

    	$this->validate($request, $rules);

	    ContactUs::create($request->all());

	    $uri = $_SERVER['REQUEST_URI'];
	    if ($uri == '/contact-us') {
		    return redirect('/contact-us')
			    ->with('success', 'Message sent successfully!');
	    } else {
		    return redirect('/help')
			    ->with('success', 'Message sent successfully!');
	    }

    }
}
