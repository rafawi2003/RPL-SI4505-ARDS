<?php

namespace App\Http\Controllers\Dormshop;

use Illuminate\Http\Request;
use App\Models\RefillGalon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RefillGalonController extends Controller
{
    // Harga per galon
    private $hargaPerGalon = 18000; // 18.000

    public function index()
    {
        // Ambil harga per galon dari properti privat
        $hargaPerGalon = $this->hargaPerGalon;

        // Kirim harga per galon ke view bersamaan dengan view
        return view('dormshop.refill_galon', compact('hargaPerGalon'));
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'jumlah_galon' => 'required|numeric|min:1'
        ]);

        // Hitung total harga
        $totalHarga = $this->hargaPerGalon * $request->jumlah_galon;

        // Simpan transaksi pengisian galon ke database
        RefillGalon::create([
            'nim' => Auth::user()->nim, // Menggunakan nim pengguna yang sedang login
            'nomor_kamar' => Auth::user()->kamar, // Menggunakan nomor kamar pengguna yang sedang login
            'jumlah_galon' => $request->jumlah_galon,
            'total_harga' => $totalHarga,
            // Tambahkan kolom lain yang sesuai dengan kebutuhan Anda
        ]);

        // Redirect kembali ke halaman pengisian galon dengan pesan sukses
        return redirect()->route('refill_galon.index')->with('success', 'Pengisian galon berhasil. Total harga: Rp ' . number_format($totalHarga, 0, ',', '.'));
    }
}
