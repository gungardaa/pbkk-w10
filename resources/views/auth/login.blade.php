<x-guest-layout>
    {{-- Remove empty input field at top - kept x-auth-session-status only when there's a status --}}
    @if (session('status'))
        <x-auth-session-status class="mb-4" :status="session('status')" />
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="name@its.ac.id" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="w-full" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div class="flex items-center justify-between mt-6">
            <label for="remember_me" class="inline-flex items-center text-sm text-[var(--body)] hover:text-[var(--hairline)] transition-colors cursor-pointer">
                <input id="remember_me" type="checkbox" class="remember-input w-4 h-4 rounded border-2 border-cyan-500 bg-transparent transition-colors checked:bg-cyan-600 focus:ring-cyan-500/50 cursor-pointer">
                <span class="ms-2">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-[var(--body)] hover:text-[var(--hairline)] transition-colors" href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <x-primary-button class="w-full justify-center py-3 text-sm btn-dark-login">
            {{ __('Log in') }}
        </x-primary-button>
    </form>

    @if (app()->environment('local') || app()->environment('testing'))
        <div class="mt-8 pt-6 border-t border-cyan-200/10">
            <p class="font-mono2 text-[10px] text-[var(--body)] uppercase tracking-widest mb-3">Dev Auto-login</p>
            <div class="grid grid-cols-2 gap-2">
                <a href="{{ route('auto.login', ['role' => 'admin']) }}" class="btn-ghost rounded-lg px-2 py-2 text-[10px] font-bold uppercase text-center border-cyan-200/20 hover:border-cyan-200/40 transition-colors">Admin</a>
                <a href="{{ route('auto.login', ['role' => 'staf']) }}" class="btn-ghost rounded-lg px-2 py-2 text-[10px] font-bold uppercase text-center border-cyan-200/20 hover:border-cyan-200/40 transition-colors">Staf</a>
            </div>
        </div>
    @endif
</x-guest-layout>