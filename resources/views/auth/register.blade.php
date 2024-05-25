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
            <x-input-label for="status" :value="__('status')" />
            <x-text-input id="status" class="block mt-1 w-full" type="text" name="status" :value="'Belum Melakukan Check-in'" />
            <x-input-error :messages="$errors->get('status')" class="mt-2" />
        </div>

        <!-- NIM -->
        <div>
            <x-input-label for="nim" :value="__('NIM')" />
            <x-text-input id="nim" class="block mt-1 w-full" type="text" name="nim" :value="old('nim')" required autofocus autocomplete="nim" pattern="[0-9]*" />
            <x-input-error :messages="$errors->get('nim')" class="mt-2" />
        </div>

        <!-- Gender -->
        <div>
            <x-input-label for="gender" :value="__('Jenis Kelamin')" />
            <select id="gender" name="gender" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required autocomplete="gender">
                <option value="" selected disabled>Pilih jenis kelamin</option>
                <option value="putra">Laki-laki</option>
                <option value="putri">Perempuan</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>


                    <!-- Input untuk Jurusan -->
        <div>
            <x-input-label for="jurusan" :value="__('Jurusan')" />
            <select id="jurusan" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"  name="jurusan" required autocomplete="jurusan">
                <option value="" disabled selected>Pilih Jurusan</option>
                <option value="D3 Teknik Telekomunikasi">D3 Teknik Telekomunikasi</option>
                <option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
                <option value="D3 Sistem Informasi">D3 Sistem Informasi</option>
                <option value="D3 Teknik Komputer">D3 Teknik Komputer</option>
                <option value="D3 Digital Accounting (Sistem Informasi Akuntansi)">D3 Digital Accounting (Sistem Informasi Akuntansi)</option>
                <option value="D3 Digital Marketing">D3 Digital Marketing</option>
                <option value="S1 Terapan Digital Creative Multimedia (DCM)">S1 Terapan Digital Creative Multimedia (DCM)</option>
                <option value="S1 Teknik Telekomunikasi">S1 Teknik Telekomunikasi</option>
                <option value="S1 Teknik Telekomunikasi (International Class)">S1 Teknik Telekomunikasi (International Class)</option>
                <option value="S1 Teknik Elektro">S1 Teknik Elektro</option>
                <option value="S1 Teknik Elektro (International Class)">S1 Teknik Elektro (International Class)</option>
                <option value="S1 Teknik Komputer">S1 Teknik Komputer</option>
                <option value="S1 Smart Science & Technology">S1 Smart Science & Technology</option>
                <option value="S1 Teknik Biomedis">S1 Teknik Biomedis</option>
                <option value="S1 Electrical Energy Engineering">S1 Electrical Energy Engineering</option>
                <option value="S1 Sistem Informasi">S1 Sistem Informasi</option>
                <option value="S1 Sistem Informasi (International Class)">S1 Sistem Informasi (International Class)</option>
                <option value="S1 Teknik Industri">S1 Teknik Industri</option>
                <option value="S1 Teknik Industri (International Class)">S1 Teknik Industri (International Class)</option>
                <option value="S1 Digital Supply Chain">S1 Digital Supply Chain</option>
                <option value="S1 Terapan Digital Creative Multimedia">S1 Terapan Digital Creative Multimedia</option>
                <option value="S1 Desain Komunikasi Visual">S1 Desain Komunikasi Visual</option>
                <option value="S1 Desain Komunikasi Visual (International Class)">S1 Desain Komunikasi Visual (International Class)</option>
                <option value="S1 Desain Interior">S1 Desain Interior</option>
                <option value="S1 Desain Produk & Inovasi">S1 Desain Produk & Inovasi</option>
                <option value="S1 Kriya (Fashion & Textile Design)">S1 Kriya (Fashion & Textile Design)</option>
                <option value="S1 Creative Arts (Intermedia Visual Arts)">S1 Creative Arts (Intermedia Visual Arts)</option>
                <option value="S1 Film dan Animasi">S1 Film dan Animasi</option>
                <option value="S1 Ilmu Komunikasi">S1 Ilmu Komunikasi</option>
                <option value="S1 Ilmu Komunikasi (International Class)">S1 Ilmu Komunikasi (International Class)</option>
                <option value="S1 Administrasi Bisnis">S1 Administrasi Bisnis</option>
                <option value="S1 Digital Public Relation">S1 Digital Public Relation</option>
                <option value="S1 Digital Content Broadcasting">S1 Digital Content Broadcasting</option>
                <option value="S1 Manajemen Bisnis Telekomunikasi & Informatika (MBTI)">S1 Manajemen Bisnis Telekomunikasi & Informatika (MBTI)</option>
                <option value="S1 MBTI (International Class)">S1 MBTI (International Class)</option>
                <option value="S1 Akuntansi">S1 Akuntansi</option>
                <option value="S1 Akuntansi (International Class)">S1 Akuntansi (International Class)</option>
                <option value="S1 Leisure Management">S1 Leisure Management</option>
                <option value="S1 Informatika">S1 Informatika</option>
                <option value="S1 Informatika (International Class)">S1 Informatika (International Class)</option>
                <option value="S1 Rekayasa Perangkat Lunak">S1 Rekayasa Perangkat Lunak</option>
                <option value="S1 Teknologi Informasi">S1 Teknologi Informasi</option>
                <option value="S1 Data Sains">S1 Data Sains</option>
            </select>
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
