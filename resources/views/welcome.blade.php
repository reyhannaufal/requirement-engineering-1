<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Investin | Halaman Utama</title>
    <meta name="description" content="Tahukah Anda hanya dengan Rp.10.000, Anda dapat membantu roda perekonomian UMKM PUJAA yang merupakan salah satu UMKM eks-lokalisasi Dolly terdampak pandemi.">
    <meta name="author" content="Investin">

    <link rel="icon" href="{{ asset('favicons/ms-icon-310x310.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


     <!-- Script -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.0.1/dist/alpine.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</head>

<body>
    <div _style="max-height: 800px;" class="overflow-hidden">
        <div class="bg-primary">

            @include('components.navbar')

            <!-- main content -->
            <main class="lg:relative">
                <!-- sm-top-image -->
                <div data-aos="fade-up"
                data-aos-duration="2000" class="relative mt-10 md:mt-0 h-1/2">
                    <img class="inset-0 object-cover w-64 mx-auto lg:hidden"
                        src="{{ asset('images/investment-data-animate.svg') }}" alt="main-image" />
                </div>
                <div class="w-full pt-16 mx-auto text-center md:pb-20 max-w-7xl lg:py-36 lg:text-left">
                    <div class="px-4 transform lg:w-1/2 sm:px-8 xl:pr-16 ">
                        <h1
                            data-aos="fade-right" data-aos-duration="2000" class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-6xl lg:text-5xl xl:text-6xl "> 
                            <span class="block text-white xl:inline">Investasi Syariah</span>
                            <span class="block text-indigo-300 xl:inline">Masa Depan Bersama
                            </span>
                        </h1>
                        <p  data-aos="fade-right" data-aos-duration="2000" class="max-w-md mx-auto mt-3 text-lg text-gray-300 sm:text-xl md:mt-5 md:max-w-3xl">
                            Tahukah Anda hanya dengan Rp.10.000, Anda dapat membantu roda
                            perekonomian UMKM PUJAA yang merupakan salah satu UMKM
                            eks-lokalisasi Dolly terdampak pandemi.
                        </p>
                        <div class="mt-10 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                <a href="#features"
                                    class="flex items-center justify-center w-full px-8 py-3 text-base font-medium text-white border-2 border-transparent border-indigo-400 rounded-md hover:border-transparent hover:bg-secondary md:py-4 md:text-lg md:px-10">
                                    Keuntungan
                                </a>
                            </div>
                            <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                                <a href="{{ route('about') }}"
                                    class="flex items-center justify-center w-full px-8 py-3 text-base font-medium text-indigo-500 bg-white border border-transparent rounded-md hover:bg-gray-200 md:py-4 md:text-lg md:px-10">
                                    Tentang Kami
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- top-images -->
                <div data-aos="fade-up"
                data-aos-duration="2000" class="relative w-full h-0 lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 lg:h-full">
                    <img class="hidden lg:my-32 lg:h-3/5 lg:inline-block"
                        src="{{ asset('images/investment-data-animate.svg') }}" alt="top-image" height="800"
                        width="800" />
                </div>
            </main>

            <!-- features -->
            <div class="py-12 pb-36 bg-primary" id="features">
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="lg:text-center" data-aos="fade-right"
                    data-aos-duration="2000">
                        <h2 class="text-base font-bold tracking-wide text-indigo-300 uppercase ">
                            Fitur Unggulan
                        </h2>
                        <p class="mt-2 text-3xl font-extrabold leading-8 tracking-tight text-white sm:text-4xl">
                            Investasi mulai dari
                            <span class="text-blue-300">Rp. 10.000</span>
                        </p>
                        <p class="max-w-2xl mt-4 text-lg text-white sm:text-xl lg:mx-auto">
                            Mulai berinvestasi dengan nominal terendah Rp. 10.000, tanpa biaya
                            tambahan
                        </p>
                    </div>

                    <div class="mt-10">
                        <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                            <div class="relative" data-aos="fade-right"
                            data-aos-duration="2000">
                                <dt>
                                    <div
                                        class="absolute flex items-center justify-center w-12 h-12 text-white rounded-md bg-secondary">
                                        <!-- Heroicon name: outline/globe-alt -->
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                        </svg>
                                    </div>
                                    <p class="ml-16 text-lg font-medium leading-6 text-white">
                                        “One by one”
                                    </p>
                                </dt>
                                <dd class="mt-2 ml-16 text-base text-gray-200">
                                    Invest.in akan langsung menghubungi pemodal terkait
                                    pengembalian uang investasi sehingga lebih aman dan transparan
                                </dd>
                            </div>

                            <div class="relative" data-aos="fade-left"
                            data-aos-duration="2000">
                                <dt>
                                    <div
                                        class="absolute flex items-center justify-center w-12 h-12 text-white rounded-md bg-secondary">
                                        <!-- Heroicon name: outline/scale -->
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                        </svg>
                                    </div>
                                    <p class="ml-16 text-lg font-medium leading-6 text-white">
                                        Informasi Lengkap Pembiayaan Project UMKM PUJAA
                                    </p>
                                </dt>
                                <dd class="mt-2 ml-16 text-base text-gray-300">
                                    Anda dapat melihat informasi seputar total permodalan yang
                                    dibutuhkan, periode saham, hingga estimasi keuntungan yang
                                    akan Anda dapatkan.
                                </dd>
                            </div>

                            <div class="relative" data-aos="fade-right"
                            data-aos-duration="2000">
                                <dt>
                                    <div
                                        class="absolute flex items-center justify-center w-12 h-12 text-white rounded-md bg-secondary">
                                        <!-- Heroicon name: outline/lightning-bolt -->
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                    <p class="ml-16 text-lg font-medium leading-6 text-white">
                                        Kalkulator Pembiayaan Syariah
                                    </p>
                                </dt>
                                <dd class="mt-2 ml-16 text-base text-gray-300">
                                    Estimasikan keuntungan yang akan Anda dapatkan berdasarkan
                                    Akad Murabahah
                                </dd>
                            </div>

                            <div class="relative" data-aos="fade-left"
                            data-aos-duration="2000">
                                <dt>
                                    <div
                                        class="absolute flex items-center justify-center w-12 h-12 text-white rounded-md bg-secondary">
                                        <!-- Heroicon name: outline/annotation -->
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                        </svg>
                                    </div>
                                    <p class="ml-16 text-lg font-medium leading-6 text-white">
                                        Notifikasi Pesanan
                                    </p>
                                </dt>
                                <dd class="mt-2 ml-16 text-base text-gray-300">
                                    Aktifkan fitur notifikasi pesan untuk selalu update pembiayaan
                                    project terbaru
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>

            <!-- profile ukm puja -->
            <div class="bg-white">
                <div class="px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden rounded-lg shadow-xl lg:grid lg:grid-cols-2 lg:gap-4">
                        <div class="px-6 pt-10 pb-12 sm:pt-16 sm:px-16 lg:py-16 lg:pr-0 xl:py-20 xl:px-20">
                            <div class="lg:self-center">
                                <h2 class="text-3xl font-extrabold text-black sm:text-4xl">
                                    <span class="block">Profil <span class="text-secondary">UMKM Pujaa</span>
                                    </span>
                                    <!-- <span class="block">Start your free trial today.</span> -->
                                </h2>
                                <p class="mt-4 leading-6 text-gray-700 text-md">
                                    UMKM PUJAA merupakan salah satu bagian dari Kampung UMKM
                                    Kreatif Putat Jaya 2A yang bergerak di bidang kuliner. UMKM
                                    yang berlokasi di Jalan Putat Jaya 2A Nomor 19, Kelurahan
                                    Putat Jaya, Kecamatan Sawahan, Kota Surabaya, Jawa Timur ini
                                    dirintis oleh Bapak Nirwono Supriyadi sejak tahun 2016.
                                </p>
                                <p></p>
                                <p class="mt-4 leading-6 text-gray-700 text-md">
                                    Variasi produk yang dijual adalah makanan berat dan ringan
                                    seperti telur asin, botok telur, nasi dan kue kotak dengan
                                    branding “Barbara Catering and Snack”, dan masih banyak
                                    lainnya. Dalam perkembangannya, UMKM PUJAA telah mendapatkan
                                    pasar melalui platform jual beli online kesurabaya.com,
                                    pesanan katering untuk hajatan serta acara besar lain, dan
                                    beberapa hotel bintang tiga maupun perusahaan di kawasan
                                    Surabaya.
                                </p>
                            </div>
                        </div>
                        <div class="-mt-6 aspect-w-5 aspect-h-3 md:aspect-w-2 md:aspect-h-1">
                            <img class="object-fill object-left-top h-full transform translate-x-6 translate-y-6 rounded-md md:h-96 sm:translate-x-16 lg:translate-y-20"
                                src="/images/pak_puja.png" alt="App screenshot" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- features-stats -->

            <div class="py-20 pt-12 bg-white sm:pt-16">
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="max-w-4xl pt-10 mx-auto text-center">
                        <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                            Dipercaya oleh masyarakat Indonesia
                        </h2>
                        <p class="mt-3 text-xl text-gray-500 sm:mt-4">
                            Mulai berinvestasi dengan nominal terendah Rp. 10.000, tanpa biaya
                            tambahan
                        </p>
                    </div>
                </div>
                <div class="pb-12 mt-10 bg-white sm:pb-16">
                    <div class="relative">
                        <div class="absolute inset-0 bg-white h-1/2"></div>
                        <div class="relative px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                            <div class="max-w-4xl mx-auto">
                                <dl class="bg-white rounded-lg shadow-lg sm:grid sm:grid-cols-3">
                                    <div
                                        class="flex flex-col p-6 text-center border-b border-gray-100 sm:border-0 sm:border-r">
                                        <dt class="order-2 mt-2 text-lg font-medium leading-6 text-gray-500 ">
                                            Akurasi
                                        </dt>
                                        <dd class="order-1 text-5xl font-extrabold text-secondary">
                                            100%
                                        </dd>
                                    </div>
                                    <div
                                        class="flex flex-col p-6 text-center border-t border-b border-gray-100 sm:border-0 sm:border-l sm:border-r">
                                        <dt class="order-2 mt-2 text-lg font-medium leading-6 text-gray-500 ">
                                            Online
                                        </dt>
                                        <dd class="order-1 text-5xl font-extrabold text-secondary">
                                            24/7
                                        </dd>
                                    </div>
                                    <div
                                        class="flex flex-col p-6 text-center border-t border-gray-100 sm:border-0 sm:border-l">
                                        <dt class="order-2 mt-2 text-lg font-medium leading-6 text-gray-500 ">
                                            Mulai Dari
                                        </dt>
                                        <dd class="order-1 text-5xl font-extrabold text-secondary">
                                            Rp 10.000
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('components.footer')
        </div>
    </div>
</body>
</html>
<script>
    AOS.init();
</script>

