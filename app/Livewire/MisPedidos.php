<?php

namespace App\Livewire;

use App\Models\Pedido;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MisPedidos extends Component
{
    public function render()
    {
        $pedidos = Pedido::where("user_id", Auth::user()->id)->orderBy("id", "desc")->get();

        return view('livewire.mis-pedidos', compact('pedidos'));
    }
    public function descargarFactura($id)
    {
        $pedido = Pedido::findOrFail($id);

        $pdf = PDF::loadView('pdf');
        return $pdf->stream();

        //return $pdf->download('pedido.pdf');
    }
}
