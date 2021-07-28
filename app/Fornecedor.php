<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = "fornecedors";

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'endereco',
        'estado',
    ];

    public function produto(){
        return $this->hasMany(Produto::class, 'id_fornecedor', 'id');
    }
}