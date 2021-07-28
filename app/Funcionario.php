<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = "funcionarios";

    protected $fillable = [
        'id_pessoa',
        'cargo',
        'estado',
    ];

    public function pessoa(){
        return $this->belongsTo(Funcionario::class, 'id_pessoa', 'id');
    }
}
