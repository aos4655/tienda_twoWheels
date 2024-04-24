<?php

namespace App\Livewire;

use App\Models\Pedido;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ShowOrders extends Component
{
    use InteractsWithBanner;
    /* use AuthorizesRequests; *//* Para que pueda trabajar con las politicas */
    use WithFileUploads;

    /* Variables para update */
    public bool $abrirModalUpdate = false;
/*     public PedidoUpdateForm $form;
 */    
    /* Fin variables update */

    public string $campo = "id";
    public string $orden = "desc";
    public string $search = "";



    #[On('ordenCreada')]
    public function render()
    {

        $pedidos = Pedido::where('id', 'like', '%'.$this->search.'%')->orderby($this->campo, $this->orden)
            ->get(); 

        return view('livewire.show-orders', compact('pedidos'));
    }

    public function ordenar()
    {
        $this->orden = ($this->orden == 'asc') ? 'desc' : 'asc';
    }
    public function pedirConfirmacion(Pedido $pedido)
    {
        $this->dispatch('confirmacionBorrar', $pedido->id);/* Para añadir evento del script tocho de confirmar */
    }

    #[On('borrarOk')]
    public function delete(Pedido $pedido)
    {
        $pedido->delete();
        $this->dispatch("mensaje", "Pedido Eliminado.");
    }
    /* METODOS PARA ACTUALIZAR REGISTROS */
    public function edit(Pedido $pedido)
    {
        $this->form->setPedido($pedido);
        $this->abrirModalUpdate = true;
    }
    public function update()
    {
        $this->form->updatePedido();
        $this->limpiarCerrarUpdate();
        $this->dispatch('mensaje', "Editado con exito");
    }
    public function limpiarCerrarUpdate()
    {
        $this->form->cancelarPedido();
        $this->abrirModalUpdate = false;
    }
}
