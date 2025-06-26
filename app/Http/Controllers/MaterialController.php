<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMaterialRequest;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Termwind\Components\Raw;

class MaterialController extends Controller
{
    public function store(CreateMaterialRequest $request)
    {
        try {
            $validatedData = $request->validated();

            // Create a new material using the validated data
            if (Material::where($validatedData)->exists()) {
                return response()->json([
                    'error' => 'Ya existe un material con los mismos datos'
                ], Response::HTTP_CONFLICT);
            }
            $material = Material::create($validatedData);
          
    
            return response()->json([
                'message' => 'Material creado exitosamente',
                'data' => $material
            ], Response::HTTP_CREATED);
        } catch (ValidationException $e) {
            return response()->json(["error" => $e->errors()],  Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function update(Request $request, $codigo)
    {
        try {
            $material = Material::find($codigo);

            if (!$material) {
                return response()->json([
                    'error' => 'Material no encontrado'
                ], Response::HTTP_NOT_FOUND);
            }

            $validatedData = $request->validate([
                'categoria' => 'required|exists:categoria,idCategoria',
                'descripcion' => 'required|string|max:255',
                'unidadMedida' => 'required|string|max:100',
                'ubicacion' => 'required|string|max:255',
            ]);

            // Evitar duplicados
            $exists = Material::where('categoria', $validatedData['categoria'])
                ->where('descripcion', $validatedData['descripcion'])
                ->where('unidadMedida', $validatedData['unidadMedida'])
                ->where('ubicacion', $validatedData['ubicacion'])
                ->where('codigo', '!=', $codigo) // ignorar el actual
                ->exists();

            if ($exists) {
                return response()->json([
                    'error' => 'Ya existe un material con los mismos datos'
                ], Response::HTTP_CONFLICT);
            }

            $material->update($validatedData);

            return response()->json([
                'message' => 'Material actualizado exitosamente',
                'data' => $material
            ], Response::HTTP_OK);
        } catch (ValidationException $e) {
            return response()->json(["error" => $e->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

}
