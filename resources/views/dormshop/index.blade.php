<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dormshop') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-100 border-b border-gray-200">
                    <h1 class="text-3xl font-bold text-gray-800">Selamat datang di Dormshop</h1>
                    <p class="mt-2 text-lg text-gray-600">Temukan segala kebutuhanmu untuk kamar asrama!</p>
                </div>
                <div class="p-6 bg-gray-100 border-t border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Pilihan Pembayaran</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Token Listrik -->
                        <a href="{{ route('token_listrik.index') }}" class="bg-white rounded-lg shadow-md p-4 block hover:bg-gray-50 transition duration-200">
                            <h3 class="text-lg font-semibold text-gray-800">Token Listrik</h3>
                            <p class="text-gray-600">Beli token listrik dengan nominal yang sesuai dengan kebutuhanmu.</p>
                        </a>
                        <!-- Pembayaran Air 
                        <a href="{{ route('dormshop.pembayaran_air.index') }}" class="bg-white rounded-lg shadow-md p-4 block hover:bg-gray-50 transition duration-200">
                            <h3 class="text-lg font-semibold text-gray-800">Pembayaran Air</h3>
                            <p class="text-gray-600">Bayar tagihan air bulanan dengan mudah dan cepat.</p>
                        </a>
                        -->
                        <!-- Pembayaran Wifi -->
                        <a href="{{ route('dormshop.pembayaran_wifi.index') }}" class="bg-white rounded-lg shadow-md p-4 block hover:bg-gray-50 transition duration-200">
                            <h3 class="text-lg font-semibold text-gray-800">Pembayaran Wifi</h3>
                            <p class="text-gray-600">Bayar tagihan wifi bulanan untuk tetap terhubung dengan dunia digital.</p>
                        </a>
                        <!-- Refill Air Galon -->
                        <a href="{{ route('refill_galon.index') }}" class="bg-white rounded-lg shadow-md p-4 block hover:bg-gray-50 transition duration-200">
                            <h3 class="text-lg font-semibold text-gray-800">Refill Air Galon</h3>
                            <p class="text-gray-600">Refill galon air minum untuk kesehatan dan kebutuhan sehari-hari.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
