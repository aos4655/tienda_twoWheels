<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $pedidoModel = app(\App\Models\Pedido::class);
        return [
            'user_id'=>User::all()->random()->id, 
            'track_num'=>$this->generateTrackingNumber($pedidoModel)
        ];
        
    }
    public static function generateTrackingNumber($pedidoModel, $prefix = 'PK')
    {
        // Generar un número de seguimiento único que no este en la BD
        do{
            $randomPart = strtoupper(substr(uniqid(), -6)); // Genera una parte aleatoria de 6 caracteres
            $trackingNumber = $prefix . $randomPart;
        }while($pedidoModel->where('track_num', $trackingNumber)->exists());

        return $trackingNumber;
    }
}
