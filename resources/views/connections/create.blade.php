@extends('layouts.app')

@section('title', 'Verbinding toevoegen')

@section('content')
    <x-page-header
        title="Verbinding toevoegen"
        subtitle="Leg een nieuwe rechtstreekse spoorlijn vast."
        :breadcrumbs="[['label' => 'Verbindingen', 'url' => route('connections.index')], ['label' => 'Verbinding toevoegen']]"/>

    <x-validation-errors/>

    <form method="POST" action="{{ route('connections.store') }}" class="rounded-xl border border-line">
        @csrf
        @include('connections._form', ['submit' => 'Verbinding toevoegen', 'cancel' => route('connections.index')])
    </form>
@endsection
