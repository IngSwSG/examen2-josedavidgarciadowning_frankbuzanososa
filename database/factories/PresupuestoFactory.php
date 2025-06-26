<?php

namespace Database\Factories;

use App\Models\Presupuesto;
use App\Models\Unidad;
use Illuminate\Database\Eloquent\Factories\Factory;

class PresupuestoFactory extends Factory
{
    protected $model = Presupuesto::class;

    public function definition(): array
    {
        return [
            'nombrePresupuesto' => $this->faker->words(3, true),
        ];
    }
}
