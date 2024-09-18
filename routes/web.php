<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Producto
Route::get('productos', [ProductoController::class, 'getAllProductos']);
Route::post('producto/CrearProducto', [ProductoController::class, 'CrearProducto']);
Route::get('producto/getProductosPorPedido/{id}', [ProductoController::class, 'getProductosPorPedido']);
Route::put('producto/update/{id}', [ProductoController::class, 'update']);
Route::delete('producto/borrar/{id}', [ProductoController::class, 'destroy']);

//compra
Route::get('compras', [CompraController::class, 'getAllCompras']);
Route::post('compra/CrearComprar', [CompraController::class, 'CrearCompra']);
Route::get('compra/usuariosConCompras', [CompraController::class, 'usuariosConCompras']);
Route::get('compra/productosCompradosPorUsuario/{id}', [CompraController::class, 'productosCompradosPorUsuario']);

//Usuario
Route::get('users', [UserController::class, 'getAllUser']);
Route::post('users/CrearUser', [UserController::class, 'CrearUser']);
Route::get('/token', function () {
    return csrf_token(); 
});

