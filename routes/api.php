<?php

use App\Http\Controllers\LogisticApiController;
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
});     Route::get('/logistica/{num_track}',[LogisticApiController::class, 'mostrar']);

Route::get('/carrito',[UserController::class, 'obtenerProductosUsuario']);

Route::post('/carritoDelete',[UserController::class, 'eliminarProductoCarrito'])->name('carrito.delete');
Route::post('/carritoAdd',[UserController::class, 'agregarProductoCarrito'])->name('carrito.add');
Route::post('/carritoCantidad',[UserController::class, 'cambiarCantidadProductoCarrito'])->name('carrito.cambiar_cantidad');


/* ENVIO DATOS POR POST A TRAVES DE UNA API */
/* Route::post('/user', function (Request $request, Response $response) {
    $id=$request->id;

    //consulta Para obtener datos de usuario

    //TO-DO:

    //Almacenar y devolver los datos
    $result=$id;

    return $response->json($result);
}); */