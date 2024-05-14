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
                    <form method="POST" action="{{ route('dormshop.refill_galon.store') }}">
    @csrf

    <!-- Input hidden untuk menyimpan nim dan nomor kamar -->
    <input type="hidden" name="nim" value="{{ Auth::user()->nim }}">
    <input type="hidden" name="nomor_kamar" value="{{ Auth::user()->kamar }}">

    <!-- Input untuk jumlah galon -->
    <div class="mb-4 relative">
    <p class="mt-2 text-lg text-gray-600">Nomor Kamar: {{ Auth::user()->kamar }}</p>
    <br>
        <label for="jumlah_galon" class="block text-gray- text-sm font-bold mb-2">Jumlah Galon</label>
        <input id="jumlah_galon" type="number" class="form-control rounded-md shadow-sm mt-1 block w-full" name="jumlah_galon" required autofocus>
    </div>

    <!-- Tampilkan total harga yang harus dibayar -->
    <div class="mb-4 text-red-600">
        Total Harga: Rp <span id="total_harga">0</span>
    </div>

    <!-- Tombol Bayar Sekarang -->
    <div class="flex items-center justify-end mt-4">
        <button type="submit" class="btn btn-primary">
            Bayar Sekarang
        </button>
    </div>
</form>

                </div>
            </div>
        </div>
    </div>

    <script>
        // Ambil elemen input jumlah galon
        const jumlahGalonInput = document.getElementById('jumlah_galon');
        // Ambil elemen untuk menampilkan total harga
        const totalHargaElement = document.getElementById('total_harga');
        
        // Event listener untuk memperbarui total harga ketika input berubah
        jumlahGalonInput.addEventListener('input', function() {
            // Ambil jumlah galon dari input
            const jumlahGalon = parseInt(jumlahGalonInput.value);
            // Harga per galon
            const hargaPerGalon = 18000; // Anda dapat mengganti ini dengan variabel yang sesuai
            // Hitung total harga
            const totalHarga = jumlahGalon * hargaPerGalon;
            // Tampilkan total harga
            totalHargaElement.textContent = totalHarga.toLocaleString('id-ID');
        });
    </script>
</x-app-layout>
