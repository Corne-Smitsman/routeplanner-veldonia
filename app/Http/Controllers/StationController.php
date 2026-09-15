<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class StationController extends Controller
{
    public function station()
    {
        $stations = Station::all();
        return view('station', ['stations' => $stations]);
    }

    public function detail(Station $station)
    {
        return view ('station-detail', ['station' => $station]);
    }

    public function create()
    {
        if (auth()->user()->role !== Role::ADMIN) {
            abort(403);
        }

        return view('station-create');
    }

    public function edit(Station $station)
    {
        if (auth()->user()->role !== Role::ADMIN) {
            abort(403);
        }

        return view('station-edit', ['station' => $station]);
    }

    public function confirmDelete(Station $station)
    {
        if (auth()->user()->role !== Role::ADMIN) {
            abort(403);
        }

        return view('station-delete', ['station' => $station]);
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== Role::ADMIN) {
            abort(403);
        }

        $data = $request->validate([
            'code' => 'required|unique:stations,code',
            'name' => 'required',
            'region' => 'required',
            'population' => 'required|integer|min:0',
        ], [
            'code.required' => 'Vul een stationscode in.',
            'code.unique' => 'Deze stationscode bestaat al.',
            'name.required' => 'Vul een naam in.',
            'region.required' => 'Vul een regio in.',
            'population.required' => 'Vul het aantal inwoners in.',
            'population.integer' => 'Het aantal inwoners moet een getal zijn.',
            'population.min' => 'Het aantal inwoners kan niet negatief zijn.',
        ]);

        $station = Station::create($data);

        return redirect()
            ->route('station.detail', $station)
            ->with('success', 'De stad is toegevoegd.');
    }

    public function update(Request $request, Station $station)
    {
        if (auth()->user()->role !== Role::ADMIN) {
            abort(403);
        }

        $data = $request->validate([
            'code' => 'required|unique:stations,code,' . $station->id,
            'name' => 'required',
            'region' => 'required',
            'population' => 'required|integer|min:0',
        ], [
            'code.required' => 'Vul een stationscode in.',
            'code.unique' => 'Deze stationscode bestaat al.',
            'name.required' => 'Vul een naam in.',
            'region.required' => 'Vul een regio in.',
            'population.required' => 'Vul het aantal inwoners in.',
            'population.integer' => 'Het aantal inwoners moet een getal zijn.',
            'population.min' => 'Het aantal inwoners kan niet negatief zijn.',
        ]);

        $station->update($data);

        return redirect()
            ->route('station.detail', $station)
            ->with('success', $station->name . ' is opgeslagen.');
    }

    public function destroy(Station $station)
    {
        if (auth()->user()->role !== Role::ADMIN) {
            abort(403);
        }

        try {
            $station->delete();
        } catch (QueryException $error) {
            return redirect()
                ->route('station.detail', $station)
                ->with('error', $station->name . ' heeft nog verbindingen en kan niet worden verwijderd.');
        }

        return redirect()
            ->route('station')
            ->with('success', $station->name . ' is verwijderd.');
    }

}
