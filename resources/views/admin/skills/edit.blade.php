@extends('layouts.admin')

@section('admin-content')
<div class="max-w-2xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-heading font-bold text-white">Edit Skill</h1>
        <p class="text-text-secondary mt-2">Update skill information</p>
    </div>

    <form action="{{ route('admin.skills.update', $skill) }}" method="POST" class="glass-card p-6 rounded-xl space-y-6">
        @csrf
        @method('PUT')
        
        <div>
            <label class="block text-sm font-medium text-white mb-2">Skill Name</label>
            <input type="text" name="name" value="{{ old('name', $skill->name) }}" required
                   class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white">
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Category</label>
            <select name="category" required
                    class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white">
                <option value="backend" {{ old('category', $skill->category) == 'backend' ? 'selected' : '' }}>Backend</option>
                <option value="frontend" {{ old('category', $skill->category) == 'frontend' ? 'selected' : '' }}>Frontend</option>
                <option value="tools" {{ old('category', $skill->category) == 'tools' ? 'selected' : '' }}>Tools</option>
                <option value="networking" {{ old('category', $skill->category) == 'networking' ? 'selected' : '' }}>Networking</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Proficiency (%)</label>
            <input type="range" name="proficiency" value="{{ old('proficiency', $skill->proficiency) }}" min="0" max="100"
                   class="w-full accent-accent" oninput="document.getElementById('proficiency-value').textContent = this.value + '%'">
            <div class="text-center mt-2">
                <span id="proficiency-value" class="text-accent font-bold">{{ old('proficiency', $skill->proficiency) }}%</span>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $skill->sort_order) }}" min="0"
                   class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white">
        </div>

        <div class="flex items-center space-x-3">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $skill->is_active) ? 'checked' : '' }}
                   class="w-4 h-4 accent-accent">
            <label class="text-white">Active</label>
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.skills.index') }}" class="px-6 py-3 border border-glass-border rounded-xl text-text-secondary hover:text-white transition-colors">
                Cancel
            </a>
            <button type="submit" class="btn-primary">
                Update Skill
            </button>
        </div>
    </form>
</div>
@endsection