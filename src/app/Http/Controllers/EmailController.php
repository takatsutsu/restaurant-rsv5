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
        // フォームから送信されたデータを取得
        $shopId = $request->input('shop_id');
        $subject = $request->input('subject');
        $messageContent = $request->input('message');

        // 店舗名を取得
        $shop = Shop::find($shopId);
        $shopName = $shop->shop_name;

        // 指定された店舗のお気に入りに登録されているユーザーを取得
        $favoriteUsers = Favorite::where('shop_id', $shopId)
            ->with('user')  // ユーザー情報を取得するためにリレーションをロード
            ->get()
            ->pluck('user'); // ユーザー情報のみを抽出

        // メール送信
        foreach ($favoriteUsers as $user) {
            Mail::send([], [], function ($message) use ($user, $subject, $shopName, $messageContent) {
                $message->to($user->email)
                    ->subject($subject)
                    ->setBody("
                        店舗名: $shopName\n
                        メッセージ:\n
                        $messageContent
                    ", 'text/plain');
            });
        }

        return redirect('/email_form')->with('message', 'メールを送信しました。');

    }
}
