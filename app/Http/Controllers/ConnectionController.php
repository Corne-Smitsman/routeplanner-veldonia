<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Models\Connection;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ConnectionController extends Controller
{
    public function connection()
    {
        $connections = Connection::with(['fromStation', 'toStation'])->get();

        return view('connection', ['connections' => $connections]);
    }

    public function detail(Connection $connection)
    {
        return view('connection-detail', ['connection' => $connection]);
    }

    public function create()
    {
        if (auth()->user()->role !== Role::ADMIN) {
            abort(403);
        }

        $stations = Station::orderBy('name')->get();

        return view('connection-create', ['stations' => $stations]);
    }

    public function edit(Connection $connection)
    {
        if (auth()->user()->role !== Role::ADMIN) {
            abort(403);
        }

        return view('connection-edit', ['connection' => $connection, 'stations' => Station::orderBy('name')->get()]);
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== Role::ADMIN) {
            abort(403);
        }

        $data = $request->validate([
            'from_station_id' => [
                'required',
                'exists:stations,id',
                Rule::unique('connections', 'from_station_id')
                    ->where('to_station_id', $request->to_station_id),
            ],
            'to_station_id' => 'required|exists:stations,id|different:from_station_id',
            'distance_km' => 'required|integer|min:1',
            'duration_minutes' => 'required|integer|min:1',
        ], [
            'from_station_id.required' => 'Kies een vertrekstad.',
            'from_station_id.exists' => 'Deze vertrekstad bestaat niet.',
            'from_station_id.unique' => 'Deze verbinding bestaat al.',
            'to_station_id.required' => 'Kies een aankomststad.',
            'to_station_id.exists' => 'Deze aankomststad bestaat niet.',
            'to_station_id.different' => 'De vertrek- en aankomststad mogen niet hetzelfde zijn.',
            'distance_km.required' => 'Vul de afstand in.',
            'distance_km.integer' => 'De afstand moet een heel getal zijn.',
            'distance_km.min' => 'De afstand moet minimaal 1 km zijn.',
            'duration_minutes.required' => 'Vul de rijtijd in.',
            'duration_minutes.integer' => 'De rijtijd moet een heel getal zijn.',
            'duration_minutes.min' => 'De rijtijd moet minimaal 1 minuut zijn.',
        ]);

        Connection::create($data);

        return redirect()
            ->route('connection')
            ->with('success', 'De verbinding is toegevoegd.');
    }

    public function update(Request $request, Connection $connection)
    {
        if (auth()->user()->role !== Role::ADMIN) {
            abort(403);
        }

        $data = $request->validate([
            'from_station_id' => [
                'required',
                'exists:stations,id',
                Rule::unique('connections', 'from_station_id')
                    ->where('to_station_id', $request->to_station_id)
                    ->ignore($connection->id),
            ],
            'to_station_id' => 'required|exists:stations,id|different:from_station_id',
            'from_station_id.unique' => 'Deze verbinding bestaat al.',
            'distance_km' => 'required|integer|min:1',
            'duration_minutes' => 'required|integer|min:1',
        ], [
            'from_station_id.required' => 'Kies een vertrekstad.',
            'from_station_id.exists' => 'Deze vertrekstad bestaat niet.',
            'to_station_id.required' => 'Kies een aankomststad.',
            'to_station_id.exists' => 'Deze aankomststad bestaat niet.',
            'to_station_id.different' => 'De vertrek- en aankomststad mogen niet hetzelfde zijn.',
            'distance_km.required' => 'Vul de afstand in.',
            'distance_km.integer' => 'De afstand moet een heel getal zijn.',
            'distance_km.min' => 'De afstand moet minimaal 1 km zijn.',
            'duration_minutes.required' => 'Vul de rijtijd in.',
            'duration_minutes.integer' => 'De rijtijd moet een heel getal zijn.',
            'duration_minutes.min' => 'De rijtijd moet minimaal 1 minuut zijn.',
        ]);

        $connection->update($data);

        return redirect()
            ->route('connection.detail', $connection)
            ->with('success', 'De verbinding tussen ' . $connection->fromStation->name . ' en ' . $connection->toStation->name . ' is gewijzigd.');
    }

    public function confirmDelete(Connection $connection)
    {
        if (auth()->user()->role !== Role::ADMIN) {
            abort(403);
        }

        return view('connection-delete', ['connection' => $connection]);
    }

    public function destroy(Connection $connection)
    {
        if (auth()->user()->role !== Role::ADMIN) {
            abort(403);
        }

        $fromStation = $connection->fromStation->name;
        $toStation = $connection->toStation->name;

        $connection->delete();

        return redirect()
            ->route('connection')
            ->with('success', 'De verbinding tussen ' . $fromStation . ' en ' . $toStation . ' is verwijderd.');
    }
}
