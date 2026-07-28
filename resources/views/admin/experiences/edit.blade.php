@extends('layouts.admin')

@section('admin-content')
<div class="max-w-3xl mx-auto space-y-8">
    <div>
        <h1 class="text-3xl lg:text-4xl font-display font-bold">Edit Experience</h1>
        <p class="text-muted-foreground mt-2">Update work experience position, dates, description, and responsibilities.</p>
    </div>

    <form action="{{ route('admin.experiences.update', $experience) }}" method="POST" class="glass-card p-6 lg:p-8 rounded-3xl space-y-6">
        @csrf
        @method('PUT')
        
        <div>
            <label class="form-label">Job Title</label>
            <input type="text" name="title" value="{{ old('title', $experience->title) }}" required class="form-input">
        </div>

        <div>
            <label class="form-label">Company</label>
            <input type="text" name="company" value="{{ old('company', $experience->company) }}" required class="form-input">
        </div>

        <div>
            <label class="form-label">Type</label>
            <select name="type" required class="form-input">
                <option value="job" {{ old('type', $experience->type) == 'job' ? 'selected' : '' }}>Job</option>
                <option value="internship" {{ old('type', $experience->type) == 'internship' ? 'selected' : '' }}>Internship</option>
            </select>
        </div>

        <div>
            <label class="form-label">Description</label>
            <textarea name="description" rows="3" required class="form-input resize-none">{{ old('description', $experience->description) }}</textarea>
        </div>

        <div>
            <label class="form-label">Responsibilities (one per line)</label>
            <textarea name="responsibilities" rows="5" class="form-input resize-none">{{ old('responsibilities', implode("\n", (array) ($experience->responsibilities ?? []))) }}</textarea>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="form-label">Start Date</label>
                <input type="date" name="start_date" value="{{ old('start_date', $experience->start_date ? $experience->start_date->format('Y-m-d') : '') }}" required class="form-input">
            </div>
            <div>
                <label class="form-label">End Date</label>
                <input type="date" name="end_date" value="{{ old('end_date', $experience->end_date ? $experience->end_date->format('Y-m-d') : '') }}" class="form-input">
            </div>
        </div>

        <div class="flex items-center space-x-3 pt-2">
            <input type="checkbox" name="is_current" value="1" {{ old('is_current', $experience->is_current) ? 'checked' : '' }} class="w-4 h-4 accent-primary rounded cursor-pointer">
            <label class="text-sm font-medium">I currently work here</label>
        </div>

        <div>
            <label class="form-label">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $experience->sort_order) }}" min="0" class="form-input">
        </div>

        <div class="flex justify-end space-x-4 pt-4 border-t border-border">
            <a href="{{ route('admin.experiences.index') }}" class="btn-outline">
                Cancel
            </a>
            <button type="submit" class="btn-primary">
                Update Experience
            </button>
        </div>
    </form>
</div>
@endsection