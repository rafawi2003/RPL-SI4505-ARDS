<?php

namespace App\Http\Controllers\Dormshop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PembayaranAir;
use Illuminate\Support\Facades\Auth;

class PembayaranAirController extends Controller
{
    public function index()
    {
        // Mendapatkan tagihan air secara acak (misalnya antara 50.000 dan 100.000)
        $tagihanAir = rand(50000, 100000);
        
        // Jumlah pemakaian air secara acak (misalnya antara 5 dan 20 m3)
        $pemakaianAir = rand(5, 20);
        
        // Tanggal tagihan (misalnya tanggal sekarang)
        $tanggalTagihan = now();

        // Menghitung total tagihan
        $totalTagihan = $tagihanAir * $pemakaianAir;

        // Tampilkan halaman pembayaran air dengan data tagihan
        return view('dormshop.pembayaran_air', [
            'tagihanAir' => $tagihanAir,
            'pemakaianAir' => $pemakaianAir,
            'tanggalTagihan' => $tanggalTagihan,
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nominal' => 'required|numeric'
        ]);

        // Simpan transaksi pembayaran air ke database
        PembayaranAir::create([
            'nim' => Auth::user()->nim, // Menggunakan nim pengguna yang sedang login
            'jumlah_pembayaran' => $request->nominal,
            'tanggal_pembayaran' => now(),
        ]);

        // Redirect kembali ke halaman pembayaran air dengan pesan sukses
        return redirect()->route('dormshop.pembayaran_air.index')->with('success', 'Transaksi pembayaran air berhasil.');
    }
}

