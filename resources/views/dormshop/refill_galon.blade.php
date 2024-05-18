<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Refill Galon') }}
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
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-gray-100 border-b border-gray-200">
                            <h1 class="text-3xl font-bold text-gray-800">Halaman Pengisian Galon</h1>
                            <p class="mt-2 text-lg text-gray-600">Isi form di bawah ini untuk melakukan pengisian galon.</p>
                        </div>
                        <div class="p-6 bg-white border-b border-gray-200">
                            <!-- Form untuk pengisian galon -->
                            <form id="form-refill" method="POST" action="{{ route('refill_galon.store') }}">
            @csrf

            @if(Auth::check())
                <input type="hidden" name="nim" value="{{ Auth::user()->nim }}">
                <input type="hidden" name="nomor_kamar" value="{{ Auth::user()->kamar }}">
            @endif

            <div class="mb-4 relative">
                @if(Auth::check())
                    <p class="mt-2 text-lg text-gray-600">Nomor Kamar: {{ Auth::user()->kamar }}</p>
                @endif
                <br>
                <label for="jumlah_galon" class="block text-gray-700 text-sm font-bold mb-2">Jumlah Galon</label>
                <input id="jumlah_galon" type="number" class="form-control rounded-md shadow-sm mt-1 block w-full" name="jumlah_galon" required autofocus onchange="calculateTotal()">
            </div>

            <div class="mb-4 text-red-600">
                Total Harga: Rp <span id="total_harga">{{ $hargaPerGalon }}</span>
            </div>

            <div class="mt-8">
                <h2 class="text-lg font-semibold text-gray-800">Opsi Pembayaran:</h2>
                <ul class="list-disc pl-5 mt-2">
                    <li>
                        <input type="radio" id="bayar_di_tempat" name="metode_pembayaran" value="bayar_di_tempat">
                        <label for="bayar_di_tempat">Bayar di Tempat</label>
                    </li>
                    <li>
                        <input type="radio" id="transfer_bank" name="metode_pembayaran" value="transfer_bank">
                        <label for="transfer_bank">Transfer Bank (BCA 7680505157)</label>
                    </li>
                </ul>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="btn btn-primary">
                    Pesan Sekarang
                </button>
            </div>
        </form>

                </div>
            </div>
        </div>
    </div>

    <script>
    function calculateTotal() {
        const jumlahGalon = parseInt(document.getElementById('jumlah_galon').value);
        const hargaPerGalon = {{ $hargaPerGalon }};
        const totalHarga = jumlahGalon * hargaPerGalon;
        document.getElementById('total_harga').textContent = totalHarga;
    }

    function submitForm() {
        const selectedMethod = document.querySelector('input[name="metode_pembayaran"]:checked');
        
        if (!selectedMethod) {
            alert('Silakan pilih metode pembayaran.');
            return;
        }

        const form = document.getElementById('form-refill');

        if (selectedMethod.value === 'bayar_di_tempat') {
            form.submit();
            window.location.href = "{{ route('pesanan_berhasil') }}";
        } else if (selectedMethod.value === 'transfer_bank') {
            const totalHarga = document.getElementById('total_harga').textContent;
            form.action = "{{ route('upload_bukti_pembayaran') }}?total=" + totalHarga;
            form.submit();
        }
    }

    calculateTotal();
</script>

</x-app-layout>