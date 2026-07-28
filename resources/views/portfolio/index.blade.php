@extends('layouts.app')

@section('content')
<!-- Navigation -->
<nav x-data="{ scrolled: false, mobileOpen: false }" 
     @scroll.window="scrolled = window.pageYOffset > 50"
     :class="{ 'bg-dark/90 backdrop-blur-xl shadow-lg': scrolled }"
     class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <a href="#" class="flex items-center space-x-2">
                <div class="w-10 h-10 bg-accent rounded-lg flex items-center justify-center">
                    <span class="text-dark font-bold text-xl">M</span>
                </div>
                <span class="font-heading font-bold text-xl text-white">Aiman<span class="text-accent">.</span></span>
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="#home" class="text-text-secondary hover:text-accent transition-colors duration-300 text-sm font-medium">Home</a>
                <a href="#about" class="text-text-secondary hover:text-accent transition-colors duration-300 text-sm font-medium">About</a>
                <a href="#skills" class="text-text-secondary hover:text-accent transition-colors duration-300 text-sm font-medium">Skills</a>
                <a href="#experience" class="text-text-secondary hover:text-accent transition-colors duration-300 text-sm font-medium">Experience</a>
                <a href="#projects" class="text-text-secondary hover:text-accent transition-colors duration-300 text-sm font-medium">Projects</a>
                <a href="#services" class="text-text-secondary hover:text-accent transition-colors duration-300 text-sm font-medium">Services</a>
                <a href="#contact" class="text-text-secondary hover:text-accent transition-colors duration-300 text-sm font-medium">Contact</a>
                <a href="/admin" class="btn-primary text-sm">
                    <span class="flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span>Resume</span>
                    </span>
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button @click="mobileOpen = !mobileOpen" class="md:hidden text-white">
                <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="md:hidden bg-dark-secondary border-t border-glass-border">
        <div class="px-4 py-4 space-y-3">
            <a href="#home" @click="mobileOpen = false" class="block text-text-secondary hover:text-accent transition-colors py-2">Home</a>
            <a href="#about" @click="mobileOpen = false" class="block text-text-secondary hover:text-accent transition-colors py-2">About</a>
            <a href="#skills" @click="mobileOpen = false" class="block text-text-secondary hover:text-accent transition-colors py-2">Skills</a>
            <a href="#experience" @click="mobileOpen = false" class="block text-text-secondary hover:text-accent transition-colors py-2">Experience</a>
            <a href="#projects" @click="mobileOpen = false" class="block text-text-secondary hover:text-accent transition-colors py-2">Projects</a>
            <a href="#services" @click="mobileOpen = false" class="block text-text-secondary hover:text-accent transition-colors py-2">Services</a>
            <a href="#contact" @click="mobileOpen = false" class="block text-text-secondary hover:text-accent transition-colors py-2">Contact</a>
            <a href="/admin" class="btn-primary block text-center w-full">Resume</a>
        </div>
    </div>
</nav>

<!-- Particles Background -->
<canvas id="particles-canvas" class="fixed inset-0 pointer-events-none"></canvas>

