<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginProveedorController extends Controller
{
    public function actLogin()
    {
    	return view('login/loginProveedor');
    }
}
