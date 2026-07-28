@extends('layouts.admin')

@section('admin-content')
<div class="max-w-2xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-heading font-bold text-white">Hero Section</h1>
        <p class="text-text-secondary mt-2">Customize the hero section of your portfolio</p>
    </div>

    <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data" class="glass-card p-6 rounded-xl space-y-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-white mb-2">Title Line 1</label>
                <input type="text" name="title_line1" value="{{ old('title_line1', $hero->title_line1) }}" required
                       class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-white mb-2">Title Line 2</label>
                <input type="text" name="title_line2" value="{{ old('title_line2', $hero->title_line2) }}" required
                       class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-white mb-2">Title Line 3</label>
                <input type="text" name="title_line3" value="{{ old('title_line3', $hero->title_line3) }}" required
                       class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Description</label>
            <textarea name="description" rows="3" required
                      class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white resize-none">{{ old('description', $hero->description) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Typing Texts (comma-separated)</label>
            <input type="text" name="typing_texts" value="{{ old('typing_texts', is_array(json_decode($hero->typing_texts)) ? implode(', ', json_decode($hero->typing_texts)) : $hero->typing_texts) }}"
                   class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white"
                   placeholder="e.g., Laravel Developer, Backend Engineer, Full Stack Developer">
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Profile Image</label>
            @if($hero->profile_image)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $hero->profile_image) }}" alt="Profile" class="w-24 h-24 rounded-full object-cover">
            </div>
            @endif
            <input type="file" name="profile_image" accept="image/*"
                   class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-accent file:text-dark hover:file:bg-accent-dark">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="btn-primary">
                Update Hero Section
            </button>
        </div>
    </form>
</div>
@endsection