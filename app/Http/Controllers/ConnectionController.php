<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConnectionRequest;
use App\Http\Requests\UpdateConnectionRequest;
use App\Models\Connection;
use App\Models\Station;

class ConnectionController extends Controller
{
    public function index()
    {
        $connections = Connection::with('fromStation', 'toStation')
            ->orderBy('from_station_id')
            ->get();

        return view('connections.index', ['connections' => $connections]);
    }

    public function create()
    {
        $stations = Station::orderBy('name')->get();

        return view('connections.create', ['stations' => $stations]);
    }

    public function store(StoreConnectionRequest $request)
    {
        Connection::create($request->validated());

        return redirect()->route('connections.index')
            ->with('success', 'De verbinding is toegevoegd.');
    }

    public function edit(Connection $connection)
    {
        $stations = Station::orderBy('name')->get();

        return view('connections.edit', [
            'connection' => $connection,
            'stations' => $stations,
        ]);
    }

    public function update(UpdateConnectionRequest $request, Connection $connection)
    {
        $connection->update($request->validated());

        return redirect()->route('connections.index')
            ->with('success', 'De verbinding is bijgewerkt.');
    }

    public function confirmDestroy(Connection $connection)
    {
        return view('connections.delete', ['connection' => $connection]);
    }

    public function destroy(Connection $connection)
    {
        $connection->delete();

        return redirect()->route('connections.index')
            ->with('success', 'De verbinding is verwijderd.');
    }
}
