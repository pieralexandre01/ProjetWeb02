<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            "name" => "virtual reality",
        ]);

        DB::table('categories')->insert([
            "name" => "artificial intelligence",
        ]);

        DB::table('categories')->insert([
            "name" => "robotics",
        ]);
    }
}
