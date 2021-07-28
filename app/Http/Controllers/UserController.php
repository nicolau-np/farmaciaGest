<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title' => "Iniciar Sessão",
            'menu' => "Login",
            'submenu' => null,
            'type' => "login",
            'config' => null,
        ];
        return view('user.login', $data);
    }
}