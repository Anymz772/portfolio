@extends('layouts.admin')

@section('admin-content')
<div class="max-w-2xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-heading font-bold text-white">Contact Information</h1>
        <p class="text-text-secondary mt-2">Update your contact details displayed on the portfolio</p>
    </div>

    <form action="{{ route('admin.contact.info.update') }}" method="POST" class="glass-card p-6 rounded-xl space-y-6">
        @csrf
        @method('PUT')
        
        <div>
            <label class="block text-sm font-medium text-white mb-2">Email Address</label>
            <input type="email" name="email" value="{{ old('email', $contactInfo->email) }}"
                   class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white"
                   placeholder="your.email@example.com">
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Phone Number</label>
            <input type="text" name="phone" value="{{ old('phone', $contactInfo->phone) }}"
                   class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white"
                   placeholder="+60 12-345-6789">
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Location</label>
            <input type="text" name="location" value="{{ old('location', $contactInfo->location) }}"
                   class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white"
                   placeholder="e.g., Kuala Lumpur, Malaysia">
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">LinkedIn URL</label>
            <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $contactInfo->linkedin_url) }}"
                   class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white"
                   placeholder="https://linkedin.com/in/...">
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">GitHub URL</label>
            <input type="url" name="github_url" value="{{ old('github_url', $contactInfo->github_url) }}"
                   class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white"
                   placeholder="https://github.com/...">
        </div>

        <div>
            <label class="block text-sm font-medium text-white mb-2">Twitter URL (Optional)</label>
            <input type="url" name="twitter_url" value="{{ old('twitter_url', $contactInfo->twitter_url) }}"
                   class="w-full px-4 py-3 bg-dark-card border border-glass-border rounded-xl focus:border-accent focus:outline-none transition-colors text-white"
                   placeholder="https://twitter.com/...">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="btn-primary">
                Update Contact Info
            </button>
        </div>
    </form>
</div>
@endsection