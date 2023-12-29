<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function actionHome(Request $r)
    {
    	return view('home/home');
    }
}
