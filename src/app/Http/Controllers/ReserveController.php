<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReserveRequest;
use App\Models\Reservation;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ReserveController extends Controller
{
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


    public function reserve_delete(Request $request)
    {
        $reserve_id=$request->reserve_number;
        Reservation:: where('id', $reserve_id)
            ->delete();

        return redirect('/my_page')->with('message', '予約を取消しました。');
    }

    public function reserve_edit($id)
    {
        $user = Auth::User();

        $reservation = Reservation::where('id', $id)->firstOrFail();
        return view('reserve_edit', compact('reservation'));
    }

    public function reserve_update(ReserveRequest $request)
    {
        // 予約IDを取得
        $reservationId = $request->reserve_id;

        // 予約情報を取得
        $reservation = Reservation::findOrFail($reservationId);

        // 日付と時間を結合して日時を作成
        $dateTimeString = $request->reserve_date . ' ' . $request->reserve_time;
        $dateTime = Carbon::parse($dateTimeString);

        // 予約情報を更新
        $reservation->reserve_date = $request->reserve_date;
        $reservation->reserve_time = $request->reserve_time;
        $reservation->reserve_datetime = $dateTime;
        $reservation->reserve_num = $request->reserve_num;

        // 変更を保存
        $reservation->save();

        // 成功メッセージと共にリダイレクト
        return redirect('/my_page')->with('message', '予約を更新しました。');
    }


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

    public function reserve_qr($id)
    {
        $user = Auth::user();

        $url = config('app.url').'/reserve_match/'.$id;

        // QRコードを生成
        $qrcode = QrCode::size(200)->generate($url);

        // QRコードをビューに渡す
        return view('reserve_qr',  compact('qrcode','url'));
    }

    public function reserve_match($id)
    {
        $user = Auth::user();
        if ($user->role !== 'shop-admin' || $user->email_verified_at === null) {
            return redirect('/')->with('message', 'アクセスが許可されていません。');
        }

        $reservation = Reservation::where('id', $id)->first();

        if ($reservation) {
            if ($user->shop_id !== $reservation->shop_id) {
                return redirect('/')->with('message', '店舗が違います。');
            }
            return view('reserve_match',  compact('reservation'));
        } else {
            return redirect('/')->with('message', '予約情報が存在しません。');
        }

    }

}
