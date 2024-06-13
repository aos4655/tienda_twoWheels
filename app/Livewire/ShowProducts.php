<?php

namespace App\Livewire;

use App\Livewire\Forms\ProductUpdateForm;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ShowProducts extends Component
{
    use InteractsWithBanner;
    /* use AuthorizesRequests; *//* Para que pueda trabajar con las politicas */
    use WithFileUploads;

    /* Variables para update */
    public bool $abrirModalUpdate = false;
    public ProductUpdateForm $form;
    /* Fin variables update */

    public string $campo = "id";
    public string $orden = "desc";
    public string $search = "";

    /* Variables para qr */
    public ?Producto $productoQR = null;
    public string $id = "";
    public string $nombre = "";
    public string $backgroundColor = '#60A5FA'; // Definir como string
    public string $textColor = '#ffffff'; // Definir como string
    public string $titulo = 'Titulo';
    public string $descripcion = 'Descripcion';
    public bool $abrirModalQR = false;

    /* Fin variables qr */

    #[On('recargar-productos')]
    public function render()
    {

        $productos = Producto::where('nombre', 'like', "%" . $this->search . "%")
            ->orWhere('descripcion', 'like', "%" . $this->search . "%")
            ->orderby($this->campo, $this->orden)
            ->get();
        $categorias = Categoria::all();
        return view('livewire.show-products', compact('productos', 'categorias'));
    }

    public function ordenar(string $campo)
    {
        $this->orden = ($this->orden == 'asc') ? 'desc' : 'asc';
        $this->campo = $campo;
    }
    public function pedirConfirmacion(Producto $producto)
    {
        $this->dispatch('confirmacionBorrarProducto', $producto->id);/* Para añadir evento del script tocho de confirmar */
    }

    #[On("borrarOk")]
    public function delete(Producto $producto)
    {
        //dd($producto);
        $producto->delete();
        if (Storage::exists($producto->imagen)) {
            Storage::delete($producto->imagen);
            $imagenSF = str_replace('.jpg', '_SF.png', $producto->imagen);
            Storage::delete($imagenSF);
        }

        $this->dispatch("mensaje-success", "Producto Eliminado.");
    }
    /* METODOS PARA ACTUALIZAR REGISTROS */
    public function edit(Producto $producto)
    {
        $this->form->setProducto($producto);
        $this->abrirModalUpdate = true;
    }
    public function update()
    {
        $this->form->updateProducto();
        $this->limpiarCerrarUpdate();
        $this->dispatch("recargar-productos");
        $this->dispatch('mensaje-success', "Editado con exito");
    }
    public function limpiarCerrarUpdate()
    {
        $this->form->cancelarProducto();
        $this->abrirModalUpdate = false;
    }
   
    /* Funciones para modal QR */
    public function setDatosQR(Producto $producto){
        $this->productoQR = $producto;
        $this->id = $producto->id;
        $this->nombre = $producto->nombre;
        $this->abrirModalQR = true;
    }
    public function cancelarQR()
    {
        // Resetear las propiedades del componente
        $this->reset(['productoQR', 'backgroundColor', 'textColor', 'titulo', 'descripcion', 'id', 'abrirModalQR', 'nombre']);
    }
}
