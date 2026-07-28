@extends('layouts.admin')

@section('admin-content')
<div class="space-y-8">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl lg:text-4xl font-display font-bold">Testimonials</h1>
            <p class="text-muted-foreground mt-2">Manage client feedback, ratings, and testimonials.</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" class="btn-primary shrink-0 self-start sm:self-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>Add Testimonial</span>
        </a>
    </div>

    <div class="space-y-4">
        @foreach($testimonials as $testimonial)
        <div class="glass-card p-6 lg:p-8 rounded-3xl">
            <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4">
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-primary/10 border border-primary/20 rounded-full flex items-center justify-center shrink-0">
                        <span class="text-primary font-display font-bold text-lg">{{ strtoupper(substr($testimonial->client_name, 0, 1)) }}</span>
                    </div>
                    <div class="space-y-2">
                        <div>
                            <h3 class="text-lg font-display font-bold text-foreground">{{ $testimonial->client_name }}</h3>
                            @if($testimonial->client_position || $testimonial->client_company)
                            <p class="text-xs text-muted-foreground">{{ $testimonial->client_position }} at <span class="text-primary font-medium">{{ $testimonial->client_company }}</span></p>
                            @endif
                        </div>
                        <div class="flex space-x-1">
                            @for($i = 1; $i <= 5; $i++)
                            <svg class="w-4 h-4 {{ $i <= $testimonial->rating ? 'text-amber-400' : 'text-muted/40' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            @endfor
                        </div>
                        <p class="text-muted-foreground text-sm leading-relaxed">&ldquo;{{ $testimonial->content }}&rdquo;</p>
                    </div>
                </div>

                <div class="flex items-center space-x-1 shrink-0 self-end sm:self-start">
                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="p-2 hover:bg-primary/10 text-muted-foreground hover:text-primary rounded-xl transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this testimonial?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 hover:bg-red-500/10 text-muted-foreground hover:text-red-400 rounded-xl transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection