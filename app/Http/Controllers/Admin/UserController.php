<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$users =  User::all();

        return view('admin.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-user');
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
	    	'role' => 'required',
		    'birthday' => 'required',
		    'mobile' => 'required|digits:11',
		    'gender' => 'required|string|max:255',
		    'email' => 'required|string|email|max:255|unique:users',
		    'password' => 'required|string|min:6|confirmed',
		    'unitFloor' => 'required|string|max:255',
		    'street' => 'required|string|max:255',
		    'building' => 'required|string|max:255',
		    'subdivision' => 'required|string|max:255',
		    'province' => 'required|string|max:255',
		    'city' => 'required|string|max:255',
		    'barangay' => 'required|string|max:255',
		    'zip' => 'required|string|max:255',
		    'company' => 'string|max:255',
		    'landmarks' => 'string|max:500',
		    'authorized' => 'string|max:255',
	    ];

	    if ($request['role'] == 3) {
		    $rules['shop_name'] = 'required|string|max:255';
	    } else {
		    $rules['first_name'] = 'required|string|max:255';
		    $rules['last_name'] = 'required|string|max:255';
	    }

	    $this->validate($request, $rules);

	    User::create($request->all());

	    return redirect('/admin/user')
		    ->with('success', 'User registered successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    if ( $id != Auth::id() ) {
		    return redirect('/admin/user');
	    }

	    $user = User::where('id', Auth::id())->where('id', $id)->first();

	    return view('admin.user-detail', compact('user', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
	    $dir = 'user-profile';

	    $user = User::find($id);


	    // update bday
	    $request->merge([ 'birth_date' => date("Y-m-d H:i:s", strtotime(request('birth_date'))) ]);
	    $user->update($request->all());

	    // save image
	    if ($request->has('id_verification')) {
		    $filename = $request->file('id_verification')->store('public/'.$dir);
		    $user->id_verification = $filename;
		    $user->save();
	    }

	    return redirect('/admin/user')
		    ->with('success', 'Profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
