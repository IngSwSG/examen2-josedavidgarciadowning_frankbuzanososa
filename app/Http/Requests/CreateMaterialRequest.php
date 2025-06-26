<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMaterialRequest extends ApiFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "categoria" => "required|exists:categoria,idCategoria",
            "unidadMedida" => "required|string",
            "descripcion" => "required|string|min:3|max:255",
            "ubicacion" => "required|string",
        ];

    }

    public function messages(): array
    {
        return [
            "categoria.required" => "La categoria es requerida",
            "categoria.exists" => "La categoria que estas asignando al producto no existe",
            "unidadMedida.required" => "La unidad de medida es requerida",
            "descripcion.required" => "La descripcion es requerida",
            "ubicacion.required" => "La ubicacion es requerida",
            "descripcion.min" => "La descripcion debe tener al menos 3 caracteres",
            "descripcion.max" => "La descripcion no puede tener mas de 255 caracteres",
        ];
    }
}
