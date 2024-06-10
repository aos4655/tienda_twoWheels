<?php

namespace App\Livewire;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Cart extends Component
{
    public $abrirModalCart = false;
    public float $subtotal;

    public $productosUsuario;
    public $user_id;
    public $shake = '';
    public int $cantidadProductos = 0; //Esto tampoco soluciona el problema
/*     protected $listeners = ['actualizarComponente'];
 */    /* protected $listeners = ['incrementarNum' => 'subirTotal']; */
    /* public function actualizarComponente()
    {
        // Actualizar la cantidad de productos
        $this->cantidadProductos = $this->obtenerCantidadProductos();
    } */
    
    public function subirTotal()
    {
        // Actualizar la cantidad de productos
        $this->cantidadProductos = $this->cantidadProductos+20;
    }
    #[On("rendCarrito")]
    public function render()
    {
        
        $this->user_id = Auth::user()->id;
        /* $this->productosUsuario = User::findOrFail($this->user_id)
            ->productsCart()
            ->get(); */
        $this->obtenerCarritoSegunStock();
        $this->calcularSubtotal();
        $this->cantidadProductos = User::findOrFail($this->user_id)
        ->productsCart()
        ->count(); ///Esto tampoco soluciona el problema
        return view('livewire.cart');
    }
    #[On("ponerShake")]
    public function ponershake(){
        
        $this->shake = 'fa-shake';

    }
    #[On("quitarShake")]
    public function quitarShake(){
       
        $this->shake = '';

    }
    public function obtenerCarritoSegunStock(){
        $productosUsuario = User::findOrFail($this->user_id)
            ->productsCart()
            ->get();
        foreach($productosUsuario as $producto){
            if($producto->stock == 0){
                $this->eliminar($producto->id);
            } 
            else if($producto->stock < $producto->pivot->cantidad){
                $this->decrementar($producto->id, $producto->stock);
            }
        }
        $this->productosUsuario = $productosUsuario;
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
        $producto = Producto::findOrFail($producto_id);
        if ($cantidad < $producto->stock) {     
            $usuario->productsCart()->updateExistingPivot($producto_id, ['cantidad' => $cantidad + 1]);
            $this->productosUsuario = $usuario
                ->productsCart()
                ->get();
        }
    }
    public function decrementar($producto_id, ?int $qty = null)
    {
        $usuario = User::findOrFail($this->user_id);

        $cantidad = User::findOrFail($this->user_id)
            ->productsCart()
            ->wherePivot('producto_id', $producto_id)
            ->value('cantidad');
        //ACTUALIZO
        if ($cantidad > 1) {
            $usuario->productsCart()->updateExistingPivot($producto_id, ['cantidad' => ($qty) ? $qty : $cantidad - 1]);

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
