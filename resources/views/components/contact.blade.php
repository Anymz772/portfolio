@props(['contactInfo'])

<section id="contact" class="relative scroll-mt-24 py-24 md:py-32">
    <div class="mx-auto max-w-6xl px-5">
        <x-section-heading
            eyebrow="Contact"
            title="Let's build something"
            description="Tell me about your project and I'll get back to you within a day."
        />

        <div class="mt-14 grid gap-8 lg:grid-cols-[0.85fr_1.15fr]">
            <div class="glass-card h-full rounded-3xl p-7">
                <ul class="space-y-6">
                    @if($contactInfo?->email)
                        <li class="flex min-w-0 items-start gap-4">
                            <span class="mt-0.5 inline-flex shrink-0 rounded-xl bg-primary/10 p-2.5 text-primary">
                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </span>
                            <div class="min-w-0">
                                <p class="font-mono text-[11px] uppercase tracking-widest text-muted-foreground">Email</p>
                                <a href="mailto:{{ $contactInfo->email }}" class="truncate text-sm hover:text-primary">{{ $contactInfo->email }}</a>
                            </div>
                        </li>
                    @endif

                    @if($contactInfo?->phone)
                        <li class="flex min-w-0 items-start gap-4">
                            <span class="mt-0.5 inline-flex shrink-0 rounded-xl bg-primary/10 p-2.5 text-primary">
                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </span>
                            <div class="min-w-0">
                                <p class="font-mono text-[11px] uppercase tracking-widest text-muted-foreground">Phone</p>
                                <p class="truncate text-sm">{{ $contactInfo->phone }}</p>
                            </div>
                        </li>
                    @endif

                    @if($contactInfo?->linkedin_url)
                        <li class="flex min-w-0 items-start gap-4">
                            <span class="mt-0.5 inline-flex shrink-0 rounded-xl bg-primary/10 p-2.5 text-primary">
                                <svg class="size-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </span>
                            <div class="min-w-0">
                                <p class="font-mono text-[11px] uppercase tracking-widest text-muted-foreground">LinkedIn</p>
                                <a href="{{ $contactInfo->linkedin_url }}" target="_blank" rel="noopener noreferrer" class="truncate text-sm hover:text-primary">{{ $contactInfo->linkedin_url }}</a>
                            </div>
                        </li>
                    @endif

                    @if($contactInfo?->github_url)
                        <li class="flex min-w-0 items-start gap-4">
                            <span class="mt-0.5 inline-flex shrink-0 rounded-xl bg-primary/10 p-2.5 text-primary">
                                <svg class="size-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                            </span>
                            <div class="min-w-0">
                                <p class="font-mono text-[11px] uppercase tracking-widest text-muted-foreground">GitHub</p>
                                <a href="{{ $contactInfo->github_url }}" target="_blank" rel="noopener noreferrer" class="truncate text-sm hover:text-primary">{{ $contactInfo->github_url }}</a>
                            </div>
                        </li>
                    @endif

                    @if($contactInfo?->location)
                        <li class="flex min-w-0 items-start gap-4">
                            <span class="mt-0.5 inline-flex shrink-0 rounded-xl bg-primary/10 p-2.5 text-primary">
                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </span>
                            <div class="min-w-0">
                                <p class="font-mono text-[11px] uppercase tracking-widest text-muted-foreground">Location</p>
                                <p class="truncate text-sm">{{ $contactInfo->location }}</p>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>

            <div>
                <form
                    x-data="contactForm"
                    @submit.prevent="submitForm"
                    action="https://formspree.io/f/mojgzwdd"
                    method="POST"
                    class="glass-card rounded-3xl p-7"
                >
                    <!-- Formspree Anti-Spam Honeypot & Config -->
                    <input type="text" name="_gotcha" style="display:none" tabindex="-1" autocomplete="off">
                    <input type="hidden" name="_subject" value="New Portfolio Contact Message!">

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="name" class="form-label">Name</label>
                            <input id="name" name="name" type="text" required placeholder="Your name" class="form-input">
                        </div>
                        <div>
                            <label for="email" class="form-label">Email</label>
                            <input id="email" name="email" type="email" required placeholder="you@email.com" class="form-input">
                        </div>
                    </div>

                    <div class="mt-5">
                        <label for="subject" class="form-label">Subject</label>
                        <input id="subject" name="subject" type="text" required placeholder="What is this about?" class="form-input">
                    </div>

                    <div class="mt-5">
                        <label for="message" class="form-label">Message</label>
                        <textarea id="message" name="message" required rows="5" placeholder="Tell me about your project…" class="form-input resize-none"></textarea>
                    </div>

                    <button type="submit" class="btn-primary mt-6" :disabled="loading">
                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                        <span x-text="loading ? 'Sending…' : 'Send Message'"></span>
                    </button>

                    <!-- Success Feedback -->
                    <p
                        x-show="sent"
                        x-cloak
                        x-transition
                        role="status"
                        class="mt-5 flex items-center gap-2 rounded-2xl border border-primary/40 bg-primary/10 px-4 py-2.5 text-sm text-primary"
                    >
                        <svg class="size-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Message sent — thank you!
                    </p>

                    <!-- Error Feedback -->
                    <p
                        x-show="errorMessage"
                        x-cloak
                        x-transition
                        role="alert"
                        class="mt-5 flex items-center gap-2 rounded-2xl border border-red-500/40 bg-red-500/10 px-4 py-2.5 text-sm text-red-400"
                    >
                        <svg class="size-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span x-text="errorMessage"></span>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
