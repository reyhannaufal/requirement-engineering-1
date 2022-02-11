<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Investin</title>
    <link rel="icon" href="{{ asset('favicons/ms-icon-310x310.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">

    <div class="min-h-screen bg-gray-100">
        <!-- Navbar -->
        <header x-data="{ open: false }" :class="{'fixed inset-0 z-40 overflow-y-auto': open, '': !open}"
            class="shadow-sm bg-navbar lg:static lg:overflow-y-visible">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="relative flex justify-between xl:grid xl:grid-cols-12 lg:gap-8">
                    <div class="flex md:absolute md:left-0 md:inset-y-0 lg:static xl:col-span-2">
                        <div class="flex items-center flex-shrink-0">
                            <a href="{{ route('home') }}">
                                <img class="block w-auto h-8" src="{{ asset('images/logo-investin.svg') }}"
                                    alt="logo_investin" />
                            </a>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0 md:px-8 lg:px-0 xl:col-span-6">
                        <div class="flex items-center px-6 py-4 md:max-w-3xl md:mx-auto lg:max-w-none lg:mx-0 xl:px-0">
                            <div class="w-full sm:w-1/2 sm:ml-20 lg:w-full">
                                <label for="search" class="sr-only">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none ">
                                        <svg class="w-5 h-5 text-gray-400" x-description="Heroicon name: solid/search"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input id="search" name="search"
                                        class="block w-full py-2 pl-10 pr-3 text-sm placeholder-gray-500 bg-white border border-gray-300 rounded-md focus:outline-none focus:text-gray-900 focus:placeholder-gray-400 focus:ring-1 focus:ring-rose-500 focus:border-rose-500 sm:text-sm"
                                        placeholder="Search" type="search" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center md:absolute md:right-0 md:inset-y-0 lg:hidden">
                        <!-- Mobile menu button -->
                        <button type="button" @click="open = !open"
                            class="inline-flex items-center justify-center p-2 -mx-2 text-gray-400 rounded-md hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-rose-500"
                            x-bind:aria-expanded="open" aria-expanded="false">
                            <span class="sr-only">Open menu</span>
                            <!-- Icon when menu is closed. -->
                            <svg x-state:on="Menu open" x-state:off="Menu closed"
                                :class="{ 'hidden': open, 'block': !open }" class="block w-6 h-6"
                                x-description="Heroicon name: outline/menu" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                            <!-- Icon when menu is open. -->
                            <svg x-state:on="Menu open" x-state:off="Menu closed"
                                :class="{ 'hidden': !open, 'block': open }" class="hidden w-6 h-6"
                                x-description="Heroicon name: outline/x" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="hidden lg:flex lg:items-center lg:justify-end xl:col-span-4">
                        <a href="{{ route('dashboard.index') }}"
                            class="text-sm font-medium text-white hover:underline mt-0.5">
                            Dashboard
                        </a>


                        <!-- Profile dropdown -->
                        <div @click.away="open = false" class="relative flex-shrink-0 ml-5 font-medium"
                            x-data="{ open: false }">
                            <div>
                                <button type="button" @click="open = !open"
                                    class="flex text-sm font-medium text-white rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500"
                                    id="user-menu" aria-haspopup="true" x-bind:aria-expanded="open">
                                    <span class="sr-only">Open user menu</span>
                                    {{ Auth::user()->name }}
                                    <svg class="ml-2 -mr-0.5 mt-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>

                            </div>
                            <transition enter-active-class="transition duration-100 ease-out"
                                enter-class="transform scale-95 opacity-0"
                                enter-to-class="transform scale-100 opacity-100"
                                leave-active-class="transition duration-75 ease-in"
                                leave-class="transform scale-100 opacity-100"
                                leave-to-class="transform scale-95 opacity-0">
                                <div x-show="open"
                                    x-description="Profile dropdown panel, show/hide based on dropdown state."
                                    class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5"
                                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                                    <a href="{{ route('profile.show') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Profile Anda</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf


                                        <a ref="{{ route('logout') }}" onclick="event.preventDefault();
                                this.closest('form').submit();"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                            role="menuitem">
                                            Keluar
                                        </a>
                                    </form>
                                </div>
                            </transition>
                        </div>


                    </div>
                </div>
            </div>

            <nav x-description="Mobile menu, toggle classes based on menu state." x-state:on="Menu open"
                x-state:off="Menu closed" :class="{ 'block': open, 'hidden': !open }" class="hidden lg:hidden"
                aria-label="Global">
                <div class="max-w-3xl px-2 pt-2 pb-3 mx-auto space-y-1 sm:px-4">
                    <a href="#" aria-current="page"
                        class="block px-3 py-2 text-base font-medium text-white rounded-md ">Home</a>


                    <a href="{{ route('projects.index') }}" aria-current="false"
                        class="block px-3 py-2 text-base font-medium text-white rounded-md ">Projects</a>

                    <a href="{{ route('dashboard.index') }}" aria-current="false"
                        class="block px-3 py-2 text-base font-medium text-white rounded-md ">Dashboard</a>

                </div>
                <div class="pt-4 pb-3 border-t border-gray-200">

                    <div class="max-w-3xl px-2 mx-auto mt-3 space-y-1 sm:px-4">
                        <a href="{{ route('profile.show') }}"
                            class="block px-3 py-2 text-base font-medium text-white rounded-md hover:text-gray-200">Profile
                            anda</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a ref="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit();"
                                class="block px-3 py-2 text-base font-medium text-white rounded-md hover:text-gray-200"
                                role="menuitem">
                                Keluar
                            </a>
                        </form>
                    </div>
                </div>
            </nav>
        </header>



        {{-- <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        {{ $header }}
    </div>
    </header>
    @endif --}}

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
    </div>



    @stack('modals')
    @stack('scripts')

    @livewireScripts

</body>

</html>