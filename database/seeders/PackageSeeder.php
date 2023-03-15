<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get("/json/packages.json");

        $packages = json_decode($json, true);

        foreach($packages as $package) {
            Package::create([
                'title' => $package["title"],
                'description' => $package["description"],
                'price' => $package["price"],
                'image' => $package["image"],
                'start_date' => $package["start_date"],
                'end_date' => $package["end_date"],
             ]);
        };
    }
}
