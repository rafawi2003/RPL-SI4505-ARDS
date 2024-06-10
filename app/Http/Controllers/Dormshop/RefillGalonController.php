<?php

namespace App\Http\Controllers\Dormshop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RefillGalon;

class RefillGalonController extends Controller
{
    public function index()
    {
        $hargaPerGalon = 18000;
        return view('dormshop.refill_galon', compact('hargaPerGalon'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|string|max:255',
            'nomor_kamar' => 'required|string|max:255',
            'jumlah_galon' => 'required|integer|min:1',
            'metode_pembayaran' => 'required|string|in:bayar_di_tempat,transfer_bank',
        ]);

        $hargaPerGalon = 18000;
        $totalHarga = $request->jumlah_galon * $hargaPerGalon;

        $refillGalon = RefillGalon::create([
            'nim' => strtolower($request->nim),
            'nomor_kamar' => strtolower($request->nomor_kamar),
            'jumlah_galon' => $request->jumlah_galon,
            'total_harga' => $totalHarga,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);

        if ($request->metode_pembayaran == 'transfer_bank') {
            return redirect()->route('upload_bukti_pembayaran', ['total' => $totalHarga]);
        } else {
            return redirect()->route('pesanan_berhasil');
        }
    }

    public function showUploadForm(Request $request)
    {
        $total = $request->input('total');
        return view('dormshop.upload_bukti_pembayaran', compact('total'));
    }

    public function uploadBuktiBayar(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        if ($request->file('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $path = $file->store('bukti_pembayaran', 'public');

            $refillGalon = RefillGalon::where('nim', auth()->user()->nim)->orderBy('created_at', 'desc')->first();
            if ($refillGalon) {
                $refillGalon->update(['bukti_pembayaran' => basename($path)]);
                return redirect()->route('pesanan_berhasil');
            } else {
                return back()->withErrors(['bukti_pembayaran' => 'Data RefillGalon tidak ditemukan.']);
            }
        }

        return back()->withErrors(['bukti_pembayaran' => 'Unggah bukti pembayaran gagal.']);
    }

    public function pesananBerhasil()
    {
        return view('dormshop.pesanan_berhasil');
    }
}
