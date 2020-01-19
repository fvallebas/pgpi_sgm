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

    return 'Home';
});

Route::get('/usuarios', 'UserController@index');

Route::get('/usuarios/{id}', 'UserController@show')
                            ->where('id', '\d*');

Route::get('/usuarios/nuevo', 'UserController@create_new_user');

Route::get('/saludo/{name}/{nickname?}', 'WelcomeUserController');

Route::get('/prueba', function(){

    return view('prueba');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Gestores
Route::resource('/gestores', 'GestorController');
Route::get('/gestores', 'GestorController@index')->name('gestores');

//Admin
Route::get('/admin', 'AdminController@index');

//Clientes
//Route::get('/clientes', 'ClienteController@index');
Route::resource('clientes', 'ClienteController');
Route::get('/clientes', 'ClienteController@index')->name('clientes');

//Vehiculos
Route::resource('vehiculos', 'VehiculoController');
Route::get('/vehiculos', 'VehiculoController@index')->name('vehiculos');

//Muelles
Route::resource('muelles', 'MuelleController');
Route::get('/muelles', 'MuelleController@index')->name('muelles');

//Horarios
Route::resource('horarios', 'HorarioController');
Route::get('/horarios', 'HorarioController@index')->name('horarios');