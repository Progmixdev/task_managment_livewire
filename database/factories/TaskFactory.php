<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => Project::inRandomOrder()->first()->id, //
            'title' => $this->faker->sentence(4),
            'is_done' => $this->faker->boolean,
            'due_date' => $this->faker->dateTimeBetween('now', '+2 months'),
        ];
    }
}
