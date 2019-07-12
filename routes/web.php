<?php

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

Route::get('/', function () {
    return view('index');
});

//Telas de CREATE
Route::view('/adicionar-aeronave', 'creates/adicionar-aeronave');
Route::view('/adicionar-aeroporto', 'creates/adicionar-aeroporto');
Route::view('/adicionar-companhia', 'creates/adicionar-companhia');
Route::view('/adicionar-equipamento', 'creates/adicionar-equipamento');
Route::view('/adicionar-pais', 'creates/adicionar-pais');
//Route::view('/adicionar-passageiro', 'creates/adicionar-passageiro');
Route::view('/adicionar-reserva', 'creates/adicionar-reserva');
Route::view('/adicionar-rota', 'creates/adicionar-rota');
//Route::view('/adicionar-uf', 'creates/adicionar-uf');
Route::view('/adicionar-voo', 'creates/adicionar-voo');

//Telas de UPDATE
Route::view('/editar-aeronave', 'updates/editar-aeronave');
Route::view('/editar-aeroporto', 'updates/editar-aeroporto');
Route::view('/editar-companhia', 'updates/editar-companhia');
Route::view('/editar-equipamento', 'updates/editar-equipamento');
Route::view('/editar-pais', 'updates/editar-pais');
//Route::view('/editar-passageiro', 'updates/editar-passageiro');
Route::view('/editar-reserva', 'updates/editar-reserva');
Route::view('/editar-rota', 'updates/editar-rota');
Route::view('/editar-uf', 'updates/editar-uf');
Route::view('/editar-voo', 'updates/editar-voo');

//Telas de READ e DELETE
Route::view('/gerenciar-aeronaves', 'reads/gerenciar-aeronaves');
Route::view('/gerenciar-aeroportos', 'reads/gerenciar-aeroportos');
Route::view('/gerenciar-companhias', 'reads/gerenciar-companhias');
Route::view('/gerenciar-equipamentos', 'reads/gerenciar-equipamentos');
Route::view('/gerenciar-paises', 'reads/gerenciar-paises');
//Route::view('/gerenciar-passageiros', 'reads/gerenciar-passageiros');
//Route::view('/gerenciar-reservas-single', 'reads/gerenciar-reservas-single');
//Route::view('/gerenciar-reservas', 'reads/gerenciar-reservas');
Route::view('/gerenciar-rotas', 'reads/gerenciar-rotas');
//Route::view('/gerenciar-ufs', 'reads/gerenciar-ufs');
Route::view('/gerenciar-voos', 'reads/gerenciar-voos');

//Outros
Route::view('/senha', 'outros/senha')->name('senha');
Route::view('/sobre', 'outros/sobre')->name('sobre');

//Controllers Passageiros
Route::resource('/passageiros', 'PassageiroController');
Route::get('/gerenciar-passageiros', 'PassageiroController@index')->name('gerenciar-passageiros');
Route::get('/adicionar-passageiro', 'PassageiroController@create')->name('adicionar-passageiro');
Route::get('/editar-passageiro/{id}', 'PassageiroController@edit')->name('editar-passageiro');
Route::post('/filtrar-passageiro', 'PassageiroController@filtro')->name('filtrar-passageiro');
Route::delete('/deletar-passageiro/{id}', 'PassageiroController@destroy')->name('deletar-passageiro');

//Controllers Reservas
Route::resource('/reservas', 'ReservaController');
Route::get('/gerenciar-reservas', 'ReservaController@voos')->name('gerenciar-reservas');
Route::get('/gerenciar-reservas-single', 'ReservaController@reservas')->name('gerenciar-reservas-single');
Route::get('/adicionar-reserva', 'ReservaController@create')->name('adicionar-reserva');
Route::get('/editar-reserva/{id}/{numero}/{data}', 'ReservaController@edit')->name('editar-reserva');
Route::post('/filtrar-reserva', 'ReservaController@filtro')->name('filtrar-reserva');
Route::post('/filtrar-reserva-voo', 'ReservaController@filtroVoo')->name('filtrar-reserva-voo');
Route::delete('/deletar-reserva/{id}/{numero}/{data}', 'ReservaController@destroy')->name('deletar-reserva');

//Controllers Senha
Route::post('/logar', 'SenhaController@index')->name('logar');
Route::get('/adicionar-uf', 'UFController@create')->name('adicionar-uf');

