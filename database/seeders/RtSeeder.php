<?php

namespace Database\Seeders;

use App\Models\Rt;
use Illuminate\Database\Seeder;

class RtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rt::create([
            'nomor' => '01'
        ]);

        Rt::create([
            'nomor' => '02'
        ]);

        Rt::create([
            'nomor' => '03'
        ]);

        Rt::create([
            'nomor' => '04'
        ]);

        Rt::create([
            'nomor' => '05'
        ]);

        Rt::create([
            'nomor' => '06'
        ]);

        Rt::create([
            'nomor' => '07'
        ]);

        Rt::create([
            'nomor' => '08'
        ]);
    }
}
