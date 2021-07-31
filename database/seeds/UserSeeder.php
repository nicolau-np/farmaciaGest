<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'id_pessoa'=>1,
                'email'=>"nic340k@gmail.com",
                'password'=>Hash::make("olamundo2015"),
                'acesso'=>"admin",
                'estado'=>"on",
            ]
        ]);
    }
}