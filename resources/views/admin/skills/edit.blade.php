@extends('layouts.admin')

@section('admin-content')
<div class="max-w-3xl mx-auto space-y-8">
    <div>
        <h1 class="text-3xl lg:text-4xl font-display font-bold">Edit Skill</h1>
        <p class="text-muted-foreground mt-2">Update skill name, category, and proficiency score.</p>
    </div>

    <form action="{{ route('admin.skills.update', $skill) }}" method="POST" class="glass-card p-6 lg:p-8 rounded-3xl space-y-6">
        @csrf
        @method('PUT')
        
        <div>
            <label class="form-label">Skill Name</label>
            <input type="text" name="name" value="{{ old('name', $skill->name) }}" required class="form-input">
        </div>

        <div>
            <label class="form-label">Category</label>
            <select name="category" required class="form-input">
                <option value="backend" {{ old('category', $skill->category) == 'backend' ? 'selected' : '' }}>Backend</option>
                <option value="frontend" {{ old('category', $skill->category) == 'frontend' ? 'selected' : '' }}>Frontend</option>
                <option value="tools" {{ old('category', $skill->category) == 'tools' ? 'selected' : '' }}>Tools</option>
                <option value="networking" {{ old('category', $skill->category) == 'networking' ? 'selected' : '' }}>Networking</option>
            </select>
        </div>

        <div>
            <div class="flex justify-between items-center mb-2">
                <label class="form-label">Proficiency (%)</label>
                <span id="proficiency-value" class="text-primary font-display font-bold text-sm">{{ old('proficiency', $skill->proficiency) }}%</span>
            </div>
            <input type="range" name="proficiency" value="{{ old('proficiency', $skill->proficiency) }}" min="0" max="100"
                   class="w-full accent-primary bg-background rounded-lg h-2 cursor-pointer" oninput="document.getElementById('proficiency-value').textContent = this.value + '%'">
        </div>

        <div>
            <label class="form-label">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $skill->sort_order) }}" min="0" class="form-input">
        </div>

        <div class="flex items-center space-x-3 pt-2">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $skill->is_active) ? 'checked' : '' }}
                   class="w-4 h-4 accent-primary rounded cursor-pointer">
            <label class="text-sm font-medium">Active (Visible on portfolio)</label>
        </div>

        <div class="flex justify-end space-x-4 pt-4 border-t border-border">
            <a href="{{ route('admin.skills.index') }}" class="btn-outline">
                Cancel
            </a>
            <button type="submit" class="btn-primary">
                Update Skill
            </button>
        </div>
    </form>
</div>
@endsection