<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStationRequest;
use App\Http\Requests\UpdateStationRequest;
use App\Models\Station;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StationController extends Controller
{
    public function index(): View
    {
        $stations = Station::orderBy('name')->get();

        return view('stations.index', compact('stations'));
    }

    public function create(): View
    {
        return view('stations.create');
    }

    public function store(StoreStationRequest $request): RedirectResponse
    {
        $station = Station::create($request->validated());

        return redirect()
            ->route('stations.show', $station)
            ->with('success', "{$station->name} is toegevoegd.");
    }

    public function show(Station $station): View
    {
        return view('stations.show', compact('station'));
    }

    public function edit(Station $station): View
    {
        return view('stations.edit', compact('station'));
    }

    public function update(UpdateStationRequest $request, Station $station): RedirectResponse
    {
        $station->update($request->validated());

        return redirect()
            ->route('stations.show', $station)
            ->with('success', "{$station->name} is bijgewerkt.");
    }

    public function confirmDestroy(Station $station): View
    {
        return view('stations.delete', compact('station'));
    }

    public function destroy(Station $station): RedirectResponse
    {
        try {
            $station->delete();
        } catch (QueryException) {
            return redirect()
                ->route('stations.show', $station)
                ->with('error', "{$station->name} heeft nog verbindingen en kan niet worden verwijderd. Verwijder eerst die verbindingen.");
        }

        return redirect()
            ->route('stations.index')
            ->with('success', "{$station->name} is verwijderd.");
    }
}
