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
    return view('accueil');
})->name('accueil');



Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');


Route::resource('/salles', \App\Http\Controllers\SalleController::class);
Route::resource('/oeuvres', \App\Http\Controllers\OeuvreController::class);
Route::resource('/users', \App\Http\Controllers\UserController::class);

Route::resource('/commentaires', \App\Http\Controllers\CommentaireController::class) ->except('create');
Route::get('/commentaires/create/{oeuvre_id}', [\App\Http\Controllers\CommentaireController::class, 'create'])->name('commentaires.create');
