<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-display font-bold text-foreground">Create Account</h1>
        <p class="text-xs text-muted-foreground mt-1.5">Sign up to manage your portfolio content.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="form-label text-foreground">Full Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                   class="form-input mt-1.5" placeholder="Muhammad Aiman">
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-xs text-red-400" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="form-label text-foreground">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                   class="form-input mt-1.5" placeholder="admin@example.com">
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-400" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="form-label text-foreground">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                   class="form-input mt-1.5" placeholder="••••••••">
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-400" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="form-label text-foreground">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                   class="form-input mt-1.5" placeholder="••••••••">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xs text-red-400" />
        </div>

        <!-- Submit Button -->
        <div class="pt-3">
            <button type="submit" class="w-full btn-primary justify-center py-3.5 font-bold shadow-[0_0_20px_-3px_rgba(94,236,200,0.4)]">
                <span>Create Admin Account</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </button>
        </div>

        <div class="pt-4 border-t border-border/60 text-center">
            <p class="text-xs text-muted-foreground">
                Already have an account?
                <a href="{{ route('login') }}" class="font-semibold text-primary hover:underline">Sign In</a>
            </p>
        </div>
    </form>
</x-guest-layout>
