<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Ruta de inicio
Route::get('/', function () {
    return view('plantilla');
})->name('inicio');

// Rutas de recursos para posts (incluye index, show, create, store, edit, update, destroy)
Route::resource('posts', PostController::class);

// Eliminar o comentar las siguientes rutas ya que están incluidas en el resource:
// Route::get('/posts/nuevoPrueba', [PostController::class, 'nuevoPrueba'])->name('posts.nuevoPrueba');
// Route::get('/posts/editarPrueba/{id}', [PostController::class, 'editarPrueba'])->name('posts.editarPrueba');
// Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

