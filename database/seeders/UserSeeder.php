<?php

namespace Database\Seeders;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = User::factory(50)->create();

        foreach ($usuarios as $usuario) {
            $productos = self::obtenerArrayProductos();

            foreach ($productos as $producto) {
                $cantidad = random_int(1, 5);
                $usuario->productsCart()->attach($producto, ['cantidad' => $cantidad]); //Asi me agrega una cantidad aleatoria a cada producto
            }
        }


        //Aqui van a ir todos mis usuarios administradores
        User::create([
            'name' => 'Antonio',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'), //La hasheo para que luego el login la coja bien 
            'is_admin' => "SI"
        ]);
    }
    public static function obtenerArrayProductos(): array
    {
        $productosDevueltos = [];
        $idTodosProductos = Producto::pluck('id')->toArray();
        //$indices = array_rand($idTodosUsuarios, random_int(1, count($idTodosUsuarios)));
        $indices = array_rand($idTodosProductos, random_int(1, 3));
        if (!is_array($indices)) {
            return [$idTodosProductos[$indices]];
        }
        foreach ($indices as $indice) {
            $productosDevueltos[] = $idTodosProductos[$indice];
        }
        return $productosDevueltos;
    }
}
