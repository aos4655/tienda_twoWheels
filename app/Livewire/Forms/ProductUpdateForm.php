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
        $this->precio = str_replace(',', '.', str_replace('.', '', $producto->precio));
        $this->categoria = $producto->categoria_id;
    }

    public function rules()
    {
        return [
            'nombre' => ['required', 'string', 'min:3', 'unique:productos,nombre,' . $this->producto->id],
            'descripcion' => ['required', 'string', 'min:10'],
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

        $nombreImagen = str_replace(' ', '_', $this->nombre);
        $imagenSF = str_replace('.jpg', '_SF.png', $this->producto->imagen);

        /* Actualizar imagen con fondo */
        if ($this->imagenU) {
            Storage::delete($this->producto->imagen);
            $pathImagenU = $this->imagenU->storeAs('imgProduct', $nombreImagen . '.jpg');
        } else {
            // Renombrar la imagen si solo cambia el nombre
            if ($this->nombre != $this->producto->nombre) {
                $newPath = 'imgProduct/' . $nombreImagen . '.jpg';
                Storage::move($this->producto->imagen, $newPath);
                $pathImagenU = $newPath;
            } else {
                $pathImagenU = $this->producto->imagen;
            }
        }

        /* Actualizar imagen sin fondo */
        if ($this->imagenSFU) {
            Storage::delete($imagenSF);
            $pathImagenSFU = $this->imagenSFU->storeAs('imgProduct', $nombreImagen . '_SF.png');
        } else {
            // Renombrar la imagen sin fondo si solo cambia el nombre
            if ($this->nombre != $this->producto->nombre) {
                $newPathSF = 'imgProduct/' . $nombreImagen . '_SF.png';
                Storage::move($imagenSF, $newPathSF);
                $pathImagenSFU = $newPathSF;
            } else {
                $pathImagenSFU = $imagenSF;
            }
        }

        $this->producto->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'stock' => $this->stock,
            'precio' => $this->precio,
            'categoria' => $this->categoria,
            'imagen' => $pathImagenU,
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


