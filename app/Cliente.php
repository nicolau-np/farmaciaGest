<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "clientes";

    protected $fillable = [
        'id_pessoa',
        'estado',
    ];

    public function cliente(){
        return $this->belongsTo(Pessoa::class, 'id_pessoa', 'id');
    }

    public function venda(){
        return $this->hasMany(Venda::class, 'id_cliente', 'id');
    }
}