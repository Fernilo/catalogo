<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;
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
##############################################
####### CRUD de marcas


Route::get('/adminMarcas', [ MarcaController::class, 'index' ] );
Route::get('/agregarMarca', [ MarcaController::class, 'create' ] );
Route::post('/agregarMarca', [ MarcaController::class, 'store' ] );
Route::get('/modificarMarca/{id}',[MarcaController::class,'edit']);
Route::put('/modificarMarca', [ MarcaController::class, 'update' ]);
Route::get('/eliminarMarca/{id}', [ MarcaController::class, 'confirmarBaja' ]);
route::delete('/eliminarMarca', [ MarcaController::class, 'destroy' ]);



##############################################
####### CRUD de categorías
Route::get('/adminCategorias' ,[CategoriaController::class, 'index']);
Route::get('/agregarCategoria' , [CategoriaController::class , 'create']);
Route::post('/agregarCategoria' , [CategoriaController::class , 'store']);
Route::get('/modificarCategoria/{id}' , [CategoriaController::class , 'edit']);
Route::put('/modificarCategoria', [CategoriaController::class , 'update']);
Route::get('/eliminarCategoria/{id}' , [CategoriaController::class , 'confirmarBaja']);
Route::delete('/eliminarCategoria',[CategoriaController::class , 'destroy']);

##############################################
####### CRUD de productos
Route::get('/adminProductos' , [ProductoController::class , 'index']);
Route::get('/agregarProducto' , [ProductoController::class , 'create']);
Route::post('/agregarProducto' , [ProductoController::class , 'store']);
Route::get('/modificarProducto/{id}', [ProductoController::class,'edit']);
Route::put('/modificarProducto' , [ProductoController::class , 'update']);
Route::get('/eliminarProducto/{id}',[ProductoController::class,'confirmarBaja']);
Route::delete('/eliminarProducto' , [ProductoController::class , 'destroy']);

// Route::get('/dashboard' , [HomeController::class , 'index']);