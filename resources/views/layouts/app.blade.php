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
<body class="flex min-h-screen flex-col bg-surface text-ink antialiased">

@include('partials.header')

<main class="flex-1 px-3 pb-6 sm:px-6">
    <div class="mx-auto w-full max-w-7xl space-y-6">
        @if (session('success'))
            <x-alert>{{ session('success') }}</x-alert>
        @endif

        @if (session('status'))
            <x-alert>{{ session('status') }}</x-alert>
        @endif

        @if (session('error'))
            <x-alert type="error">{{ session('error') }}</x-alert>
        @endif

        @yield('content')
    </div>
</main>

@include('partials.footer')

</body>
</html>
