<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EnsureEmailIsVerified
{
    public function handle(Request $request, Closure $next)
    {
        // ユーザーがログインしていて、かつメールが認証されていない場合
        if (auth()->check() && !auth()->user()->hasVerifiedEmail()) {
            // 'user_thanks' ビューにリダイレクト
            return redirect()->route('registration.success');
        }

        return $next($request);
    }
}
