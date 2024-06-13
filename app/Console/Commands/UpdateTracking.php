<?php

namespace App\Console\Commands;

use App\Models\Pedido;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class UpdateTracking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:actualizar-tracking';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando sirve para actualizar el tracking de los pedidos pasando su estado al siguiente';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $pedidos = Pedido::where('estado', '=', 'ACTIVO')->get();
        foreach ($pedidos as $pedido) {
            $this->actualizarSeguimiento($pedido->track_num);
        }
    }
    public function actualizarSeguimiento($trackingNumber)
    {
        $url = url("/api/logistica/actualizarSeguimiento/{$trackingNumber}");

        try {
            $response = Http::post($url, []);
            //No se yo si deberiamos obtener la respuesta
            if ($response->successful()) {
                $responseData = $response->json();
                var_dump($responseData);
            } else {
                echo 'Error en la solicitud HTTP: ' . $response->status();
            }
        } catch (Exception $e) {
            echo 'Error al realizar la solicitud HTTP: ' . $e->getMessage();
        }
    }
}
