<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\ItemVenda;
use App\Produto;
use App\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaticController extends Controller
{
    public static function getVendasOn()
    {
        $id_pessoa = Auth::user()->pessoa->id;
        $funcionario = Funcionario::where(['id_pessoa' => $id_pessoa])->first();
        $vendas = Venda::where(['estado' => "on", 'id_funcionario' => $funcionario->id])->get();
        return $vendas;
    }

    public static function getProdutosVendidos()
    {
        $produtos = Produto::where('estado', '!=', 'delete')->get();

        return $produtos;
    }

    public static function getItemVendaProduto($id_produto)
    {
        $data = [
            'id_produto' => $id_produto,
        ];
        $item_venda = ItemVenda::whereHas('venda', function($query) use ($data){
            $query->where(['estado'=>"off"]);
        })->where(['id_produto' => $data['id_produto']])->get();

        return $item_venda;
    }
}