<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class signupcon extends Controller
{
    public function index(Request $request)
    {
    	return view('signup.index');
    }
    public function store(Request $request)
    {
    	$use = new User();
    	$use->id = $request->id;
    	$use->name = $request->username;
    	$use->pass = $request->password;
    	$use->email = $request->email;
    	$use->save();
    	//return redirect()->route('account.index');
    	return redirect()->route('login.index');
    }

}
