<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Muhammad Aiman Hakim — Software Engineer' }}</title>
    <meta name="description" content="{{ $description ?? 'Portfolio of Muhammad Aiman Hakim — Laravel developer building scalable web applications and backend systems.' }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600|sora:600,700,800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-foreground">
    <div id="spotlight" aria-hidden="true" class="pointer-events-none fixed inset-0 z-30 hidden md:block"></div>

    @yield('content')
</body>
</html>
