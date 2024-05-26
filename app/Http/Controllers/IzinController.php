<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Izin;

class IzinController extends Controller
{
    // Metode untuk menampilkan daftar perizinan
    public function index()
    {
        $user = Auth::user();
        $izins = Izin::where('nim', $user->nim)->get();
        return view('izin.index', compact('izins'));
    }

    // Metode untuk menampilkan form perizinan baru
    public function create()
    {
        return view('izin.create');
    }

    // Metode untuk menyimpan data perizinan baru
    public function store(Request $request)
    {
        $request->validate([
            'start' => 'required|date',
            'end' => 'required|date',
            'alasan' => 'required|string',
        ]);

        Izin::create([
            'nim' => Auth::user()->nim,
            'start' => $request->start,
            'end' => $request->end,
            'alasan' => $request->alasan,
            'status' => 'menunggu persetujuan',
        ]);

        return redirect()->route('izin.index')->with('success', 'Izin berhasil diajukan.');
    }
}
