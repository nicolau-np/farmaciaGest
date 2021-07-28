<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => "farmaciaGest",
            'menu' => "Home",
            'submenu' => null,
            'type' => "home",
            'config' => null,
        ];
        return view('home', $data);
    }
}