<head>
    <title>Investin | Daftar</title>
</head>
<x-guest-layout>
    <div class="flex flex-col justify-center min-h-screen py-12 sm:px-6 lg:px-8 bg-primary">
        <x-slot name="logo">
            <x-jet-authentication-card-logo/>
        </x-slot>


        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <a href="{{route('index')}}">
                <img
                    class="w-auto h-8 mx-auto sm:h-10"
                    src="{{asset('images/logo-investin.svg')}}"
                    alt="logo_investin"
                />
            </a>

            <h2 class="mt-6 text-3xl font-extrabold text-center text-white">
                Daftar akun anda
            </h2>
            <p class="mt-2 text-sm text-center text-gray-200 max-w">
                Mulai berinvestasi dengan nominal terendah Rp. 10.000, tanpa biaya tambahan
            </p>
        </div>

        <div class="px-10 mt-8 sm:px-0 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="px-4 py-8 bg-gray-100 rounded-lg shadow-md sm:px-10">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <x-jet-validation-errors class="mb-4"/>

                    <div>
                        <x-jet-label for="name" value="{{ __('Nama') }}"/>
                        <x-jet-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')"
                                     required autofocus autocomplete="name"/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="email" value="{{ __('Email') }}"/>
                        <x-jet-input id="email" class="block w-full mt-1" type="email" name="email"
                                     :value="old('email')" required/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}"/>
                        <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" required
                                     autocomplete="new-password"/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password_confirmation" value="{{ __('Konfirmasi Password') }}"/>
                        <x-jet-input id="password_confirmation" class="block w-full mt-1" type="password"
                                     name="password_confirmation" required autocomplete="new-password"/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="nomor_hp" value="{{ __('Nomor HP') }}"/>
                        <x-jet-input id="nomor_hp" class="block w-full mt-1" type="text" name="nomor_hp" :value="old('nomor_hp')"
                                     required autofocus autocomplete="nomor_hp"/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="tempat_lahir" value="{{ __('Tempat Lahir') }}"/>
                        <x-jet-input id="tempat_lahir" class="block w-full mt-1" type="text" name="tempat_lahir"
                                     :value="old('tempat_lahir')"
                                     required autofocus autocomplete="tempat_lahir"/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="tanggal_lahir" value="{{ __('Tanggal Lahir') }}" />
                        <x-jet-input name="tanggal_lahir" placeholder="mm/dd/yyyy"
                                     type="text" id="datepicker" required  x-ref="date" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label value="{{ __('Jenis Kelamin') }}"/>
                        <div class="flex flex-row" style="align-items: center"><input type="radio" name="jenis_kelamin"
                                                                                      value="Laki-laki" id="laki-laki"
                                                                                      :value="old('jenis_kelamin')"><label
                                for="laki-laki" class="ml-1">Laki-laki</label></div>
                        <div class="flex flex-row" style="align-items: center"><input type="radio" name="jenis_kelamin"
                                                                                      value="Perempuan" id="perempuan"
                                                                                      :value="old('jenis_kelamin')"><label
                                for="perempuan" class="ml-1">Perempuan</label></div>

                    </div>

                    <div class="mt-4">
                        <x-jet-label for="pekerjaan" value="{{ __('Pekerjaan') }}"/>
                        <x-jet-input id="pekerjaan" class="block w-full mt-1" type="text" name="pekerjaan"
                                     :value="old('pekerjaan')"
                                     required autofocus autocomplete="pekerjaan"/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="alamat" value="{{ __('Alamat') }}"/>
                        <textarea id="Alamat"
                                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                  type="text" name="alamat" :value="old('alamat')"
                                  required autofocus autocomplete="alamat"></textarea>
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-jet-label for="terms">
                                <div class="flex items-center">
                                    <x-jet-checkbox name="terms" id="terms"/>

                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-sm text-gray-600 underline hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-sm text-gray-600 underline hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-jet-label>
                        </div>
                    @endif

                    <div class="flex items-center justify-end mt-4">
                        <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Sudah punya akun?') }}
                        </a>

                        <x-jet-button class="ml-4">
                            {{ __('Daftar') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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

                initDate() {
                    let today = new Date('December 25, 1800 23:15:00');
                    this.month = today.getMonth();
                    this.year = today.getFullYear();
                    this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
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

    </script>
</x-guest-layout>
