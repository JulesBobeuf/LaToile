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


Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/equipe', function () {
    return view('equipe');
})->name('equipe');

Route::get('/edito', function () {
    return view('edito');
})->name('edito');


Route::resource('/salles', \App\Http\Controllers\SalleController::class);
Route::resource('/oeuvres', \App\Http\Controllers\OeuvreController::class);
Route::post('/like/{id}', [\App\Http\Controllers\LikeController::class, 'store'])->name('like');
Route::post('/dislike/{id}', [\App\Http\Controllers\LikeController::class, 'destroy'])->name('dislike');
Route::resource('/users', \App\Http\Controllers\UserController::class);
Route::post('/users/{id}', [\App\Http\Controllers\UserController::class,'update'])->name('updateavatar');

Route::resource('/commentaires', \App\Http\Controllers\CommentaireController::class) ->except('create');
Route::post('/commentaires/{id}', [\App\Http\Controllers\CommentaireController::class,'update'])->name('approuvecommentaire');
Route::get('/commentaires/create/{oeuvre_id}', [\App\Http\Controllers\CommentaireController::class, 'create'])->name('commentaires.create');
Route::post('/oeuvres/approuver/{id}', [\App\Http\Controllers\OeuvreController::class,'approuveOeuvre'])->name('approuveoeuvre');
