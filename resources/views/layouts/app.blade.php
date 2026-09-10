{{-- User story 0.3 — Masterlayout --}}
<!doctype html>
<html lang="nl" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Welkom') · Spoorwegen Veldonia</title>
    <meta name="description" content="@yield('description', 'Plan je reis door de tien steden van Veldonia.')">
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    @vite('resources/css/app.css')
</head>
<body class="flex h-full flex-col bg-white text-rail-800 antialiased">

@include('partials.header')

<main class="flex-1">
    @yield('content')
</main>

@include('partials.footer')

</body>
</html>
