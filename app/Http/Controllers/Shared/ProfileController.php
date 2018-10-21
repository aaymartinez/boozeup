<?php

namespace App\Http\Controllers\Shared;

use App\Carts;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$id = Auth::id();
    	$user = User::find($id);

	    $carts = Carts::all()->where('users_id', '=', Auth::id())
	                         ->where('transactions_id', '=', '')
	                         ->where('bought', '=', false);

        return view('shared.profile', compact('user', 'id', 'carts'));
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
        //
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
     * param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	if ( $id != Auth::id() ) {
		    return redirect('/profile/');
	    }

    	$user = User::where('id', Auth::id())->where('id', $id)->first();
	    $carts = Carts::all()->where('users_id', '=', Auth::id())
	                         ->where('transactions_id', '=', '')
	                         ->where('bought', '=', false);

	    return view('shared.profile-edit', compact('user', 'id', 'carts'));
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

	    return redirect('/profile')
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

    /**
     * Password reset
     *
     */
    public function show_change_password_form() {
	    $carts = Carts::all()->where('users_id', '=', Auth::id())
	                         ->where('transactions_id', '=', '')
	                         ->where('bought', '=', false);

	    return view('shared.profile-change-password', compact('carts'));
    }

    public function change_password(Request $request) {

	    if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
		    // The passwords matches
		    return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
	    }

	    if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
		    //Current password and new password are same
		    return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
	    }

	    $validatedData = $request->validate([
		    'current_password' => 'required',
		    'new_password' => 'required|string|min:6|confirmed',
	    ]);

//	    dd(Auth::user());
	    //Change Password
	    $user = Auth::user();
	    $user->password = bcrypt($request->get('new_password'));
	    $user->save();

	    return redirect('/profile')
		    ->with("success","Password changed successfully !");

    }
}
