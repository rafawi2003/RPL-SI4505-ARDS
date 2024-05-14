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
                        <!-- Form Pembayaran Listrik -->
                        <div class="bg-white rounded-lg shadow-md p-4 block">
                            <form method="POST" action="{{ route('dormshop.pembayaran_listrik.store') }}">
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
                                </div>
                            </form>
                        </div>
                    </div>
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
    </script>
</x-app-layout>
