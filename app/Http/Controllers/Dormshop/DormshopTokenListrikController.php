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
        $transactions = TokenListrik::where('NIM', Auth::user()->nim)->get();
        return view('dormshop.token_listrik', compact('transactions'));
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'nominal' => 'required|numeric'
            ]);

            $transaction = TokenListrik::create([
                'jenis_transaksi' => 'Token Listrik',
                'nominal_transaksi' => $request->nominal,
                'status_transaksi' => 'Menunggu Verifikasi',
                'NIM' => Auth::user()->nim,
                'nama_pengguna' => Auth::user()->name,
            ]);

            return redirect()->route('upload_bukti_pembayaran_listrik', ['id' => $transaction->id])->with('success', 'Transaksi pembelian token listrik berhasil. Silakan unggah bukti pembayaran.');
        } else {
            return redirect()->route('login')->with('error', 'Silakan login untuk melanjutkan.');
        }
    }

    public function uploadBuktiBayar(Request $request, $id)
    {
        $request->validate([
            'bukti_pembayaran_listrik' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('bukti_pembayaran_listrik')) {
            $imageName = time().'.'.$request->file('bukti_pembayaran_listrik')->extension();  
            $request->file('bukti_pembayaran_listrik')->move(public_path('bukti_pembayaran'), $imageName);

            $transaction = TokenListrik::findOrFail($id);
            $transaction->update([
                'bukti_pembayaran' => $imageName,
                'status_transaksi' => 'Menunggu Verifikasi',
            ]);

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
        $transaction = TokenListrik::findOrFail($transaction_id);
    
        if ($transaction->status_transaksi !== 'berhasil') {
            $transaction->token = null;
        }
    
        return view('dormshop.pembayaran_berhasil_listrik', compact('transaction'));
    }
}
