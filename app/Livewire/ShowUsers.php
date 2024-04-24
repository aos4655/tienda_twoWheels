<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\UserUpdateForm;
use Laravel\Jetstream\InteractsWithBanner;


class ShowUsers extends Component
{
    use InteractsWithBanner;
    /*     use WithPagination; */
    /* use AuthorizesRequests; *//* Para que pueda trabajar con las politicas */
    /*     use WithFileUploads; */

    /* Variables para update */
    public bool $abrirModalUpdate = false;
    public UserUpdateForm $form;
    /* Fin variables update */

    public string $campo = "id";
    public string $orden = "desc";
    public string $search = "";



    #[On('userCreado')]
    public function render()
    {
        if (strcasecmp($this->search, 'Administrador') == 0) { /* Busco la palabra ignorando mayusculas y minusculas */
            $this->search = "SI";
        } else if (strcasecmp($this->search, 'Normal') == 0) { /* Busco la palabra ignorando mayusculas y minusculas */
            $this->search = "NO";
        }
        /* where('titulo', 'like', "%".$this->search."%") ESTO ES PARA BUSCAR CUALQUIER COSA EN TITULO */
        $users = User::where('name', 'like', "%" . $this->search . "%")
            ->orWhere('email', 'like', "%" . $this->search . "%")
            ->orWhere('is_admin', 'like', "%" . $this->search . "%")
            ->orderby($this->campo, $this->orden)
            ->get();
        return view('livewire.show-users', compact('users'));
    }

    public function ordenar(string $campo)
    {
        $this->orden = ($this->orden == 'asc') ? 'desc' : 'asc';
        $this->campo = $campo;
    }
    public function pedirConfirmacion(User $user)
    {
        $this->dispatch('confirmacionBorrar', $user->id);/* Para añadir evento del script tocho de confirmar */
    }

    #[On('borrarOk')]
    public function delete(User $user)
    {
        $user->delete();
        $this->dispatch("mensaje", "Usuario Eliminado.");
    }
    /* METODOS PARA ACTUALIZAR REGISTROS */
    public function edit(User $user)
    {
        $this->form->setUser($user);
        $this->abrirModalUpdate = true;
        /* dd($user); */
    }
    public function update()
    {
        $this->form->updateUser();
        $this->limpiarCerrarUpdate();
        $this->dispatch('mensaje', "Editado con exito");
    }
    public function limpiarCerrarUpdate()
    {
        $this->form->cancelarUser();
        $this->abrirModalUpdate = false;
    }
}
