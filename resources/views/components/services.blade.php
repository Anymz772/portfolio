@props(['services'])

<section id="services" class="relative scroll-mt-24 py-24 md:py-32">
    <div class="mx-auto max-w-6xl px-5">
        <x-section-heading eyebrow="Services" title="How I can help" />

        <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @foreach($services as $service)
                <div class="glass-card group h-full rounded-3xl p-6">
                    <span class="inline-flex rounded-2xl border border-primary/30 p-3 text-primary transition-shadow group-hover:shadow-primary-sm">
                        <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $service->icon }}" />
                        </svg>
                    </span>
                    <h3 class="mt-5 text-lg font-semibold">{{ $service->title }}</h3>
                    <p class="mt-2 text-sm leading-relaxed text-muted-foreground">{{ $service->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
