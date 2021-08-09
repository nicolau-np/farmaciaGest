<?php

namespace App\Http\Controllers;

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
        $id_funcionario = Auth::user()->pessoa->funcionario->id;
        $request->validate([
            'nome' => ['required', 'string', 'min:5', 'max:255',],
            'telefone' =>['required', 'integer', 'min:1'],
        ]);

        $data['pessoa'] = [
            'nome'=> $request->nome,
            'telefone'=>$request->telefone,
        ];

        $data['cliente']=[

        ];

        $data['venda'] = [

        ];

        if(){

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