<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Investin | Tentang Kami</title>
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

    <div _style="max-height: 800px;" _class="overflow-y-auto">
        @include('components.navbar')
        <main>
            <div class="bg-white">
                <div class="relative pb-32 bg-primary">
                    <div class="absolute inset-0">
                        <img class="object-cover w-full h-full"
                            src="https://images.unsplash.com/photo-1525130413817-d45c1d127c42?ixlib=rb-1.2.1&amp;ixqx=7qwKjEp7Xv&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1920&amp;q=60&amp;&amp;sat=-100"
                            alt="" />
                        <div class="absolute inset-0 bg-primary" style="mix-blend-mode: multiply" aria-hidden="true">
                        </div>
                    </div>
                    <div data-aos="fade-right" data-aos-duration="2000"
                        class="relative px-4 py-24 mx-auto max-w-7xl sm:py-32 sm:px-6 lg:px-8">
                        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                            Tentang Kami
                        </h1>
                        <p class="max-w-3xl mt-6 text-xl text-indigo-100">
                            Invest.In merupakan inovasi teknologi investasi sekaligus
                            pendanaan berbasis syariah yang diharapkan dapat menjadi
                            penerang bagi perekonomian UMKM PUJAA.
                        </p>
                    </div>
                </div>
                <div class="bg-white" data-aos="fade-up" data-aos-duration="2000">
                    <div class="px-4 py-12 mx-auto divide-y-2 divide-gray-200 max-w-7xl sm:px-6 lg:py-16 lg:px-8">
                        <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                            Syarat dan Ketentuan Investor
                        </h2>
                        <div class="mt-6">
                            <dl class="space-y-8 divide-y divide-gray-200">
                                <div class="pt-6 md:grid md:grid-cols-12 md:gap-8">
                                    <dt class="text-base font-medium text-gray-900 md:col-span-5">
                                        Pemberi pembiyaan dapat berupa?
                                    </dt>
                                    <dd class="mt-2 md:mt-0 md:col-span-7">
                                        <ul class="ml-4 text-base text-gray-500 list-decimal">
                                            <li>Orang perseorangan Warga Negara Indonesia</li>
                                            <li>Orang perseorangan Warga Negara Asing</li>
                                            <li>Badan Hukum Indonesia/Asing</li>
                                            <li>Badan Hukum Indonesia/Asing;</li>
                                            <li>Badan Usaha Indonesia/Asing; dan/atau</li>
                                            <li>Lembaga Internasional</li>
                                        </ul>
                                    </dd>
                                </div>

                                <div class="pt-6 md:grid md:grid-cols-12 md:gap-8">
                                    <dt class="text-base font-medium text-gray-900 md:col-span-5">
                                        Berapa usia minimal pemberi pembiyaan?
                                    </dt>
                                    <dd class="mt-2 md:mt-0 md:col-span-7">
                                        <p class="text-base text-gray-500">
                                            Berusia minimal 17 tahun.
                                        </p>
                                    </dd>
                                </div>

                                <div class="pt-6 md:grid md:grid-cols-12 md:gap-8">
                                    <dt class="text-base font-medium text-gray-900 md:col-span-5">
                                        Bagiamana syarat pembiayaan yang diberikan?
                                    </dt>
                                    <dd class="mt-2 md:mt-0 md:col-span-7">
                                        <p class="text-base text-gray-500">
                                            Sumber dana tidak berasal dari tindakan pencucian uang
                                            atau menggunakan uang yang berasal dari sumber tidak
                                            halal.
                                        </p>
                                    </dd>
                                </div>

                                <div class="pt-6 md:grid md:grid-cols-12 md:gap-8">
                                    <dt class="text-base font-medium text-gray-900 md:col-span-5">
                                        Bagaimana konsep pembiyaan di Invest.In?
                                    </dt>
                                    <dd class="mt-2 md:mt-0 md:col-span-7">
                                        <p class="text-base text-gray-500">
                                            Mengetahui bahwa kegiatan pemberian yang dilakukan
                                            menggunakan prinsip Syariah.
                                        </p>
                                    </dd>
                                </div>

                                <div class="pt-6 md:grid md:grid-cols-12 md:gap-8">
                                    <dt class="text-base font-medium text-gray-900 md:col-span-5">
                                        Syarat lainnya
                                    </dt>
                                    <dd class="mt-2 md:mt-0 md:col-span-7">
                                        <p class="text-base text-gray-500">
                                            Menyadari bahwa kegiatan pemberian dana investasi kepada
                                            Penerima Pembiayaan adalah kegiatan yang erat kaitannya
                                            dengan risiko.
                                        </p>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
        </main>

        @include('components.footer')

    </div>


</html>
<script>
    AOS.init();
</script>