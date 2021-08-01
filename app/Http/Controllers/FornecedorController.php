<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fornecedores = Fornecedor::where('estado', '!=', "delete")->paginate(8);
        $data = [
            'title' => "Fornecedores",
            'menu' => "Fornecedores",
            'submenu' => "Listar",
            'type' => "fornecedores",
            'config' => "configuracoes",
            'getFornecedores' => $fornecedores,
        ];
        return view('fornecedores.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => "Fornecedores",
            'menu' => "Fornecedores",
            'submenu' => "Novo",
            'type' => "fornecedores",
            'config' => "configuracoes",
        ];
        return view('fornecedores.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nome' => ['required', 'string', 'min:5', 'max:255', 'unique:fornecedors,nome'],
                'estado' => ['required', 'string', 'min:1', 'max:3'],
            ]
        );

        $data = [
            'nome'=>$request->nome,
            'email'=>$request->email,
            'telefone'=>$request->telefone,
            'endereco'=>$request->endereco,
            'estado'=>$request->estado,
        ];
        if(Fornecedor::create($data)){
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
        $fornecedor = Fornecedor::find($id);
        if(!$fornecedor){
            return back()->with(['info'=>"Não encontrou"]);
        }

        $data = [
            'title' => "Fornecedores",
            'menu' => "Fornecedores",
            'submenu' => "Editar",
            'type' => "Fornecedores",
            'config' => "configuracoes",
            'getFornecedor'=>$fornecedor,
        ];
        return view('fornecedores.edit', $data);

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
        $fornecedor = Fornecedor::find($id);
        if(!$fornecedor){
            return back()->with(['info'=>"Não encontrou"]);
        }

        $request->validate(
            [
                'nome' => ['required', 'string', 'min:5', 'max:255'],
                'estado' => ['required', 'string', 'min:1', 'max:3'],
            ]
        );

        if($request->nome != $fornecedor->nome){
            $request->validate([
                'nome' => ['required', 'string', 'min:5', 'max:255', 'unique:fornecedors,nome'],
            ]);
        }

        $data = [
            'nome'=>$request->nome,
            'email'=>$request->email,
            'telefone'=>$request->telefone,
            'endereco'=>$request->endereco,
            'estado'=>$request->estado,
        ];
        if(Fornecedor::find($id)->update($data)){
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
        $fornecedor = Fornecedor::find($id);
        if(!$fornecedor){
            return back()->with(['info'=>"Não encontrou"]);
        }

        $data = [
            'estado'=>"delete"
        ];

        if(Fornecedor::find($id)->update($data)){
            return back()->with(['info'=>"Eliminado com sucesso"]);
        }
    }
}