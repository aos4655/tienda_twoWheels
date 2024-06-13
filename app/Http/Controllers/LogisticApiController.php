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
        if (!$datos) {
            $data = [
                'message' => 'Numero de seguimiento no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        return response()->json($datos, 200);
    }
    public function crear(Request $request)
    {
        Logistic_api::create([
            'num_seguimiento'   => $request->num_track,
            'ult_estado'        => 'PENDIENTE DE ENVIO',
            'pendiente_fecha'   => now(),
            'enviado_fecha'     => null,
            'en_reparto_fecha'  => null,
            'entregado_fecha'   => null,
        ]);

        return response()->json(['message' => 'Seguimiento creado correctamente'], 201);
    }
    public function actualizar(Request $request)
    {
        $registro = Logistic_api::where('num_seguimiento', $request->num_track)->firstOrFail();

        if($registro->ult_estado == "PENDIENTE DE ENVIO"){
            $registro->update([
                'ult_estado' => "ENVIADO",
                'enviado_fecha' => now(),
            ]);            
        }
        else if($registro->ult_estado == "ENVIADO"){
            $registro->update([
                'ult_estado' => "EN REPARTO",
                'en_reparto_fecha' => now(),
            ]);            
        }
        else if($registro->ult_estado == "EN REPARTO"){
            $registro->update([
                'ult_estado' => "ENTREGADO",
                'entregado_fecha' => now(),
            ]);
        }
        else{
            return response()->json(['message' => 'Seguimiento pedido en estado ENTREGADO'], 201);
        }

        return response()->json(['message' => 'Seguimiento actualizado correctamente'], 201);
    }
}
