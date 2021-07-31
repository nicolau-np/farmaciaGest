<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaticController extends Controller
{
    public static function isAuth(){
        if(Auth::check()){
            return redirect()->route('home');
        }
    }
}