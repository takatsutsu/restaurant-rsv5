<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Favorite;
use App\Models\Shop;  // 追加
use Illuminate\Support\Facades\Mail;
use App\Mail\FavoriteEmail;

class EmailController extends Controller
{
    // メール送信フォームの表示
    public function email_form()
    {
        $shops = Shop::all();
        return view('email_form', compact('shops'));
        return view('email_form');

    }

    // メール送信処理
    public function send_email(Request $request)
    {
        $shop_id = $request->input('shop_id'); // 選択された店舗IDを取得
        $subject = $request->input('subject');
        $message = $request->input('message');

        // 選択された店舗のお気に入り登録しているユーザを取得
        $users = User::whereIn('id', function ($query) use ($shop_id) {
            $query->select('user_id')
                ->from('favorites')
                ->where('shop_id', $shop_id); // 店舗IDで絞り込む
        })->get();

        // 各ユーザにメールを送信
        foreach ($users as $user) {
            Mail::to($user->email)->send(new FavoriteEmail($subject, $message));
        }

        return redirect()->back()->with('status', 'メールを送信しました');
    }
}
