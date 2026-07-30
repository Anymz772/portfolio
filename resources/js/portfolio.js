document.addEventListener('DOMContentLoaded', () => {
    initTypewriter();
    initParticles();
    initTiltCards();
    initMagnetic();
    initSpotlight();
});

function initTypewriter() {
    const element = document.getElementById('typing-text');
    if (!element) {
        return;
    }

    let words = [];
    try {
        words = JSON.parse(element.dataset.words || '[]');
    } catch {
        words = [];
    }

    if (words.length === 0) {
        words = ['Software Engineer', 'Laravel Developer', 'Backend Developer', 'Network Enthusiast'];
    }

    let wordIndex = 0;
    let text = '';
    let deleting = false;

    const tick = () => {
        const word = words[wordIndex % words.length];
        const done = !deleting && text === word;
        const cleared = deleting && text === '';

        if (done) {
            deleting = true;
            setTimeout(tick, 1600);

            return;
        }

        if (cleared) {
            deleting = false;
            wordIndex += 1;
            setTimeout(tick, 85);

            return;
        }

        text = deleting ? word.slice(0, text.length - 1) : word.slice(0, text.length + 1);
        element.textContent = text;
        setTimeout(tick, deleting ? 40 : 85);
    };

    tick();
}

function initParticles() {
    const container = document.getElementById('particles-container');
    if (!container) {
        return;
    }

    const count = 26;

    for (let i = 0; i < count; i++) {
        const dot = document.createElement('span');
        const size = Math.random() * 3 + 1;
        const duration = Math.random() * 8 + 6;
        const delay = Math.random() * 6;

        dot.className = 'absolute rounded-full bg-primary/60';
        dot.style.left = `${Math.random() * 100}%`;
        dot.style.top = `${Math.random() * 100}%`;
        dot.style.width = `${size}px`;
        dot.style.height = `${size}px`;
        dot.style.animation = `float-particle ${duration}s ease-in-out ${delay}s infinite`;

        container.appendChild(dot);
    }
}

function initTiltCards() {
    document.querySelectorAll('[data-tilt]').forEach((card) => {
        card.style.transformStyle = 'preserve-3d';
        card.style.perspective = '900px';

        card.addEventListener('mousemove', (event) => {
            const rect = card.getBoundingClientRect();
            const rotateY = ((event.clientX - (rect.left + rect.width / 2)) / rect.width) * 12;
            const rotateX = -((event.clientY - (rect.top + rect.height / 2)) / rect.height) * 12;

            card.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = 'rotateX(0deg) rotateY(0deg)';
        });
    });
}

function initMagnetic() {
    document.querySelectorAll('[data-magnetic]').forEach((element) => {
        element.addEventListener('mousemove', (event) => {
            const rect = element.getBoundingClientRect();
            const x = (event.clientX - (rect.left + rect.width / 2)) * 0.25;
            const y = (event.clientY - (rect.top + rect.height / 2)) * 0.25;

            element.style.transform = `translate(${x}px, ${y}px)`;
        });

        element.addEventListener('mouseleave', () => {
            element.style.transform = 'translate(0, 0)';
        });
    });
}

function initSpotlight() {
    const spotlight = document.getElementById('spotlight');
    if (!spotlight) {
        return;
    }

    window.addEventListener('pointermove', (event) => {
        spotlight.style.background = `radial-gradient(340px circle at ${event.clientX}px ${event.clientY}px, color-mix(in srgb, #5eecc8 10%, transparent), transparent 70%)`;
    });
}

document.addEventListener('alpine:init', () => {
    window.Alpine.data('contactForm', () => ({
        sent: false,
        loading: false,

        async submitForm(event) {
            event.preventDefault();
            this.loading = true;

            const form = event.target;
            const formData = new FormData(form);

            const csrfMeta = document.querySelector('meta[name="csrf-token"]');
            const headers = {
                Accept: 'application/json',
            };

            if (csrfMeta && csrfMeta.content) {
                headers['X-CSRF-TOKEN'] = csrfMeta.content;
            }

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: headers,
                    body: formData,
                });

                if (response.ok) {
                    form.reset();
                    this.sent = true;
                    setTimeout(() => {
                        this.sent = false;
                    }, 4000);
                }
            } catch (error) {
                console.error('Contact form error:', error);
            } finally {
                this.loading = false;
            }
        },
    }));

    window.Alpine.data('testimonialCarousel', (total) => ({
        activeIndex: 0,
        total,

        previous() {
            this.activeIndex = (this.activeIndex - 1 + this.total) % this.total;
        },

        next() {
            this.activeIndex = (this.activeIndex + 1) % this.total;
        },
    }));
});
