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
            $this->asociarCantidadproductospedido($item, $productos);
        }
    }
    public function devolverIdProductosAleatorios(): array
    {
        $idProductos = Producto::pluck('id')->toArray();
        $productos = [];
        $indices = array_rand($idProductos, random_int(2, count($idProductos)));
        foreach ($indices as $indice) {
            $productos[] = $idProductos[$indice];
        }
        return $productos;
    }
    public function asociarCantidadproductospedido($pedido, $productos)
    {
        foreach ($productos as $producto) {
            $cantidad = random_int(1, 5);
            $pedido->productos()->attach($producto, ['cantidad' => $cantidad]);
        }
    }
}
