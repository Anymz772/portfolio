@extends('layouts.admin')

@section('admin-content')
<div class="max-w-2xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-heading font-bold text-white">Add Experience</h1>
        <p class="text-text-secondary mt-2">Add work experience or internship</p>
    </div>

    <form action="{{ route('admin.experiences.store') }}" method="POST" class="glass-card p-6 rounded-xl space-y-6">
        @csrf
        
        <div>
            <label class="block text-sm font-medium text-white mb-2">Job Title</label>
            <input type="text" name="title" value="{{ old('title') }}" required
                   class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white"
                   placeholder="e.g., Programmer, Software Engineer">
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Company</label>
            <input type="text" name="company" value="{{ old('company') }}" required
                   class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white"
                   placeholder="e.g., Madani IT Experts Sdn Bhd">
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Type</label>
            <select name="type" required
                    class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white">
                <option value="job" {{ old('type') == 'job' ? 'selected' : '' }}>Job</option>
                <option value="internship" {{ old('type') == 'internship' ? 'selected' : '' }}>Internship</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Description</label>
            <textarea name="description" rows="3" required
                      class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white resize-none"
                      placeholder="Brief description of your role">{{ old('description') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Responsibilities (one per line)</label>
            <textarea name="responsibilities" rows="5"
                      class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white resize-none"
                      placeholder="Build Laravel applications&#10;Database Design&#10;API Integration">{{ old('responsibilities') }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-white mb-2">Start Date</label>
                <input type="date" name="start_date" value="{{ old('start_date') }}" required
                       class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-white mb-2">End Date</label>
                <input type="date" name="end_date" value="{{ old('end_date') }}"
                       class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white">
            </div>
        </div>

        <div class="flex items-center space-x-3">
            <input type="checkbox" name="is_current" value="1" {{ old('is_current') ? 'checked' : '' }}
                   class="w-4 h-4 accent-accent">
            <label class="text-white">I currently work here</label>
        </div>

        <div class="flex items-center space-x-3">
            <label class="block text-sm font-medium text-white">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0"
                   class="w-24 px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white">
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.experiences.index') }}" class="px-6 py-3 border border-glass-border rounded-xl text-text-secondary hover:text-white transition-colors">
                Cancel
            </a>
            <button type="submit" class="btn-primary">
                Add Experience
            </button>
        </div>
    </form>
</div>
@endsection