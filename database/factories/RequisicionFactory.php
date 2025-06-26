<?php

namespace Database\Factories;

use App\Models\Requisicion;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequisicionFactory extends Factory
{
    protected $model = Requisicion::class;

    public function definition(): array
    {
        return [
            'fecha' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'estado' => $this->faker->randomElement(['Pendiente', 'Aprobada', 'Rechazada']),
        ];
    }
}
