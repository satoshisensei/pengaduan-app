<?php

namespace Database\Seeders;

use App\Models\Balasan;
use Illuminate\Database\Seeder;

class BalasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Balasan::factory(100)->create();
    }
}
