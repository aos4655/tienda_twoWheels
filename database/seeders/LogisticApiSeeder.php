<?php

namespace Database\Seeders;

use App\Models\Logistic_api;
use App\Models\Pedido;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class LogisticApiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pedidos = Pedido::all();
        foreach ($pedidos as $pedido) {
            $track = $pedido->track_num;
            $ultEstado = fake()->randomElement(["PENDIENTE DE ENVIO", "ENVIADO", "EN REPARTO", "ENTREGADO"]);
            if ($ultEstado == "PENDIENTE DE ENVIO") {
                $entregado_fecha= null;
                $en_reparto_fecha = null;
                $enviado_fecha = null;
                $pendiente_fecha = now();
            } elseif ($ultEstado == "ENVIADO") {
                $entregado_fecha= null;
                $en_reparto_fecha = null;
                $enviado_fecha = now();
                $pendiente_fecha = $enviado_fecha->copy()->subDay();//Dia anterior//La copia es porque si no me modificaba la fecha del objeto anterior tambien
            } elseif ($ultEstado ==  "EN REPARTO") {
                $entregado_fecha= null;
                $en_reparto_fecha = now();
                $enviado_fecha = $en_reparto_fecha->copy()->subDay();
                $pendiente_fecha = $enviado_fecha->copy()->subDay();
            } else {
                $entregado_fecha= now();
                $en_reparto_fecha = $entregado_fecha->copy()->subDay();
                $enviado_fecha = $en_reparto_fecha->copy()->subDay();
                $pendiente_fecha = $enviado_fecha->copy()->subDay();
            }

            Logistic_api::create([
                'num_seguimiento' => $track,
                'ult_estado' => $ultEstado,
                'pendiente_fecha' => $pendiente_fecha,
                'enviado_fecha' => $enviado_fecha,
                'en_reparto_fecha' => $en_reparto_fecha,
                'entregado_fecha' => $entregado_fecha,

            ]);
        }
    }
}
