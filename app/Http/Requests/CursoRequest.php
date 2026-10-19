<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CursoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //  CAMBIAR A TRUE (Foto 2) para permitir validar los datos
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        //  Captura el ID del curso actual si estamos editando (Foto 4)
        $cursoId = $this->route('curso')?->id;

        return [
            'categoria_id'  => ['required', 'integer', 'exists:categorias,id'],
            'nombre'        => [
                'required', 
                'string', 
                'max:255',
                // Valida que el nombre del curso sea único dentro de una misma categoría (Foto 3 y 4)
                Rule::unique('cursos')
                    ->where(fn ($q) => $q->where('categoria_id', $this->input('categoria_id')))
                    ->ignore($cursoId),
            ],
            'descripcion'   => ['nullable', 'string'],
            'instructor_id' => ['required', 'integer', 'exists:instructores,id'],
            'horario_id'    => ['required', 'integer', 'exists:horarios,id'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        // Traduce los campos técnicos a nombres limpios en español (Foto 1)
        return [
            'categoria_id'  => 'categoría',
            'nombre'        => 'nombre',
            'descripcion'   => 'descripción',
            'instructor_id' => 'instructor',
            'horario_id'    => 'horario',
        ];
    }

    public function messages(): array
    {
        // Mensajes de error personalizados para cada regla de validación (Foto 1)
        return [
            'nombre.unique' => 'ya existe un curso con ese nombre en la categoría seleccionada. Por favor, elige otro.',
            
        ];
    }
}
