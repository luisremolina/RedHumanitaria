<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

route::get('/inicio', 'InicioController@index')->name('inicio');

Route::get('/home', 'HomeController@index')->name('home');
