@extends('layouts.admin')

@section('admin-content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-heading font-bold text-white">Services</h1>
            <p class="text-text-secondary mt-2">Manage services you offer</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="btn-primary">
            <span class="flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Add Service</span>
            </span>
        </a>
    </div>

    <div class="grid md:grid-cols-2 gap-6">
        @foreach($services as $service)
        <div class="glass-card p-6 rounded-xl">
            <div class="flex items-start justify-between">
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-accent/10 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $service->icon }}" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-heading font-bold text-white mb-1">{{ $service->title }}</h3>
                        <p class="text-text-secondary text-sm mb-3">{{ $service->description }}</p>
                        @if($service->features)
                        <div class="flex flex-wrap gap-1">
                            @foreach((array) $service->features as $feature)
                            <span class="px-2 py-0.5 bg-dark text-text-secondary text-xs rounded-full">{{ $feature }}</span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                <div class="flex items-center space-x-1">
                    <a href="{{ route('admin.services.edit', $service) }}" class="p-2 hover:bg-accent/10 rounded-lg transition-colors">
                        <svg class="w-4 h-4 text-text-secondary hover:text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 hover:bg-red-500/10 rounded-lg transition-colors">
                            <svg class="w-4 h-4 text-text-secondary hover:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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