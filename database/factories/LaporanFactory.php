<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LaporanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'masyarakat_id' => mt_rand(1,100),
            'rt_id' => mt_rand(1,8),
            'tujuan' => $this->faker->sentence(2, true),
            'anggaran' => $this->faker->sentence(2, true),
            'rincian' => $this->faker->numerify('##'.'######'),
            'total' => $this->faker->numerify('###'.'######'),
        ];
    }
}
