<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full sm:max-w-md bg-white shadow-md overflow-hidden sm:rounded-lg px-6 py-8 mt-8">
            <!-- Logo -->
            <div class="flex justify-center mb-6 pt-4">
                <img src="{{ asset('images/pranayama.jpeg') }}" alt="Logo" class="w-16 h-16 object-contain" />
            </div>

            <!-- Info -->
            <div class="mb-4 text-sm text-gray-600 text-center">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>

            <!-- Validation Errors -->
            <x-validation-errors class="mb-4" />

            <!-- Form -->
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div>
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full"
                             type="password"
                             name="password"
                             required
                             autocomplete="current-password"
                             autofocus />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button>
                        {{ __('Confirm') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
