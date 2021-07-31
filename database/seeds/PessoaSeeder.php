<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PessoaSeeder extends Seeder
{
    static $pessoas = [
        [
            'nome' => "Nicolau NP",
            'data_nascimento' => "29-08-1996",
            'bairro' => "Forte Santa Rita",
            'genero' => "M",
            'telefone' => 946216795,
            'email' => null,
            'foto' => null,
        ]

    ];

    public function run()
    {
        foreach (Self::$pessoas as $pessoa) {
            DB::table('pessoas')->insert(
                $pessoa
            );
        }
    }
}