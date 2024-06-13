<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\LogisticApiController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
});
Route::get('/logistica/{num_track}', [LogisticApiController::class, 'mostrar']);
Route::post('/logistica/crearSeguimiento/{num_track}', [LogisticApiController::class, 'crear'])->name('crear-seguimiento');
Route::post('/logistica/actualizarSeguimiento/{num_track}', [LogisticApiController::class, 'actualizar'])->name('actualizar-seguimiento');

Route::get('/carrito', [CarritoController::class, 'obtenerCarritoUsuario']);

Route::post('/carritoDelete', [CarritoController::class, 'eliminarProductoCarrito'])->name('carrito.delete');
Route::post('/carritoAdd', [CarritoController::class, 'agregarProductoCarrito'])->name('carrito.add');
Route::post('/carritoCantidad', [CarritoController::class, 'cambiarCantidadProductoCarrito'])->name('carrito.cambiar_cantidad');

/* CREAR SEGUIMIENTO PEDIDO CUANDO PAGA */
Route::post('/crear-envio/{num_track}', [StripeController::class, 'crear'])->name('crear-envio');
