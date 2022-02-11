<?php
//Untuk chat whatsapp

//mencari admin yaitu user dengan id 1, jika ada penanda lain untuk admin bisa diubah
$admin = \App\Models\User::find(1);

//Silahkan diubah sendiri nanti pesannya gimana kalau dibutuhkan
$message = "Assalamu'alaikum Wr. Wb, perkenalkan saya ".auth()->user()->name.". Saya tertarik untuk berinvestasi pada ".$proyek->nama.'.';

$message = str_replace(' ','%20',$message);

//link WA harus menggunakan kode negara, maka saat ini aku ngubah nomor pertama (biasanya 0) menjadi 62, mungkin bisa diimprove dengan menambahkan regex pada saat registrasi
$no_hp = '+6281237906699';

$url = 'https://api.whatsapp.com/send?phone='.$no_hp.'&text='.$message
?>
<x-app-layout>
    <main class="min-h-screen text-white bg-primary">
        <section class="px-8 py-2 mx-auto md:pl-10 max-w-7xl">
            <h3 class="mt-5 font-semibold"><span class="text-blue-400">List Proyek</span> / {{ $proyek->nama }}</h3>
        </section>
        <section class="px-8 py-10 mx-auto md:pl-10 max-w-7xl">
            <h1 class="text-3xl font-bold">{{ $proyek->nama }}</h1>
            <h2 class="text-gray-300">Surabaya, Jawa Timur</h2>
        </section>
        <section class="mx-auto md:pl-10 max-w-7xl">
            <div class="flex flex-col md:space-x-10 md:flex-row">
                <div class="w-4/5 mx-auto sm:mx-0 md:w-1/2">
                    <img class="object-cover w-full h-full border-2 rounded-md"
                        src="{{ asset('/storage/' . $proyek->foto_produk) }}" alt="{{ $proyek->nama }}" />
                </div>
                <div class="px-7">

                    <h3 class="mt-5">UMKM Pujaa</h3>
                    @if ($proyek->akad_id == 1)
                    <p class="font-bold">Akad Mudharabah</p>
                    @endif
                    @if ($proyek->akad_id == 2)
                    <p class="font-bold">Akad Murabahah</p>
                    @endif

                    <p class="my-5 text-2xl font-bold ">{{ $proyek->nama }}</p>


                    <div class="flex mt-4 space-x-4 text-sm">
                        <div>
                            <p class="text-gray-100">
                                Dana terkumpul
                            </p>
                            <p class="text-base font-bold">
                                Rp.{{ number_format($proyek->investasi->sum('total_pembiayaan'), 2) }}
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-200">Dana Dibutuhkan</p>
                            <p class="text-sm text-gray-100">
                                Rp.<span
                                    class="text-base font-bold text-gray-200">{{ number_format($proyek->dana_dibutuhkan, 2) }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="mt-3 text-sm">
                        <p class="text-gray-100">Tanggal Pendanaan Ditutup</p>
                        <p class="text-lg font-bold">
                            {{ \Carbon\Carbon::parse($proyek->tanggal_pendanaan_ditutup)->format('d M Y') }}
                        </p>
                    </div>

                    <div class="mt-3 text-sm">
                        <p class="text-gray-100">Periode proyek</p>
                        <p>
                            {{ \Carbon\Carbon::parse($proyek->waktu_pengerjaan_proyek_mulai)->diffInDays($proyek->waktu_pengerjaan_proyek_berakhir) }}
                            Hari
                        </p>
                    </div>



                    <div class="flex flex-col mt-5 space-x-0 space-y-2 md:space-x-2 md:space-y-0 md:flex-row md:mt-24">
                        <a href="{{$url}}" target="_blank" type="button"
                            class="items-center inline-block py-3 text-sm font-medium text-center text-white bg-indigo-600 border border-transparent rounded-md shadow-sm md:w-full hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Beli</a>
                        @if ($proyek->akad_id == 2)
                        <a href="https://docs.google.com/document/d/1u1C92HVVL4pbd_GLLkBmfTw6W2eAvzog/view"
                            target="_blank"
                            class="items-center inline-block py-3 text-sm font-medium text-center text-indigo-700 bg-indigo-100 border border-transparent rounded-md md:w-full hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Unduh
                            Proposal</a>
                        @endif
                        @if ($proyek->akad_id == 1)
                        <a href="https://docs.google.com/document/d/1y-51TGSt53HbWKDqqTEX7ZXIn698f9mg/view"
                            target="_blank"
                            class="items-center inline-block py-3 text-sm font-medium text-center text-indigo-700 bg-indigo-100 border border-transparent rounded-md md:w-full hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Unduh
                            Proposal</a>
                        @endif

                    </div>



                </div>
        </section>
        <section class="px-5 mx-auto md:pl-10 mt-7 max-w-7xl py-7">
            <h2 class="my-2 text-2xl font-bold text-yellow-200">Deksripsi</h2>
            <p class="max-w-prose">{{ $proyek->deskripsi }}</p>
        </section>
    </main>
    @include('components.footer')

</x-app-layout>