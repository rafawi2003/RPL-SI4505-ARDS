<?php

namespace App\Http\Controllers;

use App\Models\Room; // Asumsikan Anda memiliki model Room

class kamarController extends Controller
{
    public function index()
    {
        $availableRooms = Room::all(); // Mengambil semua data kamar dari database

        return view('kamar', compact('availableRooms'));
    }
}