<?php

use Illuminate\Support\Facades\Route;




Auth::routes();

route::get('/', 'InicioController@index')->name('inicio');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/servicios', 'InicioController@services')->name('servicios');

Route::get('/Sobre-Nosotros', 'InicioController@about')->name('about');

Route::get('/donacion', 'DonacionController@index')->name('donacion');

Route::post('/donacion/guardar', 'DonacionController@guardar_donacion')->name('donacion.guardar');