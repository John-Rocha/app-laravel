<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('products', 'ProductController');

Route::get('/teste', function () {
    return "Teste de rota";
})->name('Teste');

Route::get('/', function () {
    return view('welcome');
});