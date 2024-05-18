<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Dormshop\DormshopTokenListrikController;
use App\Http\Controllers\Dormshop\PembayaranAirController;
use App\Http\Controllers\Dormshop\PembayaranWifiController;
use App\Http\Controllers\Dormshop\RefillGalonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/tentang', function () {
    return view('tentang' ,[
        
    ]);
})->middleware(['auth', 'verified'])->name('tentang');

Route::get('/dormshop', function () {
    return view('dormshop' ,[
        
    ]);
})->name('dormshop');

Route::get('/helpdesk', function () {
    return view('helpdesk' ,[
        
    ]);
})->middleware(['auth', 'verified'])->name('helpdesk');

Route::get('/kalender', function () {
    return view('kalender' ,[
    ]);
})->middleware(['auth', 'verified'])->name('kalender');

Route::get('/pemberitahuan', function () {
    return view('pemberitahuan' ,[
    ]);
})->middleware(['auth', 'verified'])->name('pemberitahuan');

Route::get('/perizinan', function () {
    return view('perizinan' ,[
    ]);
    
})->middleware(['auth', 'verified'])->name('perizinan');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', [HomeController::class,'index']);

require __DIR__.'/auth.php';

Route::get('/dormshop', function () {
    return view('dormshop.index');
})->name('dormshop');


// Rute-rute dalam middleware 'auth'
Route::middleware(['auth'])->group(function () {
    // Rute untuk halaman pembelian token listrik
    Route::get('/token-listrik', [DormshopTokenListrikController::class, 'index'])->name('token_listrik.index');

    // Rute untuk menyimpan transaksi pembelian token listrik
    Route::post('/token-listrik/store', [DormshopTokenListrikController::class, 'store'])->name('token_listrik.store');

    // Rute untuk halaman upload bukti pembayaran listrik
    Route::get('/upload-bukti-pembayaran-listrik/{id}', [DormshopTokenListrikController::class, 'showUploadForm'])->name('upload_bukti_pembayaran_listrik');

    // Rute untuk menyimpan bukti pembayaran listrik
    Route::post('/upload-bukti-pembayaran-listrik/{id}', [DormshopTokenListrikController::class, 'uploadBuktiBayar'])->name('upload_bukti_pembayaran_listrik.store');

    // Rute untuk halaman pembayaran berhasil listrik
    Route::get('/pembayaran-berhasil-listrik/{transaction_id}', [DormshopTokenListrikController::class, 'pembayaranBerhasil'])->name('pembayaran_berhasil_listrik');
});



// Pembayaran Air
Route::get('pembayaran-air', [PembayaranAirController::class, 'index'])->name('dormshop.pembayaran_air.index');
Route::post('pembayaran-air', [PembayaranAirController::class, 'store'])->name('dormshop.pembayaran_air.store');



// Rute-rute dalam middleware 'auth'
Route::middleware(['auth'])->group(function () {
    // Rute untuk halaman pembayaran WiFi
    Route::get('/pembayaran-wifi', [PembayaranWifiController::class, 'index'])->name('pembayaran_wifi.index');

    // Rute untuk menyimpan transaksi pembayaran WiFi
    Route::post('/pembayaran-wifi/store', [PembayaranWifiController::class, 'store'])->name('pembayaran_wifi.store');

    // Rute untuk halaman upload bukti pembayaran WiFi
    Route::get('/upload-bukti-pembayaran-wifi/{id}', [PembayaranWifiController::class, 'showUploadForm'])->name('upload_bukti_pembayaran_wifi');

    // Rute untuk menyimpan bukti pembayaran WiFi
    Route::post('/upload-bukti-pembayaran-wifi/{id}', [PembayaranWifiController::class, 'uploadBuktiBayar'])->name('upload_bukti_pembayaran_wifi.store');

    // Rute untuk halaman pembayaran berhasil WiFi
    Route::get('/pesanan-berhasil-wifi', [PembayaranWifiController::class, 'PesananBerhasil'])->name('pesanan_berhasil_wifi');
});






Route::middleware(['auth'])->group(function () {
    Route::get('/refill-galon', [RefillGalonController::class, 'index'])->name('refill_galon.index');
    Route::post('/refill-galon', [RefillGalonController::class, 'store'])->name('refill_galon.store');
    Route::get('/pesanan-berhasil', [RefillGalonController::class, 'pesananBerhasil'])->name('pesanan_berhasil');
    Route::get('/upload-bukti-bayar', [RefillGalonController::class, 'showUploadForm'])->name('upload_bukti_pembayaran');
    Route::post('/upload-bukti-bayar', [RefillGalonController::class, 'uploadBuktiBayar'])->name('upload_bukti_bayar.process'); // Define the missing route here
});


// Rute untuk menampilkan halaman pembelian token listrik
Route::get('/dormshop/token-listrik', [DormshopTokenListrikController::class, 'index'])->name('dormshop.token_listrik.index');

// Rute untuk menyimpan transaksi token listrik
Route::post('/dormshop/pembayaran-listrik', [DormshopTokenListrikController::class, 'store'])->name('dormshop.pembayaran_listrik.store');


