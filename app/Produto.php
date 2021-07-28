<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = "produtos";

    protected $fillable = [
        'id_fabricante',
        'id_fornecedor',
        'nome',
        'categoria',
        'valor_compra',
        'valor_venda',
        'quantidade',
        'data_emissao',
        'data_caducidade',
        'descricao',
        'estado',
    ];

    public function fabricante(){
        return $this->belongsTo(Fabricante::class, 'id_fabricante', 'id');
    }

    public function fornecedor(){
        return $this->belongsTo(Fornecedor::class, 'id_fornecedor', 'id');
    }
}