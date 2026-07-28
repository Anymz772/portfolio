@extends('layouts.admin')

@section('admin-content')
<div class="space-y-6">
    <div>
        <h1 class="text-3xl font-heading font-bold text-white">Messages</h1>
        <p class="text-text-secondary mt-2">View and manage contact form submissions</p>
    </div>

    <div class="glass-card rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-glass-border">
                        <th class="text-left p-4 text-text-secondary font-medium">From</th>
                        <th class="text-left p-4 text-text-secondary font-medium">Subject</th>
                        <th class="text-left p-4 text-text-secondary font-medium">Date</th>
                        <th class="text-left p-4 text-text-secondary font-medium">Status</th>
                        <th class="text-left p-4 text-text-secondary font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $message)
                    <tr class="border-b border-glass-border hover:bg-white/5 transition-colors {{ !$message->is_read ? 'bg-accent/5' : '' }}">
                        <td class="p-4">
                            <div>
                                <p class="text-white font-medium">{{ $message->name }}</p>
                                <p class="text-text-secondary text-sm">{{ $message->email }}</p>
                            </div>
                        </td>
                        <td class="p-4">
                            <p class="text-white">{{ $message->subject }}</p>
                        </td>
                        <td class="p-4">
                            <p class="text-text-secondary text-sm">{{ $message->created_at->format('M d, Y H:i') }}</p>
                        </td>
                        <td class="p-4">
                            @if($message->is_read)
                            <span class="px-2 py-1 bg-green-500/10 text-green-400 text-xs rounded-full">Read</span>
                            @else
                            <span class="px-2 py-1 bg-accent/10 text-accent text-xs rounded-full">New</span>
                            @endif
                        </td>
                        <td class="p-4">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.contact.messages.show', $message) }}" class="p-2 hover:bg-accent/10 rounded-lg transition-colors">
                                    <svg class="w-4 h-4 text-text-secondary hover:text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                @if(!$message->is_read)
                                <form action="{{ route('admin.contact.messages.read', $message) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="p-2 hover:bg-accent/10 rounded-lg transition-colors">
                                        <svg class="w-4 h-4 text-text-secondary hover:text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </button>
                                </form>
                                @endif
                                <form action="{{ route('admin.contact.messages.delete', $message) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 hover:bg-red-500/10 rounded-lg transition-colors">
                                        <svg class="w-4 h-4 text-text-secondary hover:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
    
    {{ $messages->links() }}
</div>
@endsection