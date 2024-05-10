<?php

namespace App\Console\Commands;

use App\Models\Logistic_api;
use App\Models\Pedido;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Http;

class GenerateTracking extends Command implements ShouldQueue
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:generate-tracking';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //Buscamos pedidos cuyo track_num no esta en ningun num-seguimiento de la tabla logistic apis
        //y ademas que sean del dia de hoy
        $pedidosSinRegistroApi = Pedido::select('pedidos.*')
            ->leftJoin('logistic_apis', 'pedidos.track_num', '=', 'logistic_apis.num_seguimiento')
            ->whereNull('logistic_apis.num_seguimiento')
            ->whereRaw("DATE_FORMAT(pedidos.created_at, '%Y-%m-%d') = ?", [date('Y-m-d')])
            ->get();
        if ($pedidosSinRegistroApi) {
            foreach ($pedidosSinRegistroApi as $pedido) {
                $this->crearSeguimiento($pedido->track_num);
            }
        }
    }
    public function crearSeguimiento($trackingNumber)
    {
        $url = url("/api/logistica/crearSeguimiento/{$trackingNumber}");

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
