@extends('layouts.admin')

@section('admin-content')
<div class="max-w-3xl mx-auto space-y-8">
    <div>
        <h1 class="text-3xl lg:text-4xl font-display font-bold">Edit Testimonial</h1>
        <p class="text-muted-foreground mt-2">Update client feedback, star rating, and company details.</p>
    </div>

    <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" class="glass-card p-6 lg:p-8 rounded-3xl space-y-6">
        @csrf
        @method('PUT')
        
        <div>
            <label class="form-label">Client Name</label>
            <input type="text" name="client_name" value="{{ old('client_name', $testimonial->client_name) }}" required class="form-input">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="form-label">Position / Role</label>
                <input type="text" name="client_position" value="{{ old('client_position', $testimonial->client_position) }}" class="form-input">
            </div>
            <div>
                <label class="form-label">Company Name</label>
                <input type="text" name="client_company" value="{{ old('client_company', $testimonial->client_company) }}" class="form-input">
            </div>
        </div>

        <div>
            <label class="form-label">Rating</label>
            <select name="rating" required class="form-input">
                @for($i = 5; $i >= 1; $i--)
                <option value="{{ $i }}" {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                @endfor
            </select>
        </div>

        <div>
            <label class="form-label">Testimonial Content</label>
            <textarea name="content" rows="4" required class="form-input resize-none">{{ old('content', $testimonial->content) }}</textarea>
        </div>

        <div>
            <label class="form-label">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $testimonial->sort_order) }}" min="0" class="form-input">
        </div>

        <div class="flex items-center space-x-3 pt-2">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }} class="w-4 h-4 accent-primary rounded cursor-pointer">
            <label class="text-sm font-medium">Active (Visible)</label>
        </div>

        <div class="flex justify-end space-x-4 pt-4 border-t border-border">
            <a href="{{ route('admin.testimonials.index') }}" class="btn-outline">
                Cancel
            </a>
            <button type="submit" class="btn-primary">
                Update Testimonial
            </button>
        </div>
    </form>
</div>
@endsection