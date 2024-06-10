<?php

namespace App\Console\Commands;

use App\Models\Pedido;
use Barryvdh\DomPDF\Facade\Pdf;
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
        foreach ($this->obtenerPedidosHoy() as $pedido) {            
            $pedido_id = $pedido->id;
            //$pdfUrl = 'https://aprendeconalf.es/latex-manual/manual-latex.pdf';
            $pdf = Pdf::loadView('pdf', compact('pedido'));
            
            if (!Storage::exists('pdf')) {
                Storage::makeDirectory('pdf');
            }

            $url = 'pdf/factura_pedido_' . $pedido_id . '.pdf';
            Storage::put($url, $pdf->output());
            $pdfUrl = Storage::url($url);

            // Datos de la API de WhatsApp
            $telefono = env('DESTINATARIO_WHATSAPP');
            $token = env('TOKEN_WHATSAPP');
            $url = 'https://graph.facebook.com/v19.0/306167229249311/messages';

            // Crear el mensaje en formato JSON
            $mensaje = json_encode([
                'messaging_product' => 'whatsapp',
                'to' => $telefono,
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
                                        'filename' => 'factura_pedido_' . $pedido_id . '.pdf',
                                    ],
                                ],
                            ],
                        ],
                        [
                            'type' => 'body',
                            'parameters' => [
                                [
                                    'type' => 'text',
                                    'text' => $pedido_id,
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
            Storage::delete($url);
        }
    }
    public function obtenerPedidosHoy()
    {
        $pedidos = Pedido::select('*')->whereRaw("DATE_FORMAT(pedidos.created_at, '%Y-%m-%d') = ?", [date('Y-m-d')])
            ->get();
        return $pedidos;
    }
}
