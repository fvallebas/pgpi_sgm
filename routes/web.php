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
Route::get('/gestores', 'GestorController@index');

//Admin
Route::get('/admin', 'AdminController@index');

