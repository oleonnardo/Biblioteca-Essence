<?php

use Illuminate\Http\Request;
use Essence\Cliente;
use Essence\Livro;
use Essence\Reserva;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('index');
});


Route::resource('clientes', 'ClienteController');

Route::group(['prefix' => 'cliente'], function () {
    Route::get('/listar', 'ClienteController@clientList')->name("listarCliente");
    Route::get('/busca', 'ClienteController@clientSearch')->name("buscarCliente");
    Route::get('/{id}', 'ClienteController@clientDeleta')->name('deletaCliente');
    Route::get('/status/{id}', 'ClienteController@trocaStatus')->name('trocaStatus');
});

// *********************************

Route::resource('livros', 'LivroController');

Route::group(['prefix' => 'livro'], function () {
    Route::get('/busca', 'LivroController@showBooks')->name("buscaLivro");
    Route::get('/{id}', 'LivroController@deletaBook')->name('deletaLivro');
});

// *********************************


Route::resource('reservas', 'ReservaController');

Route::group(['prefix' => 'reserva'], function (){
    Route::get('/livro/{id}', 'ReservaController@novaReserva')->name('reservaLivro');
    Route::post('/localiza', 'ReservaController@localizarReserva')->name('localizarReserva');
});


// *********************************

Route::resource('emprestimos', 'EmprestimoController');
Route::group(['prefix' => 'emprestimo'], function () {
    Route::post('/confirma', 'EmprestimoController@confirmEmprestimo')->name("confirmarEmprestimo");
    Route::post('/detalhar', 'EmprestimoController@detalharEmprestimo')->name("detalharEmprestimo");
    Route::get('/finalizar/{codigo}/{id}', 'EmprestimoController@finalizarEmprestimo')->name("finalizarEmprestimo");
    Route::get('/renovar/{codigo}/{id}', 'EmprestimoController@renovarEmprestimo')->name("renovarEmprestimo");

});



