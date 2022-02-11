<head>
    <title>Investin | Masuk</title>
</head>
<x-guest-layout>
    <div class="flex flex-col justify-center min-h-screen py-12 sm:px-6 lg:px-8 bg-primary">
        @if (session('status'))
        <div class="mb-4 text-sm font-medium text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <a href="{{route('index')}}">
                <img class="w-auto h-8 mx-auto sm:h-10" src="{{ asset('images/logo-investin.svg') }}"
                    alt="logo_investin" />
            </a>

            <h2 class="mt-6 text-3xl font-extrabold text-center text-white">
                Masuk ke akun anda
            </h2>
            <p class="mt-2 text-sm text-center text-gray-200 max-w">
                atau
                <!-- space -->
                <a href="{{ route('register') }}" class="font-medium text-indigo-300 hover:underline">
                    daftar sekarang juga
                </a>
            </p>
        </div>

        <div class="px-10 mt-8 sm:px-0 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="px-4 py-8 bg-gray-100 rounded-lg shadow-md sm:px-10">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <x-jet-validation-errors class="mb-4" />


                    <div>
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block w-full mt-1" type="email" name="email"
                            :value="old('email')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" required
                            autocomplete="current-password" />
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        {{-- @if (Route::has('password.request'))
                            <a class="text-sm text-gray-600 underline hover:text-gray-900"
                                href="{{ route('password.request') }}">
                        {{ __('Lupa akun anda?') }}
                        </a>
                        @endif --}}

                        <x-jet-button class="ml-4">
                            {{ __('Masuk') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>


    </div>
</x-guest-layout>