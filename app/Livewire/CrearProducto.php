<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearProducto extends Component
{
    use WithFileUploads;

    public $abrirModalCrear = false;
    #[Validate(['required', 'image', 'max:2048'])]
    public $imagen;

    #[Validate(['required', 'image', 'max:2048'])]
    public $imagenSF;
    
    #[Validate(['required', 'string', 'min:3', 'unique:productos,nombre'])]
    public string $nombre;

    #[Validate(['required', 'string', 'min:10'])]
    public string $descripcion;

    #[Validate(['required ', 'min:1'])]
    public int $stock;

    #[Validate(['required ', 'min:0'])]
    public float $precio;

    #[Validate(['required', 'exists:categorias,id'])]
    public string $category_id;

    public function guardar()
    {
        
        $this->validate();
        $nombreImagen = str_replace(' ','_', $this->nombre);
        //$this->imagen->storeAs('public/imgProduct', $nombreImagen.'.jpg');
        //$this->imagenSF->storeAs('public/imgProduct', $nombreImagen.'_SF.png');
        Storage::putFileAs('imgProduct', $this->imagen, $nombreImagen.'.jpg');
        Storage::putFileAs('imgProduct', $this->imagenSF, $nombreImagen.'_SF.png');

        Producto::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'stock' => $this->stock,
            'precio' => $this->precio,
            'imagen' => 'imgProduct/'.$nombreImagen.'.jpg',
            'categoria_id' => $this->category_id,
        ]);
        $this->limpiarCerrarCrear();
        $this->dispatch('mensaje-success', '¡Producto creado con exito!');
        $this->dispatch('productoCreado')->to(ShowProducts::class); 
    }

    public function limpiarCerrarCrear()
    {
        $this->reset(['abrirModalCrear', 'nombre', 'imagen', 'imagenSF', 'category_id', 'precio', 'stock', 'descripcion']);
        $this->abrirModalCrear = false;
    }

    public function render()
    {
        $categorias= Categoria::all();
        return view('livewire.crear-producto', compact('categorias'));
    }
}
