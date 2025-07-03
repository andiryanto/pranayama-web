<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full sm:max-w-md bg-white shadow-md overflow-hidden sm:rounded-lg px-6 py-8 mt-8">
            <!-- Logo -->
            <div class="flex justify-center mb-6 pt-4">
                <img src="{{ asset('images/pranayama.jpeg') }}" alt="Logo" class="w-16 h-16 object-contain" />
            </div>

            <div x-data="{ recovery: false }">
                <!-- Instruction -->
                <div class="mb-4 text-sm text-gray-600 text-center" x-show="!recovery">
                    {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
                </div>

                <div class="mb-4 text-sm text-gray-600 text-center" x-show="recovery" x-cloak>
                    {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
                </div>

                <!-- Validation Errors -->
                <x-validation-errors class="mb-4" />

                <!-- Form -->
                <form method="POST" action="{{ route('two-factor.login') }}">
                    @csrf

                    <!-- Authenticator Code -->
                    <div class="mt-4" x-show="!recovery">
                        <x-label for="code" value="{{ __('Code') }}" />
                        <x-input id="code" class="block mt-1 w-full"
                                 type="text"
                                 inputmode="numeric"
                                 name="code"
                                 autofocus
                                 x-ref="code"
                                 autocomplete="one-time-code" />
                    </div>

                    <!-- Recovery Code -->
                    <div class="mt-4" x-show="recovery" x-cloak>
                        <x-label for="recovery_code" value="{{ __('Recovery Code') }}" />
                        <x-input id="recovery_code" class="block mt-1 w-full"
                                 type="text"
                                 name="recovery_code"
                                 x-ref="recovery_code"
                                 autocomplete="one-time-code" />
                    </div>

                    <!-- Switch & Button -->
                    <div class="flex items-center justify-between mt-4">
                        <button type="button"
                                class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                                x-show="!recovery"
                                x-on:click="
                                    recovery = true;
                                    $nextTick(() => { $refs.recovery_code.focus() })
                                ">
                            {{ __('Use a recovery code') }}
                        </button>

                        <button type="button"
                                class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                                x-show="recovery" x-cloak
                                x-on:click="
                                    recovery = false;
                                    $nextTick(() => { $refs.code.focus() })
                                ">
                            {{ __('Use an authentication code') }}
                        </button>

                        <x-button class="ml-4">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
