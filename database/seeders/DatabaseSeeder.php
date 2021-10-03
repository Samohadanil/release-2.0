<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Database\Factories\DonationsFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DonationsTableSeeder::class);
    }
}
