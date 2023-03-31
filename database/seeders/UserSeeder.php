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
        User::factory(20)->create();

        DB::table('users')->insert([
            "first_name" => "Julien",
            "last_name" => "Duranleau",
            "email" => "julien@prof.com",
            "email_verified_at" => now(),
            "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi", // password
            "privilege_id" => 1,
            "deleted_at" => null,
            "remember_token" => "ablablanimportquequoi",

        ]);

        DB::table('users')->insert([
            "first_name" => "Marie",
            "last_name" => "Bertrand",
            "email" => "marie@prof.com",
            "email_verified_at" => now(),
            "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi", // password
            "privilege_id" => 2,
            "deleted_at" => null,
            "remember_token" => "ablablanimportquequoi",

        ]);

        DB::table('users')->insert([
            "first_name" => "Kevin",
            "last_name" => "Daunais",
            "email" => "kevin@prof.com",
            "email_verified_at" => now(),
            "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi", // password
            "privilege_id" => 2,
            "deleted_at" => now(),
            "remember_token" => "ablablanimportquequoi",
        ]);
    }
}
