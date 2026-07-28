@extends('layouts.admin')

@section('admin-content')
<div class="max-w-3xl mx-auto space-y-8">
    <div>
        <a href="{{ route('admin.contact.messages') }}" class="inline-flex items-center space-x-2 text-muted-foreground hover:text-primary transition-colors text-sm font-medium mb-4">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <span>Back to Messages</span>
        </a>
        <h1 class="text-3xl lg:text-4xl font-display font-bold">Message Details</h1>
    </div>

    <div class="glass-card p-6 lg:p-8 rounded-3xl space-y-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 p-5 rounded-2xl bg-card/40 border border-border">
            <div>
                <label class="text-xs font-semibold uppercase tracking-wider text-muted-foreground block mb-1">From</label>
                <p class="text-foreground font-semibold text-base">{{ $message->name }}</p>
            </div>
            <div>
                <label class="text-xs font-semibold uppercase tracking-wider text-muted-foreground block mb-1">Email</label>
                <a href="mailto:{{ $message->email }}" class="text-primary hover:underline font-medium">{{ $message->email }}</a>
            </div>
            <div>
                <label class="text-xs font-semibold uppercase tracking-wider text-muted-foreground block mb-1">Received Date</label>
                <p class="text-foreground font-mono text-sm">{{ $message->created_at->format('F d, Y H:i') }}</p>
            </div>
            <div>
                <label class="text-xs font-semibold uppercase tracking-wider text-muted-foreground block mb-1">Status</label>
                @if($message->is_read)
                <span class="px-2.5 py-1 bg-emerald-500/10 text-emerald-400 text-xs font-medium rounded-full border border-emerald-500/20">Read</span>
                @else
                <span class="px-2.5 py-1 bg-primary/20 text-primary text-xs font-semibold rounded-full border border-primary/30">New</span>
                @endif
            </div>
        </div>
        
        <div>
            <label class="text-xs font-semibold uppercase tracking-wider text-muted-foreground block mb-2">Subject</label>
            <p class="text-foreground font-display font-bold text-xl">{{ $message->subject }}</p>
        </div>
        
        <div>
            <label class="text-xs font-semibold uppercase tracking-wider text-muted-foreground block mb-2">Message Body</label>
            <div class="p-6 rounded-2xl bg-card/60 border border-border leading-relaxed text-foreground whitespace-pre-wrap">
                {{ $message->message }}
            </div>
        </div>
        
        <div class="flex justify-end space-x-4 pt-4 border-t border-border">
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