<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pesanan Berhasil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-100 border-b border-gray-200">
                    <h1 class="text-3xl font-bold text-gray-800">Pesanan Berhasil</h1>
                    <p class="mt-2 text-lg text-gray-600">Anda berhasil melakukan pemesanan galon. Galon akan segera dikirimkan ke kamar Anda.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
