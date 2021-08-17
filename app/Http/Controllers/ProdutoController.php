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
            'getFabricantes' => $fabricantes,
            'getFornecedores' => $fornecedores,
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
        $request->validate([
            'nome' => ['required', 'string', 'min:4', 'max:255'],
            'fabricante' => ['required', 'integer', 'min:1'],
            'fornecedor' => ['required', 'integer', 'min:1'],
            'categoria' => ['required', 'string'],
            'preco' => ['required', 'numeric', 'min:1'],
            'quantidade' => ['required', 'integer', 'min:1'],
            'data_emissao' => ['required', 'date'],
            'data_caducidade' => ['required', 'date'],
            'descricao' => ['required', 'string', 'min:1', 'max:255'],
            'estado' => ['required', 'string', 'min:2'],
        ]);

        $data = [
            'id_fabricante'=>$request->fabricante,
            'id_fornecedor'=>$request->fornecedor,
            'nome'=>$request->nome,
            'categoria'=>$request->categoria,
            'valor_compra'=>null,
            'valor_venda'=>$request->preco,
            'quantidade'=>$request->quantidade,
            'data_emissao'=>$request->data_emissao,
            'data_caducidade'=>$request->data_caducidade,
            'descricao'=>$request->descricao,
            'estado'=>$request->estado,
        ];

        if(Produto::create($data)){
            return back()->with(['success'=>"Feito com sucesso"]);
        }
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
        $produto = Produto::find($id);
        if(!$produto){
            return back()->with(['info'=>"Não encontrou"]);
        }

        $fornecedores = Fornecedor::pluck('nome', 'id');
        $fabricantes = Fabricante::pluck('nome', 'id');
        $data = [
            'title' => "Produtos",
            'menu' => "Produtos",
            'submenu' => "Editar",
            'type' => "produtos",
            'config' => null,
            'getFabricantes' => $fabricantes,
            'getFornecedores' => $fornecedores,
            'getProduto'=>$produto,
        ];
        return view('produtos.edit', $data);
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
        $produtos = Produto::find($id);
        if(!$produtos){
            return back()->with(['info'=>"Não encontrou"]);
        }
        $request->validate([
            'nome' => ['required', 'string', 'min:4', 'max:255'],
            'fabricante' => ['required', 'integer', 'min:1'],
            'fornecedor' => ['required', 'integer', 'min:1'],
            'categoria' => ['required', 'string'],
            'preco' => ['required', 'numeric', 'min:1'],
            'quantidade' => ['required', 'integer', 'min:1'],
            'data_emissao' => ['required', 'date'],
            'data_caducidade' => ['required', 'date'],
            'descricao' => ['required', 'string', 'min:1', 'max:255'],
            'estado' => ['required', 'string', 'min:2'],
        ]);

        $data = [
            'id_fabricante'=>$request->fabricante,
            'id_fornecedor'=>$request->fornecedor,
            'nome'=>$request->nome,
            'categoria'=>$request->categoria,
            'valor_compra'=>null,
            'valor_venda'=>$request->preco,
            'quantidade'=>$request->quantidade,
            'data_emissao'=>$request->data_emissao,
            'data_caducidade'=>$request->data_caducidade,
            'descricao'=>$request->descricao,
            'estado'=>$request->estado,
        ];

        if(Produto::find($id)->update($data)){
            return back()->with(['success'=>"Feito com sucesso"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        if (!$produto) {
            return back()->with(['info' => "Não encontrou"]);
        }

        $data = [
            'estado' => "delete"
        ];

        if (Produto::find($id)->update($data)) {
            return back()->with(['info' => "Eliminado com sucesso"]);
        }
    }

    public function inventario(){
        
    }
}
