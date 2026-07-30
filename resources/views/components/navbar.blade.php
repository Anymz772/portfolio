@php
    $links = [
        ['label' => 'Home', 'href' => '#home'],
        ['label' => 'About', 'href' => '#about'],
        ['label' => 'Skills', 'href' => '#skills'],
        ['label' => 'Experience', 'href' => '#experience'],
        ['label' => 'Projects', 'href' => '#projects'],
        ['label' => 'Services', 'href' => '#services'],
        ['label' => 'Contact', 'href' => '#contact'],
    ];
@endphp

<header
    x-data="{ scrolled: false, open: false }"
    x-init="scrolled = window.scrollY > 24"
    @scroll.window="scrolled = window.scrollY > 24"
    :class="scrolled ? 'border-b border-border bg-background/70 backdrop-blur-xl' : ''"
    class="fixed inset-x-0 top-0 z-50 transition-all duration-500"
>
    <nav class="mx-auto grid max-w-6xl grid-cols-[minmax(0,1fr)_auto] items-center gap-4 px-5 py-4 lg:flex lg:justify-between">
        <a href="#home" class="min-w-0 truncate font-display text-lg font-bold">
            aiman<span class="text-primary">.</span>hakim
        </a>

        <ul class="hidden items-center gap-7 text-sm text-muted-foreground lg:flex">
            @foreach($links as $link)
                <li>
                    <a href="{{ $link['href'] }}" class="transition-colors hover:text-primary">{{ $link['label'] }}</a>
                </li>
            @endforeach
        </ul>

        <div class="flex shrink-0 items-center gap-2">
            <a
                href="{{ asset('resume.pdf') }}"
                download="Muhammad_Aiman_Hakim_Resume.pdf"
                target="_blank"
                class="hidden items-center gap-2 rounded-full bg-primary px-5 py-2.5 text-sm font-semibold text-primary-foreground transition-transform hover:scale-105 sm:inline-flex"
            >
                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Resume
            </a>
            <button
                type="button"
                aria-label="Toggle navigation"
                @click="open = !open"
                class="rounded-full border border-border p-2.5 lg:hidden"
            >
                <svg x-show="!open" class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="open" x-cloak class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </nav>

    <ul
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        class="animate-fade-in border-t border-border bg-background/95 px-5 py-4 backdrop-blur-xl lg:hidden"
    >
        @foreach($links as $link)
            <li>
                <a
                    href="{{ $link['href'] }}"
                    @click="open = false"
                    class="block py-2.5 text-sm text-muted-foreground transition-colors hover:text-primary"
                >
                    {{ $link['label'] }}
                </a>
            </li>
        @endforeach
        <li class="mt-3 pt-3 border-t border-border">
            <a
                href="{{ asset('resume.pdf') }}"
                download="Muhammad_Aiman_Hakim_Resume.pdf"
                target="_blank"
                @click="open = false"
                class="flex items-center justify-center gap-2 rounded-full bg-primary px-5 py-2.5 text-sm font-semibold text-primary-foreground"
            >
                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Download Resume
            </a>
        </li>
    </ul>
</header>
