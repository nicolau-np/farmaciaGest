<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Funcionario;
use App\ItemVenda;
use App\Pessoa;
use App\Produto;
use App\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_pessoa = Auth::user()->pessoa->id;
        $funcionario = Funcionario::where(['id_pessoa' => $id_pessoa])->first();
        $vendas = Venda::where(['estado' => "on", 'id_funcionario' => $funcionario->id])->get();
        $data = [
            'title' => "Nova Venda",
            'menu' => "Vendas",
            'submenu' => "Listar",
            'type' => "vendas",
            'config' => null,
            'getVendas' => $vendas,
        ];
        return view('vendas.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = [
            'title' => "Nova Venda",
            'menu' => "Vendas",
            'submenu' => "Novo",
            'type' => "vendas",
            'config' => null,
        ];
        return view('vendas.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_pessoa = Auth::user()->pessoa->id;
        $funcionario = Funcionario::where(['id_pessoa' => $id_pessoa])->first();
        $request->validate([
            'nome' => ['required', 'string', 'min:5', 'max:255'],
            'telefone' => ['required', 'integer', 'min:1'],
        ]);

        $data['pessoa'] = [
            'nome' => $request->nome,
            'telefone' => $request->telefone,
        ];

        $data['cliente'] = [
            'id_pessoa' => null,
            'estado' => "on",
        ];

        $data['venda'] = [
            'id_funcionario' => $funcionario->id,
            'id_cliente' => null,
            'valor_total' => 0,
            'estado' => "on",
        ];

        $pessoa = Pessoa::create($data['pessoa']);
        if ($pessoa) {
            $data['cliente']['id_pessoa'] = $pessoa->id;
            $cliente = Cliente::create($data['cliente']);
            if ($cliente) {
                $data['venda']['id_cliente'] = $cliente->id;
                $venda = Venda::create($data['venda']);
                if ($venda) {
                    Session::put('id_venda', $venda->id);
                    return $venda->id;
                }
            }
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

    public function carrinho()
    {
        if (!Session::has('id_venda')) {
            return back()->with(['error' => "Deve criar uma nova venda"]);
        }
        $id_venda = Session::get('id_venda');
        $venda = Venda::find($id_venda);
        if (!$venda) {
            return back()->with(['error' => "Nao encontrou"]);
        }

        $item_vendas = ItemVenda::where(['id_venda' => $id_venda])->get();

        $data = [
            'title' => "Nova Venda",
            'menu' => "Vendas",
            'submenu' => "Carrinho",
            'type' => "vendas",
            'config' => null,
            'getItem_vendas' => $item_vendas,
        ];
        return view('vendas.carrinho', $data);
    }

    public function select($id)
    {
        $venda = Venda::find($id);
        if (!$venda) {
            return back()->with(['error' => "Novo encontrou"]);
        }
        Session::put('id_venda', $venda->id);
        return redirect()->route('carrinho');
    }

    public function search_produto(Request $request)
    {
        $request->validate([
            'produto' => ['required', 'string']
        ]);

        $produtos = Produto::where('nome', 'LIKE', "%{$request->produto}%")->get();
        $data = [
            'getProdutos' => $produtos,
        ];
        return view('ajax.produtos', $data);
    }

    public function add($id_produto)
    {
        if (!Session::has('id_venda')) {
            return back()->with(['error' => "Deve criar uma nova venda"]);
        }
        $id_venda = Session::get('id_venda');
        $venda = Venda::find($id_venda);
        if (!$venda) {
            return back()->with(['error' => "Nao encontrou"]);
        }

        $produto = Produto::find($id_produto);
        if (!$produto) {
            return back()->with(['error' => "Nao encontrou"]);
        }

        if($produto->quantidade==0){
            return back()->with(['info'=>"Produto esgotou"]);
        }

        $data['item_venda'] = [
            'id_venda' => $id_venda,
            'id_produto' => $id_produto,
            'quantidade' => 1,
            'preco_unitario' => $produto->valor_venda,
            'estado' => "on",
        ];
        $item_venda = ItemVenda::where(['id_venda' => $id_venda, 'id_produto' => $id_produto])->first();
        if ($item_venda) {
            //ja existe este produto
            if (Produto::find($id_produto)->decrement('quantidade', 1)) {
                if (ItemVenda::where(['id_venda' => $id_venda, 'id_produto' => $id_produto])->increment('quantidade', 1)) {
                    return back()->with(['success' => "Adicionado ao carrinho"]);
                }
            }
        } else {
            //deve adicionar o produto
            if (Produto::find($id_produto)->decrement('quantidade', 1)) {
                if (ItemVenda::create($data['item_venda'])) {
                    return back()->with(['success' => "Adicionado ao carrinho"]);
                }
            }
        }
    }

    public function increment($id_item_venda)
    {
        if (!Session::has('id_venda')) {
            return back()->with(['error' => "Deve criar uma nova venda"]);
        }
        $id_venda = Session::get('id_venda');
        $venda = Venda::find($id_venda);
        if (!$venda) {
            return back()->with(['error' => "Nao encontrou"]);
        }

        $item_venda = ItemVenda::find($id_item_venda);
        if (!$item_venda) {
            return back()->with(['error' => "Nao encontrou"]);
        }

        $produto = Produto::find($item_venda->id_produto);
        if($produto->quantidade==0){
            return back()->with(['info'=>"Produto esgotou"]);
        }

        if (Produto::find($item_venda->id_produto)->decrement('quantidade', 1)) {
            if (ItemVenda::find($id_item_venda)->increment('quantidade', 1)) {
                return back()->with(['success' => "Nova Quantidade " . $item_venda->produto->nome]);
            }
        }
    }

    public function decrement($id_item_venda)
    {
        if (!Session::has('id_venda')) {
            return back()->with(['error' => "Deve criar uma nova venda"]);
        }
        $id_venda = Session::get('id_venda');
        $venda = Venda::find($id_venda);
        if (!$venda) {
            return back()->with(['error' => "Nao encontrou"]);
        }

        $item_venda = ItemVenda::find($id_item_venda);
        if (!$item_venda) {
            return back()->with(['error' => "Nao encontrou"]);
        }

        if($item_venda->quantidade==1){
            return back()->with(['info'=>"Não deve reduzir mais a quantidade"]);
        }

        if (Produto::find($item_venda->id_produto)->increment('quantidade', 1)) {
            if (ItemVenda::find($id_item_venda)->decrement('quantidade', 1)) {
                return back()->with(['success' => "Nova Quantidade " . $item_venda->produto->nome]);
            }
        }
    }

    public function delete($id_item_venda)
    {
        if (!Session::has('id_venda')) {
            return back()->with(['error' => "Deve criar uma nova venda"]);
        }
        $id_venda = Session::get('id_venda');
        $venda = Venda::find($id_venda);
        if (!$venda) {
            return back()->with(['error' => "Nao encontrou"]);
        }

        $item_venda = ItemVenda::find($id_item_venda);
        if (!$item_venda) {
            return back()->with(['error' => "Nao encontrou"]);
        }

        if(Produto::find($item_venda->id_produto)->increment('quantidade', $item_venda->quantidade)){
            if(ItemVenda::find($item_venda->id)->delete()){
                
            }
        }
    }
}
