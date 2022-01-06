<?php

namespace Database\Seeders;

use Database\Seeders\RtSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\StatusSeeder;
use Database\Seeders\BalasanSeeder;
use Database\Seeders\LaporanSeeder;
use Database\Seeders\PegawaiSeeder;
use Database\Seeders\MasyarakatSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            MasyarakatSeeder::class,
            PegawaiSeeder::class,
            RtSeeder::class,
            LaporanSeeder::class,
            BalasanSeeder::class,
            StatusSeeder::class
        ]);
    }
}
