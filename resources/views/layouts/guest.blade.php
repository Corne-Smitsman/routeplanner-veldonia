<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Inloggen') · Spoorwegen Veldonia</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col bg-surface-muted text-ink antialiased">

<header class="border-b-4 border-primary bg-secondary">
    <div class="mx-auto flex h-16 max-w-7xl items-center px-4 sm:px-6">
        <a href="{{ route('welcome') }}">
            <x-application-logo variant="light" class="h-9 sm:h-10"/>
        </a>
    </div>
</header>

<main class="flex flex-1 items-start justify-center px-4 py-12 sm:px-6">
    <div class="w-full max-w-md rounded-xl border border-line bg-surface p-6 sm:p-8">
        {{ $slot }}
    </div>
</main>

<footer class="border-t border-line bg-surface-muted">
    <div class="mx-auto flex max-w-7xl flex-col gap-1.5 px-4 py-6 text-xs text-ink-soft sm:flex-row sm:justify-between sm:px-6">
        <p>&copy; {{ date('Y') }} Spoorwegen Veldonia</p>
        <p>Veldonia is een fictief land — schoolopdracht Software Development 3</p>
    </div>
</footer>

</body>
</html>
