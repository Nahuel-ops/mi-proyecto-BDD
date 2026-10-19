<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
//Importa el modelo Categoria correctamente
use App\Models\Categoria;
//Importamos los modelos Instructor y Horario para establecer relaciones.
use App\Models\Instructor;
use App\Models\Horario;

class CursoFactory extends Factory
{
    public function definition(): array
    {
        return [
            // Conecta con la fábrica de categorías
            'categoria_id' => Categoria::factory(),
              // CONECTAMOS LAS NUEVAS LLAVES FORÁNEAS AUTOMÁTICAMENTE
            'instructor_id' => Instructor::factory(),
            'horario_id'    => Horario::factory(),
            // La sintaxis exacta de tu ingeniera
            'nombre'       => 'Curso de ' . $this->faker->words(3, true),
            'descripcion'  => $this->faker->paragraph(),
        ];
    }
}
