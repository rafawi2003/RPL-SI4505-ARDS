<?php

use App\Http\Controllers\LoginController;
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

// Route::get('/', function () {
//     return view('beranda');
// });

Route::get('/beranda', function () {
    return view('beranda', [
        "title" => "Beranda"
    ]);
});

Route::get('/tentang', function () {
    return view('tentang' ,[
        "title" => "Tentang"
    ]);
});

Route::get('/dormshop', function () {
    return view('dormshop' ,[
        "title" => "Dormshop"
    ]);
});

Route::get('/helpdesk', function () {
    return view('helpdesk' ,[
        "title" => "Helpdesk"
    ]);
});

Route::get('/kalender', function () {
    return view('kalender' ,[
        "title" => "Kalender"
    ]);
});

Route::get('/pemberitahuan', function () {
    return view('pemberitahuan' ,[
        "title" => "Pemberitahuan"
    ]);
});

Route::get('/perizinan', function () {
    return view('perizinan' ,[
        "title" => "Perizinan"
    ]);
});

Route::get('/profile', function () {
    return view('profile' ,[
        "title" => "Profile"
    ]);
});

Route::get('/keluar', function () {
    return view('keluar' ,[
        "title" => "Keluar"
    ]);
});



Route::get('/login' , [LoginController::class, 'index']);

