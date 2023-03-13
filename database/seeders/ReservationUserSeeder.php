<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservation_user')->insert([
            "quantity" => 4,
            "user_id" => 2,
            "reservation_id" => 5,
        ]);

        DB::table('reservation_user')->insert([
            "quantity" => 2,
            "user_id" => 1,
            "reservation_id" => 5,
        ]);
    }
}
