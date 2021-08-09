<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Funcionario;
use App\Pessoa;
use App\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => "Nova Venda",
            'menu' => "Vendas",
            'submenu' => "Listar",
            'type' => "vendas",
            'config' => null,
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
        $funcionario = Funcionario::where(['id_pessoa'=>$id_pessoa])->first();
        $request->validate([
            'nome' => ['required', 'string', 'min:5', 'max:255'],
            'telefone' =>['required', 'integer', 'min:1'],
        ]);

        $data['pessoa'] = [
            'nome'=> $request->nome,
            'telefone'=>$request->telefone,
        ];

        $data['cliente']=[
            'id_pessoa'=> null,
            'estado'=>"on",
        ];

        $data['venda'] = [
            'id_funcionario'=>null,
            'id_cliente'=>null,
            'valor_total'=>0,
            'estado'=>"on",
        ];

        /*$pessoa = Pessoa::create($data['pessoa']);
        if($pessoa){
            $data['cliente']['id_pessoa'] = $pessoa->id;
            $cliente = Cliente::create($data['cliente']);
            if($cliente){
                $data['venda']['id_cliente']=$cliente->id;
                $venda = Venda::create($data['venda']);
                if($venda){
                    return $venda->id;
                }
            }
        }*/

        return $funcionario->id;
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