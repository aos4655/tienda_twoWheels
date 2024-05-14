<?php

namespace App\Livewire;

use App\Models\Producto;
use Livewire\Component;

class Accesorios extends Component
{
    public string $orden='desc';
    public string $atributo = 'id';

    public string $valor= '';
    public function render()
    {
        $accesorios = Producto::where("categoria_id", 3)->orderBy($this->atributo, $this->orden)->with('valoraciones')->get();
        return view('livewire.accesorios', compact('accesorios'));
    }
    public function ordenar(){
        
        $cadena = explode('_', $this->valor);
        $this->atributo = $cadena[0];
        $this->orden = $cadena[1];
    } 
}
