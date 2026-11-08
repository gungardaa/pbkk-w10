<section>
    <header>
        <h2 class="font-display text-xl font-bold text-[var(--ink)]">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-[var(--body)]">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-5 space-y-5">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <p class="mt-0.5 text-xs text-[var(--body)] opacity-70">{{ __('The password you currently use to log in.') }}</p>
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 w-full" autocomplete="current-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-1" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <p class="mt-0.5 text-xs text-[var(--body)] opacity-70">{{ __('Choose a new password (min. 8 characters).') }}</p>
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 w-full" autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-1" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <p class="mt-0.5 text-xs text-[var(--body)] opacity-70">{{ __('Re-enter the new password to confirm.') }}</p>
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 w-full" autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-1" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="btn-dark-login">{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-[var(--body)]"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
