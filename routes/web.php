<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\StripeController;
use App\Livewire\QrProductoModal;
use App\Livewire\ShowCategories;
use App\Livewire\ShowOrders;
use App\Livewire\ShowProducts;
use App\Livewire\ShowUsers;
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
    /* Route::get('/dashboard', function () {
        if (Auth::user()->is_admin == 'SI') {
            return redirect()->route('users.index');
        } else {
            return view('home');
        }
    })->name('dashboard'); */
    /* Route::resource('users', UserController::class); */
    Route::get('user', ShowUsers::class)->name('users.index');
    Route::get('category', ShowCategories::class)->name('categories.index');
    Route::get('products', ShowProducts::class)->name('productos.index');
    Route::get('orders', ShowOrders::class)->name('pedidos.index');


    /* Esta ruta es para pruebas */
    Route::get('/mostrar/{id}', function () {
        return view('home');
    })->name('home.show');
    /* Fin */
});

Route::get('/checkout', [StripeController::class, 'checkout'])->name('checkout');
Route::post('/session', [StripeController::class, 'session'])->name('session');
Route::get('/success', [StripeController::class, 'success'])->name('success');
Route::get('/cancel', [StripeController::class, 'cancel'])->name('cancel');

