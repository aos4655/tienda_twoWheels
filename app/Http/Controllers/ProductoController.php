<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Valoracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    
    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        $valoraciones = Valoracion::where('producto_id', '=', $producto->id)->get();
        return view("detalleProducto", compact('producto', 'valoraciones'));
    }
    public function crearValoracion(Request $request){
        $request->validate([
            'descripcion' => ['required', 'string', 'min:10', 'max:255'],
            'rating' => ['required', 'numeric', 'between:1,5'],
            'producto_id' => ['required', 'exists:productos,id'],
            'pedido_id' => ['required',  'exists:pedidos,id'],
        ]);
        $descripcion = htmlspecialchars(trim($request->descripcion));
        $pedido = Pedido::findOrFail($request->pedido_id);
        if(!$pedido || $pedido->user_id != Auth::user()->id){
            return;
        }
        $existeValoracion = Valoracion::where('user_id', '=', Auth::user()->id)
            ->where('pedido_id', '=', $pedido->id)
            ->where('producto_id', '=', $request->producto_id)
            ->first();
        if(!$existeValoracion){
            Valoracion::create([
                'puntuacion' =>$request->rating,
                'descripcion' => $request->descripcion,
                'user_id' => Auth::user()->id,
                'producto_id' => $request->producto_id ,
                'pedido_id' => $request->pedido_id
            ]);
        }
        return redirect()->back()->with('mensaje-success','¡Gracias por tu valoracion!');
    }
    
}
