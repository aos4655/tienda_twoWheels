<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /* 
           1 => 'patinetes' ,
           2 => 'bicicletas' ,
           3 =? 'accesorios'
        */
        $categoria_id = Categoria::where('id', '!=', 2)->inRandomOrder()->first()->id;
        $stock = random_int(0,50);
        //Esto es para que ponga alguno en no ya que en la bd salen todos si
        ($stock>0 && $stock<=10)? $stock = 0 : $stock;
        return [
            'nombre' => fake()->unique()->words(random_int(2,4), true),
            'descripcion' =>fake()->text(), 
            'imagen'=> $this->obtenerImagenAleatoria($categoria_id), 
            'precio'=>fake()->randomFloat(2,1,9999.99), 
            'categoria_id' => $categoria_id, 
            'stock' => $stock, 
        ];
    }
    public function obtenerImagenAleatoria($categoria_id){
        $url = 'https://source.unsplash.com/featured/?';
        //Obtengo la imagen
        $imgContenido = file_get_contents($url.($categoria_id == 1 ? 'electric-scooter': 
                        (($categoria_id == 2) ? 'electric-bike' : 'products')));
        //Le doy un nombre unico
        $imgNombre = 'imgProduct/' . uniqid() . '.jpg';
        //Guardo la imagen en el storage
        Storage::put($imgNombre, $imgContenido);
        return $imgNombre;
    }
    
}
