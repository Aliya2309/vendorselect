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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//routes to function searchbar which searches product (runs the scrapper tool)
Route::post('searchpage', 'App\Http\Controllers\UserController@searchbar');

//routes to the specific product page which will run sentiment algorithm as well as
// give all info about the product
Route::get('product/{id}', 'App\Http\Controllers\UserController@productinfo');

Route::get('starred', 'App\Http\Controllers\UserController@starreditems');

Route::get('addstarred/{$id}', 'App\Http\Controllers\UserController@addtostarred');