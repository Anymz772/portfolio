@extends('layouts.admin')

@section('admin-content')
<div class="space-y-8">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl lg:text-4xl font-display font-bold">Projects</h1>
            <p class="text-muted-foreground mt-2">Manage portfolio projects, tech stacks, and featured highlights.</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="btn-primary shrink-0 self-start sm:self-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>Add Project</span>
        </a>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($projects as $project)
        <div class="glass-card rounded-3xl overflow-hidden group flex flex-col justify-between">
            <div>
                <div class="h-44 bg-card/60 relative overflow-hidden flex items-center justify-center border-b border-border">
                    @if($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                    <span class="text-4xl font-display font-bold text-primary/20">{{ strtoupper(substr($project->title, 0, 2)) }}</span>
                    @endif
                    @if($project->is_featured)
                    <span class="absolute top-3 right-3 px-3 py-1 bg-amber-500/20 text-amber-300 text-xs font-semibold rounded-full border border-amber-500/30 backdrop-blur-md">Featured</span>
                    @endif
                </div>

                <div class="p-6">
                    <h3 class="text-lg font-display font-bold text-foreground mb-2">{{ $project->title }}</h3>
                    <p class="text-muted-foreground text-sm mb-4 line-clamp-2">{{ Str::limit($project->description, 100) }}</p>
                    
                    <div class="flex flex-wrap gap-1.5 mb-4">
                        @foreach((array) $project->technologies as $tech)
                        <span class="px-2.5 py-1 bg-primary/10 text-primary text-xs font-medium rounded-full border border-primary/20">{{ $tech }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <div class="px-6 pb-6 pt-2 border-t border-border/50 flex items-center justify-between">
                <div>
                    @if($project->is_active)
                    <span class="px-2.5 py-1 bg-emerald-500/10 text-emerald-400 text-xs font-medium rounded-full border border-emerald-500/20">Active</span>
                    @else
                    <span class="px-2.5 py-1 bg-rose-500/10 text-rose-400 text-xs font-medium rounded-full border border-rose-500/20">Inactive</span>
                    @endif
                </div>
                
                <div class="flex items-center space-x-1">
                    <a href="{{ route('admin.projects.edit', $project) }}" class="p-2 hover:bg-primary/10 text-muted-foreground hover:text-primary rounded-xl transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?')" class="inline">
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