//Funções que só serão acessadas se a pessoa estiver logada
Route::group(['middleware' => ['CheckSenha']], function () {

    Route::view('/controle-interno', 'outros/controle-interno')->name('controle-interno');

    //Controllers UFS
    Route::resource('/ufs', 'UFController');
    Route::get('/gerenciar-ufs', 'UFController@index')->name('gerenciar-ufs');
    Route::get('/adicionar-uf', 'UFController@create')->name('adicionar-uf');
    Route::get('/editar-uf/{id}', 'UFController@edit')->name('editar-uf');
    Route::post('/filtrar-uf', 'UFController@filtro')->name('filtrar-uf');
    Route::delete('/deletar-uf/{id}', 'UFController@destroy')->name('deletar-uf');

    //Controllers Pais
    Route::resource('/pais', 'PaisController');
    Route::get('/gerenciar-paises', 'PaisController@index')->name('gerenciar-paises');
    Route::get('/adicionar-pais/{numero}/{data}', 'PaisController@create')->name('adicionar-pais');
    Route::get('/editar-pais/{id}', 'PaisController@edit')->name('editar-pais');
    Route::post('/filtrar-pais', 'PaisController@filtro')->name('filtrar-pais');
    Route::delete('/deletar-pais/{id}', 'PaisController@destroy')->name('deletar-pais');

    //Controllers Equipamento
    Route::resource('/equipamento', 'EquipamentoController');
    Route::get('/gerenciar-equipamentos', 'EquipamentoController@index')->name('gerenciar-equipamentos');
    Route::get('/adicionar-equipamento', 'EquipamentoController@create')->name('adicionar-equipamento');
    Route::get('/editar-equipamento/{id}', 'EquipamentoController@edit')->name('editar-equipamento');
    Route::post('/filtrar-equipamento', 'EquipamentoController@filtro')->name('filtrar-equipamento');
    Route::delete('/deletar-equipamento/{id}', 'EquipamentoController@destroy')->name('deletar-equipamento');

    //Controllers Companhia Aerea
    Route::resource('/companhia', 'CompanhiaController');
    Route::get('/gerenciar-companhias', 'CompanhiaController@index')->name('gerenciar-companhia');
    Route::get('/adicionar-companhia', 'CompanhiaController@create')->name('adicionar-companhia');
    Route::get('/editar-companhia/{id}', 'CompanhiaController@edit')->name('editar-companhia');
    Route::post('/filtrar-companhia', 'CompanhiaController@filtro')->name('filtrar-companhia');
    Route::delete('/deletar-companhia/{id}', 'CompanhiaController@destroy')->name('deletar-companhia');

    //Controllers Aeronave
    Route::resource('/aeronave', 'AeronaveController');
    Route::get('/gerenciar-aeronaves', 'AeronaveController@index')->name('gerenciar-aeronaves');
    Route::get('/adicionar-aeronave', 'AeronaveController@create')->name('adicionar-aeronave');
    Route::get('/editar-aeronave/{id}', 'AeronaveController@edit')->name('editar-aeronave');
    Route::post('/filtrar-aeronave', 'AeronaveController@filtro')->name('filtrar-aeronave');
    Route::delete('/deletar-aeronave/{id}', 'AeronaveController@destroy')->name('deletar-aeronave');

    //Controllers Aeroporto
    Route::resource('/aeroporto', 'AeroportoController');
    Route::get('/gerenciar-aeroportos', 'AeroportoController@index')->name('gerenciar-aeroportos');
    Route::get('/adicionar-aeroporto', 'AeroportoController@create')->name('adicionar-aeroporto');
    Route::get('/editar-aeroporto/{id}', 'AeroportoController@edit')->name('editar-aeroporto');
    Route::post('/filtrar-aeroporto', 'AeroportoController@filtro')->name('filtrar-aeroporto');
    Route::delete('/deletar-aeroporto/{id}', 'AeroportoController@destroy')->name('deletar-aeroporto');

    //Controllers Rotas de Voo
    Route::resource('/rota', 'RotaController');
    Route::get('/gerenciar-rotas', 'RotaController@index')->name('gerenciar-rotas');
    Route::get('/adicionar-rota', 'RotaController@create')->name('adicionar-rota');
    Route::get('/editar-rota/{id}', 'RotaController@edit')->name('editar-rota');
    Route::post('/filtrar-rota', 'RotaController@filtro')->name('filtrar-rota');
    Route::delete('/deletar-rota/{id}', 'RotaController@destroy')->name('deletar-rota');

    //Controllers Voos
    Route::resource('/voos', 'VooController');
    Route::get('/gerenciar-voos', 'VooController@index')->name('gerenciar-voos');
    Route::get('/adicionar-voo', 'VooController@create')->name('adicionar-voo');
    Route::get('/editar-voo/{numero}/{data}', 'VooController@edit')->name('editar-voo');
    Route::post('/filtrar-voo', 'VooController@filtro')->name('filtrar-voo');
    Route::patch('/atualizar-voo/{numeroAntigo}/{dataAntiga}', 'VooController@update')->name('atualizar-voo');
    Route::delete('/deletar-voo/{numero}/{data}', 'VooController@destroy')->name('deletar-voo');
});