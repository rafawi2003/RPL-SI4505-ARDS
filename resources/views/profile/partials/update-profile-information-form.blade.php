<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="status" :value="__('Status')" />
            <x-text-input id="status" name="status" type="text" class="mt-1 block w-full" :value="$user->status" required autofocus readonly style="background-color: #f4f4f4; opacity: 0.7; color: #666;" />
            <x-input-error class="mt-2" :messages="$errors->get('status')" />
        </div>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="$user->name" required autofocus readonly style="background-color: #f4f4f4; opacity: 0.7; color: #666;" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="kamar" :value="__('Nomor Kamar')" />
            <x-text-input id="kamar" name="kamar" type="text" class="mt-1 block w-full" :value="$user->kamar" required autofocus readonly style="background-color: #f4f4f4; opacity: 0.7; color: #666;" />
            <x-input-error class="mt-2" :messages="$errors->get('kamar')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="$user->email" required autofocus readonly style="background-color: #f4f4f4; opacity: 0.7; color: #666;" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="nim" :value="__('NIM')" />
            <x-text-input id="nim" name="nim" type="text" class="mt-1 block w-full" :value="$user->nim" required autofocus readonly style="background-color: #f4f4f4; opacity: 0.7; color: #666;" />
            <x-input-error class="mt-2" :messages="$errors->get('nim')" />
        </div>

        <div>
            <x-input-label for="jurusan" :value="__('Jurusan')" />
            <x-text-input id="jurusan" name="jurusan" type="text" class="mt-1 block w-full" :value="$user->jurusan" required autofocus readonly style="background-color: #f4f4f4; opacity: 0.7; color: #666;" />
            <x-input-error class="mt-2" :messages="$errors->get('jurusan')" />
        </div>

        <div>
            <x-input-label for="nama_ibu" :value="__('Nama Ibu')" />
            <x-text-input id="nama_ibu" name="nama_ibu" type="text" class="mt-1 block w-full" :value="$user->nama_ibu" />
            <x-input-error class="mt-2" :messages="$errors->get('nama_ibu')" />
        </div>

        <div>
            <x-input-label for="nomor_telepon" :value="__('Nomor Telepon')" />
            <x-text-input id="nomor_telepon" name="nomor_telepon" type="text" class="mt-1 block w-full" :value="$user->nomor_telepon" />
            <x-input-error class="mt-2" :messages="$errors->get('nomor_telepon')" />
        </div>

        <div>
            <x-input-label for="telefon_darurat" :value="__('Telefon Darurat')" />
            <x-text-input id="telefon_darurat" name="telefon_darurat" type="text" class="mt-1 block w-full" :value="$user->telefon_darurat" />
            <x-input-error class="mt-2" :messages="$errors->get('telefon_darurat')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
