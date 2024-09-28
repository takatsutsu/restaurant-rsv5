<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Models\Shop;
use Illuminate\Support\Facades\Mail;
use App\Mail\NoticeEmail;
use App\Http\Requests\EmailRequest;

class EmailController extends Controller
{
    // メール送信フォームの表示
    public function email_form()
    {
        // 現在ログインしているユーザーを取得
        $user = Auth::user();

        // ユーザーのshop_idを使って店舗情報を取得
        $shop = Shop::find($user->shop_id);

        // ユーザーがショップ管理者であり、メール認証が完了していることを確認
        if ($user->role !== 'shop-admin' || $user->email_verified_at === null) {
            return redirect('/')->with('message', 'アクセスが許可されていません。');
        }

        return view('email_form', compact('shop'));
    }

    // メール送信処理
    public function send_email(EmailRequest $request)
    {
        // 現在ログインしているユーザーを取得
        $user = Auth::user();

        // フォームから送信されたデータを取得
        $shop_id = $request->email_shop_id;
        $subject = $request->email_subject;
        $messageContent = $request->email_message;

        // 店舗名を取得
        $shop = Shop::find($shop_id);
        $shop_name = $shop->shop_name;

        // ユーザーがショップ管理者であり、メール認証が完了していることを確認
        if ($user->role !== 'shop-admin' || $user->email_verified_at === null) {
            return redirect('/')->with('message', 'アクセスが許可されていません。');
        }

        // 指定された店舗のお気に入りに登録されているユーザーを取得
        $favorite_users = Favorite::where('shop_id', $shop_id)
            ->with('user')
            ->get()
            ->pluck('user');

        // メール送信
        foreach ($favorite_users as $user) {
            Mail::to($user->email)->send(new NoticeEmail($shop_name, $subject, $messageContent));
        }

        return redirect('/email_form')->with('message', 'メールを送信しました。');
    }
}
