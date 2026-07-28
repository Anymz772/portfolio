@props(['experiences'])

<section id="experience" class="relative scroll-mt-24 py-24 md:py-32">
    <div class="mx-auto max-w-4xl px-5">
        <x-section-heading eyebrow="Experience" title="Where I've worked" />

        <div class="relative mt-14 pl-8 sm:pl-12">
            <span
                aria-hidden="true"
                class="absolute left-[7px] top-2 h-[calc(100%-1rem)] w-px bg-gradient-to-b from-primary/70 via-border to-transparent sm:left-[11px]"
            ></span>

            @foreach($experiences as $experience)
                <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" class="relative pb-12 last:pb-0">
                    <span class="absolute -left-8 top-2 size-4 rounded-full border-2 border-primary bg-background sm:-left-12"></span>

                    <div class="glass-card rounded-3xl p-6">
                        <div class="flex flex-wrap items-baseline justify-between gap-2">
                            <h3 class="text-xl font-semibold">{{ $experience->title }}</h3>
                            <span class="font-mono text-xs uppercase tracking-widest text-primary">
                                @if($experience->is_current)
                                    Present
                                @else
                                    {{ $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('M Y') : 'Earlier' }}
                                @endif
                            </span>
                        </div>
                        <p class="mt-1 text-sm text-muted-foreground">{{ $experience->company }}</p>

                        @if($experience->responsibilities)
                            <ul class="mt-4 flex flex-wrap gap-2">
                                @foreach((array) $experience->responsibilities as $point)
                                    <li class="rounded-full bg-secondary px-3 py-1 text-xs text-muted-foreground">
                                        {{ $point }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
