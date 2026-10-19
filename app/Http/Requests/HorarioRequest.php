<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HorarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // 🚀 Cambiar a true para habilitar el validador
    }

    public function rules(): array
    {
        return [
            'turno' => ['required', 'string', 'max:255'],
            'hora'  => ['required', 'string', 'max:255'],
            'fecha' => ['required', 'date'], // Asegura que el usuario ingrese una fecha real
        ];
    }

    public function attributes(): array
    {
        return [
            'turno' => 'turno',
            'hora'  => 'rango de hora',
            'fecha' => 'fecha académica',
        ];
    }
}
