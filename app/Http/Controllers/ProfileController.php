<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
{
    $user = $request->user();

    // Update semua atribut yang diterima dari permintaan
    $user->fill([
        'name' => $request->name,
        'nim' => $request->nim,
        'email' => strtolower($request->email),
        'jurusan' => $request->jurusan,
        'nama_ibu' => $request->nama_ibu,
        'nomor_telepon' => $request->nomor_telepon,
        'telefon_darurat' => $request->telefon_darurat,
        'kamar' => $request->kamar,
        'status' => $request->status

    ]);

    // Jika alamat email diubah, set ulang waktu verifikasi email
    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    $user->save();

    return Redirect::route('profile.edit')->with('status', 'profile-updated');
}
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function checkin(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $user->status = 'Menunggu Update Kamar oleh Admin';
        $user->save();
    
        return redirect()->route('dashboard')->with('status', 'Check In berhasil. Kamar Anda sedang menunggu update oleh Admin.');
    }
}
