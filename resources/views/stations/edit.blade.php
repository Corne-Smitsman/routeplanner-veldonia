@extends('layouts.app')

@section('title', $station->name . ' bewerken')

@section('content')
    <x-page-header
        title="{{ $station->name }} bewerken"
        subtitle="Pas de gegevens van deze stad aan."
        :breadcrumbs="[
            ['label' => 'Steden', 'url' => route('stations.index')],
            ['label' => $station->name, 'url' => route('stations.show', $station)],
            ['label' => 'Bewerken'],
        ]"/>

    <x-validation-errors/>

    <form method="POST" action="{{ route('stations.update', $station) }}" class="rounded-xl border border-line">
        @csrf
        @method('put')
        @include('stations._form', ['submit' => 'Wijzigingen opslaan', 'cancel' => route('stations.show', $station)])
    </form>
@endsection
