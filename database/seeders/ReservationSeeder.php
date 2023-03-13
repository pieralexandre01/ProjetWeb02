<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get("/json/reservations.json");

        $reservations = json_decode($json, true);

        foreach($reservations as $reservation) {
            Reservation::create([
                'title' => $reservation["title"],
                'description' => $reservation["description"],
                'price' => $reservation["price"],
                'image' => $reservation["image"],
                'start_date' => $reservation["start_date"],
                'end_date' => $reservation["end_date"],
            ]);
        };
    }
}
