<?php

namespace App\Console\Commands;

use App\Mail\PedidoRecibido;
use App\Models\Pedido;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class EnviarMails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:enviar-mails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviar mails con las facturas';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        foreach ($this->obtenerPedidosHoy() as $pedido) {
            $pdf = Pdf::loadView('pdf', compact('pedido'));
            $id = $pedido->id;
            Mail::to("aortizsalvador1998@gmail.com")->send(new PedidoRecibido($id, $pdf->output()));
        }
    }
    public function obtenerPedidosHoy(){
        $pedidos = Pedido::select('*')->whereRaw("DATE_FORMAT(pedidos.created_at, '%Y-%m-%d') = ?", [date('Y-m-d')])
            ->get();
        return $pedidos;
    }
}
