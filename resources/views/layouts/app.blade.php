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
    @if (session('success'))
        <div class="mx-auto max-w-7xl px-4 pt-6 sm:px-6">
            <div class="rounded-xl border border-primary-200 bg-primary-50 px-5 py-3 text-sm font-medium text-primary">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="mx-auto max-w-7xl px-4 pt-6 sm:px-6">
            <div class="rounded-xl border border-danger-100 bg-danger-50 px-5 py-3 text-sm font-medium text-danger-700">
                {{ session('error') }}
            </div>
        </div>
    @endif

    @yield('content')
</main>

@include('partials.footer')

</body>
</html>
