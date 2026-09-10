<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConnectionRequest;
use App\Http\Requests\UpdateConnectionRequest;
use App\Models\Connection;
use App\Models\Station;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ConnectionController extends Controller
{
    public function index(): View
    {
        $connections = Connection::with(['fromStation', 'toStation'])
            ->join('stations', 'stations.id', '=', 'connections.from_station_id')
            ->orderBy('stations.name')
            ->select('connections.*')
            ->get();

        return view('connections.index', compact('connections'));
    }

    public function create(): View
    {
        return view('connections.create', ['stations' => $this->stations()]);
    }

    public function store(StoreConnectionRequest $request): RedirectResponse
    {
        Connection::create($request->validated());

        return redirect()
            ->route('connections.index')
            ->with('success', 'De verbinding is toegevoegd.');
    }

    public function edit(Connection $connection): View
    {
        return view('connections.edit', [
            'connection' => $connection,
            'stations' => $this->stations(),
        ]);
    }

    public function update(UpdateConnectionRequest $request, Connection $connection): RedirectResponse
    {
        $connection->update($request->validated());

        return redirect()
            ->route('connections.index')
            ->with('success', 'De verbinding is bijgewerkt.');
    }

    public function confirmDestroy(Connection $connection): View
    {
        $connection->load(['fromStation', 'toStation']);

        return view('connections.delete', compact('connection'));
    }

    public function destroy(Connection $connection): RedirectResponse
    {
        $connection->delete();

        return redirect()
            ->route('connections.index')
            ->with('success', 'De verbinding is verwijderd.');
    }

    private function stations()
    {
        return Station::orderBy('name')->get();
    }
}
