<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\Shop_AdminRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Auth\Events\Registered;
use Carbon\Carbon;


class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user'
        ]);

        Auth::login($user);

        event(new Registered($user));

        return redirect()->route('registration.success');
    }


    public function shop_admin_form()
    {
        if (Auth::user()->role !== 'admin' || Auth::user()->email_verified_at === null) {
            return redirect('/')->with('message', 'アクセスが許可されていません。');
        }
        return view('auth.shop_admin_register');

    }

    public function shop_admin_register(Shop_AdminRequest $request)
    {
        if (Auth::user()->role !== 'admin' || Auth::user()->email_verified_at === null) {
            return redirect('/')->with('message', 'アクセスが許可されていません。');
        }

        $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'shop-admin',
        ]);

        Auth::login($user);

        event(new Registered($user));

        return redirect()->route('registration.success');

    }

}
