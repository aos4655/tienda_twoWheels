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
        //
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

    public function pdf($id) {
        $pedido = Pedido::findOrFail($id); 
        
        $pdf = Pdf::loadView('pdf', compact('pedido')); 
        return $pdf->download('productos.pdf'); 
    }
    /* public static function pdfMail($id) {
        $pedido = Pedido::findOrFail($id); 
        
        $pdf = Pdf::loadView('pdf', compact('pedido')); 
        Storage::put('pdf/pedido_'.$id.'.pdf',$pdf->output()); 
    } */

    /* whatsapp */
    public function enviarWhatsapp(){
        $token = $_ENV['TOKEN_WHATSAPP'];
        $telefono = $_ENV['DESTINATARIO_WHATSAPP'];
        $pedido = "83";
        $url = 'https://graph.facebook.com/v19.0/306167229249311/messages';
        //$mensaje = '{ "messaging_product": "whatsapp", "to": "'.$telefono.'", "type": "template", "template": { "name": "hello_world", "language": { "code": "en_US" } } }';
        $mensaje = '{ "messaging_product": "whatsapp", "to": "'.$telefono.'", "type": "template", "template": { "name": "nuevopedido", "language": { "code": "es_ES" } , "components": [{"type": "body","parameters": [{"type": "text","text": '.$pedido.'}]}]}  }';
        $header = array("Authorization: Bearer ".$token, "Content-Type: application/json");
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

    /* ESTO AUN NO FUNCIONA */
    public function enviarWhatsappPDF(){
        $token = $_ENV['TOKEN_WHATSAPP'];
        $telefono = $_ENV['DESTINATARIO_WHATSAPP'];
        //$link = Storage::url('pdf/pedido-53.pdf');
        $link = 'https://aprendeconalf.es/latex-manual/manual-latex.pdf';
        $url = 'https://graph.facebook.com/v19.0/306167229249311/messages';
        $mensaje = '{ "messaging_product": "whatsapp", "to": "'.$telefono.'", "type": "text", "text": { "body": "hola como estas"} }';
        //$mensaje = '{ "messaging_product": "whatsapp","recipient_type": "individual", "to": "'.$telefono.'", "type": "document", "document": { "link": "https://download.msi.com/archive/mnu_exe/nb/14B3_v2.0_Spanish.pdf", "filename": "mimanual.pdf"}}';
        $header = array("Authorization: Bearer ".$token, "method"  => "POST", "Content-Type: application/json");
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

}
