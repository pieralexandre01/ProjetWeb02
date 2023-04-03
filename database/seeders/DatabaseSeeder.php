<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

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
            PrivilegeSeeder::class,
            UserSeeder::class,
            PackageSeeder::class,
            CategorySeeder::class,
            ReservationSeeder::class,
            ArticleSeeder::class,
            ActivitySeeder::class,
        ]);
    }
}
