<?php

namespace App\Http\Controllers;

use App\Fabricante;
use App\Fornecedor;
use App\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::where('estado', '!=', "delete")->paginate(8);
        $data = [
            'title' => "Produtos",
            'menu' => "Produtos",
            'submenu' => "Listar",
            'type' => "produtos",
            'config' => null,
            'getProdutos' => $produtos,
        ];
        return view('produtos.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fornecedores = Fornecedor::pluck('nome', 'id');
        $fabricantes = Fabricante::pluck('nome', 'id');
        $data = [
            'title' => "Produtos",
            'menu' => "Produtos",
            'submenu' => "Novo",
            'type' => "produtos",
            'config' => null,
            'getFabricantes'=>$fabricantes,
            'getFornecedores'=>$fornecedores,
        ];
        return view('produtos.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}