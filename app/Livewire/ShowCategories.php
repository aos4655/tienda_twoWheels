<?php

namespace App\Livewire;

use App\Livewire\Forms\CategoryUpdateForm;
use App\Models\Categoria;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowCategories extends Component
{
    use InteractsWithBanner;
    /*     use WithPagination; */
    /* use AuthorizesRequests; *//* Para que pueda trabajar con las politicas */
    /*     use WithFileUploads; */

    /* Variables para update */
    public bool $abrirModalUpdate = false;
    public CategoryUpdateForm $form;
    /* Fin variables update */

    public string $campo = "id";
    public string $orden = "desc";
    public string $search = "";



    #[On('userCreado')]
    public function render()
    {
        /* where('titulo', 'like', "%".$this->search."%") ESTO ES PARA BUSCAR CUALQUIER COSA EN TITULO */
        $categorias = Categoria::where('nombre', 'like', "%" . $this->search . "%")
            ->orderby($this->campo, $this->orden)
            ->get();
        return view('livewire.show-categories', compact('categorias'));
    }

    public function ordenar(string $campo)
    {
        $this->orden = ($this->orden == 'asc') ? 'desc' : 'asc';
        $this->campo = $campo;
    }
    public function pedirConfirmacion(Categoria $categoria)
    {
        $this->dispatch('confirmacionBorrar', $categoria->id);/* Para añadir evento del script tocho de confirmar */
    }

    #[On('borrarOk')]
    public function delete(Categoria $categoria)
    {
        $categoria->delete();
        $this->dispatch("mensaje", "Usuario Eliminado.");
    }
    /* METODOS PARA ACTUALIZAR REGISTROS */
    public function edit(Categoria $categoria)
    {
        $this->form->setCategory($categoria);
        $this->abrirModalUpdate = true;
        /* dd($user); */
    }
    public function update()
    {
        $this->form->updateCategory();
        $this->limpiarCerrarUpdate();
        $this->dispatch('mensaje', "Editado con exito");
    }
    public function limpiarCerrarUpdate()
    {
        $this->form->cancelarCategory();
        $this->abrirModalUpdate = false;
    }
}
