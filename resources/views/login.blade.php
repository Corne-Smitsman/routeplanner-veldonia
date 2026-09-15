@extends('layouts.app')

@section('title', 'Inloggen')

@section('content')
    <div class="mx-auto max-w-md px-4 py-12">
        <h1 class="text-2xl font-semibold text-ink">Inloggen</h1>

        <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-5">
            @csrf

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

            <x-button full>Inloggen</x-button>
        </form>

        <p class="mt-6 text-sm text-ink-muted">
            Nog geen account?
            <a href="{{ route('register') }}" class="font-medium text-ink underline">Registreren</a>
        </p>
    </div>
@endsection
