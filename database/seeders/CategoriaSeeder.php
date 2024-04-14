<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $catg = [
            'patinetes' ,
            'bicicletas' ,
            'accesorios' 
        ];
        foreach ($catg as $nombre) {
            Categoria::create(compact('nombre'));
        }
    }
}
