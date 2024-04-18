<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;

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

        /* Actualizar ese campo */
        $usuario = User::findOrFail($user_id);
        //$usuario->productsCart()->updateExistingPivot(24 , ['cantidad' => 3]);
        
        /* Eliminar un producto a ese carrito */
        //$usuario->productsCart()->detach(24);

        /* Agregar un producto al carrito de un usuario */
        //$usuario->productsCart()->attach(24, ['cantidad' => 5]);
    
        return response()->json($productosUsuario);
    }
    public function eliminarProductoCarrito(Request $request){
        $user_id = $request->input('user_id');
        $product_id = $request->input('product_id');

        $usuario = User::findOrFail($user_id);
        $usuario->productsCart()->detach($product_id);
    }
    public function agregarProductoCarrito(Request $request){
        $user_id = $request->input('user_id');
        $product_id = $request->input('product_id');

        $usuario = User::findOrFail($user_id);
        //Deberia comprobar si lo tiene, si ya lo tiene que incremente en 1 la cantidad
        $usuario->productsCart()->attach($product_id, ['cantidad' => 1]);
    }
    public function cambiarCantidadProductoCarrito(Request $request){
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
            $usuario->productsCart()->attach($product_id, ['cantidad' => $cantidad+1]);
        }
        elseif ($actualizacion == 'DECREMENTAR') {
            //Cuando la cantidad sea 1 que le de a remover y no se elimine por error
            if ($cantidad > 1) {
                $usuario->productsCart()->attach($product_id, ['cantidad' => $cantidad-1]);
            }
        }
    }
}
