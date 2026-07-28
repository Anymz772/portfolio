@props(['testimonials'])

@if($testimonials->count())
    <section id="testimonials" class="relative scroll-mt-24 py-24 md:py-32">
        <div class="mx-auto max-w-4xl px-5">
            <x-section-heading eyebrow="Testimonials" title="Kind words" />

            <div
                x-data="testimonialCarousel({{ $testimonials->count() }})"
                class="glass-card gradient-border mt-14 rounded-3xl p-8 sm:p-10"
            >
                <svg class="size-8 text-primary" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M4.583 17.321C3.553 16.227 3 15 3 13.011c0-3.5 2.457-6.637 6.03-8.45l.665 1.262C6.688 7.657 5.5 9.988 5.5 12.992c0 1.875.625 3.188 1.875 3.938.625.375 1.25.562 1.875.562 1.042 0 1.875-.729 1.875-1.667 0-.833-.521-1.458-1.458-1.458-.521 0-.937.208-1.25.521.104-.937.729-1.875 1.875-2.708 1.042-.729 2.083-1.042 3.125-1.042 2.292 0 3.958 1.771 3.958 4.271 0 2.708-1.563 5.104-4.063 6.354l-.834-1.354zm9.75 0c-1.03-1.094-1.583-2.321-1.583-4.31 0-3.5 2.457-6.637 6.03-8.45l.665 1.262c-2.507 1.834-3.695 4.165-3.695 7.169 0 1.875.625 3.188 1.875 3.938.625.375 1.25.562 1.875.562 1.042 0 1.875-.729 1.875-1.667 0-.833-.521-1.458-1.458-1.458-.521 0-.937.208-1.25.521.104-.937.729-1.875 1.875-2.708 1.042-.729 2.083-1.042 3.125-1.042 2.292 0 3.958 1.771 3.958 4.271 0 2.708-1.563 5.104-4.063 6.354l-.834-1.354z"/>
                </svg>

                <div class="relative mt-5 min-h-[120px]">
                    @foreach($testimonials as $index => $testimonial)
                        <blockquote
                            x-show="activeIndex === {{ $index }}"
                            x-cloak
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-3"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            class="text-lg leading-relaxed sm:text-xl"
                        >
                            &ldquo;{{ $testimonial->content }}&rdquo;
                        </blockquote>
                    @endforeach
                </div>

                <div class="mt-8 grid grid-cols-[minmax(0,1fr)_auto] items-center gap-4">
                    @foreach($testimonials as $index => $testimonial)
                        <div
                            x-show="activeIndex === {{ $index }}"
                            x-cloak
                            class="flex min-w-0 items-center gap-3"
                        >
                            <span class="grid size-11 shrink-0 place-items-center rounded-full bg-primary/15 font-semibold text-primary">
                                {{ strtoupper(substr($testimonial->client_name, 0, 2)) }}
                            </span>
                            <div class="min-w-0">
                                <p class="truncate font-semibold">{{ $testimonial->client_name }}</p>
                                <p class="truncate text-sm text-muted-foreground">
                                    {{ $testimonial->client_position }}@if($testimonial->client_company), {{ $testimonial->client_company }}@endif
                                </p>
                            </div>
                        </div>
                    @endforeach

                    @if($testimonials->count() > 1)
                        <div class="flex shrink-0 gap-2">
                            <button
                                type="button"
                                aria-label="Previous testimonial"
                                @click="previous()"
                                class="rounded-full border border-border p-2.5 transition-colors hover:border-primary hover:text-primary"
                            >
                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            <button
                                type="button"
                                aria-label="Next testimonial"
                                @click="next()"
                                class="rounded-full border border-border p-2.5 transition-colors hover:border-primary hover:text-primary"
                            >
                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endif
