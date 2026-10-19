<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// 💡 Importamos la clase Rule para hacer validaciones limpias
use Illuminate\Validation\Rule;

class CategoriaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'nombre' => [
                'required', 
                'string', 
                'max:255', 
                // Busca que el nombre sea único en la tabla categorías sin usar comas peligrosas
                Rule::unique('categorias', 'nombre')->ignore($this->route('categoria')),
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'nombre' => 'nombre de categoría',
        ];
    }
}

