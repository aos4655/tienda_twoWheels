<?php

namespace Database\Seeders;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = Producto::factory(50)->create();
        foreach ($productos as $producto) {
            $producto->usersCart()->attach(self::obtenerArrayUsuarios());
        }
    }
    public static function obtenerArrayUsuarios(): array
    {
        $usuariodevueltos = [];
        $idTodosUsuarios = User::pluck('id')->toArray();
        //$indices = array_rand($idTodosUsuarios, random_int(1, count($idTodosUsuarios)));
        $indices = array_rand($idTodosUsuarios, random_int(1, 3));
        if (!is_array($indices)) {
            return [$idTodosUsuarios[$indices]];
        }
        foreach ($indices as $indice) {
            $usuariodevueltos[] = $idTodosUsuarios[$indice];
        }
        return $usuariodevueltos;
    }
}
