<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

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
