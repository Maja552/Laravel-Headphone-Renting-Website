
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo></x-authentication-card-logo>
        </x-slot>

        <x-validation-errors class="mb-4"></x-validation-errors>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('translation.account.email') }}"></x-label>
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"></x-input>
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('translation.account.password') }}"></x-label>
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password"></x-input>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember"></x-checkbox>
                    <span class="ml-2 text-sm text-gray-600">{{ __('translation.account.remember_me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('translation.account.forgot_password') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('translation.account.login') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
