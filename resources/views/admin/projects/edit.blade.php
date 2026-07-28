@extends('layouts.admin')

@section('admin-content')
<div class="max-w-3xl mx-auto space-y-8">
    <div>
        <h1 class="text-3xl lg:text-4xl font-display font-bold">Edit Project</h1>
        <p class="text-muted-foreground mt-2">Update project details, cover image, links, and tags.</p>
    </div>

    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="glass-card p-6 lg:p-8 rounded-3xl space-y-6">
        @csrf
        @method('PUT')
        
        <div>
            <label class="form-label">Project Title</label>
            <input type="text" name="title" value="{{ old('title', $project->title) }}" required class="form-input">
        </div>

        <div>
            <label class="form-label">Short Description</label>
            <textarea name="description" rows="3" required class="form-input resize-none">{{ old('description', $project->description) }}</textarea>
        </div>

        <div>
            <label class="form-label">Long Description (Optional)</label>
            <textarea name="long_description" rows="5" class="form-input resize-none">{{ old('long_description', $project->long_description) }}</textarea>
        </div>

        <div>
            <label class="form-label mb-2 block">Project Cover Image</label>
            @if($project->image)
            <div class="mb-4">
                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-36 h-36 object-cover rounded-2xl border border-primary/30 shadow-lg">
            </div>
            @endif
            <input type="file" name="image" accept="image/*"
                   class="form-input file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-primary file:text-primary-foreground hover:file:bg-primary/80">
        </div>

        <div>
            <label class="form-label">Technologies (comma-separated)</label>
            <input type="text" name="technologies" value="{{ old('technologies', implode(', ', (array) ($project->technologies ?? []))) }}" class="form-input">
        </div>

        <div>
            <label class="form-label">Features (comma-separated)</label>
            <input type="text" name="features" value="{{ old('features', implode(', ', (array) ($project->features ?? []))) }}" class="form-input">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="form-label">GitHub Repository URL</label>
                <input type="url" name="github_url" value="{{ old('github_url', $project->github_url) }}" class="form-input">
            </div>
            <div>
                <label class="form-label">Live Preview URL</label>
                <input type="url" name="live_url" value="{{ old('live_url', $project->live_url) }}" class="form-input">
            </div>
        </div>

        <div>
            <label class="form-label">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $project->sort_order) }}" min="0" class="form-input">
        </div>

        <div class="flex items-center space-x-6 pt-2">
            <div class="flex items-center space-x-3">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }} class="w-4 h-4 accent-primary rounded cursor-pointer">
                <label class="text-sm font-medium">Featured Project</label>
            </div>
            <div class="flex items-center space-x-3">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $project->is_active) ? 'checked' : '' }} class="w-4 h-4 accent-primary rounded cursor-pointer">
                <label class="text-sm font-medium">Active (Visible)</label>
            </div>
        </div>

        <div class="flex justify-end space-x-4 pt-4 border-t border-border">
            <a href="{{ route('admin.projects.index') }}" class="btn-outline">
                Cancel
            </a>
            <button type="submit" class="btn-primary">
                Update Project
            </button>
        </div>
    </form>
</div>
@endsection