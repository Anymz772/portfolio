@extends('layouts.admin')

@section('admin-content')
<div class="space-y-10">
    <!-- Header -->
    <div>
        <h1 class="text-3xl lg:text-4xl font-display font-bold">Dashboard</h1>
        <p class="text-muted-foreground mt-2">Welcome back, <span class="text-primary font-semibold">{{ Auth::user()->name }}</span>! Here's your portfolio overview.</p>
    </div>
    
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="glass-card p-6 rounded-2xl">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-primary/10 border border-primary/20 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <span class="text-3xl font-display font-bold">{{ $stats['projects'] }}</span>
            </div>
            <h3 class="text-muted-foreground text-sm font-medium">Projects</h3>
        </div>
        
        <div class="glass-card p-6 rounded-2xl">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-primary/10 border border-primary/20 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <span class="text-3xl font-display font-bold">{{ $stats['skills'] }}</span>
            </div>
            <h3 class="text-muted-foreground text-sm font-medium">Skills</h3>
        </div>
        
        <div class="glass-card p-6 rounded-2xl">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-primary/10 border border-primary/20 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <span class="text-3xl font-display font-bold">{{ $stats['messages'] }}</span>
            </div>
            <h3 class="text-muted-foreground text-sm font-medium">Messages</h3>
        </div>
        
        <div class="glass-card p-6 rounded-2xl">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-red-500/10 border border-red-500/20 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <span class="text-3xl font-display font-bold text-red-400">{{ $stats['unread_messages'] }}</span>
            </div>
            <h3 class="text-muted-foreground text-sm font-medium">Unread Messages</h3>
        </div>
    </div>
    
    <!-- Quick Actions -->
    <div class="glass-card p-6 lg:p-8 rounded-3xl">
        <h2 class="text-xl font-display font-bold mb-6">Quick Actions</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('admin.projects.create') }}" class="group p-5 rounded-2xl border border-border bg-card/40 hover:bg-card hover:border-primary/40 transition-all text-center">
                <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center mx-auto mb-3 text-primary group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <span class="text-sm font-medium">Add Project</span>
            </a>
            <a href="{{ route('admin.skills.create') }}" class="group p-5 rounded-2xl border border-border bg-card/40 hover:bg-card hover:border-primary/40 transition-all text-center">
                <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center mx-auto mb-3 text-primary group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <span class="text-sm font-medium">Add Skill</span>
            </a>
            <a href="{{ route('admin.experiences.create') }}" class="group p-5 rounded-2xl border border-border bg-card/40 hover:bg-card hover:border-primary/40 transition-all text-center">
                <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center mx-auto mb-3 text-primary group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <span class="text-sm font-medium">Add Experience</span>
            </a>
            <a href="{{ route('admin.contact.messages') }}" class="group p-5 rounded-2xl border border-border bg-card/40 hover:bg-card hover:border-primary/40 transition-all text-center">
                <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center mx-auto mb-3 text-primary group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <span class="text-sm font-medium">View Messages</span>
            </a>
        </div>
    </div>
    
    <!-- Recent Messages -->
    @if($recentMessages->count() > 0)
    <div class="glass-card p-6 lg:p-8 rounded-3xl">
        <h2 class="text-xl font-display font-bold mb-6">Recent Messages</h2>
        <div class="space-y-3">
            @foreach($recentMessages as $message)
            <a href="{{ route('admin.contact.messages.show', $message) }}" class="flex items-center justify-between p-4 rounded-2xl border border-border bg-card/30 hover:bg-card/60 hover:border-primary/30 transition-all">
                <div>
                    <p class="font-medium text-foreground">{{ $message->name }}</p>
                    <p class="text-muted-foreground text-sm">{{ $message->subject }}</p>
                </div>
                <div class="text-right flex items-center space-x-3">
                    <p class="text-muted-foreground text-xs">{{ $message->created_at->diffForHumans() }}</p>
                    @if(!$message->is_read)
                    <span class="inline-block w-2.5 h-2.5 bg-primary rounded-full animate-pulse" title="Unread"></span>
                    @endif
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection