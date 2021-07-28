<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = "pessoas";

    protected $fillable = [
        'nome',
        'data_nascimento',
        'bairro',
        'genero',
        'telefone',
        'email',
        'foto',
    ];

    public function funcionario(){
        return $this->hasMany(Funcionario::class, 'id_funcionario', 'id');
    }

    public function usuario(){
        return $this->hasMany(User::class, 'id_pessoa', 'id');
    }

    public function cliente(){
        return $this->hasMany(Cliente::class, 'id_pessoa', 'id');
    }
}