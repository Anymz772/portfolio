@props(['projects'])

@php
    $defaultImages = [
        'alumni-management-system' => 'images/project-alumni.jpg',
        'family-memories-web-app' => 'images/project-memories.jpg',
        'procurement-management-system' => 'images/project-procurement.jpg',
    ];
@endphp

<section id="projects" class="relative scroll-mt-24 py-24 md:py-32">
    <div class="mx-auto max-w-6xl px-5">
        <x-section-heading
            eyebrow="Projects"
            title="Featured work"
            description="Selected systems I designed, built and shipped."
        />

        <div class="mt-14 grid gap-7 md:grid-cols-2 lg:grid-cols-3">
            @foreach($projects as $project)
                @php
                    $image = $project->image
                        ? asset('storage/'.$project->image)
                        : asset($defaultImages[$project->slug] ?? 'images/project-placeholder.svg');
                    $tags = array_filter(array_merge(
                        (array) $project->technologies,
                        (array) $project->features
                    ));
                @endphp

                <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                    <div data-tilt class="h-full transition-transform duration-300">
                        <article class="glass-card group flex h-full flex-col overflow-hidden rounded-3xl">
                            <div class="relative overflow-hidden">
                                <img
                                    src="{{ $image }}"
                                    alt="{{ $project->title }} interface preview"
                                    loading="lazy"
                                    width="1200"
                                    height="800"
                                    class="h-48 w-full object-cover transition-transform duration-700 group-hover:scale-110"
                                    onerror="this.src='{{ asset('images/project-placeholder.svg') }}'"
                                >
                                <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-gradient-to-t from-card to-transparent"></div>
                            </div>

                            <div class="flex flex-1 flex-col p-6">
                                <h3 class="text-lg font-semibold">{{ $project->title }}</h3>
                                <p class="mt-2 text-sm leading-relaxed text-muted-foreground">
                                    {{ $project->description }}
                                </p>

                                @if(count($tags))
                                    <ul class="mt-4 flex flex-wrap gap-2">
                                        @foreach(array_slice($tags, 0, 4) as $tag)
                                            <li class="rounded-full border border-primary/25 bg-primary/5 px-2.5 py-1 text-[11px] text-primary">
                                                {{ $tag }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                                <div class="mt-6 flex gap-3 pt-2">
                                    <a
                                        href="{{ $project->github_url ?? '#contact' }}"
                                        @if($project->github_url) target="_blank" rel="noopener noreferrer" @endif
                                        class="inline-flex flex-1 items-center justify-center gap-2 rounded-full border border-border px-4 py-2 text-xs font-semibold transition-colors hover:border-primary hover:text-primary"
                                    >
                                        <svg class="size-3.5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                        </svg>
                                        GitHub
                                    </a>
                                    <a
                                        href="{{ $project->live_url ?? '#contact' }}"
                                        @if($project->live_url) target="_blank" rel="noopener noreferrer" @endif
                                        class="inline-flex flex-1 items-center justify-center gap-2 rounded-full bg-primary px-4 py-2 text-xs font-semibold text-primary-foreground transition-transform hover:scale-105"
                                    >
                                        <svg class="size-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                        </svg>
                                        Live Demo
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
