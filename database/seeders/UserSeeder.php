<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 5 utilisateurs sont générés et sauvegardés
        User::factory(5)->create();

        DB::table('users')->insert([
            "first_name" => "Julien",
            "last_name" => "Duranleau",
            "email" => "julien@prof.com",
            "email_verified_at" => now(),
            "password" => "1234",
            "privilege_id" => 1,
            "deleted_at" => null,
            "remember_token" => "ablablanimportquequoi",

        ]);
    }
}
