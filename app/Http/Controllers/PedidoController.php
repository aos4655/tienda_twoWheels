<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
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
}
