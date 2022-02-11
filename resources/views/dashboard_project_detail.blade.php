<x-d-app-layout>

    <div x-data="{ open: false }" @keydown.window.escape="open = false"
         class="flex h-screen overflow-hidden bg-gray-100">

        <div x-show="open" class="fixed inset-0 z-40 flex md:hidden"
             x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state." x-ref="dialog"
             aria-modal="true">

            <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300"
                 x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                 x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-600 bg-opacity-75"
                 x-description="Off-canvas menu overlay, show/hide based on off-canvas menu state."
                 @click="open = false"
                 aria-hidden="true"></div>


            <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform"
                 x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                 x-transition:leave="transition ease-in-out duration-300 transform"
                 x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                 x-description="Off-canvas menu, show/hide based on off-canvas menu state."
                 class="relative flex flex-col flex-1 w-full max-w-xs pt-5 pb-4 bg-gray-800">

                <div x-show="open" x-transition:enter="ease-in-out duration-300" x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300"
                     x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                     x-description="Close button, show/hide based on off-canvas menu state."
                     class="absolute top-0 right-0 pt-2 -mr-12">
                    <button
                        class="flex items-center justify-center w-10 h-10 ml-1 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        @click="open = false">
                        <span class="sr-only">Close sidebar</span>
                        <svg class="w-6 h-6 text-white" x-description="Heroicon name: outline/x"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                             aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <div class="flex items-center flex-shrink-0 px-4">
                    <a href="{{ route('home') }}">
                        <img class="block w-auto h-8" src="{{ asset('images/logo-investin.svg') }}"
                             alt="logo_investin"/>
                    </a>
                </div>
                <div class="flex-1 h-0 mt-5 overflow-y-auto">
                    <nav class="px-2 space-y-1">

                        <a href="{{route('dashboard.index')}}"
                           class="flex items-center px-2 py-2 text-base font-medium text-white rounded-md group"
                           x-state:on="Current" x-state:off="Default"
                           x-state-description="Current: &quot;bg-primary text-white&quot;, Default: &quot;text-gray-300 hover:bg-secondary hover:text-white&quot;">
                            <svg class="w-6 h-6 mr-4 text-gray-300" x-state:on="Current" x-state:off="Default"
                                 x-state-description="Current: &quot;text-gray-300&quot;, Default: &quot;text-gray-400 group-hover:text-gray-300&quot;"
                                 x-description="Heroicon name: outline/home" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            List Proyek
                        </a>

                        <a href="#"
                           class="flex items-center px-2 py-2 text-base font-medium text-white rounded-md group bg-secondary"
                           x-state:on="Current" x-state:off="Default"
                           x-state-description="Current: &quot;bg-primary text-white&quot;, Default: &quot;text-gray-300 hover:bg-secondary hover:text-white&quot;">
                            <svg class="w-6 h-6 mr-4 text-gray-300"
                                 x-description="Heroicon name: outline/fire" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"></path>
                            </svg>
                            {{strpos(strtolower($project->nama),'proyek')!==false?$project->nama:'Proyek '.$project->nama}}
                        </a>

                        {{-- <a href="#"
                            class="flex items-center px-2 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-secondary hover:text-white group"
                            x-state-description="undefined: &quot;bg-primary text-white&quot;, undefined: &quot;text-gray-300 hover:bg-secondary hover:text-white&quot;">
                            <svg class="w-6 h-6 mr-4 text-gray-400 group-hover:text-gray-300"
                                x-state-description="undefined: &quot;text-gray-300&quot;, undefined: &quot;text-gray-400 group-hover:text-gray-300&quot;"
                                x-description="Heroicon name: outline/users" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                            Team
                        </a>

                        <a href="#"
                            class="flex items-center px-2 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-secondary hover:text-white group"
                            x-state-description="undefined: &quot;bg-primary text-white&quot;, undefined: &quot;text-gray-300 hover:bg-secondary hover:text-white&quot;">
                            <svg class="w-6 h-6 mr-4 text-gray-400 group-hover:text-gray-300"
                                x-state-description="undefined: &quot;text-gray-300&quot;, undefined: &quot;text-gray-400 group-hover:text-gray-300&quot;"
                                x-description="Heroicon name: outline/folder" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z">
                                </path>
                            </svg>
                            Projects
                        </a>

                        <a href="#"
                            class="flex items-center px-2 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-secondary hover:text-white group"
                            x-state-description="undefined: &quot;bg-primary text-white&quot;, undefined: &quot;text-gray-300 hover:bg-secondary hover:text-white&quot;">
                            <svg class="w-6 h-6 mr-4 text-gray-400 group-hover:text-gray-300"
                                x-state-description="undefined: &quot;text-gray-300&quot;, undefined: &quot;text-gray-400 group-hover:text-gray-300&quot;"
                                x-description="Heroicon name: outline/calendar" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            Calendar
                        </a>

                        <a href="#"
                            class="flex items-center px-2 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-secondary hover:text-white group"
                            x-state-description="undefined: &quot;bg-primary text-white&quot;, undefined: &quot;text-gray-300 hover:bg-secondary hover:text-white&quot;">
                            <svg class="w-6 h-6 mr-4 text-gray-400 group-hover:text-gray-300"
                                x-state-description="undefined: &quot;text-gray-300&quot;, undefined: &quot;text-gray-400 group-hover:text-gray-300&quot;"
                                x-description="Heroicon name: outline/inbox" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                </path>
                            </svg>
                            Documents
                        </a>

                        <a href="#"
                            class="flex items-center px-2 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-secondary hover:text-white group"
                            x-state-description="undefined: &quot;bg-primary text-white&quot;, undefined: &quot;text-gray-300 hover:bg-secondary hover:text-white&quot;">
                            <svg class="w-6 h-6 mr-4 text-gray-400 group-hover:text-gray-300"
                                x-state-description="undefined: &quot;text-gray-300&quot;, undefined: &quot;text-gray-400 group-hover:text-gray-300&quot;"
                                x-description="Heroicon name: outline/chart-bar" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                            Reports
                        </a> --}}

                    </nav>
                </div>
            </div>

            <div class="flex-shrink-0 w-14" aria-hidden="true">
                <!-- Dummy element to force sidebar to shrink to fit close icon -->
            </div>
        </div>


        <!-- Static sidebar for desktop -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64">
                <!-- Sidebar component, swap this element with another sidebar if you like -->
                <div class="flex flex-col flex-1 h-0">

                    <div class="flex items-center flex-shrink-0 h-16 px-4 bg-primary">
                        <a href="{{ route('home') }}">
                            <img class="block w-auto h-8" src="{{ asset('images/logo-investin.svg') }}"
                                 alt="logo_investin"/>
                        </a>
                    </div>
                    <div class="flex flex-col flex-1 overflow-y-auto">
                        <nav class="flex-1 px-2 py-4 space-y-1 bg-primary">

                            <a href="{{route('dashboard.index')}}"
                               class="flex items-center px-2 py-2 text-sm font-medium text-white rounded-md group"
                               x-state:on="Current" x-state:off="Default"
                               x-state-description="Current: &quot;bg-primary text-white&quot;, Default: &quot;text-gray-300 hover:bg-secondary hover:text-white&quot;">
                                <svg class="w-6 h-6 mr-3 text-gray-300" x-state:on="Current" x-state:off="Default"
                                     x-state-description="Current: &quot;text-gray-300&quot;, Default: &quot;text-gray-400 group-hover:text-gray-300&quot;"
                                     x-description="Heroicon name: outline/home" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                                List Proyek
                            </a>

                            <a href="#"
                               class="flex items-center px-2 py-2 text-sm font-medium text-white rounded-md group bg-secondary"
                               x-state:on="Current" x-state:off="Default"
                               x-state-description="Current: &quot;bg-primary text-white&quot;, Default: &quot;text-gray-300 hover:bg-secondary hover:text-white&quot;">
                                <svg class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 text-gray-100 group-hover:text-gray-100"
                                     x-description="Heroicon name: outline/fire" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"></path>
                                </svg>
                                {{strpos(strtolower($project->nama),'proyek')!==false?$project->nama:'Proyek '.$project->nama}}
                            </a>


                            {{--  <a href="#"
                                 class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-secondary hover:text-white group"
                                 x-state-description="undefined: &quot;bg-primary text-white&quot;, undefined: &quot;text-gray-300 hover:bg-secondary hover:text-white&quot;">
                                 <svg class="w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300"
                                     x-state-description="undefined: &quot;text-gray-300&quot;, undefined: &quot;text-gray-400 group-hover:text-gray-300&quot;"
                                     x-description="Heroicon name: outline/users" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                         d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                     </path>
                                 </svg>
                                 Team
                             </a>

                             <a href="#"
                                 class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-secondary hover:text-white group"
                                 x-state-description="undefined: &quot;bg-primary text-white&quot;, undefined: &quot;text-gray-300 hover:bg-secondary hover:text-white&quot;">
                                 <svg class="w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300"
                                     x-state-description="undefined: &quot;text-gray-300&quot;, undefined: &quot;text-gray-400 group-hover:text-gray-300&quot;"
                                     x-description="Heroicon name: outline/folder" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                         d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z">
                                     </path>
                                 </svg>
                                 Projects
                             </a>

                             <a href="#"
                                 class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-secondary hover:text-white group"
                                 x-state-description="undefined: &quot;bg-primary text-white&quot;, undefined: &quot;text-gray-300 hover:bg-secondary hover:text-white&quot;">
                                 <svg class="w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300"
                                     x-state-description="undefined: &quot;text-gray-300&quot;, undefined: &quot;text-gray-400 group-hover:text-gray-300&quot;"
                                     x-description="Heroicon name: outline/calendar" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                         d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                     </path>
                                 </svg>
                                 Calendar
                             </a>

                             <a href="#"
                                 class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-secondary hover:text-white group"
                                 x-state-description="undefined: &quot;bg-primary text-white&quot;, undefined: &quot;text-gray-300 hover:bg-secondary hover:text-white&quot;">
                                 <svg class="w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300"
                                     x-state-description="undefined: &quot;text-gray-300&quot;, undefined: &quot;text-gray-400 group-hover:text-gray-300&quot;"
                                     x-description="Heroicon name: outline/inbox" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                         d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                     </path>
                                 </svg>
                                 Documents
                             </a>

                             <a href="#"
                                 class="flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-secondary hover:text-white group"
                                 x-state-description="undefined: &quot;bg-primary text-white&quot;, undefined: &quot;text-gray-300 hover:bg-secondary hover:text-white&quot;">
                                 <svg class="w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-300"
                                     x-state-description="undefined: &quot;text-gray-300&quot;, undefined: &quot;text-gray-400 group-hover:text-gray-300&quot;"
                                     x-description="Heroicon name: outline/chart-bar" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                         d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                     </path>
                                 </svg>
                                 Reports
                             </a> --}}

                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col flex-1 w-0 overflow-hidden">
            <div class="relative z-10 flex flex-shrink-0 h-16 bg-white shadow">
                <button
                    class="px-4 text-gray-500 border-r border-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden"
                    @click="open = true">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" x-description="Heroicon name: outline/menu-alt-2"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                         aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h7"></path>
                    </svg>
                </button>
                <div class="flex justify-between flex-1 px-4">
                    <div class="flex flex-1">
                        <form class="flex w-full md:ml-0" action="#" method="GET">
                            <label for="search_field" class="sr-only">Search</label>
                            <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5" x-description="Heroicon name: solid/search"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                         aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input id="search_field"
                                       class="block w-full h-full py-2 pl-8 pr-3 text-gray-900 placeholder-gray-500 border-transparent focus:outline-none focus:placeholder-gray-400 focus:ring-0 focus:border-transparent sm:text-sm"
                                       placeholder="Search" type="search" name="search">
                            </div>
                        </form>
                    </div>
                    <div class="flex items-center ml-4 md:ml-6">

                        <!-- Profile dropdown -->
                        <div @click.away="open = false" class="relative flex-shrink-0 ml-5 font-medium"
                             x-data="{ open: false }">
                            <div>
                                <button type="button" @click="open = !open"
                                        class="flex text-sm font-medium rounded-full text-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500"
                                        id="user-menu" aria-haspopup="true" x-bind:aria-expanded="open">
                                    <span class="sr-only">Open user menu</span>
                                    {{ Auth::user()->name }}
                                    <svg class="ml-2 -mr-0.5 mt-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"/>
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
                                       role="menuitem">Your Profile</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf


                                        <a ref="{{ route('logout') }}" onclick="event.preventDefault();
                          this.closest('form').submit();"
                                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                           role="menuitem">
                                            Sign out
                                        </a>
                                    </form>
                                </div>
                            </transition>
                        </div>
                    </div>
                </div>
            </div>

            <div class="h-full bg-white">
                <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="max-w-3xl mx-auto">
                        <form class="space-y-8 divide-y divide-gray-200"
                              action="{{route('dashboard.projects.add_transaksi',['id'=>$project->id])}}" method="POST">
                            <div class="space-y-8 divide-y divide-gray-200">
                                <div>
                                    <div>
                                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                                            {{strpos(strtolower($project->nama),'proyek')!==false?$project->nama:'Proyek '.$project->nama}}
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500 truncate">
                                            {{$project->deskripsi}}
                                        </p>
                                    </div>
                                    <div
                                        class="grid grid-cols-1 mt-6 gap-y-6 gap-x-4 sm:grid-cols-6"
                                    >@csrf
                                        <div class="sm:col-span-3">
                                            <label
                                                for="pemasukan_kotor"
                                                class="block text-sm font-medium text-gray-700"
                                            >
                                                Pemasukan Kotor
                                            </label>
                                            <div class="mt-1">
                                                <input
                                                    type="text"
                                                    name="pemasukan_kotor"
                                                    id="pemasukan_kotor"
                                                    autocomplete="given-name"
                                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-3">
                                            <label
                                                for="pemasukan_bersih"
                                                class="block text-sm font-medium text-gray-700"
                                            >
                                                Pemasukan Bersih
                                            </label>
                                            <div class="mt-1">
                                                <input
                                                    type="text"
                                                    name="pemasukan_bersih"
                                                    id="pemasukan_bersih"
                                                    autocomplete="family-name"
                                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-3">
                                            <label
                                                for="total_penjualan"
                                                class="block text-sm font-medium text-gray-700"
                                            >
                                                Total Penjualan
                                            </label>
                                            <div class="mt-1">
                                                <input
                                                    id="total_penjualan"
                                                    name="total_penjualan"
                                                    type="text"
                                                    autocomplete="total_penjualan"
                                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                />
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>

                            <div class="pt-5">
                                <div class="flex justify-end">
                                    <button
                                        type="button"
                                        onclick="resetFormAtas()"
                                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    >
                                        Batalkan
                                    </button>
                                    <button
                                        type="submit"
                                        class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    >
                                        Update Proyek
                                    </button>
                                </div>
                            </div>
                        </form>
                        {{-- another form --}}
                        <form class="mt-3 space-y-8 divide-y divide-gray-200"
                              action="{{route('dashboard.projects.add_investasi',['id'=>$project->id])}}" method="POST">
                            <div class="space-y-8 divide-y divide-gray-200">
                                <div>
                                    <div>
                                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                                            {{strpos(strtolower($project->nama),'proyek')!==false?$project->nama:'Proyek '.$project->nama}}
                                        </h3>

                                    </div>
                                    <div
                                        class="grid grid-cols-1 mt-6 gap-y-6 gap-x-4 sm:grid-cols-6"
                                    >@csrf
                                        <div class="sm:col-span-3">
                                            <label
                                                for="total_investasi"
                                                class="block text-sm font-medium text-gray-700"
                                            >
                                                Total Investasi User
                                            </label>
                                            <div class="mt-1">
                                                <input
                                                    type="text"
                                                    name="total_investasi"
                                                    id="total_investasi"
                                                    autocomplete="total_investasi"
                                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                />
                                            </div>
                                        </div>


                                        <div class="sm:col-span-3">
                                            <label
                                                for="investor"
                                                class="block text-sm font-medium text-gray-700"
                                            >
                                                Tambah Investor
                                            </label>
                                            <div class="mt-1">
                                                <select
                                                    id="investor"
                                                    name="investor"
                                                    autocomplete="investor"
                                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                >
                                                    @foreach($investors as $i)
                                                        @if($i->is_admin)
                                                            @continue
                                                        @endif
                                                        <option value="{{$i->id}}">{{$i->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="pt-5">
                                <div class="flex justify-end">
                                    <button
                                        type="button"
                                        onclick="resetFormBawah()"
                                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    >
                                        Batalkan
                                    </button>
                                    <button
                                        type="submit"
                                        class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    >
                                        Update Proyek
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            function resetFormAtas() {
                document.querySelector('#pemasukan_bersih').value = "";
                document.querySelector('#pemasukan_kotor').value = "";
                document.querySelector('#total_penjualan').value = "";
            }

            function resetFormBawah() {
                document.querySelector('#total_investasi').value = "";
                document.querySelector('#investor').selectedIndex = 0;
            }
        </script>
    @endpush

</x-d-app-layout>
