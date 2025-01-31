<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Ruta de inicio
Route::get('/', function () {
    return view('plantilla');
})->name('inicio');

// Mostrar vista del Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Procesar el Login
Route::post('/login', [AuthController::class, 'login']);
// Logout (solo va a afectar a ususarios autenticados)
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');


// Rutas de recursos para posts (incluye index, show, create, store, edit, update, destroy)
Route::resource('posts', PostController::class)->except(['edit', 'update', 'destroy']);
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

// Eliminar o comentar las siguientes rutas ya que están incluidas en el resource:
// Route::get('/posts/nuevoPrueba', [PostController::class, 'nuevoPrueba'])->name('posts.nuevoPrueba');
// Route::get('/posts/editarPrueba/{id}', [PostController::class, 'editarPrueba'])->name('posts.editarPrueba');
// Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

