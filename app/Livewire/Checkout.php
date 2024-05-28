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
    
    public function mount()
    {
        $this->user_id = Auth::user()->id;
        $this->productosUsuario = User::findOrFail($this->user_id)
            ->productsCart()
            ->get();
        $this->calcularSubtotal();
    }

    public function render()
    {
        return view('livewire.checkout');
    }

    public function incrementar($producto_id)
    {
        $usuario = User::findOrFail($this->user_id);
        $cantidad = $usuario->productsCart()
            ->wherePivot('producto_id', $producto_id)
            ->value('cantidad');
        $usuario->productsCart()->updateExistingPivot($producto_id, ['cantidad' => $cantidad + 1]);
        $this->actualizarDatos();
    }

    public function decrementar($producto_id)
    {
        $usuario = User::findOrFail($this->user_id);
        $cantidad = $usuario->productsCart()
            ->wherePivot('producto_id', $producto_id)
            ->value('cantidad');
        if ($cantidad > 1) {
            $usuario->productsCart()->updateExistingPivot($producto_id, ['cantidad' => $cantidad - 1]);
            $this->actualizarDatos();
        }
    }

    public function eliminar($producto_id)
    {
        $usuario = User::findOrFail($this->user_id);
        $usuario->productsCart()->detach($producto_id);
        $this->actualizarDatos();
    }

    public function actualizarDatos()
    {
        $this->productosUsuario = User::findOrFail($this->user_id)
            ->productsCart()
            ->get();
        $this->calcularSubtotal();
    }

    public function calcularSubtotal()
    {
        $subtotal = 0;
        foreach ($this->productosUsuario as $producto) {
            $precioSinPunto = str_replace('.', '', $producto->precio);
            $precioSinComa = str_replace(',', '.', $precioSinPunto);
            $cantidad = $producto->pivot->cantidad;
            $subtotal += $precioSinComa * $cantidad;
        }
        $this->subtotal = number_format($subtotal, 2, ',', '.');
    }
}

