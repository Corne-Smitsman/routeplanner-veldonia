<?php

namespace App\Http\Controllers;

use App\Models\Station;

class StationController extends Controller
{
    public function station()
    {
        $stations = Station::all();
        return view('station', ['stations' => $stations]);
    }

    public function detail(station $station)
    {
        return view ('station-detail', ['station' => $station]);
    }
}
