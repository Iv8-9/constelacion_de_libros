<?php

use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\EstatusController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\ProgresoController;
use App\Http\Controllers\ResenaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login',[LoginController::class, 'login']);

Route::post('categoria/new', [CategoriaController::class, 'store'])->name('categoria/new');
Route::post('categorias', [CategoriaController::class, 'index']);
Route::post('categoria', [CategoriaController::class, 'show']);
Route::post('categoria/update', [CategoriaController::class, 'store']);
Route::post('categoria/delete', [CategoriaController::class, 'destroy']);

Route::post('editorial/new', [EditorialController::class, 'store']);
Route::post('editoriales', [EditorialController::class, 'index']);
Route::post('editorial', [EditorialController::class, 'show']);
Route::post('editorial/update', [EditorialController::class, 'store']);
Route::post('editorial/delete', [EditorialController::class, 'destroy']);

Route::post('estatus/new', [EstatusController::class, 'store']);
Route::post('estatus', [EstatusController::class, 'index']);
Route::post('estatu', [EstatusController::class, 'show']);
Route::post('estatus/update', [EstatusController::class, 'store']);
Route::post('estatus/delete', [EstatusController::class, 'destroy']);

Route::post('libro/new', [LibroController::class, 'store']);
Route::post('libros', [LibroController::class, 'index']);
Route::post('libro', [LibroController::class, 'show']);
Route::post('libro/update', [LibroController::class, 'store']);
Route::post('libro/delete', [LibroController::class, 'destroy']);

Route::post('progeso/new', [ProgresoController::class, 'store']);
Route::post('progesos', [ProgresoController::class, 'index']);
Route::post('progeso', [ProgresoController::class, 'show']);
Route::post('progeso/update', [ProgresoController::class, 'store']);
Route::post('progeso/delete', [ProgresoController::class, 'destroy']);

Route::post('resena/new', [ResenaController::class, 'store']);
Route::post('resenas', [ResenaController::class, 'index']);
Route::post('resena', [ResenaController::class, 'show']);
Route::post('resena/update', [ResenaController::class, 'store']);
Route::post('resena/delete', [ResenaController::class, 'destroy']);

//user 
Route::post('persona/new', [UsuarioController::class, 'store'])->name('persona/new');
Route::post('persona/new', [UsuarioController::class, 'store']); 
Route::post('personas', [UsuarioController::class, 'index']); 
Route::post('persona', [UsuarioController::class, 'show']); 
Route::post('persona/update', [UsuarioController::class, 'store']);
Route::post('persona/delete', [UsuarioController::class, 'destroy']); 

