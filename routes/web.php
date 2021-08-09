<?php

use App\Funcionario;
use App\Pessoa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix'=>"user"], function(){
    Route::get('/login', "UserController@index")->name('login');
    Route::post('/logar', "UserController@logar")->name('logar');
    Route::get('/logout', "UserController@logout")->name('logout');

});


Route::get('/', "HomeController@index")->middleware('auth')->name('home');

Route::resource('/funcionarios', "FuncionarioController");

Route::resource('/clientes', "ClienteController");

Route::resource('/produtos', "ProdutoController");

Route::resource('/fabricantes', "FabricanteController");

Route::resource('/fornecedores', "FornecedorController");

Route::group(['prefix' =>"/estatistica"], function(){
    Route::get('/produtos', "ProdutoController@estatistica");
    Route::get('/funcionarios', "FuncionarioController@estatistica");
});

Route::group(['prefix' =>"/vendas"], function(){
    Route::get('/', "VendaController@index");
    Route::get('/create', "VendaController@create");
    Route::post('/store', "VendaController@store")->name('save_venda');
    Route::get('/show/{id}', "VendaController@show")->name('carrinho');
});

Route::get('/sobre', "HomeController@sobre");

/*Route::get('/text', function(){
$id_pessoa = Auth::user()->pessoa->id;
$funcionario = Funcionario::where('id_pessoa', $id_pessoa)->first();
echo $funcionario->id;
});*/