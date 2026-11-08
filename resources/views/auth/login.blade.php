<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full text-[var(--ink)] bg-[var(--canvas)] border border-cyan-200/20 rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--hairline)] focus:border-transparent py-2 px-3 appearance-none placeholder:text-slate-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-[var(--danger)]" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full text-[var(--ink)] bg-[var(--canvas)] border border-cyan-200/20 rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--hairline)] focus:border-transparent py-2 px-3 appearance-none placeholder:text-slate-500" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-[var(--danger)]" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center text-sm text-[var(--body)]">
                <input id="remember_me" type="checkbox" class="rounded bg-gray-800 border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-[var(--body)] dark:text-[var(--body)] hover:text-[var(--hairline)] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--hairline)] dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">{{ __('Log in') }}</x-primary-button>
        </div>
    </form>

    @if (app()->environment('local') || app()->environment('testing'))
        <div class="mt-6 p-4 bg-[var(--panel)] border-t border-cyan-200/15 border-b border-cyan-200/15">
            <p class="text-xs text-[var(--muted)] mb-2">Development accounts (local only)</p>
            <div class="grid grid-cols-2 gap-2">
                <a href="{{ route('auto.login', ['role' => 'admin']) }}" class="btn-ghost rounded-xl px-3 py-1.5 text-xs font-bold uppercase tracking-wider block">Admin @ demo.local</a>
                <a href="{{ route('auto.login', ['role' => 'staf']) }}" class="btn-ghost rounded-xl px-3 py-1.5 text-xs font-bold uppercase tracking-wider block">Staf @ demo.local</a>
            </div>
        </div>
    @endif
</x-guest-layout>