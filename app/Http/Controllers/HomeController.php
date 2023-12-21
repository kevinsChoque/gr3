<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function actionHome(Request $r)
    {
    	// echo('csacs');
    	return view('home/home');
    }
}
