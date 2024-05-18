<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dormshop') }}
        </h2>
    </x-slot>

    <style>
        .btn-primary {
            background-color: #D92E2D;
            color: white;
            border: none;
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #A62425;
        }

        .form-group label {
            font-weight: bold;
            color: #D92E2D;
        }

        .form-control {
            border: 2px solid #D92E2D;
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
            transition: border-color 0.3s ease;
            width: 100%;
        }

        .form-control:focus {
            outline: none;
            border-color: #A62425;
        }

        .invalid-feedback {
            color: #D92E2D;
            font-weight: bold;
        }

        .card {
            width: 100%;
            max-width: 800px; /* Lebar maksimum card */
            margin: auto; /* Pusatkan card */
            margin-top: 2rem; /* Jarak atas card */
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-100 border-b border-gray-200">
                    <h1 class="text-3xl font-bold text-gray-800">Pembayaran Air</h1>
                    <p class="mt-2 text-lg text-gray-600">Bayar tagihan air bulanan dengan mudah dan cepat.</p>
                </div>
                <div class="p-6 bg-white border-t border-gray-200">
                    <p class="mt-2 text-lg text-gray-600">Nomor Kamar: {{ Auth::user()->kamar }}</p>
                    <p class="mt-2 text-lg text-gray-600">Tagihan Air: Rp {{ $tagihanAir }}</p>
                    <p class="mt-2 text-lg text-gray-600">Pemakaian Air: {{ $pemakaianAir }} m3</p>
                    <p class="mt-2 text-lg text-gray-600">Tanggal Tagihan: {{ $tanggalTagihan }}</p>
                    <form method="POST" action="{{ route('dormshop.pembayaran_air.store') }}">
                        @csrf
                        <div class="form-group mt-4">
                            <label for="nominal" class="font-semibold text-gray-800">Nominal</label>
                            <input id="nominal" type="text" class="form-control @error('nominal') is-invalid @enderror" name="nominal" value="{{ old('nominal') }}" required autocomplete="nominal" autofocus>
                            @error('nominal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                Bayar Sekarang
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
