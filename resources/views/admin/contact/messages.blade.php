@extends('layouts.admin')

@section('admin-content')
<div class="space-y-8">
    <div>
        <h1 class="text-3xl lg:text-4xl font-display font-bold">Messages Inbox</h1>
        <p class="text-muted-foreground mt-2">View, mark as read, or manage contact form submissions from your portfolio site.</p>
    </div>

    <div class="glass-card rounded-3xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-border bg-card/40 text-xs font-semibold uppercase tracking-wider text-muted-foreground">
                        <th class="p-5">From</th>
                        <th class="p-5">Subject</th>
                        <th class="p-5">Date</th>
                        <th class="p-5">Status</th>
                        <th class="p-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @foreach($messages as $message)
                    <tr class="hover:bg-card/40 transition-colors {{ !$message->is_read ? 'bg-primary/5 font-medium' : '' }}">
                        <td class="p-5">
                            <div>
                                <p class="font-semibold text-foreground">{{ $message->name }}</p>
                                <p class="text-xs text-muted-foreground">{{ $message->email }}</p>
                            </div>
                        </td>
                        <td class="p-5">
                            <p class="text-sm text-foreground">{{ $message->subject }}</p>
                        </td>
                        <td class="p-5">
                            <p class="text-xs font-mono text-muted-foreground">{{ $message->created_at->format('M d, Y H:i') }}</p>
                        </td>
                        <td class="p-5">
                            @if($message->is_read)
                            <span class="px-2.5 py-1 bg-emerald-500/10 text-emerald-400 text-xs font-medium rounded-full border border-emerald-500/20">Read</span>
                            @else
                            <span class="px-2.5 py-1 bg-primary/20 text-primary text-xs font-semibold rounded-full border border-primary/30 animate-pulse">New</span>
                            @endif
                        </td>
                        <td class="p-5 text-right">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="{{ route('admin.contact.messages.show', $message) }}" title="View Message" class="p-2 hover:bg-primary/10 text-muted-foreground hover:text-primary rounded-xl transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                @if(!$message->is_read)
                                <form action="{{ route('admin.contact.messages.read', $message) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" title="Mark as Read" class="p-2 hover:bg-primary/10 text-muted-foreground hover:text-primary rounded-xl transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </button>
                                </form>
                                @endif
                                <form action="{{ route('admin.contact.messages.delete', $message) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Delete Message" class="p-2 hover:bg-red-500/10 text-muted-foreground hover:text-red-400 rounded-xl transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="pt-2">
        {{ $messages->links() }}
    </div>
</div>
@endsection