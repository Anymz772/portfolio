@extends('layouts.admin')

@section('admin-content')
<div class="space-y-8">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl lg:text-4xl font-display font-bold">Services</h1>
            <p class="text-muted-foreground mt-2">Manage the services and features you offer to clients.</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="btn-primary shrink-0 self-start sm:self-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>Add Service</span>
        </a>
    </div>

    <div class="grid md:grid-cols-2 gap-6">
        @foreach($services as $service)
        <div class="glass-card p-6 lg:p-8 rounded-3xl relative flex flex-col justify-between">
            <div class="flex items-start justify-between gap-4 mb-4">
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-primary/10 border border-primary/20 rounded-2xl flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $service->icon }}" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-display font-bold text-foreground mb-1">{{ $service->title }}</h3>
                        <p class="text-muted-foreground text-sm leading-relaxed mb-3">{{ $service->description }}</p>
                        @if($service->features)
                        <div class="flex flex-wrap gap-1.5">
                            @foreach((array) $service->features as $feature)
                            <span class="px-2.5 py-1 bg-card/60 text-muted-foreground text-xs font-medium rounded-full border border-border">{{ $feature }}</span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="pt-4 border-t border-border/50 flex items-center justify-between">
                <div>
                    @if($service->is_active)
                    <span class="px-2.5 py-1 bg-emerald-500/10 text-emerald-400 text-xs font-medium rounded-full border border-emerald-500/20">Active</span>
                    @else
                    <span class="px-2.5 py-1 bg-rose-500/10 text-rose-400 text-xs font-medium rounded-full border border-rose-500/20">Inactive</span>
                    @endif
                </div>

                <div class="flex items-center space-x-1">
                    <a href="{{ route('admin.services.edit', $service) }}" class="p-2 hover:bg-primary/10 text-muted-foreground hover:text-primary rounded-xl transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service?')">
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