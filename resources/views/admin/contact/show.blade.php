@extends('layouts.admin')

@section('admin-content')
<div class="max-w-3xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.contact.messages') }}" class="text-text-secondary hover:text-accent transition-colors flex items-center space-x-2 mb-4">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <span>Back to Messages</span>
        </a>
        <h1 class="text-3xl font-heading font-bold text-white">Message Details</h1>
    </div>

    <div class="glass-card p-6 rounded-xl space-y-6">
        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block text-sm text-text-secondary mb-1">From</label>
                <p class="text-white font-medium">{{ $message->name }}</p>
            </div>
            <div>
                <label class="block text-sm text-text-secondary mb-1">Email</label>
                <a href="mailto:{{ $message->email }}" class="text-accent hover:underline">{{ $message->email }}</a>
            </div>
            <div>
                <label class="block text-sm text-text-secondary mb-1">Date</label>
                <p class="text-white">{{ $message->created_at->format('F d, Y H:i') }}</p>
            </div>
            <div>
                <label class="block text-sm text-text-secondary mb-1">Status</label>
                @if($message->is_read)
                <span class="px-2 py-1 bg-green-500/10 text-green-400 text-xs rounded-full">Read</span>
                @else
                <span class="px-2 py-1 bg-accent/10 text-accent text-xs rounded-full">New</span>
                @endif
            </div>
        </div>
        
        <div>
            <label class="block text-sm text-text-secondary mb-1">Subject</label>
            <p class="text-white font-medium text-lg">{{ $message->subject }}</p>
        </div>
        
        <div>
            <label class="block text-sm text-text-secondary mb-2">Message</label>
            <div class="bg-dark-card p-4 rounded-xl">
                <p class="text-white whitespace-pre-wrap">{{ $message->message }}</p>
            </div>
        </div>
        
        <div class="flex justify-end space-x-4 pt-4">
            <a href="mailto:{{ $message->email }}" class="btn-outline">
                Reply via Email
            </a>
            @if(!$message->is_read)
            <form action="{{ route('admin.contact.messages.read', $message) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn-primary">
                    Mark as Read
                </button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection