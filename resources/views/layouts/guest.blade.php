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
<body class="flex min-h-screen flex-col bg-surface text-ink antialiased">

<header class="px-3 pt-3 sm:px-6 sm:pt-6">
    <div class="mx-auto w-full max-w-7xl rounded-2xl bg-secondary px-5 py-4">
        <a href="{{ route('welcome') }}">
            <img src="{{ asset('images/logo-light.png') }}"
                 srcset="{{ asset('images/logo-light.png') }} 1x, {{ asset('images/logo-light@2x.png') }} 2x"
                 alt="Spoorwegen Veldonia" class="h-9 w-auto">
        </a>
    </div>
</header>

<main class="flex flex-1 items-center px-3 py-8 sm:px-6">
    <div class="mx-auto w-full max-w-md">
        {{ $slot }}
    </div>
</main>

<footer class="px-3 pb-3 sm:px-6 sm:pb-6">
    <div class="mx-auto flex w-full max-w-7xl flex-col gap-1.5 rounded-2xl bg-secondary px-5 py-5 text-xs text-secondary-400 sm:flex-row sm:justify-between">
        <p>&copy; {{ date('Y') }} Spoorwegen Veldonia</p>
        <p>Veldonia is een fictief land — schoolopdracht Software Development 3</p>
    </div>
</footer>

</body>
</html>
