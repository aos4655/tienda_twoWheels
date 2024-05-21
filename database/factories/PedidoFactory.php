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
        $usuario = User::all()->random();
        return [
            'user_id'=>$usuario->id, 
            'track_num'=>$this->generateTrackingNumber($pedidoModel),
            'direccion' => $usuario->direccion,
            'nombre' => $usuario->name,
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