<!-- Hero Section -->
<section id="home" class="relative min-h-screen flex items-center overflow-hidden spotlight-container">
    <!-- Gradient Orbs -->
    <div class="absolute top-20 left-10 w-96 h-96 bg-accent/10 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-accent/5 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div class="space-y-8" data-aos="fade-up" data-aos-duration="1000">
                <div class="space-y-2">
                    <h1 class="section-heading text-white">
                        Build<br>
                        <span class="relative inline-block">
                            <span class="relative z-10 text-transparent bg-clip-text bg-gradient-to-r from-accent to-cyan-400">
                                Digital
                            </span>
                            <span class="absolute -inset-1 bg-accent/20 blur-lg rounded-lg"></span>
                        </span><br>
                        Solutions
                    </h1>
                </div>
                
                <div class="h-8">
                    <span id="typing-text" class="text-accent text-xl font-semibold"></span>
                    <span class="animate-pulse text-accent">|</span>
                </div>
                
                <p class="text-text-secondary text-lg leading-relaxed max-w-lg">
                    I build scalable web applications, backend systems, and modern digital solutions with clean architecture, performance, and great user experiences.
                </p>
                
                <div class="flex flex-wrap gap-4">
                    <a href="#projects" class="btn-primary group">
                        <span class="flex items-center space-x-2">
                            <span>View Projects</span>
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </span>
                    </a>
                    <a href="#contact" class="btn-outline">
                        Contact Me
                    </a>
                </div>
                
                <!-- Social Links -->
                <div class="flex items-center space-x-4 pt-4">
                    <a href="{{ $contactInfo->github_url ?? '#' }}" class="w-10 h-10 glass-card flex items-center justify-center hover:border-accent transition-all duration-300 group">
                        <svg class="w-5 h-5 text-text-secondary group-hover:text-accent transition-colors" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                    </a>
                    <a href="{{ $contactInfo->linkedin_url ?? '#' }}" class="w-10 h-10 glass-card flex items-center justify-center hover:border-accent transition-all duration-300 group">
                        <svg class="w-5 h-5 text-text-secondary group-hover:text-accent transition-colors" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                    <a href="mailto:{{ $contactInfo->email ?? '#' }}" class="w-10 h-10 glass-card flex items-center justify-center hover:border-accent transition-all duration-300 group">
                        <svg class="w-5 h-5 text-text-secondary group-hover:text-accent transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Right Content - Profile Image -->
            <div class="relative" data-aos="fade-left" data-aos-duration="1000">
                <div class="relative w-80 h-80 md:w-96 md:h-96 mx-auto">
                    <!-- Glowing Border -->
                    <div class="absolute inset-0 rounded-full bg-gradient-to-r from-accent via-cyan-400 to-accent animate-pulse blur-xl opacity-50"></div>
                    <!-- Image Container -->
                    <div class="relative w-full h-full rounded-full overflow-hidden border-2 border-accent/30">
                        <div class="w-full h-full bg-gradient-to-br from-dark-secondary to-dark-card flex items-center justify-center">
                            <span class="text-8xl font-heading font-bold text-accent/20">AH</span>
                        </div>
                    </div>
                    <!-- Floating Elements -->
                    <div class="absolute -top-4 -right-4 w-20 h-20 glass-card rounded-full flex items-center justify-center animate-float" style="animation-delay: 0s;">
                        <span class="text-2xl">🚀</span>
                    </div>
                    <div class="absolute -bottom-4 -left-4 w-16 h-16 glass-card rounded-full flex items-center justify-center animate-float" style="animation-delay: 1s;">
                        <span class="text-xl">💻</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="relative py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="section-heading mb-4">
                About <span class="text-gradient">Me</span>
            </h2>
            <div class="w-24 h-1 bg-accent mx-auto rounded-full"></div>
        </div>
        
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <!-- Image -->
            <div class="relative" data-aos="fade-right">
                <div class="relative w-full max-w-md mx-auto">
                    <div class="aspect-square rounded-2xl overflow-hidden glow-border">
                        <div class="w-full h-full bg-gradient-to-br from-dark-secondary to-dark-card flex items-center justify-center">
                            <span class="text-9xl font-heading font-bold text-accent/10">AH</span>
                        </div>
                    </div>
                    <!-- Experience Badge -->
                    <div class="absolute -bottom-6 -right-6 glass-card px-6 py-4 rounded-xl">
                        <div class="text-3xl font-bold text-accent">2+</div>
                        <div class="text-sm text-text-secondary">Years Learning</div>
                    </div>
                </div>
            </div>
            
            <!-- Content -->
            <div class="space-y-6" data-aos="fade-left">
                <h3 class="text-3xl font-heading font-bold">
                    Hi, I'm <span class="text-gradient">Muhammad Aiman Hakim</span>
                </h3>
                <p class="text-text-secondary leading-relaxed">
                    A software engineer passionate about creating scalable backend systems, elegant web applications, and solving real-world problems using modern technologies.
                </p>
                <p class="text-text-secondary leading-relaxed">
                    I enjoy working with Laravel, PHP, MySQL, JavaScript, Tailwind CSS, REST APIs, and cloud technologies while continuously learning new frameworks and best practices.
                </p>
                
                <!-- Stats -->
                <div class="grid grid-cols-2 gap-4 pt-4">
                    <div class="glass-card p-4 rounded-xl hover:border-accent transition-all duration-300">
                        <div class="text-2xl font-bold text-accent">10+</div>
                        <div class="text-sm text-text-secondary">Projects</div>
                    </div>
                    <div class="glass-card p-4 rounded-xl hover:border-accent transition-all duration-300">
                        <div class="text-2xl font-bold text-accent">2+</div>
                        <div class="text-sm text-text-secondary">Years Learning</div>
                    </div>
                    <div class="glass-card p-4 rounded-xl hover:border-accent transition-all duration-300">
                        <div class="text-2xl font-bold text-accent">Expert</div>
                        <div class="text-sm text-text-secondary">Laravel</div>
                    </div>
                    <div class="glass-card p-4 rounded-xl hover:border-accent transition-all duration-300">
                        <div class="text-2xl font-bold text-accent">Full Stack</div>
                        <div class="text-sm text-text-secondary">Development</div>
                    </div>
                </div>
                
                <a href="#contact" class="btn-primary inline-block">
                    Let's Work Together
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="relative py-20 bg-dark-secondary/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="section-heading mb-4">
                My <span class="text-gradient">Skills</span>
            </h2>
            <p class="text-text-secondary max-w-2xl mx-auto">Technologies and tools I work with to bring ideas to life</p>
        </div>
        
        @php
            $skillCategories = [
                'backend' => ['title' => 'Backend', 'icon' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4'],
                'frontend' => ['title' => 'Frontend', 'icon' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                'tools' => ['title' => 'Tools', 'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z'],
                'networking' => ['title' => 'Networking', 'icon' => 'M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.858 15.355-5.858 21.213 0']
            ];
        @endphp
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($skillCategories as $key => $category)
            <div class="glass-card p-6 rounded-xl hover:scale-105 transition-all duration-300 group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center mb-4 group-hover:bg-accent/20 transition-colors">
                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $category['icon'] }}" />
                    </svg>
                </div>
                <h3 class="text-xl font-heading font-bold mb-4">{{ $category['title'] }}</h3>
                <div class="space-y-2">
                    @foreach($skills[$key] ?? [] as $skill)
                    <div class="flex items-center justify-between group/skill">
                        <span class="text-text-secondary group-hover/skill:text-white transition-colors">{{ $skill->name }}</span>
                        <div class="w-24 h-1.5 bg-dark rounded-full overflow-hidden">
                            <div class="h-full bg-accent rounded-full transition-all duration-1000" style="width: {{ $skill->proficiency }}%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Experience Section -->
