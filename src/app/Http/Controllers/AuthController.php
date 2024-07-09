<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function user_complete()
    {
        return view('auth.user_complete');
    }
}
