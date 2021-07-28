<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model
{
    protected $table = "fabricantes";

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'endereco',
        'estado',
    ];

    public function produto()
    {
        return $this->hasMany(Produto::class, 'id_fabricante', 'id');
    }
}