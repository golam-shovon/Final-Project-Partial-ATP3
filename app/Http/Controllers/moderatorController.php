<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class moderatorController extends Controller
{
    public function index(Request $request){
   	
   	return view('moderator.index');
   

  }
}
