<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logoutcon extends Controller
{
    public function index(Request $request)
    {
    	session()->pull('user');
    	// other task
    	return redirect()->route('login.index');
    }
}
