<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pedidos;
use App\Models\producto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pedidos>
 */
class pedidosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Pedidos::class;

    public function definition(): array
    {
        return [
            'numeroTelefono' => $this->faker->phoneNumber,
            'producto_id' => producto::inRandomOrder()->first()->id,
            'cantidad' => $this->faker->numberBetween(1, 10),
            'estado' => $this->faker->randomElement(['En proceso', 'En ruta', 'Entregado']),
        ];
    }
}
