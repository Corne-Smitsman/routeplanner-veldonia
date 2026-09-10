<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Home') · Spoorwegen Veldonia</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col bg-surface-muted text-ink antialiased">

@include('partials.header')

<main class="flex-1">
    @if (session('status') || session('success'))
        <div class="mx-auto max-w-7xl px-4 pt-6 sm:px-6">
            <x-alert>{{ session('status') ?? session('success') }}</x-alert>
        </div>
    @endif

    @if (session('error'))
        <div class="mx-auto max-w-7xl px-4 pt-6 sm:px-6">
            <x-alert type="error">{{ session('error') }}</x-alert>
        </div>
    @endif

    @yield('content')
</main>

@include('partials.footer')

</body>
</html>
