<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemVenda extends Model
{
    protected $table = "item_vendas";

    protected $fillable = [
        'id_venda',
        'id_produto',
        'quantidade',
        'preco_unitario',
        'estado',
    ];

    public function venda(){
        return $this->belongsTo(Venda::class, 'id_venda', 'id');
    }

    public function produto(){
        return $this->belongsTo(Produto::class, 'id_produto', 'id');
    }
}
