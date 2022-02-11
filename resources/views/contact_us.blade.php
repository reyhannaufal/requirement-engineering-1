<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Investin | Kontak Kami</title>
    <meta name="description" content="Tahukah Anda hanya dengan Rp.10.000, Anda dapat membantu roda perekonomian UMKM PUJAA yang merupakan salah satu UMKM eks-lokalisasi Dolly terdampak pandemi.">
    <meta name="author" content="Investin">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="icon" href="{{ asset('favicons/ms-icon-310x310.png') }}" type="image/x-icon">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.0.1/dist/alpine.js" defer></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <!-- Script -->
   <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.0.1/dist/alpine.js"></script>
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</head>

<html>
<main>

    @include('components.navbar')

    <main class="bg-primary">
        <div class="py-24 lg:py-32" data-aos="fade-up"
        data-aos-duration="2000">
            <div class="relative z-10 pl-4 pr-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                    Kontak Kami
                </h1>
                <h2 class="max-w-3xl mt-6 text-xl text-gray-300">
                    Mulai berinvestasi dengan nominal terendah Rp. 10.000, tanpa
                    biaya tambahan
                </h2>
            </div>
        </div>
    </main>

    <!-- Contact grid -->
    <section aria-labelledby="officesHeading" class="bg-white" data-aos="fade-left"
    data-aos-duration="2000">
        <div class="px-4 py-24 mx-auto max-w-7xl sm:py-32 sm:px-6 lg:px-8">
            <h3 id="officesHeading" class="text-3xl font-extrabold text-warm-gray-900">
                Kantor Kami
            </h3>
            <p class="max-w-3xl mt-6 text-lg text-warm-gray-500">
                Invest.In merupakan inovasi teknologi investasi sekaligus
                pendanaan berbasis syariah yang diharapkan dapat menjadi penerang
                bagi perekonomian UMKM PUJAA.
            </p>
            <div class="grid grid-cols-1 gap-10 mt-10 sm:grid-cols-2 lg:grid-cols-4">
                <div>
                    <h3 class="text-lg font-medium text-warm-gray-900">
                        Kantor Investin
                    </h3>
                    <p class="mt-2 text-base text-warm-gray-500">
                        <span class="block">Jl. Teknik Kimia, Keputih, Kec. Sukolilo, Kota SBY, Jawa
                            Timur 60111</span>

                        <span class="block">(031) 5994251</span>
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>

@include('components.footer')

</html>
<script>
    AOS.init();
</script>
