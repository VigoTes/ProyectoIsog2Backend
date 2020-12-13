<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('index');
});

Route::get('/bienvenido', function () {
    return view('bienvenido');
});


// usar dd("aaaaaaaaaa"); para debugear

Route::resource('categoria', 'CategoriaController');  // es resource pq trabajamos con varias rutas 


Route::post('/', 'UserController@login')->name('user.login');