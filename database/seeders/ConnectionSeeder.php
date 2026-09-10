<?php

namespace Database\Seeders;

use App\Models\Connection;
use App\Models\Station;
use Illuminate\Database\Seeder;

class ConnectionSeeder extends Seeder
{
    public function run(): void
    {
        $connections = [
            ['VLB', 'NRW', 45, 28],
            ['VLB', 'ZDB', 60, 35],
            ['VLB', 'OHV', 80, 50],
            ['VLB', 'WDP', 55, 33],
            ['VLB', 'MHV', 40, 25],
            ['NRW', 'DZT', 30, 20],
            ['NRW', 'BGR', 50, 34],
            ['WDP', 'DZT', 35, 22],
            ['ZDB', 'MHV', 25, 18],
            ['ZDB', 'ZDL', 40, 27],
            ['ZDB', 'RVB', 45, 30],
            ['OHV', 'RVB', 35, 24],
            ['OHV', 'BGR', 70, 45],
            ['MHV', 'ZDL', 30, 20],
            ['RVB', 'ZDL', 50, 33],
        ];

        $stations = Station::pluck('id', 'code');

        foreach ($connections as [$from, $to, $distance, $duration]) {
            Connection::updateOrCreate(
                [
                    'from_station_id' => $stations[$from],
                    'to_station_id' => $stations[$to],
                ],
                [
                    'distance_km' => $distance,
                    'duration_minutes' => $duration,
                ]
            );
        }
    }
}
