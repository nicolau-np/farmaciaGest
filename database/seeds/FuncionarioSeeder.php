<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    static $funcionarios = [
        [
            'id_pessoa'=>1,
            'cargo'=>"CEO",
            'estado'=>"on",
        ],[
            'id_pessoa'=>2,
            'cargo'=>"CAIXA",
            'estado'=>"on",
        ]
    ];

    public function run()
    {
        foreach(Self::$funcionarios as $funcionario){
            DB::table('funcionarios')->insert(
                $funcionario
            );
        }
    }
}