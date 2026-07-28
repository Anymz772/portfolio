@extends('layouts.admin')

@section('admin-content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-heading font-bold text-white">Experience</h1>
            <p class="text-text-secondary mt-2">Manage your work experience and internships</p>
        </div>
        <a href="{{ route('admin.experiences.create') }}" class="btn-primary">
            <span class="flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Add Experience</span>
            </span>
        </a>
    </div>

    <div class="space-y-4">
        @foreach($experiences as $experience)
        <div class="glass-card p-6 rounded-xl">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <div class="flex items-center space-x-3 mb-2">
                        <h3 class="text-xl font-heading font-bold text-white">{{ $experience->title }}</h3>
                        <span class="px-2 py-0.5 bg-accent/10 text-accent text-xs rounded-full capitalize">{{ $experience->type }}</span>
                    </div>
                    <p class="text-text-secondary mb-2">{{ $experience->company }}</p>
                    <p class="text-text-secondary text-sm mb-3">{{ $experience->description }}</p>
                    
                    @if($experience->responsibilities)
                    <div class="space-y-1 mb-3">
                        @foreach((array) $experience->responsibilities as $responsibility)
                        <div class="flex items-center space-x-2 text-sm text-text-secondary">
                            <svg class="w-4 h-4 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4" />
                            </svg>
                            <span>{{ $responsibility }}</span>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    
                    <div class="flex items-center space-x-4 text-sm text-text-secondary">
                        <span>{{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }}</span>
                        <span>-</span>
                        <span>{{ $experience->is_current ? 'Present' : \Carbon\Carbon::parse($experience->end_date)->format('M Y') }}</span>
                    </div>
                </div>
                
                <div class="flex items-center space-x-2 ml-4">
                    <a href="{{ route('admin.experiences.edit', $experience) }}" class="p-2 hover:bg-accent/10 rounded-lg transition-colors">
                        <svg class="w-5 h-5 text-text-secondary hover:text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    <form action="{{ route('admin.experiences.destroy', $experience) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 hover:bg-red-500/10 rounded-lg transition-colors">
                            <svg class="w-5 h-5 text-text-secondary hover:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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