@extends('layouts.admin')

@section('admin-content')
<div class="max-w-3xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-heading font-bold text-white">Edit Project</h1>
        <p class="text-text-secondary mt-2">Update project information</p>
    </div>

    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="glass-card p-6 rounded-xl space-y-6">
        @csrf
        @method('PUT')
        
        <div>
            <label class="block text-sm font-medium text-white mb-2">Project Title</label>
            <input type="text" name="title" value="{{ old('title', $project->title) }}" required
                   class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white">
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Short Description</label>
            <textarea name="description" rows="3" required
                      class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white resize-none">{{ old('description', $project->description) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Long Description</label>
            <textarea name="long_description" rows="5"
                      class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white resize-none">{{ old('long_description', $project->long_description) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Project Image</label>
            @if($project->image)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-32 h-32 object-cover rounded-lg">
            </div>
            @endif
            <input type="file" name="image" accept="image/*"
                   class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-accent file:text-dark hover:file:bg-accent-dark">
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Technologies (comma-separated)</label>
            <input type="text" name="technologies" value="{{ old('technologies', implode(', ', $project->technologies ?? [])) }}"
                   class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white">
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Features (comma-separated)</label>
            <input type="text" name="features" value="{{ old('features', implode(', ', $project->features ?? [])) }}"
                   class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-white mb-2">GitHub URL</label>
                <input type="url" name="github_url" value="{{ old('github_url', $project->github_url) }}"
                       class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-white mb-2">Live URL</label>
                <input type="url" name="live_url" value="{{ old('live_url', $project->live_url) }}"
                       class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $project->sort_order) }}" min="0"
                   class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white">
        </div>

        <div class="flex items-center space-x-6">
            <div class="flex items-center space-x-3">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}
                       class="w-4 h-4 accent-accent">
                <label class="text-white">Featured Project</label>
            </div>
            <div class="flex items-center space-x-3">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $project->is_active) ? 'checked' : '' }}
                       class="w-4 h-4 accent-accent">
                <label class="text-white">Active</label>
            </div>
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.projects.index') }}" class="px-6 py-3 border border-glass-border rounded-xl text-text-secondary hover:text-white transition-colors">
                Cancel
            </a>
            <button type="submit" class="btn-primary">
                Update Project
            </button>
        </div>
    </form>
</div>
@endsection