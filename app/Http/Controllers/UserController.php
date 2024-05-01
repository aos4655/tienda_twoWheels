<?php

namespace App\Http\Controllers;

use App\Livewire\Cart;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.show', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function obtenerProductosUsuario(Request $request)
    {
        $user_id = $request->input('user_id');

        $productosUsuario = User::findOrFail($user_id)
            ->productsCart()
            ->get();

        return response()->json($productosUsuario);
    }
    public function eliminarProductoCarrito(Request $request)
    {
        $user_id = $request->input('user_id');
        $product_id = $request->input('product_id');

        $usuario = User::findOrFail($user_id);
        $usuario->productsCart()->detach($product_id);
    }
    /* Esta funcion si nos la vamos a quedar */
    public function agregarProductoCarrito(Request $request)
    {
        
        $user_id = $request->input('user_id');
        $product_id = $request->input('product_id');

        $usuario = User::findOrFail($user_id);
        //Compruebo si el usuario tiene el producto, si no lo tiene le incremento su cantidad
        $productoEnCarrito = $usuario->productsCart()->where('producto_id', $product_id)->first();
        if ($productoEnCarrito) {
            $usuario->productsCart()->updateExistingPivot($product_id, ['cantidad' => $productoEnCarrito->pivot->cantidad + 1]);
        } else {
            $usuario->productsCart()->attach($product_id, ['cantidad' => 1]);
           
        }
        /* $this->dispatch('incrementarNum') */;/* Este evento desde aqui no funciona */
        return response(200);
        
    }
    public function cambiarCantidadProductoCarrito(Request $request)
    {
        $user_id = $request->input('user_id');
        $product_id = $request->input('product_id');
        $actualizacion = $request->input('actualizacion');

        $usuario = User::findOrFail($user_id);
        //Obtengo la cantidad de un producto
        $cantidad = User::findOrFail($user_id)
            ->productsCart()
            ->wherePivot('producto_id', $product_id)
            ->value('cantidad');
        //ACTUALIZO
        if ($actualizacion == 'INCREMENTAR') {
            $usuario->productsCart()->updateExistingPivot($product_id, ['cantidad' => $cantidad +1]);
        } elseif ($actualizacion == 'DECREMENTAR' && $cantidad > 1) {
            $usuario->productsCart()->updateExistingPivot($product_id, ['cantidad' => $cantidad-1]);
        }
    }
    
}
