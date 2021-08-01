<?php

namespace App\Http\Controllers;

use App\Fabricante;
use Illuminate\Http\Request;

class FabricanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fabricantes = Fabricante::where('estado', '!=', "delete")->paginate(8);
        $data = [
            'title' => "Fabricantes",
            'menu' => "Fabricantes",
            'submenu' => "Listar",
            'type' => "fabricantes",
            'config' => "configuracoes",
            'getFabricantes' => $fabricantes,
        ];
        return view('fabricantes.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => "Fabricantes",
            'menu' => "Fabricantes",
            'submenu' => "Novo",
            'type' => "fabricantes",
            'config' => "configuracoes",
        ];
        return view('fabricantes.create', $data);
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
                'nome' => ['required', 'string', 'min:5', 'max:255', 'unique:fabricantes,nome'],
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
        if(Fabricante::create($data)){
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
        $fabricante = Fabricante::find($id);
        if(!$fabricante){
            return back()->with(['info'=>"Não encontrou"]);
        }

        $data = [
            'title' => "Fabricantes",
            'menu' => "Fabricantes",
            'submenu' => "Editar",
            'type' => "fabricantes",
            'config' => "configuracoes",
            'getFabricante'=>$fabricante,
        ];
        return view('fabricantes.edit', $data);

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
        $fabricante = Fabricante::find($id);
        if(!$fabricante){
            return back()->with(['info'=>"Não encontrou"]);
        }

        $request->validate(
            [
                'nome' => ['required', 'string', 'min:5', 'max:255',],
                'estado' => ['required', 'string', 'min:1', 'max:3'],
            ]
        );

        if($request->nome != $fabricante->nome){
            $request->validate([
                'nome' => ['required', 'string', 'min:5', 'max:255', 'unique:fabricantes,nome'],
            ]);
        }

        $data = [
            'nome'=>$request->nome,
            'email'=>$request->email,
            'telefone'=>$request->telefone,
            'endereco'=>$request->endereco,
            'estado'=>$request->estado,
        ];
        if(Fabricante::find($id)->update($data)){
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
        //
    }
}