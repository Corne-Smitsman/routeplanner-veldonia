@extends('layouts.app')

@section('title', 'Mijn profiel')

@section('content')
    <x-page-header
        title="Mijn profiel"
        subtitle="Beheer je gegevens, wachtwoord en account."
        :breadcrumbs="[['label' => 'Mijn profiel']]"/>

    <div class="grid gap-6 lg:grid-cols-3">
        <div class="self-start rounded-xl border border-line p-5 sm:p-6">
            <h2 class="font-semibold text-ink">Account</h2>
            <dl class="mt-4 divide-y divide-line text-sm">
                <div class="flex items-baseline justify-between gap-4 py-3">
                    <dt class="text-ink-muted">Naam</dt>
                    <dd class="font-medium text-ink">{{ $user->name }}</dd>
                </div>
                <div class="py-3">
                    <dt class="text-ink-muted">E-mailadres</dt>
                    <dd class="mt-1 font-medium break-words text-ink">{{ $user->email }}</dd>
                </div>
                <div class="flex items-baseline justify-between gap-4 py-3">
                    <dt class="text-ink-muted">Lid sinds</dt>
                    <dd class="font-medium tabular-nums text-ink">{{ $user->created_at->format('d-m-Y') }}</dd>
                </div>
            </dl>
        </div>

        <div class="space-y-6 lg:col-span-2">
            @include('profile.partials.update-profile-information-form')
            @include('profile.partials.update-password-form')
            @include('profile.partials.delete-user-form')
        </div>
    </div>
@endsection
