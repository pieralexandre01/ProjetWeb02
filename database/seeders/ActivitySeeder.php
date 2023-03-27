<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get("/json/activities.json");

        $activities = json_decode($json, true);

        foreach($activities as $activity) {
            Activity::create([
                'title' => $activity["title"],
                'subcategory' => $activity["subcategory"],
                'description' => $activity["description"],
                'image' => $activity["image"],
                'alt_description' => $activity["alt_description"],
                'date' => $activity["date"],
            ]);
        };
    }
}
