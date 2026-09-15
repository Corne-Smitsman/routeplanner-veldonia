@extends('layouts.app')

@section('title', 'Registreren')

@section('content')
    <div class="mx-auto max-w-md px-4 py-12">
        <h1 class="text-2xl font-semibold text-ink">Registreren</h1>

        <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-ink">Naam</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}"
                       class="mt-1.5 block w-full rounded-lg border border-line-strong bg-surface px-3 py-2">
                @error('name')
                <p class="mt-1.5 text-sm text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-ink">E-mailadres</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                       class="mt-1.5 block w-full rounded-lg border border-line-strong bg-surface px-3 py-2">
                @error('email')
                <p class="mt-1.5 text-sm text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-ink">Wachtwoord</label>
                <input id="password" type="password" name="password"
                       class="mt-1.5 block w-full rounded-lg border border-line-strong bg-surface px-3 py-2">
                @error('password')
                <p class="mt-1.5 text-sm text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-ink">Herhaal wachtwoord</label>
                <input id="password_confirmation" type="password" name="password_confirmation"
                       class="mt-1.5 block w-full rounded-lg border border-line-strong bg-surface px-3 py-2">
            </div>

            <x-button full>Account aanmaken</x-button>
        </form>
    </div>
@endsection
