<?php

namespace Database\Seeders;

use App\Models\Connection;
use App\Models\Station;
use Illuminate\Database\Seeder;

class ConnectionSeeder extends Seeder
{
    public function run(): void
    {
        // Eerst de steden ophalen, want een verbinding heeft het id van een stad nodig.
        $velburg = Station::where('code', 'VLB')->first();
        $noorderwijk = Station::where('code', 'NRW')->first();
        $zuiderburcht = Station::where('code', 'ZDB')->first();
        $oosthaven = Station::where('code', 'OHV')->first();
        $westdorp = Station::where('code', 'WDP')->first();
        $duinzicht = Station::where('code', 'DZT')->first();
        $bergenrode = Station::where('code', 'BGR')->first();
        $meerhoven = Station::where('code', 'MHV')->first();
        $rivierbeek = Station::where('code', 'RVB')->first();
        $zonnedal = Station::where('code', 'ZDL')->first();

        // firstOrCreate maakt de verbinding alleen aan als die nog niet bestaat.
        // Zo kun je de seeder vaker draaien zonder dubbele verbindingen.
        Connection::firstOrCreate(
            ['from_station_id' => $velburg->id, 'to_station_id' => $noorderwijk->id],
            ['distance_km' => 45, 'duration_minutes' => 28]
        );
        Connection::firstOrCreate(
            ['from_station_id' => $velburg->id, 'to_station_id' => $zuiderburcht->id],
            ['distance_km' => 60, 'duration_minutes' => 35]
        );
        Connection::firstOrCreate(
            ['from_station_id' => $velburg->id, 'to_station_id' => $oosthaven->id],
            ['distance_km' => 80, 'duration_minutes' => 50]
        );
        Connection::firstOrCreate(
            ['from_station_id' => $velburg->id, 'to_station_id' => $westdorp->id],
            ['distance_km' => 55, 'duration_minutes' => 33]
        );
        Connection::firstOrCreate(
            ['from_station_id' => $velburg->id, 'to_station_id' => $meerhoven->id],
            ['distance_km' => 40, 'duration_minutes' => 25]
        );
        Connection::firstOrCreate(
            ['from_station_id' => $noorderwijk->id, 'to_station_id' => $duinzicht->id],
            ['distance_km' => 30, 'duration_minutes' => 20]
        );
        Connection::firstOrCreate(
            ['from_station_id' => $noorderwijk->id, 'to_station_id' => $bergenrode->id],
            ['distance_km' => 50, 'duration_minutes' => 34]
        );
        Connection::firstOrCreate(
            ['from_station_id' => $westdorp->id, 'to_station_id' => $duinzicht->id],
            ['distance_km' => 35, 'duration_minutes' => 22]
        );
        Connection::firstOrCreate(
            ['from_station_id' => $zuiderburcht->id, 'to_station_id' => $meerhoven->id],
            ['distance_km' => 25, 'duration_minutes' => 18]
        );
        Connection::firstOrCreate(
            ['from_station_id' => $zuiderburcht->id, 'to_station_id' => $zonnedal->id],
            ['distance_km' => 40, 'duration_minutes' => 27]
        );
        Connection::firstOrCreate(
            ['from_station_id' => $zuiderburcht->id, 'to_station_id' => $rivierbeek->id],
            ['distance_km' => 45, 'duration_minutes' => 30]
        );
        Connection::firstOrCreate(
            ['from_station_id' => $oosthaven->id, 'to_station_id' => $rivierbeek->id],
            ['distance_km' => 35, 'duration_minutes' => 24]
        );
        Connection::firstOrCreate(
            ['from_station_id' => $oosthaven->id, 'to_station_id' => $bergenrode->id],
            ['distance_km' => 70, 'duration_minutes' => 45]
        );
        Connection::firstOrCreate(
            ['from_station_id' => $meerhoven->id, 'to_station_id' => $zonnedal->id],
            ['distance_km' => 30, 'duration_minutes' => 20]
        );
        Connection::firstOrCreate(
            ['from_station_id' => $rivierbeek->id, 'to_station_id' => $zonnedal->id],
            ['distance_km' => 50, 'duration_minutes' => 33]
        );
    }
}
