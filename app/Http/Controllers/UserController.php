<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect()->route('home');
        }
        $data = [
            'title' => "Iniciar Sessão",
            'menu' => "Login",
            'submenu' => null,
            'type' => "login",
            'config' => null,
        ];
        return view('user.login', $data);
    }

    public function logar(Request $request){
        $request->validate(
            [
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:6', 'max:255']
            ]
        );

        $credencials = $request->only('email', 'password');
        if (Auth::attempt($credencials)) {
            return redirect()->route('home');
        } else {
            return back()->with(['error' => "E-mail ou Palavra-Passe Incorrectos"]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}