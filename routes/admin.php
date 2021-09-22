<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriaController;

Route::get('/', [HomeController::class , 'index']);
Route::get('/listarCategorias' , [CategoriaController::class , 'index'])->name('admin.listarCategorias');
Route::get('/agregarCategoria' , [CategoriaController::class , 'create'])->name('admin.agregarCategoria');
Route::post('/agregarCategoria', [CategoriaController::class , 'store'])->name('admin.storeCategoria');
Route::get('/modificarCategoria/{id}' , [CategoriaController::class , 'edit'])->name('admin.editCategoria');
Route::put('/modificarCategoria' , [CategoriaController::class , 'update'])->name('admin.updateCategoria');
Route::get('/eliminarCategoria/{id}' , [CategoriaController::class , 'confirmarBaja'])->name('admin.confirmarBaja');

