<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel - {{ config('app.name', 'Portfolio') }}</title>

    <!-- Favicon & Icons -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <meta name="theme-color" content="#1f1f1f">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600|plus-jakarta-sans:600,700,800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .sidebar-group-label {
            @apply px-4 text-[10.5px] font-bold uppercase tracking-wider text-muted-foreground/60;
        }
    </style>
</head>
<body class="bg-background text-foreground font-sans antialiased">
    <div
        class="flex h-screen overflow-hidden"
        x-data="{
            mobileOpen: false,
            collapsed: localStorage.getItem('sidebarCollapsed') === 'true'
        }"
        x-effect="localStorage.setItem('sidebarCollapsed', collapsed)"
    >
        <!-- Sidebar -->
        <aside
            :class="collapsed ? 'w-[76px]' : 'w-64'"
            class="relative hidden lg:flex lg:flex-col justify-between flex-shrink-0 bg-gradient-to-b from-[#0D1117] via-card/70 to-[#0B0F14] backdrop-blur-xl border-r border-border transition-[width] duration-300 ease-in-out z-30"
        >
            <!-- Collapse toggle -->
            <button
                @click="collapsed = !collapsed"
                class="absolute -right-3 top-9 z-40 grid place-items-center w-6 h-6 rounded-full bg-card border border-border text-muted-foreground hover:text-primary hover:border-primary/40 transition-colors shadow-lg cursor-pointer"
                :title="collapsed ? 'Expand sidebar' : 'Collapse sidebar'"
            >
                <svg class="w-3.5 h-3.5 transition-transform duration-300 shrink-0" :class="collapsed ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <div class="p-4 overflow-y-auto">
                <!-- Logo / Branded Card -->
                <a href="{{ route('portfolio.index') }}" class="flex items-center gap-3 mb-7 px-2 py-1.5 group rounded-2xl hover:bg-white/[0.03] transition-colors" :class="collapsed ? 'justify-center' : ''" target="_blank" title="View Portfolio Website">
                    <div class="relative shrink-0">
                        <div class="w-10 h-10 bg-primary/10 border border-primary/30 rounded-xl flex items-center justify-center transition-transform group-hover:scale-105 shadow-[0_0_20px_-4px_rgba(94,236,200,0.3)]">
                            <span class="text-primary font-display font-bold text-lg">A</span>
                        </div>
                        <span class="absolute -bottom-0.5 -right-0.5 w-2.5 h-2.5 bg-primary rounded-full ring-2 ring-background"></span>
                    </div>
                    <div x-show="!collapsed" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="min-w-0">
                        <span class="font-display font-bold text-base tracking-tight block text-foreground leading-snug">Portfolio CMS</span>
                        <span class="text-xs text-muted-foreground block truncate">Muhammad Aiman</span>
                    </div>
                </a>

                <!-- Nav -->
                <nav class="space-y-6">
                    <!-- Overview -->
                    <div class="space-y-1">
                        <p x-show="!collapsed" class="sidebar-group-label mb-2">Overview</p>
                        
                        <a
                            href="{{ route('admin.dashboard') }}"
                            title="Dashboard"
                            class="flex items-center gap-3 h-11 px-4 rounded-xl text-sm font-medium transition-all duration-200 cursor-pointer {{ request()->routeIs('admin.dashboard') ? 'bg-white/[0.08] text-foreground font-semibold shadow-[inset_3px_0_0_0_theme(colors.primary.DEFAULT)]' : 'text-muted-foreground hover:text-foreground hover:bg-white/[0.04] hover:translate-x-0.5' }}"
                            :class="collapsed ? 'justify-center px-0' : ''"
                        >
                            <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.dashboard') ? 'text-primary' : 'text-muted-foreground' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span x-show="!collapsed" class="whitespace-nowrap">Dashboard</span>
                        </a>
                    </div>

                    <!-- Content -->
                    <div class="space-y-1">
                        <p x-show="!collapsed" class="sidebar-group-label mb-2">Content</p>

                        <a
                            href="{{ route('admin.hero.edit') }}"
                            title="Hero Section"
                            class="flex items-center gap-3 h-11 px-4 rounded-xl text-sm font-medium transition-all duration-200 cursor-pointer {{ request()->routeIs('admin.hero.*') ? 'bg-white/[0.08] text-foreground font-semibold shadow-[inset_3px_0_0_0_theme(colors.primary.DEFAULT)]' : 'text-muted-foreground hover:text-foreground hover:bg-white/[0.04] hover:translate-x-0.5' }}"
                            :class="collapsed ? 'justify-center px-0' : ''"
                        >
                            <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.hero.*') ? 'text-primary' : 'text-muted-foreground' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span x-show="!collapsed" class="whitespace-nowrap">Hero Section</span>
                        </a>

                        <a
                            href="{{ route('admin.about.edit') }}"
                            title="About Section"
                            class="flex items-center gap-3 h-11 px-4 rounded-xl text-sm font-medium transition-all duration-200 cursor-pointer {{ request()->routeIs('admin.about.*') ? 'bg-white/[0.08] text-foreground font-semibold shadow-[inset_3px_0_0_0_theme(colors.primary.DEFAULT)]' : 'text-muted-foreground hover:text-foreground hover:bg-white/[0.04] hover:translate-x-0.5' }}"
                            :class="collapsed ? 'justify-center px-0' : ''"
                        >
                            <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.about.*') ? 'text-primary' : 'text-muted-foreground' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span x-show="!collapsed" class="whitespace-nowrap">About Section</span>
                        </a>

                        <a
                            href="{{ route('admin.skills.index') }}"
                            title="Skills"
                            class="flex items-center gap-3 h-11 px-4 rounded-xl text-sm font-medium transition-all duration-200 cursor-pointer {{ request()->routeIs('admin.skills.*') ? 'bg-white/[0.08] text-foreground font-semibold shadow-[inset_3px_0_0_0_theme(colors.primary.DEFAULT)]' : 'text-muted-foreground hover:text-foreground hover:bg-white/[0.04] hover:translate-x-0.5' }}"
                            :class="collapsed ? 'justify-center px-0' : ''"
                        >
                            <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.skills.*') ? 'text-primary' : 'text-muted-foreground' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            <span x-show="!collapsed" class="whitespace-nowrap">Skills</span>
                        </a>

                        <a
                            href="{{ route('admin.projects.index') }}"
                            title="Projects"
                            class="flex items-center gap-3 h-11 px-4 rounded-xl text-sm font-medium transition-all duration-200 cursor-pointer {{ request()->routeIs('admin.projects.*') ? 'bg-white/[0.08] text-foreground font-semibold shadow-[inset_3px_0_0_0_theme(colors.primary.DEFAULT)]' : 'text-muted-foreground hover:text-foreground hover:bg-white/[0.04] hover:translate-x-0.5' }}"
                            :class="collapsed ? 'justify-center px-0' : ''"
                        >
                            <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.projects.*') ? 'text-primary' : 'text-muted-foreground' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            <span x-show="!collapsed" class="whitespace-nowrap">Projects</span>
                        </a>

                        <a
                            href="{{ route('admin.experiences.index') }}"
                            title="Experience"
                            class="flex items-center gap-3 h-11 px-4 rounded-xl text-sm font-medium transition-all duration-200 cursor-pointer {{ request()->routeIs('admin.experiences.*') ? 'bg-white/[0.08] text-foreground font-semibold shadow-[inset_3px_0_0_0_theme(colors.primary.DEFAULT)]' : 'text-muted-foreground hover:text-foreground hover:bg-white/[0.04] hover:translate-x-0.5' }}"
                            :class="collapsed ? 'justify-center px-0' : ''"
                        >
                            <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.experiences.*') ? 'text-primary' : 'text-muted-foreground' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span x-show="!collapsed" class="whitespace-nowrap">Experience</span>
                        </a>

                        <a
                            href="{{ route('admin.services.index') }}"
                            title="Services"
                            class="flex items-center gap-3 h-11 px-4 rounded-xl text-sm font-medium transition-all duration-200 cursor-pointer {{ request()->routeIs('admin.services.*') ? 'bg-white/[0.08] text-foreground font-semibold shadow-[inset_3px_0_0_0_theme(colors.primary.DEFAULT)]' : 'text-muted-foreground hover:text-foreground hover:bg-white/[0.04] hover:translate-x-0.5' }}"
                            :class="collapsed ? 'justify-center px-0' : ''"
                        >
                            <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.services.*') ? 'text-primary' : 'text-muted-foreground' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span x-show="!collapsed" class="whitespace-nowrap">Services</span>
                        </a>
                    </div>

                    <!-- Engagement -->
                    <div class="space-y-1">
                        <p x-show="!collapsed" class="sidebar-group-label mb-2">Engagement</p>

                        <a
                            href="{{ route('admin.testimonials.index') }}"
                            title="Testimonials"
                            class="flex items-center gap-3 h-11 px-4 rounded-xl text-sm font-medium transition-all duration-200 cursor-pointer {{ request()->routeIs('admin.testimonials.*') ? 'bg-white/[0.08] text-foreground font-semibold shadow-[inset_3px_0_0_0_theme(colors.primary.DEFAULT)]' : 'text-muted-foreground hover:text-foreground hover:bg-white/[0.04] hover:translate-x-0.5' }}"
                            :class="collapsed ? 'justify-center px-0' : ''"
                        >
                            <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.testimonials.*') ? 'text-primary' : 'text-muted-foreground' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                            <span x-show="!collapsed" class="whitespace-nowrap">Testimonials</span>
                        </a>

                        @php
                            $unreadCount = \App\Models\ContactMessage::where('is_read', false)->count();
                        @endphp
                        <a
                            href="{{ route('admin.contact.messages') }}"
                            title="Messages"
                            class="flex items-center gap-3 h-11 px-4 rounded-xl text-sm font-medium transition-all duration-200 cursor-pointer {{ request()->routeIs('admin.contact.messages*') ? 'bg-white/[0.08] text-foreground font-semibold shadow-[inset_3px_0_0_0_theme(colors.primary.DEFAULT)]' : 'text-muted-foreground hover:text-foreground hover:bg-white/[0.04] hover:translate-x-0.5' }}"
                            :class="collapsed ? 'justify-center px-0' : ''"
                        >
                            <div class="relative shrink-0 flex items-center justify-center">
                                <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.contact.messages*') ? 'text-primary' : 'text-muted-foreground' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                @if($unreadCount > 0)
                                <span x-show="collapsed" class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-primary rounded-full ring-2 ring-card"></span>
                                @endif
                            </div>
                            <span x-show="!collapsed" class="whitespace-nowrap">Messages</span>
                            @if($unreadCount > 0)
                            <span x-show="!collapsed" class="ml-auto bg-primary text-primary-foreground text-xs font-bold px-2 py-0.5 rounded-full shrink-0">{{ $unreadCount }}</span>
                            @endif
                        </a>
                    </div>

                    <!-- Settings -->
                    <div class="space-y-1">
                        <p x-show="!collapsed" class="sidebar-group-label mb-2">Settings</p>

                        <a
                            href="{{ route('admin.contact.info') }}"
                            title="Contact Info"
                            class="flex items-center gap-3 h-11 px-4 rounded-xl text-sm font-medium transition-all duration-200 cursor-pointer {{ request()->routeIs('admin.contact.info') ? 'bg-white/[0.08] text-foreground font-semibold shadow-[inset_3px_0_0_0_theme(colors.primary.DEFAULT)]' : 'text-muted-foreground hover:text-foreground hover:bg-white/[0.04] hover:translate-x-0.5' }}"
                            :class="collapsed ? 'justify-center px-0' : ''"
                        >
                            <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.contact.info') ? 'text-primary' : 'text-muted-foreground' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span x-show="!collapsed" class="whitespace-nowrap">Contact Info</span>
                        </a>
                    </div>
                </nav>
            </div>

            <!-- User Section / Card -->
            <div class="p-3.5 border-t border-border bg-card/40">
                <div class="flex items-center gap-3 p-1.5 rounded-2xl" :class="collapsed ? 'justify-center' : ''">
                    <div class="relative shrink-0">
                        <div class="w-10 h-10 bg-primary/10 border border-primary/30 rounded-full flex items-center justify-center">
                            <span class="text-primary font-display font-bold text-sm">{{ collect(explode(' ', Auth::user()->name))->map(fn($n) => strtoupper($n[0]))->take(2)->implode('') }}</span>
                        </div>
                        <span class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-primary rounded-full ring-2 ring-card" title="Online"></span>
                    </div>
                    <div x-show="!collapsed" x-transition:enter="transition ease-out duration-150" class="flex-1 min-w-0">
                        <p class="text-sm font-semibold truncate text-foreground">{{ Str::title(Auth::user()->name) }}</p>
                        <p class="text-xs text-primary/80 font-medium truncate">{{ Auth::user()->title ?? 'Administrator' }}</p>
                    </div>
                    <form x-show="!collapsed" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" title="Logout" class="text-muted-foreground hover:text-primary transition-colors p-2 rounded-xl hover:bg-white/5 cursor-pointer">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <!-- Mobile Header -->
            <div class="lg:hidden bg-card/70 backdrop-blur-xl border-b border-border p-4 flex items-center justify-between sticky top-0 z-40">
                <a href="{{ route('portfolio.index') }}" class="flex items-center gap-2" target="_blank">
                    <div class="w-8 h-8 bg-primary/10 border border-primary/30 rounded-lg flex items-center justify-center shrink-0">
                        <span class="text-primary font-bold">A</span>
                    </div>
                    <span class="font-display font-bold whitespace-nowrap">aiman<span class="text-primary">.</span>admin</span>
                </a>
                <button @click="mobileOpen = !mobileOpen" class="text-foreground p-2 rounded-lg border border-border cursor-pointer shrink-0">
                    <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Sidebar Drawer -->
            <div x-show="mobileOpen" x-cloak
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 class="lg:hidden fixed inset-0 z-50 bg-background/95 backdrop-blur-xl p-6 overflow-y-auto">
                <div class="flex items-center justify-between mb-6 pb-4 border-b border-border">
                    <span class="font-display font-bold text-lg whitespace-nowrap">aiman<span class="text-primary">.</span>admin</span>
                    <button @click="mobileOpen = false" class="text-muted-foreground hover:text-foreground p-1 shrink-0">
                        <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <nav class="space-y-6">
                    <div class="space-y-1">
                        <p class="sidebar-group-label mb-2">Overview</p>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 h-11 px-4 rounded-xl text-sm font-medium {{ request()->routeIs('admin.dashboard') ? 'bg-white/[0.08] text-foreground font-semibold shadow-[inset_3px_0_0_0_theme(colors.primary.DEFAULT)]' : 'text-muted-foreground hover:text-foreground hover:bg-white/[0.04]' }}">
                            <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.dashboard') ? 'text-primary' : 'text-muted-foreground' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                            <span class="whitespace-nowrap">Dashboard</span>
                        </a>
                    </div>
                    <div class="space-y-1">
                        <p class="sidebar-group-label mb-2">Content</p>
                        <a href="{{ route('admin.hero.edit') }}" class="flex items-center gap-3 h-11 px-4 rounded-xl text-sm font-medium {{ request()->routeIs('admin.hero.*') ? 'bg-white/[0.08] text-foreground font-semibold shadow-[inset_3px_0_0_0_theme(colors.primary.DEFAULT)]' : 'text-muted-foreground hover:text-foreground hover:bg-white/[0.04]' }}">
                            <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.hero.*') ? 'text-primary' : 'text-muted-foreground' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            <span class="whitespace-nowrap">Hero Section</span>
                        </a>
                        <a href="{{ route('admin.about.edit') }}" class="flex items-center gap-3 h-11 px-4 rounded-xl text-sm font-medium {{ request()->routeIs('admin.about.*') ? 'bg-white/[0.08] text-foreground font-semibold shadow-[inset_3px_0_0_0_theme(colors.primary.DEFAULT)]' : 'text-muted-foreground hover:text-foreground hover:bg-white/[0.04]' }}">
                            <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.about.*') ? 'text-primary' : 'text-muted-foreground' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                            <span class="whitespace-nowrap">About Section</span>
                        </a>
                        <a href="{{ route('admin.skills.index') }}" class="flex items-center gap-3 h-11 px-4 rounded-xl text-sm font-medium {{ request()->routeIs('admin.skills.*') ? 'bg-white/[0.08] text-foreground font-semibold shadow-[inset_3px_0_0_0_theme(colors.primary.DEFAULT)]' : 'text-muted-foreground hover:text-foreground hover:bg-white/[0.04]' }}">
                            <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.skills.*') ? 'text-primary' : 'text-muted-foreground' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                            <span class="whitespace-nowrap">Skills</span>
                        </a>
                        <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-3 h-11 px-4 rounded-xl text-sm font-medium {{ request()->routeIs('admin.projects.*') ? 'bg-white/[0.08] text-foreground font-semibold shadow-[inset_3px_0_0_0_theme(colors.primary.DEFAULT)]' : 'text-muted-foreground hover:text-foreground hover:bg-white/[0.04]' }}">
                            <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.projects.*') ? 'text-primary' : 'text-muted-foreground' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                            <span class="whitespace-nowrap">Projects</span>
                        </a>
                        <a href="{{ route('admin.experiences.index') }}" class="flex items-center gap-3 h-11 px-4 rounded-xl text-sm font-medium {{ request()->routeIs('admin.experiences.*') ? 'bg-white/[0.08] text-foreground font-semibold shadow-[inset_3px_0_0_0_theme(colors.primary.DEFAULT)]' : 'text-muted-foreground hover:text-foreground hover:bg-white/[0.04]' }}">
                            <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.experiences.*') ? 'text-primary' : 'text-muted-foreground' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            <span class="whitespace-nowrap">Experience</span>
                        </a>
                        <a href="{{ route('admin.services.index') }}" class="flex items-center gap-3 h-11 px-4 rounded-xl text-sm font-medium {{ request()->routeIs('admin.services.*') ? 'bg-white/[0.08] text-foreground font-semibold shadow-[inset_3px_0_0_0_theme(colors.primary.DEFAULT)]' : 'text-muted-foreground hover:text-foreground hover:bg-white/[0.04]' }}">
                            <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.services.*') ? 'text-primary' : 'text-muted-foreground' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            <span class="whitespace-nowrap">Services</span>
                        </a>
                    </div>
                    <div class="space-y-1">
                        <p class="sidebar-group-label mb-2">Engagement</p>
                        <a href="{{ route('admin.testimonials.index') }}" class="flex items-center gap-3 h-11 px-4 rounded-xl text-sm font-medium {{ request()->routeIs('admin.testimonials.*') ? 'bg-white/[0.08] text-foreground font-semibold shadow-[inset_3px_0_0_0_theme(colors.primary.DEFAULT)]' : 'text-muted-foreground hover:text-foreground hover:bg-white/[0.04]' }}">
                            <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.testimonials.*') ? 'text-primary' : 'text-muted-foreground' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" /></svg>
                            <span class="whitespace-nowrap">Testimonials</span>
                        </a>
                        <a href="{{ route('admin.contact.messages') }}" class="flex items-center gap-3 h-11 px-4 rounded-xl text-sm font-medium {{ request()->routeIs('admin.contact.messages*') ? 'bg-white/[0.08] text-foreground font-semibold shadow-[inset_3px_0_0_0_theme(colors.primary.DEFAULT)]' : 'text-muted-foreground hover:text-foreground hover:bg-white/[0.04]' }}">
                            <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.contact.messages*') ? 'text-primary' : 'text-muted-foreground' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            <span class="whitespace-nowrap">Messages</span>
                            @if($unreadCount > 0)<span class="ml-auto bg-primary text-primary-foreground text-xs font-bold px-2 py-0.5 rounded-full shrink-0">{{ $unreadCount }}</span>@endif
                        </a>
                    </div>
                    <div class="space-y-1">
                        <p class="sidebar-group-label mb-2">Settings</p>
                        <a href="{{ route('admin.contact.info') }}" class="flex items-center gap-3 h-11 px-4 rounded-xl text-sm font-medium {{ request()->routeIs('admin.contact.info') ? 'bg-white/[0.08] text-foreground font-semibold shadow-[inset_3px_0_0_0_theme(colors.primary.DEFAULT)]' : 'text-muted-foreground hover:text-foreground hover:bg-white/[0.04]' }}">
                            <svg class="w-5 h-5 shrink-0 {{ request()->routeIs('admin.contact.info') ? 'text-primary' : 'text-muted-foreground' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            <span class="whitespace-nowrap">Contact Info</span>
                        </a>
                    </div>
                </nav>
            </div>

            <!-- Page Content -->
            <div class="p-6 lg:p-10 max-w-7xl mx-auto">
                @if(session('success'))
                <div class="mb-6 glass-card border-primary/40 p-4 rounded-2xl flex items-center space-x-3 bg-primary/10">
                    <svg class="w-5 h-5 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-sm font-medium">{{ session('success') }}</p>
                </div>
                @endif

                @if($errors->any())
                <div class="mb-6 glass-card border-red-500/40 p-4 rounded-2xl bg-red-500/10">
                    <ul class="list-disc list-inside text-sm text-red-400 space-y-1">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @yield('admin-content')
            </div>
        </main>
    </div>
</body>
</html>