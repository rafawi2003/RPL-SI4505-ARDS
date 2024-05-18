<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class GedungController extends Controller
{
    // In your controller
public function index()
{
    // Controller
$gedungs = [
    ['name' => 'Gedung A', 'image' => 'gedung-a.jpg'],
    ['name' => 'Gedung B', 'image' => 'gedung-b.jpg'],
    ['name' => 'Gedung C', 'image' => 'gedung-c.jpg'],
];

return view('your-view-name', compact('gedungs'));

    return view('your-view-name', compact('gedungs'));
}

    public function show($gedung)
    {
        $rooms = Room::where('gedung', $gedung)->get();
        return view('gedungs.show', compact('rooms', 'gedung'));
    }
}