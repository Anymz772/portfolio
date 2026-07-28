@extends('layouts.admin')

@section('admin-content')
<div class="max-w-3xl mx-auto space-y-8">
    <div>
        <h1 class="text-3xl lg:text-4xl font-display font-bold">Contact Information</h1>
        <p class="text-muted-foreground mt-2">Update your email, phone, location, and social media links displayed on the portfolio homepage.</p>
    </div>

    <form action="{{ route('admin.contact.info.update') }}" method="POST" class="glass-card p-6 lg:p-8 rounded-3xl space-y-6">
        @csrf
        @method('PUT')
        
        <div>
            <label class="form-label">Email Address</label>
            <input type="email" name="email" value="{{ old('email', $contactInfo->email) }}" class="form-input" placeholder="your.email@example.com">
        </div>

        <div>
            <label class="form-label">Phone Number</label>
            <input type="text" name="phone" value="{{ old('phone', $contactInfo->phone) }}" class="form-input" placeholder="+60 12-345-6789">
        </div>

        <div>
            <label class="form-label">Location</label>
            <input type="text" name="location" value="{{ old('location', $contactInfo->location) }}" class="form-input" placeholder="e.g., Kuala Lumpur, Malaysia">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="form-label">LinkedIn URL</label>
                <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $contactInfo->linkedin_url) }}" class="form-input" placeholder="https://linkedin.com/in/...">
            </div>

            <div>
                <label class="form-label">GitHub URL</label>
                <input type="url" name="github_url" value="{{ old('github_url', $contactInfo->github_url) }}" class="form-input" placeholder="https://github.com/...">
            </div>
        </div>

        <div>
            <label class="form-label">Twitter / X URL (Optional)</label>
            <input type="url" name="twitter_url" value="{{ old('twitter_url', $contactInfo->twitter_url) }}" class="form-input" placeholder="https://twitter.com/...">
        </div>

        <div class="flex justify-end pt-4 border-t border-border">
            <button type="submit" class="btn-primary">
                Update Contact Info
            </button>
        </div>
    </form>
</div>
@endsection