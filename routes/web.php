<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('index');
});

Route::get('/bienvenido', function () {
    return view('bienvenido');
});


// usar dd("aaaaaaaaaa"); para debugear GA

Route::resource('categoria', 'CategoriaController');  // es resource pq trabajamos con varias rutas 
Route::get ('categoria/{id}/confirmar','CategoriaController@confirmar')->name('categoria.confirmar');



Route::resource('producto', 'ProductoController');  // es resource pq trabajamos con varias rutas 



Route::get('cancelar', function () {
    return redirect()->route('categoria.index')->with('datos','Accion cancelada');
})->name('cancelar');



Route::post('/', 'UserController@login')->name('user.login');