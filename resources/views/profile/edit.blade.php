<x-app-layout>
    <div class="py-8">
        <div class="mx-auto max-w-2xl space-y-4">
            <div class="card p-6 sm:p-8">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="card p-6 sm:p-8">
                @include('profile.partials.update-password-form')
            </div>

            <div class="card p-6 sm:p-8">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

        {{-- Modal lives outside the cards: .card uses backdrop-filter, which
             would otherwise trap this position:fixed overlay inside the card. --}}
        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                @csrf
                @method('delete')

                <h2 class="font-display text-lg font-bold text-[var(--ink)]">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="mt-1 text-sm text-[var(--body)]">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>

                <div class="mt-5">
                    <x-input-label for="password" value="{{ __('Password') }}" />

                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        class="w-full"
                        placeholder="{{ __('Your current password') }}"
                    />

                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-1" />
                </div>

                <div class="mt-5 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <button type="submit" class="ms-3 inline-flex items-center gap-2 rounded-lg bg-red-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-red-600/30 transition hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-[var(--canvas)]">
                        {{ __('Delete Account') }}
                    </button>
                </div>
            </form>
        </x-modal>
    </div>
</x-app-layout>
