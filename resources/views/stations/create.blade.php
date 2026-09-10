@extends('layouts.app')

@section('title', 'Stad toevoegen')

@section('content')
    <x-page-header
        title="Stad toevoegen"
        subtitle="Voeg een nieuwe stad toe aan het netwerk van Veldonia."
        :breadcrumbs="[['label' => 'Steden', 'url' => route('stations.index')], ['label' => 'Stad toevoegen']]"/>

    <x-validation-errors/>

    <form method="POST" action="{{ route('stations.store') }}" class="rounded-xl border border-line">
        @csrf
        @include('stations._form', ['submit' => 'Stad toevoegen', 'cancel' => route('stations.index')])
    </form>
@endsection
