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
}
