<x-guest-layout>
    <div class="flex flex-col justify-center min-h-screen py-12 sm:px-6 lg:px-8 bg-primary">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <a href="{{route('index')}}">
                <img class="w-auto h-8 mx-auto sm:h-10" src="{{ asset('images/logo-investin.svg') }}"
                alt="logo_investin" />
            </a>
        </div>

        <div class="px-10 mt-8 sm:px-0 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="px-4 py-8 bg-gray-100 rounded-lg shadow-md sm:px-10">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="my-2 text-center">
                        <h1 class="font-bold">Lupa Kata Sandi</h1>
                        <p class="my-2 text-sm ">Masukkan email yang terdaftar. Kami akan mengirimkan kode verifikasi untuk mengatur ulang kata sandi.</p>
                    </div>
                  

                    <x-jet-validation-errors class="mb-4" />

                    <div class="block">
                        <x-jet-label for="email" value="{{ __('Email') }}"  />
                        <x-jet-input id="email" class="block w-full mt-1" placeholder='test@mail.com' type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button>
                            {{ __('Lupa Kata Sandi') }}
                        </x-jet-button>
                    </div>
            
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
