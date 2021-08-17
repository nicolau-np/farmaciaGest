<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\Produto;
use App\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaticController extends Controller
{
   public static function getVendasOn(){
    $id_pessoa = Auth::user()->pessoa->id;
    $funcionario = Funcionario::where(['id_pessoa' => $id_pessoa])->first();
    $vendas = Venda::where(['estado' => "on", 'id_funcionario' => $funcionario->id])->get();
       return $vendas;
   }

   public function getProdutosVendidos(){
       $produtos = Produto::where('estado', '!=','delete')->get();

       return $produtos;
   }
}