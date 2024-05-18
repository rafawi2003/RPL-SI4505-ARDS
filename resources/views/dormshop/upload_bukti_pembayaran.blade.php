<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload Bukti Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-100 border-b border-gray-200">
                    <h1 class="text-3xl font-bold text-gray-800">Halaman Unggah Bukti Pembayaran</h1>
                    <p class="mt-2 text-lg text-gray-600">Silakan unggah bukti pembayaran di sini.</p>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Form untuk mengunggah bukti pembayaran -->
                    <form method="POST" action="{{ route('upload_bukti_bayar.process') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Input untuk mengunggah file bukti pembayaran -->
                        <div class="mb-4">
                            <label for="bukti_pembayaran" class="block text-gray-700 text-sm font-bold mb-2">Unggah Bukti Pembayaran</label>
                            <input id="bukti_pembayaran" type="file" class="form-control rounded-md shadow-sm mt-1 block w-full" name="bukti_pembayaran" required>
                        </div>
                        <!-- Tombol Unggah -->
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Unggah
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
