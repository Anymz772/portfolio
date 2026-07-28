@extends('layouts.admin')

@section('admin-content')
<div class="max-w-3xl mx-auto space-y-8">
    <div>
        <h1 class="text-3xl lg:text-4xl font-display font-bold">Edit Service</h1>
        <p class="text-muted-foreground mt-2">Update service title, icon SVG path, description, and feature tags.</p>
    </div>

    <form action="{{ route('admin.services.update', $service) }}" method="POST" class="glass-card p-6 lg:p-8 rounded-3xl space-y-6">
        @csrf
        @method('PUT')
        
        <div>
            <label class="form-label">Service Title</label>
            <input type="text" name="title" value="{{ old('title', $service->title) }}" required class="form-input">
        </div>

        <div>
            <label class="form-label">Icon (SVG Path)</label>
            <input type="text" name="icon" value="{{ old('icon', $service->icon) }}" required class="form-input font-mono text-xs">
        </div>

        <div>
            <label class="form-label">Description</label>
            <textarea name="description" rows="3" required class="form-input resize-none">{{ old('description', $service->description) }}</textarea>
        </div>

        <div>
            <label class="form-label">Features (comma-separated)</label>
            <input type="text" name="features" value="{{ old('features', implode(', ', (array) ($service->features ?? []))) }}" class="form-input">
        </div>

        <div>
            <label class="form-label">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order) }}" min="0" class="form-input">
        </div>

        <div class="flex items-center space-x-3 pt-2">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }} class="w-4 h-4 accent-primary rounded cursor-pointer">
            <label class="text-sm font-medium">Active (Visible)</label>
        </div>

        <div class="flex justify-end space-x-4 pt-4 border-t border-border">
            <a href="{{ route('admin.services.index') }}" class="btn-outline">
                Cancel
            </a>
            <button type="submit" class="btn-primary">
                Update Service
            </button>
        </div>
    </form>
</div>
@endsection