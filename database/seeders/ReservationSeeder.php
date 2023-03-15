<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservations')->insert([
            "user_id" => 1,
            "package_id" => 1,
            "quantity" => 1,
        ]);

        DB::table('reservations')->insert([
            "user_id" => 2,
            "package_id" => 2,
            "quantity" => 2,
        ]);
    }
}
