<x-guest-layout>
    <x-icon-home />
    <x-authentication-card>
        <x-slot name="logo">
            <a href="/">
               <img src="{{ asset('images/LOGO OFFICIAS3 (1).png') }}" alt="Logo Online Coffee" class="h-36 w-auto">
            </a>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value}}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-end mt-2">
                @if (Route::has('password.request'))
                    <a class="text-sm text-white hover:underline font-blod"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-white">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-center mt-6">
                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>

        <!-- Iniciar sesión con Google 
        <div class="mt-6 text-center">
            <p class="text-sm text-white">------------ O ------------</p>
            <a href="" class="mt-2 inline-block w-full bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600">
                Iniciar sesión con Google
            </a>
        </div> -->
    </x-authentication-card>
</x-guest-layout>
