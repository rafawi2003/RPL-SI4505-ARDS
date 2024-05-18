<?php

// app/Http/Controllers/PaymentController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction; // Sesuaikan dengan model transaksi Anda

class PaymentController extends Controller
{
    public function finish(Request $request)
    {
        // Mendapatkan ID transaksi dari request
        $transactionId = $request->input('transaction_id');
        
        // Mendapatkan transaksi dari database
        $transaction = Transaction::find($transactionId);
        
        // Jika transaksi ditemukan
        if ($transaction) {
            // Update status transaksi menjadi "Berhasil"
            $transaction->status = 'Berhasil';
            $transaction->save();
            
            // Redirect atau tampilkan pesan sukses kepada pengguna
            return redirect()->route('home')->with('success', 'Pembayaran berhasil.');
        } else {
            // Redirect dengan pesan error jika transaksi tidak ditemukan
            return redirect()->route('home')->with('error', 'Transaksi tidak ditemukan.');
        }
    }

    public function error(Request $request)
    {
        // Logika penanganan kesalahan pembayaran di sini
        // Misalnya, Anda ingin menampilkan pesan error kepada pengguna
        // atau mengirim notifikasi kepada administrator
        
        // Redirect atau tampilkan pesan error kepada pengguna
        return redirect()->route('home')->with('error', 'Pembayaran gagal. Silakan coba lagi.');
    }
}
