<?php

namespace Database\Seeders;

use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pedidos = Pedido::factory(50)->create();
        foreach ($pedidos as $item) {
            $productos = $this->devolverIdProductosAleatorios();
            $item->productos()->attach($productos);
        }
    }
    public function devolverIdProductosAleatorios(): array{
        $idProductos = Producto::pluck('id')->toArray();
        $productos= [];
        $indices = array_rand($idProductos, random_int(2, count($idProductos)));
        foreach ($indices as $indice) {
            $productos[]=$idProductos[$indice];
        }
        return $productos;
    }
}
