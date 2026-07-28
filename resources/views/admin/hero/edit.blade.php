@extends('layouts.admin')

@section('admin-content')
<div class="max-w-3xl mx-auto space-y-8">
    <div>
        <h1 class="text-3xl lg:text-4xl font-display font-bold">Hero Section</h1>
        <p class="text-muted-foreground mt-2">Customize the main hero title, description, and typing animation texts.</p>
    </div>

    <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data" class="glass-card p-6 lg:p-8 rounded-3xl space-y-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="form-label">Title Line 1</label>
                <input type="text" name="title_line1" value="{{ old('title_line1', $hero->title_line1) }}" required class="form-input">
            </div>
            <div>
                <label class="form-label">Title Line 2</label>
                <input type="text" name="title_line2" value="{{ old('title_line2', $hero->title_line2) }}" required class="form-input">
            </div>
            <div>
                <label class="form-label">Title Line 3</label>
                <input type="text" name="title_line3" value="{{ old('title_line3', $hero->title_line3) }}" required class="form-input">
            </div>
        </div>

        <div>
            <label class="form-label">Description</label>
            <textarea name="description" rows="4" required class="form-input resize-none">{{ old('description', $hero->description) }}</textarea>
        </div>

        <div>
            <label class="form-label">Typing Texts (comma-separated)</label>
            <input type="text" name="typing_texts" value="{{ old('typing_texts', is_array($hero->typing_texts) ? implode(', ', $hero->typing_texts) : $hero->typing_texts) }}"
                   class="form-input" placeholder="e.g., Laravel Developer, Backend Engineer, Full Stack Developer">
        </div>

        <div>
            <label class="form-label mb-2 block">Profile Image</label>
            @if($hero->profile_image)
            <div class="mb-4">
                <img src="{{ asset('storage/' . $hero->profile_image) }}" alt="Profile" class="w-24 h-24 rounded-2xl object-cover border border-primary/30 shadow-lg">
            </div>
            @endif
            <input type="file" name="profile_image" accept="image/*"
                   class="form-input file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-primary file:text-primary-foreground hover:file:bg-primary/80">
        </div>

        <div class="flex justify-end pt-4 border-t border-border">
            <button type="submit" class="btn-primary">
                Update Hero Section
            </button>
        </div>
    </form>
</div>
@endsection