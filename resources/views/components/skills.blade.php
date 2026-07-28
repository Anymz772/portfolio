@props(['skills'])

@php
    $categories = [
        'backend' => [
            'title' => 'Backend',
            'icon' => 'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01',
        ],
        'frontend' => [
            'title' => 'Frontend',
            'icon' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
        ],
        'tools' => [
            'title' => 'Tools',
            'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z',
        ],
        'networking' => [
            'title' => 'Networking',
            'icon' => 'M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.858 15.355-5.858 21.213 0',
        ],
    ];
@endphp

<section id="skills" class="relative scroll-mt-24 py-24 md:py-32">
    <div class="mx-auto max-w-6xl px-5">
        <x-section-heading
            eyebrow="Skills"
            title="The stack I build with"
            description="From database schema to deployed interface — tools I use daily."
        />

        <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @foreach($categories as $key => $category)
                <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                    <div data-tilt class="h-full transition-transform duration-300">
                        <div class="glass-card h-full rounded-3xl p-6">
                            <span class="inline-flex rounded-2xl bg-primary/10 p-3 text-primary">
                                <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $category['icon'] }}" />
                                </svg>
                            </span>
                            <h3 class="mt-5 text-lg font-semibold">{{ $category['title'] }}</h3>
                            <ul class="mt-4 flex flex-wrap gap-2">
                                @foreach($skills[$key] ?? [] as $skill)
                                    <li class="rounded-full border border-border px-3 py-1 text-xs text-muted-foreground transition-colors hover:border-primary/60 hover:text-primary">
                                        {{ $skill->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
