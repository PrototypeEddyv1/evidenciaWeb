<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidosController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});
Route::get('/home', function () {
    return view('main');
});
Route::controller(ProductoController::class)->group(function(){
    Route::get('productos','index')->name("productos.index");
    Route::get('productosCrear','create')->name("productos.create");
    Route::post('productoGuardar','store')->name("productos.store");
    Route::get('productos/{producto}','show')->name("productos.show");
    Route::delete('productoEliminado/{producto}','destroy')->name("productos.destroy");
    Route::get('productoEditar/{producto}','edit')->name("productos.edit");
    Route::put('productoEditado/{producto}','update')->name("productos.update");
});
Route::controller(PedidosController::class)->group(function(){
    Route::get('pedidos','index')->name("pedidos.index");
    Route::get('pedidosCrear','create')->name("pedidos.create");
    Route::post('pedidoGuardar','store')->name("pedidos.store");
    Route::get('pedidos/{pedido}','show')->name("pedidos.show");
    Route::delete('pedidoEliminado/{pedido}','destroy')->name("pedidos.destroy");
    Route::get('pedidoEditar/{pedido}','edit')->name("pedidos.edit");
    Route::put('pedidoEditado/{pedido}','update')->name("pedidos.update");
});

Auth::routes();