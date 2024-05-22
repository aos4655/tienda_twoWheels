<?php

namespace App\Console\Commands;

use App\Models\Pedido;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class EnviarWhatsapps extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:enviar-whatsapps';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviar Whatsapp nuevo pedido al administrador adjuntando la factura';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //foreach ($this->obtenerPedidosHoy() as $pedido) {
            $to = '34690700209';
            $pedido = '57';
            //$pedido = $pedido->id;
            $pdfUrl = 'https://aprendeconalf.es/latex-manual/manual-latex.pdf';
            //$pdfUrl = Storage::url('pdf/pedido_53.pdf');

            // Datos de la API de WhatsApp
            $token = env('TOKEN_WHATSAPP');
            $url = 'https://graph.facebook.com/v19.0/306167229249311/messages';

            // Crear el mensaje en formato JSON
            $mensaje = json_encode([
                'messaging_product' => 'whatsapp',
                'to' => $to,
                'type' => 'template',
                'template' => [
                    'name' => 'nuevopedido',
                    'language' => [
                        'code' => 'es_ES',
                    ],
                    'components' => [
                        [
                            'type' => 'header',
                            'parameters' => [
                                [
                                    'type' => 'document',
                                    'document' => [
                                        'link' => $pdfUrl,
                                        'filename' => 'factura_pedido_' . $pedido . '.pdf',
                                    ],
                                ],
                            ],
                        ],
                        [
                            'type' => 'body',
                            'parameters' => [
                                [
                                    'type' => 'text',
                                    'text' => $pedido,
                                ],
                            ],
                        ],
                    ],
                ],
            ]);

            // Configurar cURL
            $header = [
                "Authorization: Bearer $token",
                "Content-Type: application/json",
            ];
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $mensaje);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $response = json_decode(curl_exec($curl), true);
            $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            curl_close($curl);
        //}
    }
    public function obtenerPedidosHoy()
    {
        $pedidos = Pedido::select('*')->whereRaw("DATE_FORMAT(pedidos.created_at, '%Y-%m-%d') = ?", [date('Y-m-d')])
            ->get();
        return $pedidos;
    }
}
