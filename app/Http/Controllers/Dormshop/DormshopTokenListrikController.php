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
        $transactions = TokenListrik::where('NIM', Auth::user()->nim)->get();
        return view('dormshop.token_listrik', compact('transactions'));
    }

    public function store(Request $request)
    {
        // Memeriksa apakah pengguna telah login
        if (Auth::check()) {
            // Validasi input dari form
            $request->validate([
                'nominal' => 'required|numeric'
            ]);

            // Simpan transaksi pembelian token listrik ke database
            $transaction = TokenListrik::create([
                'jenis_transaksi' => 'Token Listrik',
                'nominal_transaksi' => $request->nominal,
                'status_transaksi' => 'Menunggu Verifikasi', // Set status menjadi menunggu pembayaran
                'NIM' => Auth::user()->nim,
                'nama_pengguna' => Auth::user()->name,
            ]);

            // Redirect ke halaman unggah bukti pembayaran dengan token transaksi
            return redirect()->route('upload_bukti_pembayaran_listrik', ['id' => $transaction->id])->with('success', 'Transaksi pembelian token listrik berhasil. Silakan unggah bukti pembayaran.');
        } else {
            // Jika pengguna belum login, arahkan ke halaman login
            return redirect()->route('login')->with('error', 'Silakan login untuk melanjutkan.');
        }
    }

    public function uploadBuktiBayar(Request $request, $id)
{
    // Validasi input dari form
    $request->validate([
        'bukti_pembayaran_listrik' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Simpan bukti pembayaran ke dalam penyimpanan yang tepat
    if ($request->hasFile('bukti_pembayaran_listrik')) {
        $imageName = time().'.'.$request->file('bukti_pembayaran_listrik')->extension();  
        $request->file('bukti_pembayaran_listrik')->move(public_path('images'), $imageName);

        // Memperbarui status transaksi menjadi menunggu verifikasi
        $transaction = TokenListrik::findOrFail($id);
        $transaction->update([
            'bukti_pembayaran' => $imageName,
            'status_transaksi' => 'Menunggu Verifikasi',
        ]);

        // Redirect ke halaman pembayaran berhasil listrik
        return redirect()->route('pembayaran_berhasil_listrik', ['transaction_id' => $transaction->id])->with('success', 'Bukti pembayaran berhasil diunggah.');
    }

    return back()->withErrors(['bukti_pembayaran_listrik' => 'Unggah bukti pembayaran gagal.']);
}


    public function showUploadForm($id)
    {
        $transaction = TokenListrik::findOrFail($id);
        return view('dormshop.upload_bukti_pembayaran_listrik', compact('transaction'));
    }

    public function pembayaranBerhasil($transaction_id)
    {
        // Logika untuk menampilkan halaman pembayaran berhasil
        $transaction = TokenListrik::findOrFail($transaction_id);
    
        // Hanya tampilkan token jika status transaksi 'berhasil'
        if ($transaction->status_transaksi !== 'berhasil') {
            $transaction->token = null; // Ensure token is not displayed if status is not 'berhasil'
        }
    
        return view('dormshop.pembayaran_berhasil_listrik', compact('transaction'));
    }
    

}
