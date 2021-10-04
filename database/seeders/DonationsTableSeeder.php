<?php

namespace Database\Seeders;

use Database\Factories\DonationsFactory;
use Illuminate\Database\Seeder;

class DonationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Donations::factory()->count(10)->create();
    }
}
