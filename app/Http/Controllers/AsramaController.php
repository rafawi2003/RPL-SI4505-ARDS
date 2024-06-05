<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class AsramaController extends Controller
{
    public function index()
    {
    $putraGedungs = [
        'A01', 'A02', 'A03', 'A04', 'A05', 'A06', 'A07', 'A08', 'A09', 'A10'
    ];

    $putriGedungs = [
        'A11','A12', 'B01', 'B02', 'B03', 'B04', 'B05', 'B06'
    ];

    return view('kamar.index', compact('putraGedungs', 'putriGedungs'));
    }
    public function show($gender, $gedung)
    {
        $rooms = Room::where('gender', $gender)
        ->where('gedung', $gedung)
        ->with('bed1User', 'bed2User', 'bed3User', 'bed4User')
        ->get();

    return view('kamar.show', compact('rooms', 'gender', 'gedung'));
    }
}
