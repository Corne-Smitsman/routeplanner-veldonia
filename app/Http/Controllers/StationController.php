<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStationRequest;
use App\Http\Requests\UpdateStationRequest;
use App\Models\Station;
use Illuminate\Database\QueryException;

class StationController extends Controller
{
    public function index()
    {
        $stations = Station::orderBy('name')->get();

        return view('stations.index', ['stations' => $stations]);
    }

    public function create()
    {
        return view('stations.create');
    }

    public function store(StoreStationRequest $request)
    {
        $station = Station::create($request->validated());

        return redirect()->route('stations.show', $station)
            ->with('success', $station->name . ' is toegevoegd.');
    }

    public function show(Station $station)
    {
        return view('stations.show', ['station' => $station]);
    }

    public function edit(Station $station)
    {
        return view('stations.edit', ['station' => $station]);
    }

    public function update(UpdateStationRequest $request, Station $station)
    {
        $station->update($request->validated());

        return redirect()->route('stations.show', $station)
            ->with('success', $station->name . ' is bijgewerkt.');
    }

    public function confirmDestroy(Station $station)
    {
        return view('stations.delete', ['station' => $station]);
    }

    public function destroy(Station $station)
    {
        try {
            $station->delete();
        } catch (QueryException $fout) {
            return redirect()->route('stations.show', $station)
                ->with('error', $station->name . ' heeft nog verbindingen en kan niet worden verwijderd.');
        }

        return redirect()->route('stations.index')
            ->with('success', $station->name . ' is verwijderd.');
    }
}
