<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        fake()->addProvider(new \Mmo\Faker\PicsumProvider(fake()));
        $stock = random_int(0,50);
        //Esto es para que ponga alguno en no ya que en la bd salen todos si
        ($stock>0 && $stock<=10)? $stock = 0 : $stock;
        return [
            'nombre' => fake()->unique()->words(random_int(2,4), true),
            'descripcion' =>fake()->text(), 
            'imagen'=>'imgProduct/'.fake()->picsum('public/storage/imgProduct', 640, 480, false), 
            'precio'=>fake()->randomFloat(2,1,9999.99), 
            'categoria_id' => Categoria::all()->random()->id, 
            'stock' => $stock, 
        ];
    }
}
