<x-app-layout>
    <div class="relative min-h-screen px-4 pt-16 pb-20 bg-primary sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
        <div class="absolute inset-0 bg-primary ">
            <div class="bg-primary h-1/3 sm:h-2/3"></div>
        </div>
        <div class="relative mx-auto max-w-7xl bg-primary">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                    Proyek UMKM Pujaa
                </h2>
                <p class="max-w-2xl mx-auto mt-3 text-xl text-gray-200 sm:mt-4">
                    List proyek yang tersedia dari UMKM Pujaa untuk saat ini.
                </p>
            </div>
            @if (auth()->user()->is_admin)
                <div class="py-5 mt-5 space-y-2 text-left rounded-lg bg-gray-50">
                    <h2 class="ml-5 text-xl font-bold text-gray-700">Halo, {{ auth()->user()->name }}</h2>
                    <a type="button" href="{{ route('projects.crud',['type'=>'create']) }}"
                       class="inline-flex items-center px-3 py-2 ml-5 text-sm font-medium leading-4 text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Tambah Proyek
                    </a>
                    <a type="button"
                    href="{{route('dashboard.index')}}"
                            class="inline-flex items-center px-3 py-2 ml-2 text-sm font-medium leading-4 text-indigo-700 bg-indigo-100 border border-transparent rounded-md hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Lihat Detail Proyek
                    </a>
                </div>
            @endif



            @if (Session::has('success') && Session::get('success'))
                <div class="relative px-4 py-3 my-1 mt-2 text-green-700 bg-green-100 border border-green-400 rounded"
                     role="alert">
                    <strong class="font-bold">Sukses!</strong>
                    <span class="block sm:inline">{{ Session::get('message') }}</span>
                </div>
            @endif

            <div class="grid gap-5 mx-auto mt-10 lg:grid-cols-3 lg:max-w-none">
                @foreach ($proyeks as $proyek)
                    <div class="flex flex-col overflow-hidden border-2 border-gray-300 rounded-lg shadow-lg">
                        <div class="flex-shrink-0">
                            <img class="object-cover w-full h-48"
                                 src="{{ asset('/storage/' . $proyek->foto_produk) }}" alt="{{ $proyek->nama }}"/>
                        </div>
                        <div class="flex flex-col justify-between flex-1 p-6 bg-white">
                            <div class="flex-1">
                                <a href="{{ route('projects.detail', ['proyek_id' => $proyek->id]) }}"
                                   class="block mt-2">
                                    <p class="text-xl font-semibold text-gray-900">
                                        {{ $proyek->nama }}
                                    </p>
                                    <p class="mt-2 text-gray-700">UMKM Pujaa</p>
                                    @if ($proyek->akad_id == 1)
                                        <p class="font-bold text-primary">Akad Mudharabah</p>
                                    @endif
                                    @if ($proyek->akad_id == 2)
                                        <p class="font-bold text-primary">Akad Murabahah</p>
                                    @endif

                                    <p class="mt-3 text-sm text-gray-700">Dana Dibutuhkan</p>
                                    <p class="text-sm font-bold text-gray-600">
                                        Rp.<span
                                            class="text-gray-900">{{ number_format($proyek->dana_dibutuhkan, 2,',','.') }}</span>
                                    </p>

                                    <div class="flex justify-between py-2 mt-2 text-sm border-t">
                                        <div>
                                            <p class="text-gray-700">
                                                Dana terkumpul
                                            </p>
                                            <p class="font-bold">
                                                Rp.{{ number_format($proyek->investasi->sum('total_pembiayaan'), 2) }}
                                            </p>
                                        </div>

                                        <div>
                                            <p class="text-gray-700">Periode proyek</p>
                                            <p>
                                                {{ \Carbon\Carbon::parse($proyek->waktu_pengerjaan_proyek_mulai)->diffInDays($proyek->waktu_pengerjaan_proyek_berakhir) }}
                                                Hari
                                            </p>
                                        </div>


                                    </div>
                                </a>

                                @if (auth()->user()->is_admin)
                                    <form action="{{ route('projects.delete') }}" method="POST" class="inline-flex">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $proyek->id }}"/>
                                        <button type="submit"
                                                class="items-center px-3 py-2 mt-4 text-sm font-medium leading-4 text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                            Hapus Proyek
                                        </button>
                                    </form>
                                    <a href="{{route('projects.crud',['type'=>'edit','id'=>$proyek->id])}}"
                                       type="button"
                                       class="inline-flex items-center px-3 py-2 mt-4 text-sm font-medium leading-4 text-white bg-yellow-500 border border-transparent rounded-md shadow-sm hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                        Edit Proyek
                                    </a>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="w-full mt-8">
                {{ $proyeks->links('pagination::tailwind-dark') }}
            </div>
        </div>
    </div>
    @include('components.footer')
</x-app-layout>
