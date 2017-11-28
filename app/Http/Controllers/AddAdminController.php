<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;

class AddAdminController extends Controller
{
    
	function index(){

		return view('user.AddAdmin');

	}

	function verify(AdminRequest $request){

		$admin = new User();

		$admin->name = $request->name;

		$admin->pass = $request->password;

		$admin->email = $request->email;

		$admin->save();

		session()->flash('message', $request->name . ' is added as admin user name:' . $request->name . 'Password:'. $request->password);
		
		return redirect()->route('user.addAdmin');

	}

}
