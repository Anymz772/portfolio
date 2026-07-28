@extends('layouts.admin')

@section('admin-content')
<div class="max-w-2xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-heading font-bold text-white">Edit Service</h1>
        <p class="text-text-secondary mt-2">Update service information</p>
    </div>

    <form action="{{ route('admin.services.update', $service) }}" method="POST" class="glass-card p-6 rounded-xl space-y-6">
        @csrf
        @method('PUT')
        
        <div>
            <label class="block text-sm font-medium text-white mb-2">Service Title</label>
            <input type="text" name="title" value="{{ old('title', $service->title) }}" required
                   class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white">
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Icon (SVG path)</label>
            <input type="text" name="icon" value="{{ old('icon', $service->icon) }}" required
                   class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white font-mono text-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Description</label>
            <textarea name="description" rows="3" required
                      class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white resize-none">{{ old('description', $service->description) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Features (comma-separated)</label>
            <input type="text" name="features" value="{{ old('features', implode(', ', $service->features ?? [])) }}"
                   class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white">
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order) }}" min="0"
                   class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white">
        </div>

        <div class="flex items-center space-x-3">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }}
                   class="w-4 h-4 accent-accent">
            <label class="text-white">Active</label>
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.services.index') }}" class="px-6 py-3 border border-glass-border rounded-xl text-text-secondary hover:text-white transition-colors">
                Cancel
            </a>
            <button type="submit" class="btn-primary">
                Update Service
            </button>
        </div>
    </form>
</div>
@endsection