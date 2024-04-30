<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Cart extends Component
{
    public $abrirModalCart = false;
    public $subtotal;

    public $productosUsuario;
    public $user_id;

    public int $cantidadProductos; //Esto tampoco soluciona el problema
    #[On('aniadidoProducto')]//El evento no funciona
    public function render()
    {
        
        $this->user_id = Auth::user()->id;
        $this->productosUsuario = User::findOrFail($this->user_id)
            ->productsCart()
            ->get();
        $this->calcularSubtotal();
        $this->cantidadProductos = $this->productosUsuario->count();//Esto tampoco soluciona el problema
        return view('livewire.cart');
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
            $subtotal += $producto->precio * $producto->pivot->cantidad;
        }

        $this->subtotal = $subtotal;
    }
}
