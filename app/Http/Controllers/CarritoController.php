<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe\Product;

class CarritoController extends Controller
{
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
        $stockProducto = Producto::findOrFail($product_id)->stock; 
        $usuario = User::findOrFail($user_id);
        //Compruebo si el usuario tiene el producto, si no lo tiene le incremento su cantidad
        $productoEnCarrito = $usuario->productsCart()->where('producto_id', $product_id)->first();
        if ($productoEnCarrito && $stockProducto>0) {
            $usuario->productsCart()->updateExistingPivot($product_id, ['cantidad' => $productoEnCarrito->pivot->cantidad + 1]);
        } else if($stockProducto>0){
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

        $stockProducto = Producto::findOrFail($product_id)->stock; 
        $usuario = User::findOrFail($user_id);
        //Obtengo la cantidad de un producto
        $cantidad = User::findOrFail($user_id)
            ->productsCart()
            ->wherePivot('producto_id', $product_id)
            ->value('cantidad');
        //ACTUALIZO
        if ($actualizacion == 'INCREMENTAR' && $stockProducto>0) {
            $usuario->productsCart()->updateExistingPivot($product_id, ['cantidad' => $cantidad +1]);
        } elseif ($actualizacion == 'DECREMENTAR' && $cantidad > 1) {
            $usuario->productsCart()->updateExistingPivot($product_id, ['cantidad' => $cantidad-1]);
        }
    }
}
