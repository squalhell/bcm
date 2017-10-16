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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/encuesta_out', function() { return view('Atenciones.Encuestas.index'); })->name('encuestas');

Route::get('clientes', 'ClientesController@index')->name('clientes');
Route::post('clientes', 'ClientesController@index')->name('clientes');
route::post('clientes/search', 'ClientesController@search')->name('cliente_search');
route::post('clientes/add', 'ClientesController@add')->name('cliente_add');
route::post('clientes/edit', 'ClientesController@edit')->name('cliente_edit');
route::post('clientes/save', 'ClientesController@save_cliente')->name('cliente_save');
route::post('clientes/validar', 'ClientesController@existe')->name('cliente_existe');
route::post('clientes/ficha', 'ClientesController@ficha')->name('cliente_ficha');
route::post('clientes/detalle', 'ClientesController@detalle')->name('cliente_detalle');
route::post('clientes/historico', 'ClientesController@historico')->name('cliente_historico');

route::get('atenciones/detalle', 'ClientesController@detalle')->name('atenciones_detalle');

route::get('cursos', 'CursosController@index')->name('cursos');
route::post('cursos', 'CursosController@index')->name('cursos');
route::post('cursos/search', 'CursosController@search')->name('cursos_search');
route::get('cursos/nuevo', 'CursosController@nuevo')->name('cursos_nuevo');
route::post('cursos/add', 'CursosController@add')->name('cursos_add');
route::post('cursos/edit', 'CursosController@edit')->name('cursos_edit');
route::post('cursos/update', 'CursosController@update')->name('cursos_update');

route::get('salas', 'SalasController@index')->name('salas');
route::post('salas', 'SalasController@index')->name('salas');
route::post('salas/search', 'SalasController@search')->name('salas_search');
route::get('salas/nuevo', 'SalasController@nuevo')->name('salas_nuevo');
route::post('salas/add', 'SalasController@add')->name('salas_add');
route::post('salas/edit', 'SalasController@edit')->name('salas_edit');
route::post('salas/update', 'SalasController@update')->name('salas_update');

route::get('relatores', 'RelatoresController@index')->name('relatores');
route::post('relatores', 'RelatoresController@index')->name('relatores');
route::post('relatores/search', 'RelatoresController@search')->name('relatores_search');
route::get('relatores/nuevo', 'RelatoresController@nuevo')->name('relatores_nuevo');
route::post('relatores/add', 'RelatoresController@add')->name('relatores_add');
route::post('relatores/edit', 'RelatoresController@edit')->name('relatores_edit');
route::post('relatores/update', 'RelatoresController@update')->name('relatores_update');

route::get('inscripciones', 'InscripcionesController@index')->name('inscripciones');
route::post('inscripciones', 'InscripcionesController@index')->name('inscripciones');
route::post('inscripciones/search', 'InscripcionesController@search')->name('inscripciones_search');
route::post('inscripciones/inscribir', 'InscripcionesController@inscribir')->name('inscripciones_add');

route::get('horarios', 'HorariosController@index')->name('horarios');
route::post('horarios', 'HorariosController@index')->name('horarios');
route::get('horarios/nuevo', 'HorariosController@nuevo')->name('horarios_nuevo');
route::post('horarios/add', 'HorariosController@add')->name('horarios_add');
route::post('horarios/search', 'HorariosController@search')->name('horarios_search');
route::post('horarios/seleccionar_sala', 'HorariosController@seleccionar_sala')->name('horarios_seleccionar_sala');
route::post('horarios/update', 'HorariosController@update')->name('horarios_update');
route::post('horarios/edit', 'HorariosController@edit')->name('horarios_edit');

route::get('matriculas', 'MatriculasController@index')->name('matriculas');
route::post('matriculas', 'MatriculasController@index')->name('matriculas');
route::get('matriculas/nuevo', 'MatriculasController@nuevo')->name('matriculas_nuevo');
route::post('matriculas/add', 'MatriculasController@add')->name('matriculas_add');
route::post('matriculas/get_matricula', 'MatriculasController@get_matriculas')->name('get_matriculas');

route::get('gasfiter', 'GasfiterController@index')->name('gasfiter');
route::post('gasfiter/inscripciones_search', 'GasfiterController@inscripciones_search')->name('gasfiter_search');
route::post('gasfiter/get_gasfiter', 'GasfiterController@get_gasfiter')->name('get_gasfiter');

route::get('repuestos', 'RepuestosController@index')->name('repuestos');

Route::get('/ajax_ciudades', 'MantenedoresController@ajax_load_ciudades')->name('load_ciudades');
Route::get('/ajax_comunas', 'MantenedoresController@ajax_load_comunas')->name('load_comunas');
Route::get('/ajax_cursos', 'MantenedoresController@ajax_load_cursos')->name('load_cursos');
Route::get('/ajax_num_inscritos', 'MantenedoresController@ajax_num_inscritos')->name('num_inscritos');