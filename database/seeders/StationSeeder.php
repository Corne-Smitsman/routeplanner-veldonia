<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Seeder;

class StationSeeder extends Seeder
{
    public function run(): void
    {
        $stations = [
            ['code' => 'VLB', 'name' => 'Velburg',      'region' => 'Centraal (hoofdstad)',    'population' => 480000],
            ['code' => 'NRW', 'name' => 'Noorderwijk',  'region' => 'Noord',                   'population' => 210000],
            ['code' => 'ZDB', 'name' => 'Zuiderburcht', 'region' => 'Zuid',                    'population' => 190000],
            ['code' => 'OHV', 'name' => 'Oosthaven',    'region' => 'Oost (havenstad)',        'population' => 260000],
            ['code' => 'WDP', 'name' => 'Westdorp',     'region' => 'West',                    'population' =>  95000],
            ['code' => 'DZT', 'name' => 'Duinzicht',    'region' => 'Noordwest (kust)',        'population' =>  70000],
            ['code' => 'BGR', 'name' => 'Bergenrode',   'region' => 'Noordoost (heuvels)',     'population' =>  60000],
            ['code' => 'MHV', 'name' => 'Meerhoven',    'region' => 'Zuid-centraal (meer)',    'population' => 130000],
            ['code' => 'RVB', 'name' => 'Rivierbeek',   'region' => 'Zuidoost (rivierdal)',    'population' =>  85000],
            ['code' => 'ZDL', 'name' => 'Zonnedal',     'region' => 'Zuid',                    'population' => 100000],
        ];

        foreach ($stations as $station) {
            Station::updateOrCreate(['code' => $station['code']], $station);
        }
    }
}
