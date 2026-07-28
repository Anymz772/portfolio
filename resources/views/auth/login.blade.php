<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-2xl font-display font-bold text-foreground">Welcome Back</h1>
        <p class="text-xs text-muted-foreground mt-1.5">Enter your credentials to access the admin dashboard.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-sm text-primary bg-primary/10 p-3.5 rounded-2xl border border-primary/20" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="form-label text-foreground">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                   class="form-input mt-1.5" placeholder="admin@example.com">
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red-400" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between">
                <label for="password" class="form-label text-foreground">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-xs text-muted-foreground hover:text-primary transition-colors" href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif
            </div>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                   class="form-input mt-1.5" placeholder="••••••••">
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red-400" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center space-x-2.5 pt-1">
            <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 accent-primary bg-background rounded border-border cursor-pointer">
            <label for="remember_me" class="text-xs text-muted-foreground cursor-pointer select-none">
                Remember me on this device
            </label>
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <button type="submit" class="w-full btn-primary justify-center py-3.5 font-bold shadow-[0_0_20px_-3px_rgba(94,236,200,0.4)]">
                <span>Sign In to Admin</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </button>
        </div>

        @if (Route::has('register'))
        <div class="pt-4 border-t border-border/60 text-center">
            <p class="text-xs text-muted-foreground">
                Don't have an account?
                <a href="{{ route('register') }}" class="font-semibold text-primary hover:underline">Create Account</a>
            </p>
        </div>
        @endif
    </form>
</x-guest-layout>
