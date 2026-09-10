@extends('layouts.app')

@section('title', 'Verbinding bewerken')

@section('content')
    <x-page-header
        title="Verbinding bewerken"
        subtitle="{{ $connection->fromStation->name }} — {{ $connection->toStation->name }}"
        :breadcrumbs="[['label' => 'Verbindingen', 'url' => route('connections.index')], ['label' => 'Bewerken']]"/>

    <x-validation-errors/>

    <form method="POST" action="{{ route('connections.update', $connection) }}" class="rounded-xl border border-line">
        @csrf
        @method('put')
        @include('connections._form', ['submit' => 'Wijzigingen opslaan', 'cancel' => route('connections.index')])
    </form>
@endsection
