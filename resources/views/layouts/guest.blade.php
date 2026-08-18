<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Portfolio') }} — Admin Authentication</title>

        <!-- Favicon & Icons -->
        <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
        <link rel="manifest" href="{{ asset('site.webmanifest') }}">
        <meta name="theme-color" content="#1f1f1f">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600|sora:600,700,800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-background text-foreground font-sans antialiased selection:bg-primary/30 selection:text-primary min-h-screen flex flex-col justify-center items-center py-12 px-4 relative overflow-x-hidden">
        <!-- Background Ambient Glow -->
        <div aria-hidden="true" class="pointer-events-none absolute inset-0 z-0 bg-[radial-gradient(circle_800px_at_50%_-100px,rgba(94,236,200,0.15),transparent)]"></div>

        <div class="relative z-10 w-full sm:max-w-md flex flex-col items-center">
            <!-- Brand Logo -->
            <a href="{{ route('portfolio.index') }}" class="group mb-8 flex items-center space-x-3 transition-transform hover:scale-105" title="Back to Portfolio">
                <div class="w-12 h-12 bg-primary/10 border border-primary/30 rounded-2xl flex items-center justify-center shadow-[0_0_25px_-5px_rgba(94,236,200,0.3)] group-hover:border-primary/60 transition-colors">
                    <span class="text-primary font-display font-bold text-2xl">A</span>
                </div>
                <span class="font-display font-bold text-2xl tracking-tight">aiman<span class="text-primary">.</span>admin</span>
            </a>

            <!-- Auth Form Glass Card -->
            <div class="w-full glass-card p-8 sm:p-10 rounded-3xl shadow-2xl border border-border/80 relative">
                {{ $slot }}
            </div>

            <!-- Footer link back to portfolio -->
            <div class="mt-8 text-center">
                <a href="{{ route('portfolio.index') }}" class="inline-flex items-center space-x-2 text-sm text-muted-foreground hover:text-primary transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Back to Portfolio Homepage</span>
                </a>
            </div>
        </div>
    </body>
</html>
