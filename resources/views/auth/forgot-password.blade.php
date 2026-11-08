<x-guest-layout>
    <p class="text-sm leading-relaxed text-[var(--body)] mb-6">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link.') }}
    </p>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="name@its.ac.id" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <x-primary-button class="w-full justify-center py-3 text-sm btn-dark-login">
            {{ __('SEND RESET LINK') }}
        </x-primary-button>
    </form>
</x-guest-layout>