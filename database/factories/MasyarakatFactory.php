<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MasyarakatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rt_id' => mt_rand(1,8),
            'nama' => $this->faker->name(),
            'nik' => $this->faker->nik(),
            'alamat' => $this->faker->streetAddress()
        ];
    }
}
