<?php

use Illuminate\Http\Response;
use App\Models\Material;
use App\Models\Categoria;

test('obtenerListaDeMaterialesConCategorias_funcionaCorrectamente', function () {
    $this->seed();

    $categoria = Categoria::create([
        'nombre' => 'Eléctricos',
    ]);

    Material::create([
        'categoria' => $categoria->idCategoria,
        'descripcion' => 'Cable de cobre',
        'unidadMedida' => 'metro',
        'ubicacion' => 'Almacén 1',
    ]);

    $response = $this->getJson('/api/material');

    $response->assertStatus(Response::HTTP_OK);

    $response->assertJsonStructure([
        'data' => [
            '*' => [
                'codigo',
                'descripcion',
                'unidadMedida',
                'ubicacion',
                'categoria' => [
                    'idCategoria',
                    'nombre'
                ]
            ]
        ]
    ]);
});

