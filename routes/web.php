<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// // Ruta de inicio
// Route::get('/', function () {
//     return view('welcome');
// })->name('inicio');

// Ruta de inicio
Route::get('/', function () {
    return view('plantilla');
})->name('inicio');

// // Ruta para el listado de posts
// Route::get('/posts', function () {
//     return view('posts.listado');
// })->name('posts_listado');

// // Ruta para la ficha de un post con un parámetro numérico
// Route::get('/posts/{id}', function ($id) {
//     return view('posts.ficha', ['id' => $id]);
// })->where('id', '[0-9]+')->name('posts_ficha');


Route::resource('posts', PostController::class)->only(['index', 'show', 'create', 'edit']);

