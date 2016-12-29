<?php

namespace App\Http\Controllers;

use Redirect;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()){
            return Redirect('/home');
        }
        else
        {
            return view('index');
        }
    }
}
