@extends('layouts.admin')

@section('admin-content')
<div class="max-w-2xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-heading font-bold text-white">Edit Testimonial</h1>
        <p class="text-text-secondary mt-2">Update testimonial information</p>
    </div>

    <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" class="glass-card p-6 rounded-xl space-y-6">
        @csrf
        @method('PUT')
        
        <div>
            <label class="block text-sm font-medium text-white mb-2">Client Name</label>
            <input type="text" name="client_name" value="{{ old('client_name', $testimonial->client_name) }}" required
                   class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-white mb-2">Position</label>
                <input type="text" name="client_position" value="{{ old('client_position', $testimonial->client_position) }}"
                       class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-white mb-2">Company</label>
                <input type="text" name="client_company" value="{{ old('client_company', $testimonial->client_company) }}"
                       class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Rating</label>
            <select name="rating" required
                    class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white">
                @for($i = 5; $i >= 1; $i--)
                <option value="{{ $i }}" {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                @endfor
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Testimonial Content</label>
            <textarea name="content" rows="4" required
                      class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white resize-none">{{ old('content', $testimonial->content) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $testimonial->sort_order) }}" min="0"
                   class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white">
        </div>

        <div class="flex items-center space-x-3">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}
                   class="w-4 h-4 accent-accent">
            <label class="text-white">Active</label>
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.testimonials.index') }}" class="px-6 py-3 border border-glass-border rounded-xl text-text-secondary hover:text-white transition-colors">
                Cancel
            </a>
            <button type="submit" class="btn-primary">
                Update Testimonial
            </button>
        </div>
    </form>
</div>
@endsection