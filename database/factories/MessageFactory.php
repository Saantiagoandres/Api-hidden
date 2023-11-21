<?php

namespace Database\Factories;

use App\Models\Candidate;
use App\Models\Headhunter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contenido_mensaje'=>$this->faker->text(),
            'fecha_hora_mensaje'=>$this->faker->date(),

            'candidate_id'=>Candidate::inRandomOrder()->first(),
            'headhunter_id'=>Headhunter::inRandomOrder()->first()
        ];
    }
}
