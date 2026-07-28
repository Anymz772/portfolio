@extends('layouts.admin')

@section('admin-content')
<div class="max-w-3xl mx-auto space-y-8">
    <div>
        <h1 class="text-3xl lg:text-4xl font-display font-bold">Add Experience</h1>
        <p class="text-muted-foreground mt-2">Add work experience or internship position to your career timeline.</p>
    </div>

    <form action="{{ route('admin.experiences.store') }}" method="POST" class="glass-card p-6 lg:p-8 rounded-3xl space-y-6">
        @csrf
        
        <div>
            <label class="form-label">Job Title</label>
            <input type="text" name="title" value="{{ old('title') }}" required class="form-input" placeholder="e.g., Programmer, Software Engineer">
        </div>

        <div>
            <label class="form-label">Company</label>
            <input type="text" name="company" value="{{ old('company') }}" required class="form-input" placeholder="e.g., Madani IT Experts Sdn Bhd">
        </div>

        <div>
            <label class="form-label">Type</label>
            <select name="type" required class="form-input">
                <option value="job" {{ old('type') == 'job' ? 'selected' : '' }}>Job</option>
                <option value="internship" {{ old('type') == 'internship' ? 'selected' : '' }}>Internship</option>
            </select>
        </div>

        <div>
            <label class="form-label">Description</label>
            <textarea name="description" rows="3" required class="form-input resize-none" placeholder="Brief summary of your role and accomplishments">{{ old('description') }}</textarea>
        </div>

        <div>
            <label class="form-label">Responsibilities (one per line)</label>
            <textarea name="responsibilities" rows="5" class="form-input resize-none"
                      placeholder="Build Laravel applications&#10;Database Design&#10;API Integration">{{ old('responsibilities') }}</textarea>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="form-label">Start Date</label>
                <input type="date" name="start_date" value="{{ old('start_date') }}" required class="form-input">
            </div>
            <div>
                <label class="form-label">End Date</label>
                <input type="date" name="end_date" value="{{ old('end_date') }}" class="form-input">
            </div>
        </div>

        <div class="flex items-center space-x-3 pt-2">
            <input type="checkbox" name="is_current" value="1" {{ old('is_current') ? 'checked' : '' }} class="w-4 h-4 accent-primary rounded cursor-pointer">
            <label class="text-sm font-medium">I currently work here</label>
        </div>

        <div>
            <label class="form-label">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0" class="form-input">
        </div>

        <div class="flex justify-end space-x-4 pt-4 border-t border-border">
            <a href="{{ route('admin.experiences.index') }}" class="btn-outline">
                Cancel
            </a>
            <button type="submit" class="btn-primary">
                Add Experience
            </button>
        </div>
    </form>
</div>
@endsection