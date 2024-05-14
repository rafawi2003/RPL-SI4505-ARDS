<!-- resources/views/qris.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('QRIS Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-100 border-b border-gray-200">
                    <!-- Menampilkan QRIS -->
                    <img src="{{ asset('images/fasilitas_olahraga_kesehatan/Qris Dormshop 1.png') }}" alt="QRIS Pembayaran" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
