<?php

namespace App\Livewire;

use App\Models\Categoria;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CrearCategoria extends Component
{
    public $abrirModalCrear = false;
    #[Validate(['required', 'string', 'unique:categorias,nombre'])]
    public $nombre;
    public function render()
    {
        return view('livewire.crear-categoria');
    }
    public function guardar(){
        $this->validate();
        Categoria::create([
            'nombre'=>$this->nombre
        ]);
        $this->dispatch('mensaje-success', 'Categoria creada con exito!');
    }
    public function limpiarCerrarCrear()
    {
        $this->reset(['abrirModalCrear', 'nombre']);
        $this->abrirModalCrear = false;
    }
}
