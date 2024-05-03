<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        /* User::factory(30)->create(); */
        Storage::deleteDirectory('imgProduct');
        Storage::createDirectory('imgProduct');
        $this->call(CategoriaSeeder::class);
        Producto::factory(50)->create();
        $this->call(ProductoSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PedidoSeeder::class);
        $this->call(LogisticApiSeeder::class);
    }
}
