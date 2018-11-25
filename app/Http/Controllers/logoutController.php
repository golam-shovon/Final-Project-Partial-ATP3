<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logoutController extends Controller
{
    public function index(Request $request){

    	//session clear 
    	//other task

    	return redirect()->route('login.index');

    }
}
