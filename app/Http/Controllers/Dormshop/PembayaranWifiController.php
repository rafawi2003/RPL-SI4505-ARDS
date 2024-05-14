<?php

namespace App\Http\Controllers\Dormshop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dormshop;
use Illuminate\Support\Facades\Auth;

class PembayaranWifiController extends Controller
{
    public function index()
    {
        // Tampilkan halaman pembayaran wifi
        return view('dormshop.pembayaran_wifi');
    }


    public function store(Request $request)
    {
        $user = Auth::user();
    
        // Simpan transaksi pembayaran wifi ke database
        \App\Models\PembayaranWifi::create([
            'jenis_transaksi' => 'Pembayaran Wifi',
            'nominal_transaksi' => 150000, // Biaya tetap per bulan
            'status_transaksi' => 'Menunggu Pembayaran', // Atau status lain yang sesuai
            'nim' => $user->nim, // Menggunakan NIM pengguna yang sedang login
            'kamar' => $user->kamar, // Menggunakan nomor kamar pengguna yang sedang login
            // Tambahkan informasi pengguna yang lain jika dibutuhkan
        ]);

        // Redirect kembali ke halaman pembelian wifi dengan pesan sukses
        return redirect()->route('dormshop.pembayaran_wifi.index')->with('success', 'Transaksi pembayaran wifi berhasil.');
    }
}
