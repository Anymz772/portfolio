@extends('layouts.admin')

@section('admin-content')
<div class="space-y-8">

    {{-- ============ Header ============ --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl lg:text-4xl font-display font-bold text-foreground">
                Welcome back, <span class="text-primary">{{ Auth::user()->name }}</span>! <span class="align-middle">👋</span>
            </h1>
            <p class="text-muted-foreground mt-2">Here's what's happening with your portfolio today.</p>
        </div>
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-border bg-card/40 text-sm text-muted-foreground w-fit">
            <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            {{ now()->format('l, j F Y') }}
        </div>
    </div>

    {{-- ============ Stats Grid ============ --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        {{-- Projects --}}
        <div class="glass-card p-6 rounded-2xl relative overflow-hidden">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-primary/10 border border-primary/20 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <button class="text-muted-foreground hover:text-foreground transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="6" r="1.5"/><circle cx="12" cy="12" r="1.5"/><circle cx="12" cy="18" r="1.5"/></svg>
                </button>
            </div>
            <span class="text-3xl font-display font-bold text-foreground">{{ $stats['projects'] }}</span>
            <h3 class="text-muted-foreground text-sm font-medium mt-1">Projects</h3>
            <div class="flex items-center gap-1.5 mt-3 text-xs">
                <span class="text-primary font-semibold flex items-center gap-0.5">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" /></svg>
                    {{ $stats['projects_growth'] ?? '33.3' }}%
                </span>
                <span class="text-muted-foreground">vs last month</span>
            </div>
            <svg class="absolute bottom-0 right-0 w-24 h-10 text-primary/40 pointer-events-none" viewBox="0 0 100 40" preserveAspectRatio="none">
                <path d="M0,32 L20,26 L40,28 L60,16 L80,18 L100,4" fill="none" stroke="currentColor" stroke-width="2" />
            </svg>
        </div>

        {{-- Skills --}}
        <div class="glass-card p-6 rounded-2xl relative overflow-hidden">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-primary/10 border border-primary/20 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <button class="text-muted-foreground hover:text-foreground transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="6" r="1.5"/><circle cx="12" cy="12" r="1.5"/><circle cx="12" cy="18" r="1.5"/></svg>
                </button>
            </div>
            <span class="text-3xl font-display font-bold text-foreground">{{ $stats['skills'] }}</span>
            <h3 class="text-muted-foreground text-sm font-medium mt-1">Skills</h3>
            <div class="flex items-center gap-1.5 mt-3 text-xs">
                <span class="text-primary font-semibold flex items-center gap-0.5">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" /></svg>
                    {{ $stats['skills_growth'] ?? '14.3' }}%
                </span>
                <span class="text-muted-foreground">vs last month</span>
            </div>
            <svg class="absolute bottom-0 right-0 w-24 h-10 text-primary/40 pointer-events-none" viewBox="0 0 100 40" preserveAspectRatio="none">
                <path d="M0,30 L20,24 L40,26 L60,14 L80,20 L100,6" fill="none" stroke="currentColor" stroke-width="2" />
            </svg>
        </div>

        {{-- Messages --}}
        <div class="glass-card p-6 rounded-2xl">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-primary/10 border border-primary/20 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <button class="text-muted-foreground hover:text-foreground transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="6" r="1.5"/><circle cx="12" cy="12" r="1.5"/><circle cx="12" cy="18" r="1.5"/></svg>
                </button>
            </div>
            <span class="text-3xl font-display font-bold text-foreground">{{ $stats['messages'] }}</span>
            <h3 class="text-muted-foreground text-sm font-medium mt-1">Messages</h3>
            <p class="text-muted-foreground text-xs mt-3">No new messages</p>
        </div>

        {{-- Unread Messages --}}
        <div class="glass-card p-6 rounded-2xl">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-red-500/10 border border-red-500/20 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <button class="text-muted-foreground hover:text-foreground transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="6" r="1.5"/><circle cx="12" cy="12" r="1.5"/><circle cx="12" cy="18" r="1.5"/></svg>
                </button>
            </div>
            <span class="text-3xl font-display font-bold text-red-400">{{ $stats['unread_messages'] }}</span>
            <h3 class="text-muted-foreground text-sm font-medium mt-1">Unread Messages</h3>
            <p class="text-muted-foreground text-xs mt-3">All caught up!</p>
        </div>
    </div>

    {{-- ============ Chart + Recent Messages ============ --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Portfolio Overview chart --}}
        <div class="glass-card p-6 lg:p-8 rounded-3xl lg:col-span-2">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-xl font-display font-bold text-foreground">Portfolio Overview</h2>
                    <p class="text-muted-foreground text-sm mt-1">Your portfolio growth over the last 6 months</p>
                </div>
                <button class="inline-flex items-center gap-2 px-3 py-2 rounded-xl border border-border bg-card/40 text-sm text-foreground hover:bg-card/70 transition-colors">
                    Last 6 Months
                    <svg class="w-4 h-4 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            </div>

            {{-- Inline SVG line chart. Swap $chartData for real monthly totals from the controller. --}}
            @php
                $chartData = $chartData ?? [
                    ['label' => 'Dec', 'value' => 10],
                    ['label' => 'Jan', 'value' => 16],
                    ['label' => 'Feb', 'value' => 22],
                    ['label' => 'Mar', 'value' => 26],
                    ['label' => 'Apr', 'value' => 29],
                    ['label' => 'May', 'value' => 34],
                ];
                $maxVal = 40;
                $chartW = 700; $chartH = 220; $padL = 30; $padB = 20;
                $stepX = ($chartW - $padL) / (count($chartData) - 1);
                $points = collect($chartData)->values()->map(function ($d, $i) use ($stepX, $padL, $chartH, $padB, $maxVal) {
                    $x = $padL + $i * $stepX;
                    $y = $chartH - $padB - ($d['value'] / $maxVal) * ($chartH - $padB - 10);
                    return ['x' => round($x, 1), 'y' => round($y, 1), 'label' => $d['label'], 'value' => $d['value']];
                });
                $linePath = $points->map(fn($p, $i) => ($i === 0 ? 'M' : 'L') . $p['x'] . ',' . $p['y'])->implode(' ');
                $areaPath = $linePath . " L{$points->last()['x']},{$chartH} L{$points->first()['x']},{$chartH} Z";
                $last = $points->last();
            @endphp

            <div class="relative">
                <svg viewBox="0 0 {{ $chartW }} {{ $chartH + 30 }}" class="w-full h-64">
                    <defs>
                        <linearGradient id="areaFill" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0%" stop-color="currentColor" class="text-primary" stop-opacity="0.35" />
                            <stop offset="100%" stop-color="currentColor" class="text-primary" stop-opacity="0" />
                        </linearGradient>
                    </defs>

                    {{-- gridlines + y labels --}}
                    @foreach([0, 10, 20, 30, 40] as $g)
                        @php $gy = $chartH - $padB - ($g / $maxVal) * ($chartH - $padB - 10); @endphp
                        <line x1="{{ $padL }}" y1="{{ $gy }}" x2="{{ $chartW }}" y2="{{ $gy }}" class="stroke-border" stroke-width="1" stroke-dasharray="4 4" />
                        <text x="0" y="{{ $gy + 4 }}" class="fill-muted-foreground" font-size="11">{{ $g }}</text>
                    @endforeach

                    {{-- area + line --}}
                    <path d="{{ $areaPath }}" fill="url(#areaFill)" class="text-primary" />
                    <path d="{{ $linePath }}" fill="none" class="stroke-primary" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />

                    {{-- points --}}
                    @foreach($points as $p)
                        <circle cx="{{ $p['x'] }}" cy="{{ $p['y'] }}" r="4" class="fill-background stroke-primary" stroke-width="2" />
                        <text x="{{ $p['x'] }}" y="{{ $chartH + 18 }}" text-anchor="middle" class="fill-muted-foreground" font-size="11">{{ $p['label'] }}</text>
                    @endforeach

                    {{-- highlighted last point --}}
                    <circle cx="{{ $last['x'] }}" cy="{{ $last['y'] }}" r="6" class="fill-primary" opacity="0.25" />
                    <circle cx="{{ $last['x'] }}" cy="{{ $last['y'] }}" r="4" class="fill-primary stroke-background" stroke-width="2" />
                </svg>

                {{-- tooltip bubble over the last point --}}
                <div class="absolute px-3 py-1.5 rounded-lg bg-card border border-border text-xs text-foreground shadow-lg -translate-x-1/2 -translate-y-full"
                     style="left: {{ ($last['x'] / $chartW) * 100 }}%; top: {{ ($last['y'] / ($chartH + 30)) * 100 }}%;">
                    {{ $last['label'] }} {{ now()->day }}
                </div>
            </div>
        </div>

        {{-- Recent Messages --}}
        <div class="glass-card p-6 lg:p-8 rounded-3xl flex flex-col">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-display font-bold text-foreground">Recent Messages</h2>
                <a href="{{ route('admin.contact.messages') }}" class="text-primary text-sm font-medium hover:underline">View All</a>
            </div>

            @if($recentMessages->count() > 0)
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
            @else
                <div class="flex-1 flex flex-col items-center justify-center text-center py-10">
                    <div class="w-16 h-16 rounded-full bg-primary/10 border border-primary/20 flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <p class="font-display font-bold text-foreground">No new messages</p>
                    <p class="text-muted-foreground text-sm mt-1">You're all caught up!</p>
                </div>
            @endif
        </div>
    </div>

    {{-- ============ Quick Actions + Recent Activity ============ --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Quick Actions --}}
        <div class="glass-card p-6 lg:p-8 rounded-3xl lg:col-span-2">
            <h2 class="text-xl font-display font-bold text-foreground mb-6">Quick Actions</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                <a href="{{ route('admin.projects.create') }}" class="group flex items-center gap-3.5 p-4 rounded-2xl border border-border bg-card/40 hover:bg-card hover:border-primary/40 transition-all">
                    <div class="w-10 h-10 bg-primary/10 border border-primary/20 rounded-xl flex items-center justify-center text-primary group-hover:scale-105 shrink-0 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <span class="text-sm font-semibold text-foreground block truncate">Add Project</span>
                        <span class="text-xs text-muted-foreground block truncate">Create project</span>
                    </div>
                </a>

                <a href="{{ route('admin.skills.create') }}" class="group flex items-center gap-3.5 p-4 rounded-2xl border border-border bg-card/40 hover:bg-card hover:border-primary/40 transition-all">
                    <div class="w-10 h-10 bg-primary/10 border border-primary/20 rounded-xl flex items-center justify-center text-primary group-hover:scale-105 shrink-0 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <span class="text-sm font-semibold text-foreground block truncate">Add Skill</span>
                        <span class="text-xs text-muted-foreground block truncate">Add skill tag</span>
                    </div>
                </a>

                <a href="{{ route('admin.experiences.create') }}" class="group flex items-center gap-3.5 p-4 rounded-2xl border border-border bg-card/40 hover:bg-card hover:border-primary/40 transition-all">
                    <div class="w-10 h-10 bg-primary/10 border border-primary/20 rounded-xl flex items-center justify-center text-primary group-hover:scale-105 shrink-0 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <span class="text-sm font-semibold text-foreground block truncate">Add Experience</span>
                        <span class="text-xs text-muted-foreground block truncate">Add work history</span>
                    </div>
                </a>

                <a href="{{ route('admin.contact.messages') }}" class="group flex items-center gap-3.5 p-4 rounded-2xl border border-border bg-card/40 hover:bg-card hover:border-primary/40 transition-all">
                    <div class="w-10 h-10 bg-primary/10 border border-primary/20 rounded-xl flex items-center justify-center text-primary group-hover:scale-105 shrink-0 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <span class="text-sm font-semibold text-foreground block truncate">View Messages</span>
                        <span class="text-xs text-muted-foreground block truncate">Check inbox</span>
                    </div>
                </a>
            </div>
        </div>

        {{-- Recent Activity --}}
        <div class="glass-card p-6 lg:p-8 rounded-3xl">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-display font-bold text-foreground">Recent Activity</h2>
                <a href="#" class="text-primary text-sm font-medium hover:underline">View All</a>
            </div>

            @php
                $recentActivity = $recentActivity ?? [];
            @endphp

            @if(count($recentActivity) > 0)
                <div class="space-y-5">
                    @foreach($recentActivity as $activity)
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0
                            {{ $activity['color'] === 'blue' ? 'bg-sky-500/10 text-sky-400' : ($activity['color'] === 'amber' ? 'bg-amber-500/10 text-amber-400' : 'bg-primary/10 text-primary') }}">
                            {!! $activity['icon'] ?? '' !!}
                        </div>
                        <div>
                            <p class="text-sm text-foreground">{!! $activity['message'] !!}</p>
                            <p class="text-muted-foreground text-xs mt-0.5">{{ $activity['time'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <p class="text-muted-foreground text-sm">No recent activity yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection