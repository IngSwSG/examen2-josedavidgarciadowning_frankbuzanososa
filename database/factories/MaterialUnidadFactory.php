<?php

namespace Database\Factories;

use App\Models\MaterialUnidad;
use App\Models\Material;
use App\Models\Unidad;
use App\Models\Presupuesto;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialUnidadFactory extends Factory
{
    protected $model = MaterialUnidad::class;

    public function definition(): array
    {
        return [
            'cantidad' => $this->faker->numberBetween(1, 100),
            'codigo' => Material::inRandomOrder()->value('codigo') ?? Material::factory(),
            'idUnidad' => Unidad::inRandomOrder()->value('idUnidad') ?? Unidad::factory(),
            'codigoPresupuesto' => Presupuesto::inRandomOrder()->value('codigoPresupuesto') ?? Presupuesto::factory(),
        ];
    }
}
