<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pembayaran Berhasil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-100 border-b border-gray-200">
                    <h1 class="text-3xl font-bold text-gray-800">Pesanan Berhasil</h1>
                    <p class="mt-2 text-lg text-gray-600">
                        Anda berhasil melakukan pembayaran Token Listrik, harap bersabar karena admin akan memverifikasi dahulu, tunggu token Anda.
                    </p>
                    @if ($transaction->status_transaksi === 'berhasil')
                        <p class="mt-4 text-lg text-gray-800">
                            Token Listrik Anda: {{ $transaction->token }}
                        </p>
                    @else
                        <p class="mt-4 text-lg text-gray-800">
                            Tunggu hingga pembayaran diverifikasi untuk mendapatkan token listrik Anda.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
