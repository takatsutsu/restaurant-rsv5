<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReserveRequest;
use App\Models\Reservation;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ReserveController extends Controller
{
    //予約情報の登録処理
    public function reserve_store(ReserveRequest $request)
    {

        $date = $request->reserve_date;
        $time = $request->reserve_time;

        $datetime_string = $date . ' ' . $time;
        $datetime = Carbon::parse($datetime_string);

        $user = Auth::User();

        $reserve = ([
            'user_id' => $user->id,
            'shop_id' => $request->shop_id,
            'reserve_date' =>$request->reserve_date,
            'reserve_time' => $request->reserve_time,
            'reserve_datetime' => $datetime,
            'reserve_num' => $request->reserve_num
        ]);

        Reservation::create($reserve);
        return view('thanks');
    }

    //ユーザの予約情報の削除処理
    public function reserve_delete(Request $request)
    {
        $reserve_id=$request->reserve_number;
        Reservation:: where('id', $reserve_id)
            ->delete();

        return redirect('/my_page')->with('message', '予約を取消しました。');
    }
    //ユーザの予約情報の変更画面の表示
    public function reserve_edit($id)
    {
        $user = Auth::User();
        $reservation = Reservation::where('id', $id)->firstOrFail();
        // ログインユーザと予約ユーザのチェック、メール認証が完了していることを確認
        if ($user->id !== $reservation->user_id || $user->email_verified_at === null) {
            return redirect('/')->with('message', 'アクセスが許可されていません。');
        }

        return view('reserve_edit', compact('reservation'));
    }

    //予約情報画面からユーザの予約情報の更新処理
    public function reserve_update(ReserveRequest $request)
    {
        $user = Auth::User();
        // 予約IDを取得
        $reservationid = $request->reserve_id;

        // 予約情報を取得
        $reservation = Reservation::findOrFail($reservationid);

        // ログインユーザと予約ユーザのチェック、メール認証が完了していることを確認
        if ($user->id !== $reservation->user_id || $user->email_verified_at === null) {
            return redirect('/')->with('message', 'アクセスが許可されていません。');
        }

        // 日付と時間を結合して日時を作成
        $datetimestring = $request->reserve_date . ' ' . $request->reserve_time;
        $datetime = Carbon::parse($datetimestring);

        // 予約情報を更新
        $reservation->reserve_date = $request->reserve_date;
        $reservation->reserve_time = $request->reserve_time;
        $reservation->reserve_datetime = $datetime;
        $reservation->reserve_num = $request->reserve_num;

        // 変更を保存
        $reservation->save();

        // 成功メッセージと共にリダイレクト
        return redirect('/my_page')->with('message', '予約を更新しました。');
    }

    //店舗側の予約情報の照会
    public function shop_reserve() {
        $user = Auth::user();

        // ユーザーがショップ管理者であり、メール認証が完了していることを確認
        if ($user->role !== 'shop-admin' || $user->email_verified_at === null) {
            return redirect('/')->with('message', 'アクセスが許可されていません。');
        }

        // ログインしているユーザーのshop_idに一致する予約を取得
        $reservations = Reservation::where('shop_id', $user->shop_id)->get();

        // 取得した予約データをビューに渡す
        return view('shop_reserve', compact('reservations'));
    }


    //一般ユーザのQRコード表示
    public function reserve_qr($id)
    {
        $user = Auth::user();

        $url = config('app.url').'/reserve_match/'.$id;

        // QRコードを生成
        $qrcode = QrCode::size(200)->generate($url);

        // QRコードをビューに渡す
        return view('reserve_qr',  compact('qrcode','url'));
    }

    //店舗管理者側のQRコード表示
    public function reserve_match($id)
    {
        $user = Auth::user();
        // ユーザーがショップ管理者であり、メール認証が完了していることを確認
        if ($user->role !== 'shop-admin' || $user->email_verified_at === null) {
            return redirect('/')->with('message', 'アクセスが許可されていません。');
        }

        $reservation = Reservation::where('id', $id)->first();
        //ユーザテーブルの店舗IDと予約テーブルの店舗IDのチェック
        if ($reservation) {
            if ($user->shop_id !== $reservation->shop_id) {
                return redirect('/')->with('message', '店舗が違います。');
            }
            return view('reserve_match',  compact('reservation'));
        } else {
            //予約情報が存在していない場合のチェック
            return redirect('/')->with('message', '予約情報が存在しません。');
        }

    }

}
