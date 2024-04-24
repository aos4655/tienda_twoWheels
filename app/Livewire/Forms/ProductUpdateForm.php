<?php

namespace App\Livewire\Forms;

use App\Models\Producto;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductUpdateForm extends Form
{
    public ?Producto $producto;
    public string $nombre = "";
    public string $descripcion = "";
    public string $stock = "";
    public string $precio = "";
    public string $categoria = "";
   
    public function setProducto(Producto $producto)
    {
        $this->producto = $producto;
        $this->nombre = $producto->nombre;
        $this->descripcion = $producto->descripcion;
        $this->stock = $producto->stock ;
        $this->precio = $producto->precio;
        $this->categoria = $producto->categoria->nombre;
       
    }
    public function rules()
    {
        return [
            'nombre' => ['required', 'string', 'min:3', 'unique:productos,nombre,' . $this->producto->id],
            'descripcion' => ['required', 'string', 'max:300'],
            'stock' => ['required', 'integer', 'min:1'],
            'precio' => ['required', 'float', 'min:1'],
            'categoria' => ['required', 'string', 'exists:categorias,id'],
            
        ];
    }
    public function updateProducto()
    {
        $this->validate();
        $this->producto->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'stock' => $this->stock,
            'precio' => $this->precio,
            'categoria' => $this->categoria,
        ]);
    }
    public function cancelarProducto()
    {
        $this->reset(
            'producto',
            'nombre',
            'descripcion',
            'stock',
            'precio',
            'categoria',
        );
    }
}
