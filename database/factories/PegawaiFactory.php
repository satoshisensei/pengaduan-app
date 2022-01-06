<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PegawaiFactory extends Factory
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
            'nip' => $this->faker->numerify('1999####' . '2022###' . '##' . '#'),
            'alamat' => $this->faker->streetAddress()
        ];
    }
}
