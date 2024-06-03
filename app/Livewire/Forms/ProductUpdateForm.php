<?php

namespace App\Livewire\Forms;

use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
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
    public $imagenU;

    public $imagenSFU;
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
            'precio' => ['required', 'numeric', 'min:1', 'regex:/^\d+(\.\d{1,2})?$/'],
            'categoria' => ['required', 'string', 'exists:categorias,id'],
            'imagenU' => ['nullable', 'image', 'max:2048'],
            'imagenSFU' => ['nullable', 'image', 'max:2048'],
        ];
    }
    public function updateProducto()
    {
        $this->validate();

        $nombreImagen = str_replace(' ','_', $this->nombre);
        /* Elimino las fotos antiguas */
        if ($this->imagenU || $this->nombre != $this->producto->imagen) {
            Storage::delete($this->producto->imagen);
            Storage::putFileAs('imgProduct', $this->imagenU, $nombreImagen.'.jpg');
        }
        if ($this->imagenSFU || $this->nombre != $this->producto->imagen) {
            $imagenSF = str_replace('.jpg', '_SF.png', $this->producto->imagen );
            Storage::delete($imagenSF);    
            Storage::putFileAs('imgProduct', $this->imagenSFU, $nombreImagen.'_SF.png');
        }

        $this->producto->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'stock' => $this->stock,
            'precio' => $this->precio,
            'categoria' => $this->categoria,
            'imagen' => $this->imagenU ? 'imgProduct/'.$nombreImagen.'.jpg' : $this->producto->imagen,
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
            'imagenU',
            'imagenSFU'
        );
    }
}
