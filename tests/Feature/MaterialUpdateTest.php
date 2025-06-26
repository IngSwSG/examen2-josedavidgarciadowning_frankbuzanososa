<?php

use Illuminate\Http\Response;
use App\Models\Material;

test('dadoUnMaterialExistente_actualizarMaterial_funcionaCorrectamente', function () {
    $this->seed();

    $material = Material::create([
        'categoria' => 1,
        'descripcion' => 'Original',
        'unidadMedida' => 'kg',
        'ubicacion' => 'Depósito A',
    ]);

    $nuevoData = [
        'categoria' => 1,
        'descripcion' => 'Actualizado',
        'unidadMedida' => 'kg',
        'ubicacion' => 'Depósito B',
    ];

    $response = $this->putJson("/api/material/{$material->codigo}", $nuevoData);

    $response->assertStatus(Response::HTTP_OK);
    $response->assertJsonFragment([
        'message' => 'Material actualizado exitosamente',
        'descripcion' => 'Actualizado',
        'ubicacion' => 'Depósito B',
    ]);

    $this->assertDatabaseHas('material', array_merge($nuevoData, ['codigo' => $material->codigo]));
});

test('dadoDosMateriales_actualizarConDatosDuplicados_retornaError409', function () {
    $this->seed();

    $material1 = Material::create([
        'categoria' => 1,
        'descripcion' => 'Material A',
        'unidadMedida' => 'kg',
        'ubicacion' => 'Bodega 1',
    ]);

    $material2 = Material::create([
        'categoria' => 1,
        'descripcion' => 'Material B',
        'unidadMedida' => 'kg',
        'ubicacion' => 'Bodega 2',
    ]);

    $duplicatedData = [
        'categoria' => $material1->categoria,
        'descripcion' => $material1->descripcion,
        'unidadMedida' => $material1->unidadMedida,
        'ubicacion' => $material1->ubicacion,
    ];

    $response = $this->putJson("/api/material/{$material2->codigo}", $duplicatedData);

    $response->assertStatus(Response::HTTP_CONFLICT);
    $response->assertJsonFragment([
        'error' => 'Ya existe un material con los mismos datos'
    ]);
});

