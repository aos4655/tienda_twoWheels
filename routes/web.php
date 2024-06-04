<?php

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\StripeController;
use App\Http\Livewire\Counter;
use App\Livewire\Accesorios;
use App\Livewire\Bicicletas;
use App\Livewire\Checkout;
use App\Livewire\MisPedidos;
use App\Livewire\Patinetes;
use App\Livewire\QrProductoModal;
use App\Livewire\ShowCategories;
use App\Livewire\ShowOrders;
use App\Livewire\ShowProducts;
use App\Livewire\ShowUsers;
use App\Models\Pedido;
use App\Models\Producto;

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
    $productoMasVendido = Producto::withCount('pedidos')
        ->orderByDesc('pedidos_count')
        ->first();
    $productosTopVentas = Producto::withCount('pedidos')
        ->where('categoria_id', '!=', '3')
        ->orderByDesc('pedidos_count')
        ->take(5)
        ->get();

    return view('home', compact('productoMasVendido', 'productosTopVentas'));
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin',
])->group(function () {

    Route::get('user', ShowUsers::class)->name('users.index');
    Route::get('category', ShowCategories::class)->name('categories.index');
    Route::get('products', ShowProducts::class)->name('todos-productos.index');
    Route::get('orders', ShowOrders::class)->name('todos-pedidos.index');


    /* Esta ruta es para pruebas */
    Route::get('/mostrar/{id}', function () {
        return view('home');
    })->name('home.show');
    /* Fin */
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('pedidos', PedidoController::class);
    Route::get('/pedido/pdf/{id}', [PedidoController::class, 'pdf'])->name('pedido.pdf')->middleware('verificar.pedido.usuario');
    Route::get('/cancelar-pedido/{id}', [PedidoController::class, 'cancelarPedido'])->name('cancelar.pedido')->middleware('verificar.pedido.usuario');
    
    /* RUTA PREVIA DE PAGO */
    Route::get('/checkout2', Checkout::class)->name('checkout2');
    /* Route::get('/checkout', [StripeController::class, 'checkout'])->name('checkout');
    */
    /* RUTA PAYPAL */
    Route::post('/paypal-session', [PaypalController::class, 'paypal'])->name('paypal-session');
    Route::get('/paypal-success/{direccion}/{nombre}', [PaypalController::class, 'success'])->name('paypal-success');
    Route::get('/paypal-cancel', [PaypalController::class, 'cancel'])->name('paypal-cancel');

    /* RUTA PASARELA DE PAGO */
    Route::post('/stripe-session', [StripeController::class, 'session'])->name('stripe-session');
    Route::get('/stripe-success/{direccion}/{nombre}', [StripeController::class, 'success'])->name('stripe-success');
    Route::get('/stripe-cancel', [StripeController::class, 'cancel'])->name('stripe-cancel');
});

Route::resource('productos', ProductoController::class);
Route::get('scooter', Patinetes::class)->name('patinetes.index');
Route::get('bikes', Bicicletas::class)->name('bicicletas.index');
Route::get('accessories', Accesorios::class)->name('accesorios.index');

/* Enlaces politica */
Route::get('/politica', function () {
    return view('policy');
})->name('politica.show');
/* Enlaces terminos */
Route::get('/terminos', function () {
    return view('terms');
})->name('terminos.show');
/* WHATSAPP */
/*  
Route::get('/enviarWhatsapp', [PedidoController::class, 'enviarWhatsapp']);
Route::get('/enviarWhatsappPDF', [PedidoController::class, 'enviarWhatsappPDF']);
*/