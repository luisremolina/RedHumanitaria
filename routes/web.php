<?php

use Illuminate\Support\Facades\Route;




Auth::routes();

route::get('/', 'InicioController@index')->name('inicio');

Route::get('/home', 'HomeController@index')->name('home');
