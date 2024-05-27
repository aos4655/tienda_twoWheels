<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Checkout extends Component
{
    public $subtotal;

    public $productosUsuario;
    public $user_id;
    public function render()
    {
        $this->user_id = Auth::user()->id;
        $this->productosUsuario = User::findOrFail($this->user_id)
            ->productsCart()
            ->get();
        $this->calcularSubtotal();
        return view('livewire.checkout');
    }
    public function incrementar($producto_id)
    {
        $usuario = User::findOrFail($this->user_id);

        //Obtengo la cantidad de un producto
        $cantidad = User::findOrFail($this->user_id)
            ->productsCart()
            ->wherePivot('producto_id', $producto_id)
            ->value('cantidad');
        //ACTUALIZO
        $usuario->productsCart()->updateExistingPivot($producto_id, ['cantidad' => $cantidad + 1]);
        $this->productosUsuario = $usuario
            ->productsCart()
            ->get();
    }
    public function decrementar($producto_id)
    {
        $usuario = User::findOrFail($this->user_id);

        $cantidad = User::findOrFail($this->user_id)
            ->productsCart()
            ->wherePivot('producto_id', $producto_id)
            ->value('cantidad');
        //ACTUALIZO
        if ($cantidad > 1) {
            $usuario->productsCart()->updateExistingPivot($producto_id, ['cantidad' => $cantidad - 1]);

            $this->productosUsuario = $usuario
                ->productsCart()
                ->get();
        }
    }
    public function eliminar($producto_id)
    {

        $usuario = User::findOrFail($this->user_id);
        $usuario->productsCart()->detach($producto_id);


        $this->productosUsuario = $usuario
            ->productsCart()
            ->get();
    }

    public function calcularSubtotal()
    {
        $subtotal = 0;

        foreach ($this->productosUsuario as $producto) {
            $precioSinPunto = str_replace('.', '', $producto->precio);
            $precioSinComa = str_replace(',', '.', $precioSinPunto);
            $subtotal += (float)$precioSinComa * $producto->pivot->cantidad;
        }

        $this->subtotal = $subtotal;
    }
}
