<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $usertype=Auth()->user()->usertype;

            if($usertype=='penghuni')
            {
                return view('dashboard');
            }
            else if($usertype=='admin')
            {
            return view('adminhome.index');
            }
        }
        
    }
}
