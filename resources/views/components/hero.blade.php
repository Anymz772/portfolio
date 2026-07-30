@props(['heroContent'])

@php
    $portrait = $heroContent?->profile_image
        ? asset('storage/'.$heroContent->profile_image)
        : asset('images/portrait-placeholder.svg');

    $typingTexts = $heroContent?->typing_texts ?? [
        'Software Engineer',
        'Laravel & Web Systems',
        'Full Stack Developer',
        'System Architect',
    ];

    $titleLines = [
        $heroContent?->title_line1 ?? 'Software',
        $heroContent?->title_line2 ?? 'Engineering &',
        $heroContent?->title_line3 ?? 'Web Systems',
    ];

    $description = $heroContent?->description
        ?? 'Software Engineer building high-performance Laravel web applications, modern web interfaces, and scalable backend architectures.';
@endphp

<section id="home" class="relative overflow-hidden pb-24 pt-36 md:pb-32 md:pt-44">
    <div id="particles-container" aria-hidden="true" class="pointer-events-none absolute inset-0 overflow-hidden"></div>

    <div aria-hidden="true" class="pointer-events-none absolute -left-40 top-10 size-[28rem] rounded-full bg-primary/15 blur-[130px]"></div>
    <div aria-hidden="true" class="pointer-events-none absolute -right-32 bottom-0 size-[24rem] rounded-full bg-primary/10 blur-[130px]"></div>

    <div class="relative mx-auto grid max-w-6xl items-center gap-14 px-5 lg:grid-cols-[1.05fr_0.95fr]">
        <div>
            <p class="inline-flex items-center gap-2 rounded-full border border-border px-4 py-1.5 font-mono text-xs uppercase tracking-[0.25em] text-primary">
                <span class="size-1.5 rounded-full bg-primary"></span>
                Available for work
            </p>

            <h1 class="mt-7 font-display text-[clamp(2.9rem,10vw,5.5rem)] font-extrabold leading-[0.95]">
                @foreach($titleLines as $index => $line)
                    <span @class(['block', 'text-outline' => $index === 1])>{{ $line }}</span>
                @endforeach
            </h1>

            <p class="mt-6 font-display text-lg font-semibold sm:text-xl">
                <span id="typing-text" class="text-primary" data-words='@json($typingTexts)'></span>
                <span class="ml-0.5 inline-block w-0.5 translate-y-0.5 bg-primary animate-caret-blink" style="height: 1em;"></span>
            </p>

            <p class="mt-5 max-w-xl leading-relaxed text-muted-foreground">
                {{ $description }}
            </p>

            <div class="mt-9 flex flex-wrap gap-4">
                <div data-magnetic class="inline-block transition-transform duration-200">
                    <a href="#projects" class="btn-primary">
                        View Projects
                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
                <div data-magnetic class="inline-block transition-transform duration-200">
                    <a href="#contact" class="btn-outline">
                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Contact Me
                    </a>
                </div>
            </div>
        </div>

        <div class="relative mx-auto w-full max-w-md">
            <div class="gradient-border overflow-hidden rounded-[2rem]">
                <img
                    src="{{ $portrait }}"
                    alt="Portrait of Muhammad Aiman Hakim, software engineer"
                    width="1024"
                    height="1280"
                    class="h-full w-full object-cover aspect-[4/5]"
                    onerror="this.src='{{ asset('images/portrait-placeholder.svg') }}'"
                >
                <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-gradient-to-t from-background via-background/25 to-transparent"></div>
            </div>
        </div>
    </div>
</section>
