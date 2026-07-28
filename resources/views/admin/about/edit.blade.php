@extends('layouts.admin')

@section('admin-content')
<div class="max-w-3xl mx-auto space-y-8">
    <div>
        <h1 class="text-3xl lg:text-4xl font-display font-bold">About Section</h1>
        <p class="text-muted-foreground mt-2">Customize your bio, statistics, expertise level, and about profile image.</p>
    </div>

    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data" class="glass-card p-6 lg:p-8 rounded-3xl space-y-6">
        @csrf
        @method('PUT')
        
        <div>
            <label class="form-label">Bio</label>
            <textarea name="bio" rows="5" required class="form-input resize-none">{{ old('bio', $about->bio) }}</textarea>
        </div>

        <div>
            <label class="form-label mb-2 block">About Image</label>
            @if($about->profile_image)
            <div class="mb-4">
                <img src="{{ asset('storage/' . $about->profile_image) }}" alt="About" class="w-32 h-32 rounded-2xl object-cover border border-primary/30 shadow-lg">
            </div>
            @endif
            <input type="file" name="profile_image" accept="image/*"
                   class="form-input file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-primary file:text-primary-foreground hover:file:bg-primary/80">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="form-label">Completed Projects Count</label>
                <input type="number" name="projects_count" value="{{ old('projects_count', $about->projects_count) }}" required min="0" class="form-input">
            </div>
            <div>
                <label class="form-label">Years of Experience</label>
                <input type="number" name="experience_years" value="{{ old('experience_years', $about->experience_years) }}" required min="0" step="0.5" class="form-input">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="form-label">Expertise Level</label>
                <input type="text" name="expertise_level" value="{{ old('expertise_level', $about->expertise_level) }}" required class="form-input" placeholder="e.g., Laravel Expert">
            </div>
            <div>
                <label class="form-label">Development Type</label>
                <input type="text" name="development_type" value="{{ old('development_type', $about->development_type) }}" required class="form-input" placeholder="e.g., Full Stack">
            </div>
        </div>

        <div class="flex justify-end pt-4 border-t border-border">
            <button type="submit" class="btn-primary">
                Update About Section
            </button>
        </div>
    </form>
</div>
@endsection