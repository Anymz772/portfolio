@extends('layouts.admin')

@section('admin-content')
<div class="space-y-8">
    <div>
        <h1 class="text-3xl font-heading font-bold text-white">Dashboard</h1>
        <p class="text-text-secondary mt-2">Welcome back, {{ Auth::user()->name }}! Here's your portfolio overview.</p>
    </div>
    
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="glass-card p-6 rounded-xl">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <span class="text-3xl font-bold text-white">{{ $stats['projects'] }}</span>
            </div>
            <h3 class="text-text-secondary text-sm">Projects</h3>
        </div>
        
        <div class="glass-card p-6 rounded-xl">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <span class="text-3xl font-bold text-white">{{ $stats['skills'] }}</span>
            </div>
            <h3 class="text-text-secondary text-sm">Skills</h3>
        </div>
        
        <div class="glass-card p-6 rounded-xl">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <span class="text-3xl font-bold text-white">{{ $stats['messages'] }}</span>
            </div>
            <h3 class="text-text-secondary text-sm">Messages</h3>
        </div>
        
        <div class="glass-card p-6 rounded-xl">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-red-500/10 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <span class="text-3xl font-bold text-red-400">{{ $stats['unread_messages'] }}</span>
            </div>
            <h3 class="text-text-secondary text-sm">Unread Messages</h3>
        </div>
    </div>
    
    <!-- Quick Actions -->
    <div class="glass-card p-6 rounded-xl">
        <h2 class="text-xl font-heading font-bold text-white mb-4">Quick Actions</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('admin.projects.create') }}" class="p-4 bg-dark-card rounded-xl hover:border-accent border border-transparent transition-all text-center">
                <svg class="w-8 h-8 text-accent mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span class="text-sm text-white">Add Project</span>
            </a>
            <a href="{{ route('admin.skills.create') }}" class="p-4 bg-dark-card rounded-xl hover:border-accent border border-transparent transition-all text-center">
                <svg class="w-8 h-8 text-accent mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span class="text-sm text-white">Add Skill</span>
            </a>
            <a href="{{ route('admin.experiences.create') }}" class="p-4 bg-dark-card rounded-xl hover:border-accent border border-transparent transition-all text-center">
                <svg class="w-8 h-8 text-accent mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span class="text-sm text-white">Add Experience</span>
            </a>
            <a href="{{ route('admin.contact.messages') }}" class="p-4 bg-dark-card rounded-xl hover:border-accent border border-transparent transition-all text-center">
                <svg class="w-8 h-8 text-accent mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span class="text-sm text-white">View Messages</span>
            </a>
        </div>
    </div>
    
    <!-- Recent Messages -->
    @if($recentMessages->count() > 0)
    <div class="glass-card p-6 rounded-xl">
        <h2 class="text-xl font-heading font-bold text-white mb-4">Recent Messages</h2>
        <div class="space-y-3">
            @foreach($recentMessages as $message)
            <a href="{{ route('admin.contact.messages.show', $message) }}" class="flex items-center justify-between p-4 bg-dark-card rounded-xl hover:border-accent border border-transparent transition-all">
                <div>
                    <p class="text-white font-medium">{{ $message->name }}</p>
                    <p class="text-text-secondary text-sm">{{ $message->subject }}</p>
                </div>
                <div class="text-right">
                    <p class="text-text-secondary text-xs">{{ $message->created_at->diffForHumans() }}</p>
                    @if(!$message->is_read)
                    <span class="inline-block w-2 h-2 bg-accent rounded-full mt-1"></span>
                    @endif
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection