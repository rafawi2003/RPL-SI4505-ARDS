<?php
namespace App\Http\Controllers\Dormshop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PembayaranWifi;

class PembayaranWifiController extends Controller
{
    // Menampilkan halaman pembayaran WiFi
    public function index()
    {
        return view('dormshop.pembayaran_wifi');
    }

    // Menyimpan transaksi pembayaran WiFi
    public function store(Request $request)
    {
        $user = Auth::user();

        // Validasi input dari form
        $request->validate([
            // Tambahkan validasi sesuai kebutuhan Anda
        ]);

        // Simpan transaksi pembayaran wifi ke database
        $pembayaran = PembayaranWifi::create([
            'jenis_transaksi' => 'Pembayaran Wifi',
            'nominal_transaksi' => 150000, // Biaya tetap per bulan
            'status_transaksi' => 'Menunggu Pembayaran', // Atau status lain yang sesuai
            'nim' => $user->nim, // Menggunakan NIM pengguna yang sedang login
            'kamar' => $user->kamar, // Menggunakan nomor kamar pengguna yang sedang login
        ]);

        // Redirect ke halaman upload bukti pembayaran dengan pesan sukses
        return redirect()->route('upload_bukti_pembayaran_wifi', ['id' => $pembayaran->id])->with('success', 'Transaksi pembayaran wifi berhasil.');
    }

    // Menampilkan form unggah bukti pembayaran WiFi
    public function showUploadForm($id)
    {
        $pembayaran = PembayaranWifi::findOrFail($id);
        return view('dormshop.upload_bukti_pembayaran_wifi', compact('pembayaran'));
    }

    // Menangani unggahan bukti pembayaran WiFi
    public function uploadBuktiBayar(Request $request, $id)
    {
        $user = Auth::user();

        // Validasi unggahan bukti pembayaran
        $request->validate([
            'bukti_pembayaran' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048', // Validasi file bukti pembayaran
        ]);

        // Menyimpan file bukti pembayaran
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('bukti_pembayaran'), $fileName);

            // Update status transaksi dan menyimpan nama file bukti pembayaran
            PembayaranWifi::where('id', $id)
                ->update([
                    'status_transaksi' => 'Menunggu Konfirmasi',
                    'bukti_pembayaran' => $fileName,
                ]);
        }

        // Redirect ke halaman pesanan berhasil
        return redirect()->route('pesanan_berhasil_wifi')->with('success', 'Bukti pembayaran berhasil diunggah.');
    }

    // Menampilkan halaman pesanan berhasil WiFi
    public function PesananBerhasil()
{
    return view('dormshop.pesanan_berhasil._wifi');
}

}