<section id="experience" class="relative py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="section-heading mb-4">
                Work <span class="text-gradient">Experience</span>
            </h2>
            <p class="text-text-secondary">My professional journey so far</p>
        </div>
        
        <div class="max-w-3xl mx-auto">
            @foreach($experiences as $experience)
            <div class="relative pl-8 pb-12 last:pb-0" data-aos="fade-up">
                <!-- Timeline Line -->
                @if(!$loop->last)
                <div class="absolute left-[11px] top-10 bottom-0 w-0.5 bg-accent/20"></div>
                @endif
                
                <!-- Timeline Dot -->
                <div class="absolute left-0 top-2 w-6 h-6 rounded-full border-2 border-accent bg-dark flex items-center justify-center">
                    <div class="w-2 h-2 rounded-full bg-accent"></div>
                </div>
                
                <!-- Content -->
                <div class="glass-card p-6 rounded-xl hover:border-accent transition-all duration-300">
                    <div class="flex flex-wrap items-start justify-between gap-4 mb-3">
                        <div>
                            <h3 class="text-xl font-heading font-bold text-white">{{ $experience->title }}</h3>
                            <p class="text-accent font-medium">{{ $experience->company }}</p>
                        </div>
                        <span class="glass-card px-3 py-1 rounded-full text-sm text-text-secondary">
                            {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }} - 
                            {{ $experience->is_current ? 'Present' : \Carbon\Carbon::parse($experience->end_date)->format('M Y') }}
                        </span>
                    </div>
                    <p class="text-text-secondary mb-4">{{ $experience->description }}</p>
                    @if($experience->responsibilities)
                    <ul class="space-y-2">
                        @foreach((array) $experience->responsibilities as $responsibility)
                        <li class="flex items-start space-x-2 text-text-secondary">
                            <svg class="w-5 h-5 text-accent mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ $responsibility }}</span>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="relative py-20 bg-dark-secondary/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="section-heading mb-4">
                Featured <span class="text-gradient">Projects</span>
            </h2>
            <p class="text-text-secondary max-w-2xl mx-auto">Some of my recent work that showcases my skills and experience</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
            <div class="glass-card rounded-xl overflow-hidden group hover:scale-105 transition-all duration-300" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <!-- Project Image -->
                <div class="relative h-48 overflow-hidden">
                    <div class="w-full h-full bg-gradient-to-br from-dark-secondary to-dark-card flex items-center justify-center">
                        <span class="text-4xl font-heading font-bold text-accent/10">{{ substr($project->title, 0, 2) }}</span>
                    </div>
                    <div class="absolute inset-0 bg-accent/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <div class="flex space-x-4">
                            @if($project->github_url)
                            <a href="{{ $project->github_url }}" target="_blank" class="w-10 h-10 bg-white rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 text-dark" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                            </a>
                            @endif
                            @if($project->live_url)
                            <a href="{{ $project->live_url }}" target="_blank" class="w-10 h-10 bg-white rounded-full flex items-center justify-center hover:scale-110 transition-transform">
                                <svg class="w-5 h-5 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                
                <!-- Project Info -->
                <div class="p-6">
                    <h3 class="text-xl font-heading font-bold mb-2">{{ $project->title }}</h3>
                    <p class="text-text-secondary text-sm mb-4">{{ Str::limit($project->description, 100) }}</p>
                    
                    <!-- Technologies -->
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach((array) $project->technologies as $tech)
                        <span class="px-2 py-1 bg-accent/10 text-accent text-xs rounded-full">{{ $tech }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="relative py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="section-heading mb-4">
                My <span class="text-gradient">Services</span>
            </h2>
            <p class="text-text-secondary max-w-2xl mx-auto">What I can do for you and your business</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($services as $service)
            <div class="glass-card p-6 rounded-xl hover:scale-105 transition-all duration-300 group text-center" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="w-16 h-16 bg-accent/10 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-accent/20 transition-colors">
                    <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $service->icon }}" />
                    </svg>
                </div>
                <h3 class="text-lg font-heading font-bold mb-2">{{ $service->title }}</h3>
                <p class="text-text-secondary text-sm">{{ $service->description }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="relative py-20 bg-dark-secondary/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="section-heading mb-4">
                Client <span class="text-gradient">Testimonials</span>
            </h2>
            <p class="text-text-secondary">What people say about working with me</p>
        </div>
        
        @if($testimonials->count() > 0)
        <div class="max-w-4xl mx-auto" x-data="{ activeSlide: 0 }" data-aos="fade-up">
            <div class="relative overflow-hidden">
                <div class="flex transition-transform duration-500" :style="`transform: translateX(-${activeSlide * 100}%)`">
                    @foreach($testimonials as $testimonial)
                    <div class="w-full flex-shrink-0 px-4">
                        <div class="glass-card p-8 rounded-xl max-w-2xl mx-auto">
                            <!-- Stars -->
                            <div class="flex space-x-1 mb-4">
                                @for($i = 0; $i < $testimonial->rating; $i++)
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                @endfor
                            </div>
                            
                            <p class="text-text-secondary text-lg mb-6">{{ $testimonial->content }}</p>
                            
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 rounded-full bg-accent/20 flex items-center justify-center">
                                    <span class="text-accent font-bold text-lg">{{ substr($testimonial->client_name, 0, 1) }}</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-white">{{ $testimonial->client_name }}</h4>
                                    <p class="text-text-secondary text-sm">{{ $testimonial->client_position }} at {{ $testimonial->client_company }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Navigation -->
            @if($testimonials->count() > 1)
            <div class="flex justify-center space-x-2 mt-6">
                @foreach($testimonials as $index => $testimonial)
                <button @click="activeSlide = {{ $index }}" 
                        :class="{ 'bg-accent': activeSlide === {{ $index }}, 'bg-white/20': activeSlide !== {{ $index }} }"
                        class="w-3 h-3 rounded-full transition-colors"></button>
                @endforeach
            </div>
            @endif
        </div>
        @endif
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="relative py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="section-heading mb-4">
                Get In <span class="text-gradient">Touch</span>
            </h2>
            <p class="text-text-secondary max-w-2xl mx-auto">Have a project in mind? Let's work together to make it happen</p>
        </div>
        
        <div class="grid md:grid-cols-2 gap-12 max-w-5xl mx-auto">
            <!-- Contact Info -->
            <div class="space-y-6" data-aos="fade-right">
                <h3 class="text-2xl font-heading font-bold mb-6">Let's talk about your project</h3>
                <p class="text-text-secondary">I'm always open to discussing new projects, creative ideas, or opportunities to be part of your vision.</p>
                
                <div class="space-y-4">
                    @if($contactInfo && $contactInfo->email)
                    <div class="flex items-center space-x-4 glass-card p-4 rounded-xl">
                        <div class="w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-text-secondary">Email</p>
                            <p class="text-white">{{ $contactInfo->email }}</p>
                        </div>
                    </div>
                    @endif
                    
                    @if($contactInfo && $contactInfo->phone)
                    <div class="flex items-center space-x-4 glass-card p-4 rounded-xl">
                        <div class="w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-text-secondary">Phone</p>
                            <p class="text-white">{{ $contactInfo->phone }}</p>
                        </div>
                    </div>
                    @endif
                    
                    @if($contactInfo && $contactInfo->location)
                    <div class="flex items-center space-x-4 glass-card p-4 rounded-xl">
                        <div class="w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-text-secondary">Location</p>
                            <p class="text-white">{{ $contactInfo->location }}</p>
                        </div>
                    </div>
                    @endif
                </div>
                
                <!-- Social Links -->
                <div class="flex space-x-4 pt-4">
                    @if($contactInfo && $contactInfo->linkedin_url)
                    <a href="{{ $contactInfo->linkedin_url }}" target="_blank" class="w-10 h-10 glass-card flex items-center justify-center hover:border-accent transition-all duration-300">
                        <svg class="w-5 h-5 text-text-secondary hover:text-accent" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                    @endif
                    
                    @if($contactInfo && $contactInfo->github_url)
                    <a href="{{ $contactInfo->github_url }}" target="_blank" class="w-10 h-10 glass-card flex items-center justify-center hover:border-accent transition-all duration-300">
                        <svg class="w-5 h-5 text-text-secondary hover:text-accent" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                    </a>
                    @endif
                </div>
            </div>
            
            <!-- Contact Form -->
            <div data-aos="fade-left">
                <form id="contact-form" class="space-y-4" @submit.prevent="submitForm">
                    <div>
                        <input type="text" name="name" required placeholder="Your Name"
                               class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white placeholder-text-secondary">
                    </div>
                    <div>
                        <input type="email" name="email" required placeholder="Your Email"
                               class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white placeholder-text-secondary">
                    </div>
                    <div>
                        <input type="text" name="subject" required placeholder="Subject"
                               class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white placeholder-text-secondary">
                    </div>
                    <div>
                        <textarea name="message" rows="4" required placeholder="Your Message"
                                  class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white placeholder-text-secondary resize-none"></textarea>
                    </div>
                    <button type="submit" class="btn-primary w-full">
                        Send Message
                    </button>
                </form>
                
                <!-- Success Message (Hidden by default) -->
                <div id="success-message" class="hidden glass-card p-6 rounded-xl text-center">
                    <div class="w-16 h-16 bg-accent/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold mb-2">Message Sent!</h3>
                    <p class="text-text-secondary">Thank you for reaching out. I'll get back to you as soon as possible.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="relative border-t border-glass-border">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Brand -->
            <div>
                <a href="#" class="flex items-center space-x-2 mb-4">
                    <div class="w-10 h-10 bg-accent rounded-lg flex items-center justify-center">
                        <span class="text-dark font-bold text-xl">M</span>
                    </div>
                    <span class="font-heading font-bold text-xl text-white">Aiman<span class="text-accent">.</span></span>
                </a>
                <p class="text-text-secondary text-sm">Building digital solutions with modern technologies and clean architecture.</p>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h3 class="font-heading font-bold text-white mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="#home" class="text-text-secondary hover:text-accent transition-colors text-sm">Home</a></li>
                    <li><a href="#about" class="text-text-secondary hover:text-accent transition-colors text-sm">About</a></li>
                    <li><a href="#skills" class="text-text-secondary hover:text-accent transition-colors text-sm">Skills</a></li>
                    <li><a href="#projects" class="text-text-secondary hover:text-accent transition-colors text-sm">Projects</a></li>
                    <li><a href="#contact" class="text-text-secondary hover:text-accent transition-colors text-sm">Contact</a></li>
                </ul>
            </div>
            
            <!-- Services -->
            <div>
                <h3 class="font-heading font-bold text-white mb-4">Services</h3>
                <ul class="space-y-2">
                    @foreach($services->take(4) as $service)
                    <li><span class="text-text-secondary text-sm">{{ $service->title }}</span></li>
                    @endforeach
                </ul>
            </div>
        </div>
        
        <!-- Copyright -->
        <div class="border-t border-glass-border mt-8 pt-8 text-center">
            <p class="text-text-secondary text-sm">
                © {{ date('Y') }} Muhammad Aiman Hakim. All rights reserved.
            </p>
            <p class="text-text-secondary text-xs mt-2">
                Designed & Developed by Muhammad Aiman Hakim
            </p>
        </div>
    </div>
</footer>

<!-- Contact Form Script -->
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('contactForm', () => ({
        async submitForm() {
            const form = document.getElementById('contact-form');
            const successMessage = document.getElementById('success-message');
            const formData = new FormData(form);
            
            try {
                const response = await fetch('{{ route("contact.submit") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                    },
                    body: formData
                });
                
                if (response.ok) {
                    form.classList.add('hidden');
                    successMessage.classList.remove('hidden');
                }
            } catch (error) {
                console.error('Error:', error);
            }
        }
    }));
});
</script>
@endsection