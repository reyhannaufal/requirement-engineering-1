<header>
    <div x-data="{ mobileMenuOpen: false }" class="relative bg-primary">
      <div
        class="flex items-center justify-between px-4 py-6 mx-auto max-w-7xl sm:px-6 md:justify-start md:space-x-10 lg:px-8"
      >
        <div class="flex justify-start lg:w-0 lg:flex-1">
            <a href="{{ route('index') }}">
                <span class="sr-only">invest.in</span>
                <img class="w-auto h-7 sm:h-8" src="{{ asset('images/logo-investin.svg') }}"
                    alt="logo_investin" />
            </a>
        </div>
        <div class="-my-2 -mr-2 md:hidden">
          <button
            @click="mobileMenuOpen = true"
            type="button"
            class="inline-flex items-center justify-center p-2 text-gray-400 bg-white rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
          >
            <span class="sr-only">Open menu</span>
            <svg
              class="w-6 h-6"
              x-description="Heroicon name: outline/menu"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              aria-hidden="true"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"
              ></path>
            </svg>
          </button>
        </div>
        <nav class="hidden space-x-10 md:flex">
         

          
        <a href="{{ route('about') }}"
        class="mt-0.5 text-sm font-medium text-white hover:text-gray-200 hover:underline">
            Tentang Kami
        </a>
        <a href="{{ route('contact') }}"
            class="text-sm mt-0.5 font-medium text-white hover:text-gray-200 hover:underline">
            Kontak Kami
        </a>
        
        </nav>
        <div
          class="items-center justify-end hidden md:flex md:flex-1 lg:w-0"
        >
        <a href="{{ route('login') }}"
        class="text-sm mt-0.5 font-medium text-white whitespace-nowrap hover:text-gray-200 hover:underline">
        Masuk Akun
    </a>
    {{-- redirect to Dashboard if user is authenticated
        else redirect to login --}}
    @if (auth()->user())
        <a href="{{ route('home') }}"
            class="inline-flex items-center justify-center px-4 py-2 ml-8 text-sm font-medium text-white border border-transparent rounded-md shadow-sm whitespace-nowrap bg-gradient-to-r bg-secondary hover:bg-blue-900 ">
            Dashboard
        </a>
    @else
        <a href="{{ route('register') }}"
            class="inline-flex mt-0.5 items-center justify-center px-4 py-2 ml-8 text-sm font-medium text-white border border-transparent rounded-md shadow-sm whitespace-nowrap bg-gradient-to-r bg-secondary hover:bg-blue-900 ">
            Daftar Akun
        </a>
    @endif
        </div>
      </div>

      <transition
        enter-active-class="duration-200 ease-out"
        enter-class="scale-95 opacity-0"
        enter-to-class="scale-100 opacity-100"
        leave-active-class="duration-100 ease-in"
        leave-class="scale-100 opacity-100"
        leave-to-class="scale-95 opacity-0"
        ><div
          x-description="Mobile menu, show/hide based on mobile menu state."
          x-show="mobileMenuOpen"
          class="absolute inset-x-0 top-0 z-30 p-2 transition origin-top-right transform md:hidden"
        >
          <div
            class="bg-white divide-y-2 rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 divide-gray-50"
          >
            <div class="px-5 pt-5 pb-6">
              <div class="flex items-center justify-between">
                <div>
                  <img
                    class="w-auto h-8"
                    src="{{asset('images/OG.png')}}"
                    alt="logo"
                  />
                </div>
                <div class="-mr-2">
                  <button
                    @click="mobileMenuOpen = false"
                    type="button"
                    class="inline-flex items-center justify-center p-2 text-gray-400 bg-white rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                  >
                    <span class="sr-only">Close menu</span>
                    <svg
                      class="w-6 h-6"
                      x-description="Heroicon name: outline/x"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      aria-hidden="true"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                      ></path>
                    </svg>
                  </button>
                </div>
              </div>
              <div class="mt-6">
                <nav class="grid grid-cols-1 gap-7">
                    <a href="{{ route('about') }}"
                    class="flex items-center p-3 -m-3 rounded-lg hover:bg-gray-50">
                    <div
                        class="flex items-center justify-center flex-shrink-0 w-10 h-10 text-white rounded-md bg-secondary">
                        <svg class="w-6 h-6" x-description="Heroicon name: outline/inbox"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4 text-base font-medium text-gray-900">
                        Tentang Kami
                    </div>
                </a>

                <a href="{{ route('contact') }}"
                    class="flex items-center p-3 -m-3 rounded-lg hover:bg-gray-50">
                    <div
                        class="flex items-center justify-center flex-shrink-0 w-10 h-10 text-white rounded-md bg-secondary">
                        <svg class="w-6 h-6" x-description="Heroicon name: outline/annotation"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4 text-base font-medium text-gray-900">
                        Kontak Kami
                    </div>
                </a>
                </nav>
              </div>
            </div>
            <div class="px-5 py-6">
              <div class="grid grid-cols-2 gap-4">
                {{-- <a
                  href="#"
                  class="text-base font-medium text-gray-900 hover:text-gray-700"
                >
                  Pricing
                </a>

                <a
                  href="#"
                  class="text-base font-medium text-gray-900 hover:text-gray-700"
                >
                  Partners
                </a>

                <a
                  href="#"
                  class="text-base font-medium text-gray-900 hover:text-gray-700"
                >
                  Company
                </a> --}}
              </div>
              <div class="mt-6">
                <a href="{{route('register')}}"
                class="flex items-center justify-center w-full px-4 py-2 text-base font-medium text-white border border-transparent rounded-md shadow-sm bg-secondary hover:to-indigo-700">
                Daftar Akun
                </a>
                <p class="mt-6 text-base font-medium text-center text-gray-500 ">
                    Sudah Terdaftar?
                    <a href="{{route('login')}}" class="text-secondary"> Masuk Akun </a>
                </p>
              </div>
            </div>
          </div>
        </div>
        </transition>
    </div>
</header>