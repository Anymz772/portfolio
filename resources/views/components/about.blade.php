@props(['aboutContent'])

@php
    $portrait = $aboutContent?->profile_image
        ? asset('storage/'.$aboutContent->profile_image)
        : asset('images/portrait-placeholder.svg');

    $bioParagraphs = $aboutContent?->bio
        ? array_filter(array_map('trim', preg_split('/\n\s*\n/', $aboutContent->bio)))
        : [
            'A software engineer passionate about creating scalable backend systems, elegant web applications, and solving real-world problems using modern technologies.',
            'I enjoy working with Laravel, PHP, MySQL, JavaScript, Tailwind CSS, REST APIs, and cloud technologies while continuously learning new frameworks and best practices.',
        ];

    $stats = [
        ['value' => ($aboutContent?->projects_count ?? 10).'+', 'label' => 'Projects'],
        ['value' => ($aboutContent?->experience_years ?? 2).'+', 'label' => 'Years Learning'],
        ['value' => $aboutContent?->expertise_level ?? 'Laravel', 'label' => 'Expert'],
        ['value' => $aboutContent?->development_type ?? 'Full Stack', 'label' => 'Development'],
    ];
@endphp

<section id="about" class="relative mx-auto max-w-6xl scroll-mt-24 px-5 py-24 md:py-32">
    <x-section-heading eyebrow="About" title="A little about me" />

    <div class="mt-14 grid items-center gap-12 lg:grid-cols-[0.85fr_1.15fr]">
        <div class="mx-auto w-full max-w-sm">
            <div class="glow-ring overflow-hidden rounded-[2rem]">
                <img
                    src="{{ $portrait }}"
                    alt="Muhammad Aiman Hakim working as a software engineer"
                    loading="lazy"
                    width="1024"
                    height="1280"
                    class="h-full w-full object-cover aspect-[4/5]"
                    onerror="this.src='{{ asset('images/portrait-placeholder.svg') }}'"
                >
            </div>
        </div>

        <div>
            <h3 class="text-2xl font-bold sm:text-3xl">
                Hi, I'm <span class="text-primary">Muhammad Aiman Hakim</span>.
            </h3>

            @foreach($bioParagraphs as $paragraph)
                <p @class(['leading-relaxed text-muted-foreground', 'mt-5' => $loop->first, 'mt-4' => ! $loop->first])>
                    {{ $paragraph }}
                </p>
            @endforeach

            <div class="mt-9 grid grid-cols-2 gap-4">
                @foreach($stats as $stat)
                    <div class="glass-card rounded-2xl p-5">
                        <p class="font-display text-2xl font-bold text-primary">{{ $stat['value'] }}</p>
                        <p class="mt-1 text-sm text-muted-foreground">{{ $stat['label'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
