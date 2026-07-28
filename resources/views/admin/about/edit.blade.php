@extends('layouts.admin')

@section('admin-content')
<div class="max-w-2xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-heading font-bold text-white">About Section</h1>
        <p class="text-text-secondary mt-2">Customize the about section of your portfolio</p>
    </div>

    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data" class="glass-card p-6 rounded-xl space-y-6">
        @csrf
        @method('PUT')
        
        <div>
            <label class="block text-sm font-medium text-white mb-2">Bio</label>
            <textarea name="bio" rows="4" required
                      class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white resize-none">{{ old('bio', $about->bio) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Profile Image</label>
            @if($about->profile_image)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $about->profile_image) }}" alt="About" class="w-32 h-32 rounded-xl object-cover">
            </div>
            @endif
            <input type="file" name="profile_image" accept="image/*"
                   class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-accent file:text-dark hover:file:bg-accent-dark">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-white mb-2">Projects Count</label>
                <input type="number" name="projects_count" value="{{ old('projects_count', $about->projects_count) }}" required min="0"
                       class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-white mb-2">Years of Experience</label>
                <input type="number" name="experience_years" value="{{ old('experience_years', $about->experience_years) }}" required min="0" step="0.5"
                       class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-white mb-2">Expertise Level</label>
                <input type="text" name="expertise_level" value="{{ old('expertise_level', $about->expertise_level) }}" required
                       class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white"
                       placeholder="e.g., Laravel Expert">
            </div>
            <div>
                <label class="block text-sm font-medium text-white mb-2">Development Type</label>
                <input type="text" name="development_type" value="{{ old('development_type', $about->development_type) }}" required
                       class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white"
                       placeholder="e.g., Full Stack">
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="btn-primary">
                Update About Section
            </button>
        </div>
    </form>
</div>
@endsection