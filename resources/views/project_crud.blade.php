<x-app-layout>
    <div>
        <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto">
                <form action="{{$type=='create'?route('projects.post'):route('projects.put')}}" method="POST"
                      class="space-y-8 divide-y divide-gray-200"
                      enctype="multipart/form-data">
                    <div class="space-y-8 divide-y divide-gray-200">
                        <div>
                            <div>
                                <h3 class="text-lg font-medium leading-6 text-gray-900">
                                    {{$type=='create'?'Tambah':'Edit'}} Proyek
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">
                                    Isilah form di bawah untuk {{$type=='create'?'menambahkan':'mengedit'}} proyek
                                </p>
                                @if ($errors->any())
                                    <div
                                        class="relative px-4 py-3 my-1 text-red-700 bg-red-100 border border-red-400 rounded"
                                        role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            @csrf
                            @if($type=='edit')
                                @method('put')
                                <input type="hidden" name="id" value="{{$proyek->id}}"/>
                            @endif
                            <div class="grid grid-cols-1 mt-6 gap-y-6 gap-x-4 sm:grid-cols-6">
                                <div class="sm:col-span-6">
                                    <label for="nama_proyek" class="block text-sm font-medium text-gray-700">
                                        Nama Proyek
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" name="nama_proyek" id="nama_proyek"
                                               autocomplete="nama_proyek"
                                               class="flex-1 block w-full min-w-0 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 rounded-r-md sm:text-sm"
                                               @if($type=='edit') value="{{$proyek->nama}}" @endif
                                               required/>
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">
                                        Tulislah beberapa kalimat untuk judul proyek anda
                                    </p>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="dana_yang_dibutuhkan" class="block text-sm font-medium text-gray-700">Dana
                                        yang
                                        Dibutuhkan</label>
                                    <div class="relative mt-1 rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm">
                                                Rp
                                            </span>
                                        </div>
                                        <input type="text" name="dana_yang_dibutuhkan" id="dana_yang_dibutuhkan"
                                               class="block w-full pr-12 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 pl-7 sm:text-sm"
                                               placeholder="0.00"
                                               @if($type=='edit') value="{{$proyek->dana_dibutuhkan}}" @endif
                                               required>
                                        <div class="absolute inset-y-0 right-0 flex items-center">
                                            <label for="currency" class="sr-only">Dana yang dibutuhkan</label>
                                            <select id="currency" name="currency"
                                                    class="h-full py-0 pl-2 text-gray-500 bg-transparent border-transparent rounded-md focus:ring-indigo-500 focus:border-indigo-500 pr-7 sm:text-sm">
                                                <option>IDR</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="sm:col-span-6">
                                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">
                                        Deskripsi
                                    </label>
                                    <div class="mt-1">
                                        <textarea id="deskripsi" name="deskripsi" rows="3"
                                                  class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                  required>@if($type=='edit'){{$proyek->deskripsi}}@endif</textarea>
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">
                                        Tuliskan deskripsi untuk proyek anda.
                                    </p>
                                </div>
                                {{-- Tanggal Mualai Proyek --}}
                                <div class="sm:col-span-3">
                                    <div x-data="app()"
                                         x-init="[initDate('@if($type==`edit`){{date(`Y-m-d`,strtotime($proyek->waktu_pengerjaan_proyek_mulai))}}@endif'), getNoOfDays()]"
                                         x-cloak>
                                        <div class="">
                                            <div class="">
                                                <label for="tanggal_mulai_proyek"
                                                       class="block mb-1 text-sm font-semibold text-gray-600">Tanggal
                                                    Dimulainya Proyek</label>
                                                <div class="relative">
                                                    <input type="hidden" name="tanggal_mulai_proyek"
                                                           id="tanggal_mulai_proyek" x-ref="date"
                                                           value="{{date('Y-m-d')}}" required>
                                                    <input type="text" readonly x-model="datepickerValue"
                                                           @click="showDatepicker = !showDatepicker"
                                                           @keydown.escape="showDatepicker = false"
                                                           class="w-full py-2 pl-4 pr-10 text-sm font-medium leading-none text-gray-700 rounded-lg shadow-sm focus:outline-none focus:shadow-outline"
                                                           placeholder="Select date">

                                                    <div class="absolute top-0 right-0 px-3 py-2">
                                                        <svg class="w-5 h-5 text-gray-400" fill="none"
                                                             viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2"
                                                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                        </svg>
                                                    </div>


                                                    <!-- <div x-text="no_of_days.length"></div>
                                                        <div x-text="32 - new Date(year, month, 32).getDate()"></div>
                                                        <div x-text="new Date(year, month).getDay()"></div> -->

                                                    <div
                                                        class="absolute top-0 left-0 p-4 mt-12 bg-white rounded-lg shadow z-10"
                                                        style="width: 17rem" x-show.transition="showDatepicker"
                                                        @click.away="showDatepicker = false">

                                                        <div class="flex items-center justify-between mb-2">
                                                            <div>
                                                                <span x-text="MONTH_NAMES[month]"
                                                                      class="font-bold text-gray-400 text-md"></span>
                                                                <span x-text="year"
                                                                      class="ml-1 font-normal text-gray-400 text-md"></span>
                                                            </div>
                                                            <div>
                                                                <button type="button"
                                                                        class="inline-flex p-1 transition duration-100 ease-in-out rounded-lg cursor-pointer hover:bg-gray-200"
                                                                        :class="{'cursor-not-allowed opacity-25': month == 0 }"
                                                                        :disabled="month == 0 ? true : false"
                                                                        @click="month--; getNoOfDays()">
                                                                    <svg class="inline-flex w-6 h-6 text-gray-500"
                                                                         fill="none" viewBox="0 0 24 24"
                                                                         stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                              stroke-linejoin="round" stroke-width="2"
                                                                              d="M15 19l-7-7 7-7"/>
                                                                    </svg>
                                                                </button>
                                                                <button type="button"
                                                                        class="inline-flex p-1 transition duration-100 ease-in-out rounded-lg cursor-pointer hover:bg-gray-200"
                                                                        :class="{'cursor-not-allowed opacity-25': month == 11 }"
                                                                        :disabled="month == 11 ? true : false"
                                                                        @click="month++; getNoOfDays()">
                                                                    <svg class="inline-flex w-6 h-6 text-gray-500"
                                                                         fill="none" viewBox="0 0 24 24"
                                                                         stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                              stroke-linejoin="round" stroke-width="2"
                                                                              d="M9 5l7 7-7 7"/>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <div class="flex flex-wrap mb-3 -mx-1">
                                                            <template x-for="(day, index) in DAYS" :key="index">
                                                                <div style="width: 14.26%" class="px-1">
                                                                    <div x-text="day"
                                                                         class="text-xs font-medium text-center text-gray-800">
                                                                    </div>
                                                                </div>
                                                            </template>
                                                        </div>

                                                        <div class="flex flex-wrap -mx-1">
                                                            <template x-for="blankday in blankdays">
                                                                <div style="width: 14.28%"
                                                                     class="p-1 text-sm text-center ">
                                                                </div>
                                                            </template>
                                                            <template x-for="(date, dateIndex) in no_of_days"
                                                                      :key="dateIndex">
                                                                <div style="width: 14.28%" class="px-1 mb-1">
                                                                    <div @click="getDateValue(date)" x-text="date"
                                                                         class="text-sm leading-loose text-center transition duration-100 ease-in-out rounded-full cursor-pointer"
                                                                         :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700 hover:bg-blue-200': isToday(date) == false }">
                                                                    </div>
                                                                </div>
                                                            </template>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Tanggal berakhir Proyek --}}
                                <div class="sm:col-span-3">
                                    <div x-data="app()"
                                         x-init="[initDate('@if($type==`edit`){{date(`Y-m-d`,strtotime($proyek->waktu_pengerjaan_proyek_berakhir))}}@endif'), getNoOfDays()]"
                                         x-cloak>
                                        <div>
                                            <div>
                                                <label for="tanggal_berakhir_proyek"
                                                       class="block mb-1 text-sm font-semibold text-gray-600">Tanggal
                                                    Berakhirnya Proyek</label>
                                                <div class="relative">
                                                    <input type="hidden" name="tanggal_berakhir_proyek"
                                                           id="tanggal_berakhir_proyek" x-ref="date"
                                                           value="{{date('Y-m-d')}}" required>
                                                    <input type="text" readonly x-model="datepickerValue"
                                                           @click="showDatepicker = !showDatepicker"
                                                           @keydown.escape="showDatepicker = false"
                                                           class="w-full py-2 pl-4 pr-10 text-sm font-medium leading-none text-gray-700 rounded-lg shadow-sm focus:outline-none focus:shadow-outline"
                                                           placeholder="Select date">

                                                    <div class="absolute top-0 right-0 px-3 py-2">
                                                        <svg class="w-5 h-5 text-gray-400" fill="none"
                                                             viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2"
                                                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                        </svg>
                                                    </div>


                                                    <!-- <div x-text="no_of_days.length"></div>
                                                        <div x-text="32 - new Date(year, month, 32).getDate()"></div>
                                                        <div x-text="new Date(year, month).getDay()"></div> -->

                                                    <div
                                                        class="absolute top-0 left-0 p-4 mt-12 bg-white rounded-lg shadow z-10"
                                                        style="width: 17rem" x-show.transition="showDatepicker"
                                                        @click.away="showDatepicker = false">

                                                        <div class="flex items-center justify-between mb-2">
                                                            <div>
                                                                <span x-text="MONTH_NAMES[month]"
                                                                      class="font-bold text-gray-400 text-md"></span>
                                                                <span x-text="year"
                                                                      class="ml-1 font-normal text-gray-400 text-md"></span>
                                                            </div>
                                                            <div>
                                                                <button type="button"
                                                                        class="inline-flex p-1 transition duration-100 ease-in-out rounded-lg cursor-pointer hover:bg-gray-200"
                                                                        :class="{'cursor-not-allowed opacity-25': month == 0 }"
                                                                        :disabled="month == 0 ? true : false"
                                                                        @click="month--; getNoOfDays()">
                                                                    <svg class="inline-flex w-6 h-6 text-gray-500"
                                                                         fill="none" viewBox="0 0 24 24"
                                                                         stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                              stroke-linejoin="round" stroke-width="2"
                                                                              d="M15 19l-7-7 7-7"/>
                                                                    </svg>
                                                                </button>
                                                                <button type="button"
                                                                        class="inline-flex p-1 transition duration-100 ease-in-out rounded-lg cursor-pointer hover:bg-gray-200"
                                                                        :class="{'cursor-not-allowed opacity-25': month == 11 }"
                                                                        :disabled="month == 11 ? true : false"
                                                                        @click="month++; getNoOfDays()">
                                                                    <svg class="inline-flex w-6 h-6 text-gray-500"
                                                                         fill="none" viewBox="0 0 24 24"
                                                                         stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                              stroke-linejoin="round" stroke-width="2"
                                                                              d="M9 5l7 7-7 7"/>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <div class="flex flex-wrap mb-3 -mx-1">
                                                            <template x-for="(day, index) in DAYS" :key="index">
                                                                <div style="width: 14.26%" class="px-1">
                                                                    <div x-text="day"
                                                                         class="text-xs font-medium text-center text-gray-800">
                                                                    </div>
                                                                </div>
                                                            </template>
                                                        </div>

                                                        <div class="flex flex-wrap -mx-1">
                                                            <template x-for="blankday in blankdays">
                                                                <div style="width: 14.28%"
                                                                     class="p-1 text-sm text-center ">
                                                                </div>
                                                            </template>
                                                            <template x-for="(date, dateIndex) in no_of_days"
                                                                      :key="dateIndex">
                                                                <div style="width: 14.28%" class="px-1 mb-1">
                                                                    <div @click="getDateValue(date)" x-text="date"
                                                                         class="text-sm leading-loose text-center transition duration-100 ease-in-out rounded-full cursor-pointer"
                                                                         :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700 hover:bg-blue-200': isToday(date) == false }">
                                                                    </div>
                                                                </div>
                                                            </template>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- tanggal berakhir galang Dana --}}
                                <div class="sm:col-span-2">
                                    <div x-data="app()"
                                         x-init="[initDate('@if($type==`edit`){{date(`Y-m-d`,strtotime($proyek->tanggal_pendanaan_ditutup))}}@endif'), getNoOfDays()]"
                                         x-cloak>
                                        <div>
                                            <div class="">
                                                <label for="tanggal_berakhir_galang_dana"
                                                       class="block mb-1 text-sm font-semibold text-gray-600">Tanggal
                                                    Berakhirnya Galang Dana</label>
                                                <div class="relative">
                                                    <input type="hidden" name="tanggal_berakhir_galang_dana"
                                                           id="tanggal_berakhir_galang_dana" x-ref="date"
                                                           value="{{date('Y-m-d')}}" required>
                                                    <input type="text" readonly x-model="datepickerValue"
                                                           @click="showDatepicker = !showDatepicker"
                                                           @keydown.escape="showDatepicker = false"
                                                           class="w-full py-2 pl-4 pr-10 text-sm font-medium leading-none text-gray-700 rounded-lg shadow-sm focus:outline-none focus:shadow-outline"
                                                           placeholder="Select date">

                                                    <div class="absolute top-0 right-0 px-3 py-2">
                                                        <svg class="w-5 h-5 text-gray-400" fill="none"
                                                             viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2"
                                                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                        </svg>
                                                    </div>


                                                    <!-- <div x-text="no_of_days.length"></div>
                                                        <div x-text="32 - new Date(year, month, 32).getDate()"></div>
                                                        <div x-text="new Date(year, month).getDay()"></div> -->

                                                    <div
                                                        class="absolute top-0 left-0 p-4 mt-12 bg-white rounded-lg shadow z-10"
                                                        style="width: 17rem" x-show.transition="showDatepicker"
                                                        @click.away="showDatepicker = false">

                                                        <div class="flex items-center justify-between mb-2">
                                                            <div>
                                                                <span x-text="MONTH_NAMES[month]"
                                                                      class="font-bold text-gray-400 text-md"></span>
                                                                <span x-text="year"
                                                                      class="ml-1 font-normal text-gray-400 text-md"></span>
                                                            </div>
                                                            <div>
                                                                <button type="button"
                                                                        class="inline-flex p-1 transition duration-100 ease-in-out rounded-lg cursor-pointer hover:bg-gray-200"
                                                                        :class="{'cursor-not-allowed opacity-25': month == 0 }"
                                                                        :disabled="month == 0 ? true : false"
                                                                        @click="month--; getNoOfDays()">
                                                                    <svg class="inline-flex w-6 h-6 text-gray-500"
                                                                         fill="none" viewBox="0 0 24 24"
                                                                         stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                              stroke-linejoin="round" stroke-width="2"
                                                                              d="M15 19l-7-7 7-7"/>
                                                                    </svg>
                                                                </button>
                                                                <button type="button"
                                                                        class="inline-flex p-1 transition duration-100 ease-in-out rounded-lg cursor-pointer hover:bg-gray-200"
                                                                        :class="{'cursor-not-allowed opacity-25': month == 11 }"
                                                                        :disabled="month == 11 ? true : false"
                                                                        @click="month++; getNoOfDays()">
                                                                    <svg class="inline-flex w-6 h-6 text-gray-500"
                                                                         fill="none" viewBox="0 0 24 24"
                                                                         stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                              stroke-linejoin="round" stroke-width="2"
                                                                              d="M9 5l7 7-7 7"/>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <div class="flex flex-wrap mb-3 -mx-1">
                                                            <template x-for="(day, index) in DAYS" :key="index">
                                                                <div style="width: 14.26%" class="px-1">
                                                                    <div x-text="day"
                                                                         class="text-xs font-medium text-center text-gray-800">
                                                                    </div>
                                                                </div>
                                                            </template>
                                                        </div>

                                                        <div class="flex flex-wrap -mx-1">
                                                            <template x-for="blankday in blankdays">
                                                                <div style="width: 14.28%"
                                                                     class="p-1 text-sm text-center ">
                                                                </div>
                                                            </template>
                                                            <template x-for="(date, dateIndex) in no_of_days"
                                                                      :key="dateIndex">
                                                                <div style="width: 14.28%" class="px-1 mb-1">
                                                                    <div @click="getDateValue(date)" x-text="date"
                                                                         class="text-sm leading-loose text-center transition duration-100 ease-in-out rounded-full cursor-pointer"
                                                                         :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700 hover:bg-blue-200': isToday(date) == false }">
                                                                    </div>
                                                                </div>
                                                            </template>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="sm:col-span-6">
                                    <label for="foto" class="block text-sm font-medium text-gray-700">
                                        Foto Proyek
                                    </label>
                                    <div
                                        class="flex justify-center px-6 pt-5 pb-6 mt-2 border-2 border-gray-300 border-dashed rounded-md ">
                                        <div class="space-y-1 text-center" id="photo-input-field" style="display: {{$type=='create'?'block':'none'}}">
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
                                                       class="relative mx-auto font-medium text-indigo-600 rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span>Tambahkan Foto</span>
                                                    <input id="foto" name="foto" type="file"
                                                           class="sr-only" accept="image/jpeg,image/png"
                                                           onchange="previewFile()"/>
                                                </label>

                                            </div>
                                            <p class="text-xs text-gray-500">
                                                Menerima tipe file PNG dan JPG dengan ukuran kurang dari
                                                1MB.
                                            </p>
                                        </div>
                                        <div class="relative" id="photo-thumbnail-container"
                                             style="display: {{$type=='create'?'none':'block'}}">
                                            <img class="object-scale-down w-full px-3 my-8"
                                                 id="photo-thumbnail"
                                                 @if($type=='edit') src="{{asset('storage/'.$proyek->foto_produk)}}" @endif
                                            />
                                            <span class="absolute top-0 bottom-0 right-0"
                                                  onclick="removeThumbnail()">
                                                                <svg class="w-6 h-6 text-gray-300 fill-current"
                                                                     role="button" xmlns="http://www.w3.org/2000/svg"
                                                                     viewBox="0 0 20 20">
                                                                    <title>Close</title>
                                                                    <path
                                                                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                                                                </svg>
                                                            </span>
                                        </div>
                                    </div>
                                </div>


                                <div class="sm:col-span-2">
                                    <label for="akad" class="block text-sm font-medium text-gray-700">Jenis
                                        Akad</label>
                                    <select id="akad" name="akad"
                                            class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach($akad as $a)
                                            <option value="{{$a->id}}"
                                                    @if($type=='edit'&&$proyek->akad_id==$a->id) selected @endif>{{$a->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="pt-5">
                        <div class="flex justify-end">
                            <button type="button"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    onclick="resetForm()">
                                Batal
                            </button>
                            <button type="submit"
                                    class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{$type=='create'?'Tambahkan':'Simpan'}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            const MONTH_NAMES = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ];
            const DAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

            function app() {
                return {
                    showDatepicker: false,
                    datepickerValue: '',

                    month: '',
                    year: '',
                    no_of_days: [],
                    blankdays: [],
                    days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],

                    initDate(date) {
                        if (date) {
                            let selectedDate = new Date(date);
                            this.month = selectedDate.getMonth();
                            this.year = selectedDate.getFullYear();
                            this.datepickerValue = new Date(this.year, this.month, selectedDate.getDate()).toDateString();
                        } else {
                            let today = new Date();
                            this.month = today.getMonth();
                            this.year = today.getFullYear();
                            this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
                        }
                    },

                    isToday(date) {
                        const today = new Date();
                        const d = new Date(this.year, this.month, date);
                        return today.toDateString() === d.toDateString() ? true : false;
                    },

                    getDateValue(date) {
                        let selectedDate = new Date(this.year, this.month, date);
                        this.datepickerValue = selectedDate.toDateString();

                        this.$refs.date.value = selectedDate.getFullYear() + "-" + ('0' + (selectedDate.getMonth() + 1)).slice(-
                            2) + "-" + ('0' + selectedDate.getDate()).slice(-2);
                        this.showDatepicker = false;
                    },

                    getNoOfDays() {
                        let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

                        // find where to start calendar day of week
                        let dayOfWeek = new Date(this.year, this.month).getDay();
                        let blankdaysArray = [];
                        for (var i = 1; i <= dayOfWeek; i++) {
                            blankdaysArray.push(i);
                        }

                        let daysArray = [];
                        for (var i = 1; i <= daysInMonth; i++) {
                            daysArray.push(i);
                        }

                        this.blankdays = blankdaysArray;
                        this.no_of_days = daysArray;
                    }
                }
            }

            function previewFile() {
                var previewContainer = document.querySelector('#photo-thumbnail-container');
                var preview = document.querySelector('#photo-thumbnail');
                var inputField = document.querySelector('#photo-input-field');
                var file = document.querySelector('input[type=file]').files[0];
                var reader = new FileReader();

                reader.onloadend = function () {
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
                let curr_date = "{{date('Y-m-d')}}";

                removeThumbnail();
                document.querySelector('#nama_proyek').value = "";
                document.querySelector('#dana_yang_dibutuhkan').value = "";
                document.querySelector('#deskripsi').value = "";
                document.querySelector('#akad').selectedIndex = 0;
                document.querySelector('#currency').selectedIndex = 0;

                //Gak Work
                //Buat reset tanggal di sini
                document.querySelector('#tanggal_mulai_proyek').value = curr_date;
                document.querySelector('#tanggal_berakhir_proyek').value = curr_date;
                document.querySelector('#tanggal_berakhir_galang_dana').value = curr_date;
            }

        </script>
    @endpush
</x-app-layout>
