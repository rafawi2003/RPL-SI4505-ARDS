<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dormshop') }}
        </h2>
    </x-slot>

    <style>
        .nominal-btn {
            background-color: white;
            color: #D92E2D;
            border: 2px solid #D92E2D;
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
            font-weight: bold;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .nominal-btn.selected {
            background-color: #D92E2D;
            color: white;
        }

        .nominal-btn:hover {
            background-color: #D92E2D;
            color: white;
        }

        #submitBtn {
            background-color: #D92E2D;
            color: white;
            border: none;
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        #submitBtn:hover {
            background-color: #A62425;
        }

        .loader {
            border: 8px solid #f3f3f3;
            border-radius: 50%;
            border-top: 8px solid #D92E2D;
            width: 60px;
            height: 60px;
            animation: spin 2s linear infinite;
            display: none;
            margin: auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .transaction-history {
            display: none;
            margin-top: 20px;
        }

        .toggle-history {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
        }
    </style>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-100 border-b border-gray-200">
                    <h1 class="text-3xl font-bold text-gray-800">Pembayaran Listrik</h1>
                    <p class="mt-2 text-lg text-gray-600">Bayar tagihan listrik bulanan dengan mudah dan cepat.</p>
                </div>
                <div class="p-6 bg-gray-100 border-t border-gray-200">
                    <div class="flex flex-wrap items-center">
                        <div class="bg-white rounded-lg shadow-md p-4 block">
                            <!-- Form Pembayaran -->
                            @if(session('success'))
                                <!-- Tampilan jika pembayaran berhasil -->
                                <div class="bg-green-500 text-white p-4 rounded mb-4">
                                    {{ session('success') }}
                                </div>
                                <!-- Tautan ke halaman pembayaran berhasil -->
                                <a href="{{ route('payment.success') }}" class="btn btn-primary">
                                    Lihat Token Listrik
                                </a>
                            @else
                                <!-- Form Pembayaran jika pembayaran belum berhasil -->
                                <form method="POST" action="{{ route('dormshop.pembayaran_listrik.store') }}" id="paymentForm">
                                    @csrf
                                    <div class="form-group">
                                        <p class="mt-2 text-lg text-gray-600">Nomor Kamar: {{ Auth::user()->kamar }}</p>
                                        <br>
                                        <label class="font-semibold text-gray-800">Nominal</label>
                                        <div class="flex space-x-4">
                                            <button type="button" class="nominal-btn font-bold py-2 px-4 rounded mb-2" data-value="20000">20.000</button>
                                            <button type="button" class="nominal-btn font-bold py-2 px-4 rounded mb-2" data-value="50000">50.000</button>
                                            <button type="button" class="nominal-btn font-bold py-2 px-4 rounded mb-2" data-value="100000">100.000</button>
                                            <button type="button" class="nominal-btn font-bold py-2 px-4 rounded mb-2" data-value="200000">200.000</button>
                                            <button type="button" class="nominal-btn font-bold py-2 px-4 rounded mb-2" data-value="500000">500.000</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input id="nominal" type="hidden" class="form-control" name="nominal" value="" required>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary" id="submitBtn">
                                            Bayar Sekarang
                                        </button>
                                        <div class="loader" id="loader"></div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>

                    <!-- Display transaction history toggle text -->
                    <div class="mt-8">
                        <span id="toggleHistoryText" class="toggle-history">
                            Tampilkan Riwayat Pembelian
                        </span>
                    </div>

                    <!-- Display transaction history if exists -->
                    @if($transactions->isNotEmpty())
                        <div class="transaction-history bg-white rounded-lg shadow-md p-4 mt-4">
                            <h2 class="text-2xl font-bold text-gray-800 mb-4">Riwayat Transaksi</h2>
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nominal</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach($transactions as $transaction)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ number_format($transaction->nominal_transaksi, 0, ',', '.') }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $transaction->status_transaksi === 'Menunggu Pembayaran' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                                        {{ $transaction->status_transaksi }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->created_at->format('d M Y H:i') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <script>
        document.querySelectorAll('.nominal-btn').forEach(item => {
            item.addEventListener('click', event => {
                const value = item.getAttribute('data-value');
                document.getElementById('nominal').value = value;
                document.querySelectorAll('.nominal-btn').forEach(btn => {
                    btn.classList.remove('selected');
                });
                item.classList.add('selected');
            });
        });

        document.getElementById('paymentForm').addEventListener('submit', function() {
            document.getElementById('loader').style.display = 'block';
            document.getElementById('submitBtn').disabled = true;
        });

        document.getElementById('toggleHistoryText').addEventListener('click', function() {
            var history = document.querySelector('.transaction-history');
            if (history.style.display === 'none' || history.style.display === '') {
                history.style.display = 'block';
                this.textContent = 'Sembunyikan Riwayat Pembelian';
            } else {
                history.style.display = 'none';
                this.textContent = 'Tampilkan Riwayat Pembelian';
            }
        });
    </script>
</x-app-layout>
