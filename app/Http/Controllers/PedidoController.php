<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedido::where("user_id", Auth::user()->id)->orderBy("id", "desc")->get();

        return view('mis-pedidos', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:5', 'unique:posts,titulo,' . $pedido->id],
            'direccion' => ['required', 'string', 'min:10'],
            'productos' => ['array'],
        ]);

        
        $pedido->update([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
        ]);
/*         $pedido->sync 
 */        return redirect()->refresh()->with('mensaje', 'Pedido actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        //
    }

    public static function crearPedido($direccion, $nombre)
    {
        $usuario = User::findOrFail(Auth::user()->id);
        $productosUsuario = $usuario
            ->productsCart()
            ->get();

        $pedidoModel = app(Pedido::class);
        $pedido = Pedido::create([
            'user_id' => $usuario->id,
            'track_num' => self::generateTrackingNumber($pedidoModel),
            'direccion' => $direccion,
            'nombre' => $nombre
        ]);
        foreach ($productosUsuario as $producto) {
            $cantidad = $producto->pivot->cantidad;
            $pedido->productos()->attach($producto, ['cantidad' => $cantidad]);
        }
        self::eliminarProductosCarrito();
        /* No es necesario añadirle un tracking ya que lo tenemos automatizado.  */
        //PedidoController::pdfMail($pedido->id);
        //Mail::to($usuario->email)->send(new PedidoRecibido($pedido->id));
    }

    public static function eliminarProductosCarrito()
    {
        $usuario = User::findOrFail(Auth::user()->id);
        $productosUsuario = $usuario
            ->productsCart()
            ->get();
        foreach ($productosUsuario as $producto) {
            $nuevoStock = (int) $producto->stock - (int) $producto->pivot->cantidad;
            $producto->update([
                'stock' => $nuevoStock,
            ]);
            $usuario->productsCart()->detach($producto->id);
        }
    }

    public static function generateTrackingNumber($pedidoModel, $prefix = 'PK')
    {
        // Generar un número de seguimiento único que no este en la BD
        do {
            $randomPart = strtoupper(substr(uniqid(), -6)); // Genera una parte aleatoria de 6 caracteres
            $trackingNumber = $prefix . $randomPart;
        } while ($pedidoModel->where('track_num', $trackingNumber)->exists());

        return $trackingNumber;
    }

    public function pdf($id)
    {
        $pedido = Pedido::findOrFail($id);

        $pdf = Pdf::loadView('pdf', compact('pedido'));
        return $pdf->download('productos.pdf');
    }

    /* WHATSAPP */
    /*  
    public function enviarWhatsapp()
    {
        $token = $_ENV['TOKEN_WHATSAPP'];
        $telefono = $_ENV['DESTINATARIO_WHATSAPP'];
        $pedido = "83";
        $url = 'https://graph.facebook.com/v19.0/306167229249311/messages';
        //$mensaje = '{ "messaging_product": "whatsapp", "to": "'.$telefono.'", "type": "template", "template": { "name": "hello_world", "language": { "code": "en_US" } } }';
        $mensaje = '{ "messaging_product": "whatsapp", "to": "' . $telefono . '", "type": "template", "template": { "name": "nuevopedido", "language": { "code": "es_ES" } , "components": [{"type": "body","parameters": [{"type": "text","text": ' . $pedido . '}]}]}  }';
        $header = array("Authorization: Bearer " . $token, "Content-Type: application/json");
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $mensaje);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = json_decode(curl_exec($curl), true);
        print_r($response);
        $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
    }
    */
    /* ESTO AUN NO FUNCIONA */
    /*  
    public function enviarWhatsappPDF()
    {
        $to = '34690700209';
        $pedido = '57';
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
                                    'filename' => 'factura_pedido_'.$pedido.'.pdf', 
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

        // Verificar el estado de la respuesta
        if ($status_code == 200) {
            return response()->json(['message' => 'Mensaje enviado correctamente', 'response' => $response], 200);
        } else {
            return response()->json(['error' => 'Error al enviar el mensaje', 'response' => $response], $status_code);
        }
    }
    private function checkUrlAccessible($url)
    {
        $headers = @get_headers($url);
        return is_array($headers) && strpos($headers[0], '200') !== false;
    }
    */
}
