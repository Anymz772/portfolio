<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-display font-bold text-foreground">Forgot Password?</h1>
        <p class="text-xs text-muted-foreground mt-1.5 leading-relaxed">No problem. Enter your email address and we will send you a password reset link.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-sm text-primary bg-primary/10 p-3.5 rounded-2xl border border-primary/20" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="form-label text-foreground">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="form-input mt-1.5" placeholder="admin@example.com">
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-400" />
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <button type="submit" class="w-full btn-primary justify-center py-3.5 font-bold shadow-[0_0_20px_-3px_rgba(94,236,200,0.4)]">
                <span>Send Reset Link</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </button>
        </div>

        <div class="pt-4 border-t border-border/60 text-center">
            <p class="text-xs text-muted-foreground">
                Remembered your password?
                <a href="{{ route('login') }}" class="font-semibold text-primary hover:underline">Return to Sign In</a>
            </p>
        </div>
    </form>
</x-guest-layout>
