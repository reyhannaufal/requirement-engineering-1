<x-app-layout>
    <div class="py-10">
        <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
            <div class="hidden lg:block lg:col-span-3 xl:col-span-2">
                <nav aria-label="Sidebar" class="sticky divide-y divide-gray-300 top-4">
                    <div class="pb-8 mt-3 space-y-1">
                        <a href="#"
                            class="flex items-center px-3 py-2 text-sm font-medium text-gray-900 bg-gray-200 rounded-md group"
                            aria-current="page">
                            <svg class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 text-gray-500"
                                x-description="Heroicon name: outline/home" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            <span class="truncate"> Home </span>
                        </a>

                        <a href="{{ route('projects.index') }}"
                            class="flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-50 group"
                            aria-current="false">
                            <svg class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 text-gray-400 group-hover:text-gray-500"
                                x-description="Heroicon name: outline/fire" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"></path>
                            </svg>
                            <span class="truncate"> Proyek </span>
                        </a>


                    </div>
                    <div class="pt-10">
                        <p class="px-3 text-xs font-semibold tracking-wider text-gray-500 uppercase "
                            id="communities-headline">
                            Halaman
                        </p>
                        <div class="mt-3 space-y-2" aria-labelledby="communities-headline">
                            <a href="{{ route('about') }}"
                                class="flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md group hover:text-gray-900 hover:bg-gray-50">
                                <span class="truncate"> Tentang Kita </span>
                            </a>

                            <a href="{{ route('contact') }}"
                                class="flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md group hover:text-gray-900 hover:bg-gray-50">
                                <span class="truncate"> Kontak Kami </span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <main class="px-2 md:px-0 lg:col-span-9 xl:col-span-6">
                @if (auth()->user()->is_admin)
                <div class="bg-white">
                    <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        <div class="max-w-3xl mx-auto">
                            <form class="space-y-8 divide-y divide-gray-200" action="{{ route('home.add_feed') }}"
                                method="POST" enctype="multipart/form-data">
                                <div class="space-y-8 divide-y divide-gray-200">
                                    <div>
                                        <div>
                                            <h3 class="text-lg font-medium leading-6 text-gray-900">
                                                Tambah Feed
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-500">
                                                Isilah form dibawah untuk menambahkan feed
                                            </p>
                                        </div>
                                        @if ($errors->any())
                                        <div class="relative px-4 py-3 my-1 text-red-700 bg-red-100 border border-red-400 rounded"
                                            role="alert">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        @if (Session::has('success'))
                                        <div class="relative px-4 py-3 mt-2 text-green-700 bg-green-100 border border-green-400 rounded"
                                            role="alert">
                                            <strong class="font-bold">Ditambahkan!</strong>
                                            <span class="block sm:inline">Feed berhasil ditambahkan.</span>
                                        </div>
                                        @endif
                                        @csrf
                                        <div class="grid grid-cols-1 mt-6 gap-y-6 gap-x-4 sm:grid-cols-6">
                                            <div class="sm:col-span-6">
                                                <label for="judul" class="block text-sm font-medium text-gray-700">
                                                    Judul
                                                </label>
                                                <div class="mt-1">
                                                    <input type="text" name="judul" id="judul" autocomplete="judul"
                                                        class="flex-1 block w-full min-w-0 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 rounded-r-md sm:text-sm"
                                                        required />
                                                </div>
                                                <p class="mt-2 text-sm text-gray-500">
                                                    Tulislah beberapa kalimat untuk judul feed anda
                                                </p>
                                            </div>
                                            <div class="sm:col-span-6">
                                                <label for="deskripsi" class="block text-sm font-medium text-gray-700">
                                                    Deskripsi
                                                </label>
                                                <div class="mt-1">
                                                    <textarea id="deskripsi" name="deskripsi" rows="3" required
                                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                                </div>
                                                <p class="mt-2 text-sm text-gray-500">
                                                    Tuliskan deskripsi untuk feed anda.
                                                </p>
                                            </div>
                                            <div class="sm:col-span-6">
                                                <label for="foto" class="block text-sm font-medium text-gray-700">
                                                    Foto Feed
                                                </label>
                                                <div
                                                    class="flex justify-center px-6 pt-5 pb-6 mt-2 border-2 border-gray-300 border-dashed rounded-md ">
                                                    <div class="space-y-1 text-center" id="photo-input-field">
                                                        <svg class="w-12 h-12 mx-auto text-gray-400"
                                                            stroke="currentColor" fill="none" viewBox="0 0 48 48"
                                                            aria-hidden="true">
                                                            <path
                                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </svg>
                                                        <div class="flex text-sm text-gray-600">
                                                            <label for="foto"
                                                                class="relative mx-auto font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                                <span>Tambahkan Foto</span>
                                                                <input id="foto" name="foto" type="file" class="sr-only"
                                                                    accept="image/*" onchange="previewFile()" />
                                                            </label>

                                                        </div>
                                                        <p class="text-xs text-gray-500">
                                                            Menerima tipe file PNG dan JPG dengan ukuran kurang dari
                                                            1MB.
                                                        </p>
                                                    </div>
                                                    <div class="relative" id="photo-thumbnail-container"
                                                        style="display: none">
                                                        <img class="object-scale-down w-full px-3 my-8"
                                                            id="photo-thumbnail" />
                                                        <span class="absolute top-0 bottom-0 right-0"
                                                            onclick="removeThumbnail()">
                                                            <svg class="w-6 h-6 text-gray-300 fill-current"
                                                                role="button" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 20 20">
                                                                <title>Close</title>
                                                                <path
                                                                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 
                                                                        1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="pt-5">
                                    <div class="flex justify-end">
                                        <button type="button" onclick="resetForm()"
                                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Batal
                                        </button>
                                        <button type="submit"
                                            class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Tambahkan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
                <div class="mt-2">
                    @if (Session::has('success-delete'))
                    <div class="relative px-4 py-3 my-2 text-yellow-700 bg-yellow-100 border border-yellow-400 rounded"
                        role="alert">
                        <strong class="font-bold">Dihapus!</strong>
                        <span class="block sm:inline">Feed berhasil dihapus.</span>
                    </div>
                    @endif
                    <ul class="space-y-4">
                          @foreach ($feeds as $feed)
                        <li class="px-4 py-6 bg-white shadow sm:p-6 sm:rounded-lg">
                            <article aria-labelledby="question-title-81614">
                                <div>
                                    <div class="flex space-x-3">
                                        <span
                                            class="inline-flex items-center justify-center rounded-full bg-primary w-9 h-9 ">
                                            <span class="text-xs font-medium leading-none text-white">UP</span>
                                        </span>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900">
                                                <a href="#" class="hover:underline">UMKM Pujaa</a>
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                <a href="#"
                                                    class="hover:underline">{{ date('F j', strtotime($feed->created_at)) }}
                                                    at {{ date('g:i A', strtotime($feed->created_at)) }}</a>
                                            </p>
                                        </div>
                                        @if (auth()->user()->is_admin)
                                        <div class="flex self-center flex-shrink-0">
                                            <div x-data="{ open: false }" @keydown.window.escape="open = false"
                                                @click.away="open = false" class="relative inline-block text-left">
                                                <div>
                                                    <button type="button"
                                                        class="flex items-center p-2 -m-2 text-gray-400 rounded-full hover:text-gray-600"
                                                        id="options-menu-0" aria-expanded="false" @click="open = !open"
                                                        aria-haspopup="true" x-bind:aria-expanded="open">
                                                        <span class="sr-only">Open options</span>
                                                        <svg class="w-5 h-5"
                                                            x-description="Heroicon name: solid/dots-vertical"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                            fill="currentColor" aria-hidden="true">
                                                            <path
                                                                d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                                                            </path>
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
                                                        x-description="Dropdown menu, show/hide based on menu state."
                                                        class="absolute right-0 w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                                        role="menu" aria-orientation="vertical"
                                                        aria-labelledby="options-menu-0">
                                                        <div class="py-1">
                                                            <a href="javascript:void(0)"
                                                                class="flex px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                                                onclick="document.getElementById('feed-delete-{{ $feed->id }}').submit()">
                                                                <form action="{{ route('home.delete_feed') }}"
                                                                    method="POST" id="feed-delete-{{ $feed->id }}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $feed->id }}" />
                                                                </form>
                                                                <span>Delete Feeds</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </transition>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <h2 id="question-title-{{ $feed->id }}"
                                        class="mt-4 text-base font-medium text-gray-900">
                                        {{ $feed->judul }}
                                    </h2>
                                </div>
                                <div class="mt-2 space-y-4 text-sm text-gray-700">
                                    <p>
                                        {{ $feed->deskripsi }}
                                    </p>
                                    <img class="object-contain w-full border-2 rounded-lg"
                                        src="{{ asset('/storage/' . $feed->gambar_path) }}" />
                                </div>

                            </article>
                        </li>
                        @endforeach
                        <li class="px-4 py-6 bg-white shadow sm:p-6 sm:rounded-lg">
                            <article aria-labelledby="question-title-81614">
                                <div>
                                    <div class="flex space-x-3">
                                        <span
                                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-primary">
                                            <img src="{{ asset('images/logo-investin.svg') }}" />
                                        </span>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900">
                                                <a href="#" class="hover:underline">Investin Team</a>
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                <a href="#" class="hover:underline">10 Juli 2021</a>
                                            </p>
                                        </div>
                                    </div>
                                    <h2 id="question-title-81614" class="mt-4 text-base font-medium text-gray-900">
                                        Selamat datang di platform Investin.id
                                    </h2>
                                </div>
                                <div class="mt-2 space-y-4 text-sm text-gray-700">
                                    <p>
                                        Untuk mengetahui proyek apa saja yang sedang berjalan silahkan berkunjung ke
                                        menu Proyek.
                                    </p>
                                    <p>
                                        Untuk mengetahui statistik proyek yang sedang berjalan silahkan mengujungi menu
                                        Dashboard.
                                    </p>
                                </div>

                            </article>
                        </li>
                      
                    </ul>
                    <div class="mt-8">
                        {{ $feeds->links() }}
                    </div>
                </div>
            </main>
            <aside class="hidden mt-3 xl:block xl:col-span-4">
                <div class="sticky space-y-4 top-4">
                    <section aria-labelledby="trending-heading">
                        <div class="bg-white rounded-lg shadow">
                            <div class="p-6">
                                <h2 id="trending-heading" class="text-base font-medium text-gray-900">
                                    Pengumuman
                                </h2>
                                <div class="flow-root mt-6">
                                    <ul class="-my-4 divide-y divide-gray-200">
                                        <li class="flex py-4 space-x-3">
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm text-gray-800">
                                                    Selamat datang di <span class="underline">investin.id</span> <br>
                                                    <span class="italic font-semibold text-primary">Investasi Syariah
                                                        Masa Depan Bersama</span>
                                                </p>

                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                {{-- <div class="mt-6">
                      <a
                        href="#"
                        class="block w-full px-4 py-2 text-sm font-medium text-center text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50"
                      >
                        View all
                      </a>
                    </div> --}}
                            </div>
                        </div>
                    </section>
                </div>
            </aside>
        </div>
    </div>
    @push('scripts')
    <script>
        function previewFile() {
                var previewContainer = document.querySelector('#photo-thumbnail-container');
                var preview = document.querySelector('#photo-thumbnail');
                var inputField = document.querySelector('#photo-input-field');
                var file = document.querySelector('input[type=file]').files[0];
                var reader = new FileReader();

                reader.onloadend = function() {
                    preview.src = reader.result;
                }

                if (file) {
                    reader.readAsDataURL(file);
                    inputField.style.display = 'none';
                    previewContainer.style.display = 'block';
                } else {
                    preview.src = "";
                    inputField.style.display = 'block';
                    previewContainer.style.display = 'none';
                }
            }

            function removeThumbnail() {
                var previewContainer = document.querySelector('#photo-thumbnail-container');
                var preview = document.querySelector('#photo-thumbnail');
                var inputField = document.querySelector('#photo-input-field');
                preview.src = "";
                inputField.style.display = 'block';
                previewContainer.style.display = 'none';
            }

            function resetForm() {
                document.querySelector('#judul').value = "";
                document.querySelector('#deskripsi').value = ""
                removeThumbnail();
            }

    </script>
    @endpush
</x-app-layout>