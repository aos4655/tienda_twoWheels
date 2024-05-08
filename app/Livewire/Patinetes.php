<?php

namespace App\Livewire;

use App\Models\Producto;
use Livewire\Component;

class Patinetes extends Component
{
    public string $orden='desc';
    public string $atributo = 'id';

    public string $valor= '';
    public function render()
    {
        $patinetes = Producto::where("categoria_id", 1)->orderBy($this->atributo, $this->orden)->get();
        return view('livewire.patinetes', compact('patinetes'));
    }
    public function ordenar(){
        
        $cadena = explode('_', $this->valor);
        $this->atributo = $cadena[0];
        $this->orden = $cadena[1];
    } 
}
