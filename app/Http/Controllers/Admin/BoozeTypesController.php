<?php

namespace App\Http\Controllers\Admin;

use App\BoozeTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class BoozeTypesController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$booze = BoozeTypes::all();

        return view('admin.booze', compact('booze'));
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
    	$dir = 'booze-types';

        $rules = [
        	'type' => 'required|string|max:255|unique:booze_types',
	        'photo' => 'image|mimes:jpeg,jpg,png,bmp',
        ];

	    $this->validate($request, $rules);

	    $booze = BoozeTypes::create($request->all());

        if ($request->has('photo')) {
	        $filename = $request->file('photo')->store('public/'.$dir);
			$booze->photo = $filename;
	        $booze->save();
        }

	    return redirect('/admin/booze')
		    ->with('success', 'Booze Type added successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\boozeTypes $booze_types
     *
     * @return \Illuminate\Http\Response
     */
    public function show( boozeTypes $booze_types)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\boozeTypes  $booze_types
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(boozeTypes $booze_types)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\boozeTypes  $booze_types
     *
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, boozeTypes $booze_types)
    {
        //
    }

	/**
	 * Delete booze type from the record
	 *
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
    {
        BoozeTypes::find($id)->delete();

	    return redirect('/admin/booze')
		    ->with('success', 'Booze Type deleted successfully!');
    }
}
