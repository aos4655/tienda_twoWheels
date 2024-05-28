<?php

namespace App\Livewire;

use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Accesorios extends Component
{
    public string $orden='desc';
    public string $atributo = 'id';

    public string $valor= '';
    public function render()
    {
        if ($this->atributo == 'valoracion') {
            $accesorios = Producto::where("categoria_id", 3)
            ->withCount(['valoraciones as promedio_valoracion' => function ($query) {
                $query->select(DB::raw('coalesce(avg(puntuacion),0)'));
            }])
            ->orderBy($this->atributo == 'valoracion' ? 'promedio_valoracion' : $this->atributo, $this->orden)
            ->get();
        }
        else{

            $accesorios = Producto::where("categoria_id", 3)->orderBy($this->atributo, $this->orden)->with('valoraciones')->get();
        }
        return view('livewire.accesorios', compact('accesorios'));
    }
    public function ordenar(){
        
        if ($this->valor != "__SELECCIONA__") {
            $cadena = explode('_', $this->valor);
            $this->atributo = $cadena[0];
            $this->orden = $cadena[1];
        }
    } 
}
