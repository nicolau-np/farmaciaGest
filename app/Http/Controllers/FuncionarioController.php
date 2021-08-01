<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\Pessoa;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = Funcionario::where('estado', '!=', "delete")->paginate(8);
        $data = [
            'title' => "Funcionarios",
            'menu' => "Funcionarios",
            'submenu' => "Listar",
            'type' => "funcionarios",
            'config' => null,
            'getFuncionarios' => $funcionarios,
        ];
        return view('funcionarios.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => "Funcionarios",
            'menu' => "Funcionarios",
            'submenu' => "Novo",
            'type' => "funcionarios",
            'config' => null,
        ];
        return view('funcionarios.create', $data);
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
                'nome' => ['required', 'string', 'min:5', 'max:255',],
                'telefone' => ['required', 'integer', 'min:1'],
                'genero' => ['required', 'string', 'min:1', 'max:255'],

                'cargo'=>['required','string', 'min:1', 'max:255'],
                'estado' => ['required', 'string', 'min:1', 'max:3'],
            ]
        );

        $data['pessoa'] = [
            'nome' => $request->nome,
            'data_nascimento' => $request->data_nascimento,
            'bairro' => $request->bairro,
            'genero' => $request->genero,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'foto' => null,
        ];
        
        $data['funcionario'] = [
            'id_pessoa' => null,
            'cargo' => $request->cargo,
            'estado' => $request->estado,
        ];

        if ($request->hasFile('foto') && $request->foto->isValid()) {
            $request->validate([
                'foto' => ['required', 'mimes:jpg,jpeg,png,JPG,JPEG,PNG', 'max:5000']
            ]);
            $path = $request->file('foto')->store('img_funcionarios');
            $data['pessoa']['foto'] = $path;
        }

        $pessoa = Pessoa::create($data['pessoa']);
        if ($pessoa) {
            $data['funcionario']['id_pessoa'] = $pessoa->id;
            if (Funcionario::create($data)) {
                return back()->with(['success' => "Feito com sucesso"]);
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
        $funcionario = Funcionario::find($id);
        if (!$funcionario) {
            return back()->with(['info' => "Não encontrou"]);
        }

        $data = [
            'title' => "Funcionarios",
            'menu' => "Funcionarios",
            'submenu' => "Editar",
            'type' => "Funcionarios",
            'config' => null,
            'getFuncionario' => $funcionario,
        ];
        return view('funcionarios.edit', $data);
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
        $funcionario = Funcionario::find($id);
        if (!$funcionario) {
            return back()->with(['info' => "Não encontrou"]);
        }

        $request->validate(
            [
                'nome' => ['required', 'string', 'min:5', 'max:255'],
                'estado' => ['required', 'string', 'min:1', 'max:3'],
            ]
        );

        if ($request->nome != $funcionario->nome) {
            $request->validate([
                'nome' => ['required', 'string', 'min:5', 'max:255', 'unique:Funcionarios,nome'],
            ]);
        }

        $data = [
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'estado' => $request->estado,
        ];
        if (Funcionario::find($id)->update($data)) {
            return back()->with(['success' => "Feito com sucesso"]);
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
        $funcionario = Funcionario::find($id);
        if (!$funcionario) {
            return back()->with(['info' => "Não encontrou"]);
        }

        $data = [
            'estado' => "delete"
        ];

        if (Funcionario::find($id)->update($data)) {
            return back()->with(['info' => "Eliminado com sucesso"]);
        }
    }
}