<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="hidden">
            <x-input-label for="kamar" :value="__('Kamar')" />
            <x-text-input id="kamar" class="block mt-1 w-full" type="text" name="kamar" :value="'Menunggu Update oleh Admin'" />
            <x-input-error :messages="$errors->get('kamar')" class="mt-2" />
        </div>

        <!-- NIM -->
        <div>
            <x-input-label for="nim" :value="__('NIM')" />
            <x-text-input id="nim" class="block mt-1 w-full" type="text" name="nim" :value="old('nim')" required autofocus autocomplete="nim" pattern="[0-9]*" />
            <x-input-error :messages="$errors->get('nim')" class="mt-2" />
        </div>

                <!-- Input untuk Jurusan -->
        <div class="mt-4">
            <x-input-label for="jurusan" :value="__('Jurusan')" />
            <x-text-input id="jurusan" class="block mt-1 w-full" type="text" name="jurusan" :value="old('jurusan')" required autocomplete="jurusan" />
            <x-input-error :messages="$errors->get('jurusan')" class="mt-2" />
        </div>

        <!-- Input untuk Nama Ibu -->
        <div class="mt-4">
            <x-input-label for="nama_ibu" :value="__('Nama Ibu')" />
            <x-text-input id="nama_ibu" class="block mt-1 w-full" type="text" name="nama_ibu" :value="old('nama_ibu')" required autocomplete="nama_ibu" />
            <x-input-error :messages="$errors->get('nama_ibu')" class="mt-2" />
        </div>

        <!-- Input untuk Nomor Telepon -->
        <div class="mt-4">
            <x-input-label for="nomor_telepon" :value="__('Nomor Telepon')" />
            <x-text-input id="nomor_telepon" class="block mt-1 w-full" type="tel" name="nomor_telepon" :value="old('nomor_telepon')" required autocomplete="tel" />
            <x-input-error :messages="$errors->get('nomor_telepon')" class="mt-2" />
        </div>

        <!-- Input untuk Telepon Darurat -->
        <div class="mt-4">
            <x-input-label for="telefon_darurat" :value="__('Telepon Darurat')" />
            <x-text-input id="telefon_darurat" class="block mt-1 w-full" type="tel" name="telefon_darurat" :value="old('telefon_darurat')" required autocomplete="tel" />
            <x-input-error :messages="$errors->get('telefon_darurat')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
