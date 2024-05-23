<?php

namespace Database\Seeders;

use App\Models\Pedido;
use App\Models\Valoracion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValoracionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pedidos = Pedido::all();
        foreach ($pedidos as $pedido) {
            $user_id = $pedido->user_id;
            $pedido_id = $pedido->id;
            foreach ($pedido->productos as $producto) {
                Valoracion::create([
                    'puntuacion' =>random_int(1,5),
                    'descripcion' => fake()->text(50),
                    'user_id' => $user_id,
                    'producto_id' => $producto->id,
                    'pedido_id' => $pedido_id
                ]);
            } 
        }
    }
}
