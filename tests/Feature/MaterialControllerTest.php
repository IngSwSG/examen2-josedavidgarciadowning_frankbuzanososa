<?php
use Illuminate\Http\Response;

test('dadoUnMaterialQueNoExiste_insertarMaterial_funcionaCorrectamente', function () {
    $this->seed();
    $materialData = [
        'categoria' => 1,
        'descripcion' => 'Material de prueba',
        'unidadMedida' => "kg",
        'ubicacion' =>  "Bodega Principal",
    ];
    $response = $this->postJson('/api/material', $materialData);

    $response->assertStatus(Response::HTTP_CREATED);

    $this->assertDatabaseHas('material',$materialData);
});

test('dado un material que ya existe con los mismos datos, retornar un mensaje de error<Ya existe un material con los mismos datos> y un codigo de error 409', function () {
    $this->seed();
    $materialData1 = [
        'categoria' => 1,
        'descripcion' => 'Material de prueba',
        'unidadMedida' => "kg",
        'ubicacion' =>  "Bodega Principal",
    ];

    $materialData2 = [
        'categoria' => 1,
        'descripcion' => 'Material de prueba',
        'unidadMedida' => "kg",
        'ubicacion' =>  "Bodega Principal",
    ];
    $response1 = $this->postJson('/api/material', $materialData1);
    $response2 = $this->postJson('/api/material', $materialData2);

    $response2->assertStatus(Response::HTTP_CONFLICT);
    $response2->assertJsonFragment([
        'error' => 'Ya existe un material con los mismos datos'
    ]);




});






test('dado un material sin la descripcion, verificar que de error y que el mensaje sea: <La descripcion es requerida> ', function () {
    $this->seed();
    $materialData = [
        'categoria' => 1,
        'unidadMedida' => "kg",
        'ubicacion' =>  "Bodega Principal",
    ];
    $response = $this->postJson('/api/material', $materialData);

    $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

    $response->assertJsonFragment([
        'descripcion' => ['La descripcion es requerida']
    ]);
});





