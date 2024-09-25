<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest; // 正しいフォームリクエストをインポート
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // 認証成功時の処理
            return redirect()->intended();
        }

        // 認証失敗時の処理
        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが正しくありません。',
        ]);
    }
}
