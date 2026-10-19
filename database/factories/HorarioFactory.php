<?php

namespace Database\Factories;

use App\Models\Horario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Horario>
 */
class HorarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
        public function definition(): array
    {
        return [
            'turno' => $this->faker->randomElement(['Mañana', 'Tarde', 'Noche']),
            'hora'  => $this->faker->randomElement(['07:30 - 09:30', '09:40 - 11:40', '19:00 - 21:00']),
            'fecha' => $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'), // Fechas válidas para este mes
        ];
    }

}
