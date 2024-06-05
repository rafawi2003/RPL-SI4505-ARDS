<?php

use App\Http\Controllers\AsramaController;
use App\Http\Controllers\Dormshop\DormshopTokenListrikController;
use App\Http\Controllers\Dormshop\PembayaranAirController;
use App\Http\Controllers\Dormshop\PembayaranWifiController;
use App\Http\Controllers\Dormshop\RefillGalonController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\kamarController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::get('/kalender', function () {
    return view('kalender' ,[
    ]);
})->middleware(['auth', 'verified'])->name('kalender');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); 
    // Route untuk pengunduran diri
    Route::post('/profile/resign', [ProfileController::class, 'resign'])->name('profile.resign');
});

Route::get('/home', [HomeController::class,'index']);

Route::post('/dashboard', [ProfileController::class, 'checkin'])->name('profile.checkin');

require __DIR__.'/auth.php';

Route::get('/dormshop', function () {
    return view('dormshop.index');
})->middleware(['auth', 'verified'])->name('dormshop');


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
// disable filament login
Route::redirect('/admin/login', '/login');

Route::get('/api/events', function (Request $request) {
    $events = Event::all(); // Assuming you have an Event model
    return response()->json($events);
});

// Route untuk menampilkan daftar perizinan
Route::get('/izin', [IzinController::class, 'index'])->middleware(['auth', 'verified'])->name('izin.index');

// Route untuk menampilkan form perizinan baru
Route::get('/izin/create', [IzinController::class, 'create'])->middleware(['auth', 'verified'])->name('izin.create');

// Route untuk menyimpan data perizinan baru
Route::post('/izin', [IzinController::class, 'store'])->middleware(['auth', 'verified'])->name('izin.store');

Route::get('/kamar', [AsramaController::class, 'index'])->name('kamar.index')->middleware(['auth', 'verified']);

Route::get('/kamar/{gender}/{gedung}', [AsramaController::class, 'show'])->name('asrama.show');

Route::middleware(['auth', 'verified'])->group(function () {
    // Route for displaying the help requests list
    Route::get('/helpdesk', [HelpController::class, 'index'])->name('help.index');

    // Route for displaying the form for creating a new help request
    Route::get('/helpdesk/create', [HelpController::class, 'create'])->name('help.create');

    // Route for storing a new help request
    Route::post('/helpdesk', [HelpController::class, 'store'])->name('help.store');
});