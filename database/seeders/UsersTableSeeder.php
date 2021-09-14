<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = array("Anton", "Andrei", "Artur", "Boris", "Vasily", "Danila", "Yakov,", "Sergey", "Artem", "Olga", "Alena", "Dmitriy", "Maria", "Liza");
        for($i=0; $i < 50; $i++) {
            DB::table('donations')->insert(
                [
                    'name' => $name[rand(0, 13)],
                    'email' => Str::random(10) . '@gmail.com',
                    'message' => Str::random(50),
                    'donation' => rand(0, 1000),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }
}
