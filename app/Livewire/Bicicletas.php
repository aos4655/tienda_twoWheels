<?php

namespace App\Livewire;

use App\Models\Producto;
use Livewire\Component;

class Bicicletas extends Component
{
    public string $orden='desc';
    public string $atributo = 'id';

    public string $valor= '';
    public function render()
    {
        
        $bicicletas = Producto::where("categoria_id", 2)
             ->orderBy($this->atributo, $this->orden)
             ->with('valoraciones') 
             ->get();
        return view('livewire.bicicletas', compact('bicicletas'));
    }
    public function ordenar(){
        
        $cadena = explode('_', $this->valor);
        $this->atributo = $cadena[0];
        $this->orden = $cadena[1];
    } 
}
