<?php

namespace App\Http\Controllers;

use App\Models\Logistic_api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LogisticApiController extends Controller
{
    public function mostrar($num_track)
    {
        $datos = Logistic_api::where('num_seguimiento', '=', $num_track)->first();
        if(!$datos){
            $data= [
                'message'=> 'Numero de seguimiento no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        /* $data = [
            'envio' => $datos,
            'status' => 200
        ]; */
        return response()->json($datos, 200);
    }
}
