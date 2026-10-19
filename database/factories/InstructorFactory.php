<?php

namespace Database\Factories;

use App\Models\Instructor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Instructor>
 */
class InstructorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
        public function definition(): array
    {
        return [
            'nombre'       => $this->faker->firstName(),
            'apellido'     => $this->faker->lastName(),
            'email'        => $this->faker->unique()->safeEmail(),
            'especialidad' => $this->faker->randomElement(['Desarrollo Web', 'Base de Datos', 'Redes', 'Seguridad']),
            'activo'       => $this->faker->boolean(80), // 80% de probabilidad de estar activo (true)
        ];
    }

}
