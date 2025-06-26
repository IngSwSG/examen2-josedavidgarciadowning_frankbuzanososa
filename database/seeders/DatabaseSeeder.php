<?php

namespace Database\Seeders;

use App\Models\MaterialUnidad;
use App\Models\Presupuesto;
use App\Models\Requisicion;
use App\Models\Categoria;
use App\Models\Material;
use App\Models\Unidad;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Categoria::factory(5)->create()->each(function ($categoria){
            Material::factory(5)->create([
                'categoria' => $categoria->idCategoria
            ]);
        });

        Unidad::factory(5)->create();

        Presupuesto::factory(10)->create();

        Requisicion::factory(10)->create();

        MaterialUnidad::factory(20)->create();
    }
}
