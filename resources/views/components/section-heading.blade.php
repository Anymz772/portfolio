@props([
    'eyebrow',
    'title',
    'description' => null,
])

<div {{ $attributes->merge(['class' => 'mx-auto max-w-2xl text-center']) }}>
    <p class="font-mono text-xs uppercase tracking-[0.3em] text-primary">{{ $eyebrow }}</p>
    <h2 class="mt-4 text-3xl font-bold sm:text-4xl md:text-5xl">{{ $title }}</h2>
    @if($description)
        <p class="mt-4 text-muted-foreground">{{ $description }}</p>
    @endif
</div>
