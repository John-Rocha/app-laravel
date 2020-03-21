<?php

use Illuminate\Support\Facades\Route;

Route::resource('products', 'ProductController');

Route::get('/login', function () {
    return "Faça o Login!";
})->name('login');

/*
Route::middleware(['auth'])->group(function () {
    Route::get('products', 'ProductController@index')->name('products.index');
    Route::get('products/{id}', 'ProductController@show')->name('products.show');
});
*/

/*
Route::delete('products/{id}', 'ProductController@destroy')->name('products.destroy');
Route::put('products/{id}', 'ProductController@update')->name('products.update');
Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit');
Route::get('products/create', 'ProductController@create')->name('products.create');
Route::get('products/{id}', 'ProductController@show')->name('products.show');
Route::get('products', 'ProductController@index')->name('products.index');
Route::post('products', 'ProductController@store')->name('products.store');
*/

Route::get('/teste', function () {
    return "Teste de rota";
})->name('Teste');

Route::get('/', function () {
    return view('welcome');
});
