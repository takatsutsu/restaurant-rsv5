<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class My_pageController extends Controller
{
    public function my_page()
    {
        $user = Auth::user();
        $reservations = $user->reservation()->with('shop')->get();
        $favorites = $user->favorite()->with('shop')->get();

        return view('my_page', compact('user', 'reservations', 'favorites'));
    }
}
