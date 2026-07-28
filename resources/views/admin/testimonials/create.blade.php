@extends('layouts.admin')

@section('admin-content')
<div class="max-w-3xl mx-auto space-y-8">
    <div>
        <h1 class="text-3xl lg:text-4xl font-display font-bold">Add Testimonial</h1>
        <p class="text-muted-foreground mt-2">Add client recommendation content, position, and company details.</p>
    </div>

    <form action="{{ route('admin.testimonials.store') }}" method="POST" class="glass-card p-6 lg:p-8 rounded-3xl space-y-6">
        @csrf
        
        <div>
            <label class="form-label">Client Name</label>
            <input type="text" name="client_name" value="{{ old('client_name') }}" required class="form-input" placeholder="e.g., Ahmad Faiz">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="form-label">Position / Role</label>
                <input type="text" name="client_position" value="{{ old('client_position') }}" class="form-input" placeholder="e.g., CEO">
            </div>
            <div>
                <label class="form-label">Company Name</label>
                <input type="text" name="client_company" value="{{ old('client_company') }}" class="form-input" placeholder="e.g., Tech Solutions">
            </div>
        </div>

        <div>
            <label class="form-label">Testimonial Content</label>
            <textarea name="content" rows="4" required class="form-input resize-none" placeholder="What the client said about your work...">{{ old('content') }}</textarea>
        </div>

        <div>
            <label class="form-label">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0" class="form-input">
        </div>

        <div class="flex items-center space-x-3 pt-2">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="w-4 h-4 accent-primary rounded cursor-pointer">
            <label class="text-sm font-medium">Active (Visible on portfolio)</label>
        </div>

        <div class="flex justify-end space-x-4 pt-4 border-t border-border">
            <a href="{{ route('admin.testimonials.index') }}" class="btn-outline">
                Cancel
            </a>
            <button type="submit" class="btn-primary">
                Add Testimonial
            </button>
        </div>
    </form>
</div>
@endsection