<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Material;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Material>
 */
class MaterialFactory extends Factory
{
    protected $model = Material::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "unidadMedida" => $this->faker->randomElement(['kg', 'g', 'l', 'm', 'cm']),
            "descripcion" => $this->faker->sentence(),
            "ubicacion" => $this->faker->word(),
            "categoria" => Categoria::factory()
        ];
    }
}
