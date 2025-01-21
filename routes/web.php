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


 //Route::resource('posts', PostController::class)->only(['index', 'show', 'create', 'edit']);


 // Rutas para pruebas
 Route::get('/posts/nuevoPrueba', [PostController::class, 'nuevoPrueba'])->name('posts.nuevoPrueba');
 Route::get('/posts/editarPrueba/{id}', [PostController::class, 'editarPrueba'])->name('posts.editarPrueba');

 // Rutas de recursos (para index, show, etc.)
 Route::resource('posts', PostController::class);

