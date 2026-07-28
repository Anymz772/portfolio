@extends('layouts.admin')

@section('admin-content')
<div class="space-y-8">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl lg:text-4xl font-display font-bold">Experience</h1>
            <p class="text-muted-foreground mt-2">Manage your professional work experience and internships timeline.</p>
        </div>
        <a href="{{ route('admin.experiences.create') }}" class="btn-primary shrink-0 self-start sm:self-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>Add Experience</span>
        </a>
    </div>

    <div class="space-y-6">
        @foreach($experiences as $experience)
        <div class="glass-card p-6 lg:p-8 rounded-3xl relative overflow-hidden">
            <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4">
                <div class="space-y-3 flex-1">
                    <div class="flex items-center space-x-3 flex-wrap gap-2">
                        <h3 class="text-xl font-display font-bold text-foreground">{{ $experience->title }}</h3>
                        <span class="px-3 py-1 bg-primary/10 text-primary text-xs font-semibold rounded-full border border-primary/20 capitalize">{{ $experience->type }}</span>
                        <span class="px-3 py-1 bg-card/60 text-muted-foreground text-xs font-medium rounded-full border border-border">
                            {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }} - 
                            {{ $experience->is_current ? 'Present' : \Carbon\Carbon::parse($experience->end_date)->format('M Y') }}
                        </span>
                    </div>

                    <p class="text-primary font-medium text-sm">{{ $experience->company }}</p>
                    <p class="text-muted-foreground text-sm leading-relaxed">{{ $experience->description }}</p>
                    
                    @if($experience->responsibilities)
                    <div class="space-y-1.5 pt-2">
                        @foreach((array) $experience->responsibilities as $responsibility)
                        <div class="flex items-start space-x-2.5 text-xs text-muted-foreground">
                            <svg class="w-4 h-4 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4" />
                            </svg>
                            <span>{{ $responsibility }}</span>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                
                <div class="flex items-center space-x-2 shrink-0 self-end sm:self-start">
                    <a href="{{ route('admin.experiences.edit', $experience) }}" class="p-2.5 hover:bg-primary/10 text-muted-foreground hover:text-primary rounded-xl transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    <form action="{{ route('admin.experiences.destroy', $experience) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this experience?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2.5 hover:bg-red-500/10 text-muted-foreground hover:text-red-400 rounded-xl transition-colors">
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