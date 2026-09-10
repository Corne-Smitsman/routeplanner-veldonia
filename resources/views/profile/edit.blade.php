@extends('layouts.app')

@section('title', 'Mijn profiel')

@section('content')
    <div class="bg-surface-muted">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6">
            <x-breadcrumbs :items="[['label' => 'Mijn profiel']]"/>

            <h1 class="text-2xl font-semibold text-ink">Mijn profiel</h1>
            <p class="mt-1.5 text-ink-muted">Beheer je gegevens, wachtwoord en account.</p>
        </div>
    </div>

    <div class="mx-auto max-w-7xl space-y-6 px-4 py-8 sm:px-6">
        <section class="rounded-xl border border-line bg-surface">
            @include('profile.partials.update-profile-information-form')
        </section>

        <section class="rounded-xl border border-line bg-surface">
            @include('profile.partials.update-password-form')
        </section>

        <section class="rounded-xl border border-danger bg-surface-500">
            @include('profile.partials.delete-user-form')
        </section>
    </div>
@endsection
