<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Funcionario;
use App\Produto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $produtos = Produto::where(['estado'=>"on"])->get();
        $funcionarios = Funcionario::where(['estado'=>"on"])->get();
        $clientes = Cliente::where(['estado'=>"on"])->get();
        $data = [
            'title' => "ABD FARMÁCIA",
            'menu' => "Home",
            'submenu' => null,
            'type' => "home",
            'config' => null,
            'getProdutos'=>$produtos,
            'getFuncionarios'=>$funcionarios,
            'getClientes'=>$clientes,
        ];
        return view('home', $data);
    }

    public function sobre()
    {
        $data = [
            'title' => "Sobre",
            'menu' => "Sobre",
            'submenu' => null,
            'type' => "sobre",
            'config' => "aplicacao",
        ];
        return view('sobre', $data);
    }
}