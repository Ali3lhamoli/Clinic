<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'is_admin' =>fake()->boolean(),
            'is_doctor' =>fake()->boolean(),
            'is_patient' =>fake()->boolean(),
            'is_maneger' =>fake()->boolean(),
        ];
    }
}
