<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Admin Panel - {{ config('app.name', 'Portfolio') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600|sora:600,700,800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .sidebar-link {
            @apply flex items-center space-x-3 px-4 py-3 rounded-2xl text-muted-foreground hover:text-foreground hover:bg-white/5 transition-all duration-200 text-sm font-medium;
        }
        .sidebar-link.active {
            @apply bg-primary/10 text-primary border-l-2 border-primary font-semibold;
        }
    </style>
</head>
<body class="bg-background text-foreground font-sans antialiased">
    <div class="flex h-screen overflow-hidden" x-data="{ mobileOpen: false }">
        <!-- Sidebar -->
        <aside class="w-64 bg-card/60 backdrop-blur-xl border-r border-border flex-shrink-0 hidden lg:flex lg:flex-col justify-between">
            <div class="p-6">
                <a href="{{ route('portfolio.index') }}" class="flex items-center space-x-2 mb-8 group" target="_blank">
                    <div class="w-9 h-9 bg-primary/10 border border-primary/30 rounded-xl flex items-center justify-center transition-transform group-hover:scale-105">
                        <span class="text-primary font-display font-bold text-lg">A</span>
                    </div>
                    <span class="font-display font-bold text-lg tracking-tight">aiman<span class="text-primary">.</span>admin</span>
                </a>
                
                <nav class="space-y-1">
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span>Dashboard</span>
                    </a>
                    
                    <a href="{{ route('admin.hero.edit') }}" class="sidebar-link {{ request()->routeIs('admin.hero.*') ? 'active' : '' }}">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>Hero Section</span>
                    </a>
                    
                    <a href="{{ route('admin.about.edit') }}" class="sidebar-link {{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span>About Section</span>
                    </a>
                    
                    <a href="{{ route('admin.skills.index') }}" class="sidebar-link {{ request()->routeIs('admin.skills.*') ? 'active' : '' }}">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <span>Skills</span>
                    </a>
                    
                    <a href="{{ route('admin.projects.index') }}" class="sidebar-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <span>Projects</span>
                    </a>
                    
                    <a href="{{ route('admin.experiences.index') }}" class="sidebar-link {{ request()->routeIs('admin.experiences.*') ? 'active' : '' }}">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>Experience</span>
                    </a>
                    
                    <a href="{{ route('admin.services.index') }}" class="sidebar-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>Services</span>
                    </a>
                    
                    <a href="{{ route('admin.testimonials.index') }}" class="sidebar-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                        <span>Testimonials</span>
                    </a>
                    
                    <a href="{{ route('admin.contact.messages') }}" class="sidebar-link {{ request()->routeIs('admin.contact.messages*') ? 'active' : '' }}">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>Messages</span>
                        @php
                            $unreadCount = \App\Models\ContactMessage::where('is_read', false)->count();
                        @endphp
                        @if($unreadCount > 0)
                        <span class="ml-auto bg-primary text-primary-foreground text-xs font-bold px-2 py-0.5 rounded-full">{{ $unreadCount }}</span>
                        @endif
                    </a>
                    
                    <a href="{{ route('admin.contact.info') }}" class="sidebar-link {{ request()->routeIs('admin.contact.info') ? 'active' : '' }}">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>Contact Info</span>
                    </a>
                </nav>
            </div>
            
            <!-- User Section -->
            <div class="p-6 border-t border-border bg-card/30">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-primary/10 border border-primary/30 rounded-full flex items-center justify-center">
                        <span class="text-primary font-display font-bold">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-muted-foreground truncate">{{ Auth::user()->email }}</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" title="Logout" class="text-muted-foreground hover:text-primary transition-colors p-1.5 rounded-lg hover:bg-white/5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                <a href="{{ route('portfolio.index') }}" class="flex items-center space-x-2" target="_blank">
                    <div class="w-8 h-8 bg-primary/10 border border-primary/30 rounded-lg flex items-center justify-center">
                        <span class="text-primary font-bold">A</span>
                    </div>
                    <span class="font-display font-bold">aiman<span class="text-primary">.</span>admin</span>
                </a>
                <button @click="mobileOpen = !mobileOpen" class="text-foreground p-2 rounded-lg border border-border">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            
            <!-- Mobile Sidebar Drawer -->
            <div x-show="mobileOpen" x-cloak class="lg:hidden fixed inset-0 z-50 bg-background/95 backdrop-blur-xl p-6 overflow-y-auto">
                <div class="flex items-center justify-between mb-6 pb-4 border-b border-border">
                    <span class="font-display font-bold text-lg">aiman<span class="text-primary">.</span>admin</span>
                    <button @click="mobileOpen = false" class="text-muted-foreground hover:text-foreground">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <nav class="space-y-1">
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
                    <a href="{{ route('admin.hero.edit') }}" class="sidebar-link {{ request()->routeIs('admin.hero.*') ? 'active' : '' }}">Hero Section</a>
                    <a href="{{ route('admin.about.edit') }}" class="sidebar-link {{ request()->routeIs('admin.about.*') ? 'active' : '' }}">About Section</a>
                    <a href="{{ route('admin.skills.index') }}" class="sidebar-link {{ request()->routeIs('admin.skills.*') ? 'active' : '' }}">Skills</a>
                    <a href="{{ route('admin.projects.index') }}" class="sidebar-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">Projects</a>
                    <a href="{{ route('admin.experiences.index') }}" class="sidebar-link {{ request()->routeIs('admin.experiences.*') ? 'active' : '' }}">Experience</a>
                    <a href="{{ route('admin.services.index') }}" class="sidebar-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">Services</a>
                    <a href="{{ route('admin.testimonials.index') }}" class="sidebar-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">Testimonials</a>
                    <a href="{{ route('admin.contact.messages') }}" class="sidebar-link {{ request()->routeIs('admin.contact.messages*') ? 'active' : '' }}">Messages</a>
                    <a href="{{ route('admin.contact.info') }}" class="sidebar-link {{ request()->routeIs('admin.contact.info') ? 'active' : '' }}">Contact Info</a>
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