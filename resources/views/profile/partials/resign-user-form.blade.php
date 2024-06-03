<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-red-500">
            {{ __('Pengunduran Diri/Checkout') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 text-justify">
            {{ __('Setelah Anda melakukan pengunduran diri/checkout, semua sumber daya dan data yang terkait akan dihapus secara permanen. Sebelum melanjutkan, pastikan Anda telah mengunduh data atau informasi yang ingin Anda simpan.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-resignation')"
    >{{ __('Undurkan Diri/Checkout') }}</x-danger-button>

    <x-modal name="confirm-user-resignation" :show="$errors->userResignation->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.resign') }}" class="p-6">
            @csrf

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Apakah Anda yakin ingin mengundurkan diri/checkout?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 text-justify">
                {{ __('Setelah Anda mengundurkan diri/checkout, status Anda akan berubah menjadi Proses Pengunduran Diri. Harap masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin mengundurkan diri/checkout.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Kata Sandi') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userResignation->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Batal') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Lanjutkan') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
