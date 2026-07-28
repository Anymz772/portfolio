@extends('layouts.admin')

@section('admin-content')
<div class="space-y-8">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl lg:text-4xl font-display font-bold">Testimonials</h1>
            <p class="text-muted-foreground mt-2">Manage client feedback and recommendations featured on your portfolio homepage.</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" class="btn-primary shrink-0 self-start sm:self-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>Add Testimonial</span>
        </a>
    </div>

    <!-- Testimonials List Matching Homepage Quote Cards -->
    <div class="space-y-6">
        @foreach($testimonials as $testimonial)
        <div class="glass-card p-6 lg:p-8 rounded-3xl relative overflow-hidden flex flex-col justify-between space-y-6">
            <div>
                <!-- Quote Icon Header -->
                <div class="flex items-center justify-between pb-4 border-b border-border">
                    <div class="flex items-center space-x-3">
                        <span class="inline-flex rounded-2xl bg-primary/10 border border-primary/20 p-3 text-primary">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M4.583 17.321C3.553 16.227 3 15 3 13.011c0-3.5 2.457-6.637 6.03-8.45l.665 1.262C6.688 7.657 5.5 9.988 5.5 12.992c0 1.875.625 3.188 1.875 3.938.625.375 1.25.562 1.875.562 1.042 0 1.875-.729 1.875-1.667 0-.833-.521-1.458-1.458-1.458-.521 0-.937.208-1.25.521.104-.937.729-1.875 1.875-2.708 1.042-.729 2.083-1.042 3.125-1.042 2.292 0 3.958 1.771 3.958 4.271 0 2.708-1.563 5.104-4.063 6.354l-.834-1.354zm9.75 0c-1.03-1.094-1.583-2.321-1.583-4.31 0-3.5 2.457-6.637 6.03-8.45l.665 1.262c-2.507 1.834-3.695 4.165-3.695 7.169 0 1.875.625 3.188 1.875 3.938.625.375 1.25.562 1.875.562 1.042 0 1.875-.729 1.875-1.667 0-.833-.521-1.458-1.458-1.458-.521 0-.937.208-1.25.521.104-.937.729-1.875 1.875-2.708 1.042-.729 2.083-1.042 3.125-1.042 2.292 0 3.958 1.771 3.958 4.271 0 2.708-1.563 5.104-4.063 6.354l-.834-1.354z"/>
                            </svg>
                        </span>
                        <div>
                            <span class="text-xs font-semibold uppercase tracking-wider text-muted-foreground block">Client Testimonial</span>
                        </div>
                    </div>
                    <div>
                        @if($testimonial->is_active)
                        <span class="px-3 py-1 bg-emerald-500/10 text-emerald-400 text-xs font-semibold rounded-full border border-emerald-500/20">Active</span>
                        @else
                        <span class="px-3 py-1 bg-rose-500/10 text-rose-400 text-xs font-semibold rounded-full border border-rose-500/20">Inactive</span>
                        @endif
                    </div>
                </div>

                <!-- Quote Body -->
                <blockquote class="mt-5 text-lg leading-relaxed text-foreground italic">
                    &ldquo;{{ $testimonial->content }}&rdquo;
                </blockquote>
            </div>

            <!-- Client Info & Action Controls -->
            <div class="pt-4 border-t border-border/50 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center space-x-3">
                    <span class="w-11 h-11 shrink-0 rounded-full bg-primary/15 border border-primary/20 flex items-center justify-center font-display font-semibold text-primary text-sm">
                        {{ strtoupper(substr($testimonial->client_name, 0, 2)) }}
                    </span>
                    <div class="min-w-0">
                        <p class="font-display font-semibold text-foreground truncate">{{ $testimonial->client_name }}</p>
                        <p class="text-xs text-muted-foreground truncate">
                            {{ $testimonial->client_position }}@if($testimonial->client_position && $testimonial->client_company), @endif{{ $testimonial->client_company }}
                        </p>
                    </div>
                </div>

                <div class="flex items-center space-x-2 self-end sm:self-auto">
                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="p-2 hover:bg-primary/10 text-muted-foreground hover:text-primary rounded-xl transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this testimonial?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 hover:bg-red-500/10 text-muted-foreground hover:text-red-400 rounded-xl transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection