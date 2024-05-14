<?php

namespace App\Http\Controllers\Dormshop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TokenListrik;

class DormshopTokenListrikController extends Controller
{
    public function index()
    {
        // Tampilkan halaman pembelian token listrik
        return view('dormshop.token_listrik');
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nominal' => 'required|numeric'
        ]);
    
        // Memeriksa apakah pengguna telah login
        if (Auth::check()) {
            // Simpan transaksi pembelian token listrik ke database
            TokenListrik::create([
                'jenis_transaksi' => 'Token Listrik',
                'nominal_transaksi' => $request->nominal,
                'status_transaksi' => 'Menunggu Pembayaran',
                'NIM' => Auth::user()->nim, // Pastikan Anda mengambil NIM dengan benar
                'nama_pengguna' => Auth::user()->name, // Simpan nama pengguna yang sedang login
            ]);
    
            // Redirect kembali ke halaman pembelian token listrik dengan pesan sukses
            return redirect()->route('token_listrik.index')->with('success', 'Transaksi pembelian token listrik berhasil.');
        } else {
            // Jika pengguna belum login, arahkan ke halaman login
            return redirect()->route('login')->with('error', 'Silakan login untuk melanjutkan.');
        }
    }
}