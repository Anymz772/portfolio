@extends('layouts.admin')

@section('admin-content')
<div class="max-w-3xl mx-auto space-y-8">
    <div>
        <h1 class="text-3xl lg:text-4xl font-display font-bold">Add Service</h1>
        <p class="text-muted-foreground mt-2">Add a new service offering to display on your portfolio.</p>
    </div>

    <form action="{{ route('admin.services.store') }}" method="POST" class="glass-card p-6 lg:p-8 rounded-3xl space-y-6">
        @csrf
        
        <div>
            <label class="form-label">Service Title</label>
            <input type="text" name="title" value="{{ old('title') }}" required class="form-input" placeholder="e.g., Laravel Development">
        </div>

        <div>
            <label class="form-label">Icon (SVG Path)</label>
            <input type="text" name="icon" value="{{ old('icon') }}" required class="form-input font-mono text-xs" placeholder="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4">
        </div>

        <div>
            <label class="form-label">Description</label>
            <textarea name="description" rows="3" required class="form-input resize-none" placeholder="Brief summary of what you provide">{{ old('description') }}</textarea>
        </div>

        <div>
            <label class="form-label">Features (comma-separated)</label>
            <input type="text" name="features" value="{{ old('features') }}" class="form-input" placeholder="e.g., Custom Development, REST APIs, Microservices">
        </div>

        <div>
            <label class="form-label">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0" class="form-input">
        </div>

        <div class="flex items-center space-x-3 pt-2">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="w-4 h-4 accent-primary rounded cursor-pointer">
            <label class="text-sm font-medium">Active (Visible)</label>
        </div>

        <div class="flex justify-end space-x-4 pt-4 border-t border-border">
            <a href="{{ route('admin.services.index') }}" class="btn-outline">
                Cancel
            </a>
            <button type="submit" class="btn-primary">
                Add Service
            </button>
        </div>
    </form>
</div>
@endsection