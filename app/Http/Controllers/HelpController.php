<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Help;

class HelpController extends Controller
{
    // Method to display the list of help requests
    public function index()
    {
        $user = Auth::user();
        $helps = Help::where('nim', $user->nim)->get();
        return view('help.index', compact('helps'));
    }

    // Method to show the form for creating a new help request
    public function create()
    {
        return view('help.create');
    }

    // Method to store a new help request
    public function store(Request $request)
    {
        $request->validate([
            'permintaan' => 'required|string',
        ]);

        Help::create([
            'nim' => Auth::user()->nim,
            'kamar' => Auth::user()->kamar, // Add this line to include the room number
            'permintaan' => $request->permintaan,
            'status' => 'menunggu persetujuan',
        ]);

        return redirect()->route('help.index')->with('success', 'Permintaan berhasil diajukan.');
    }
}
