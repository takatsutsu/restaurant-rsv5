<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReserveRequest;
use App\Models\Reservation;

class ReserveController extends Controller
{
    public function reserve_store(ReserveRequest $request)
    {

        $date = $request->reserve_date;
        $time = $request->reserve_time;

        $dateTimeString = $date . ' ' . $time;
        $dateTime = Carbon::parse($dateTimeString);

        $user = Auth::User();

    
        $reserve = ([
            'user_id' => $user->id,
            'shop_id' => $request->shop_id,
            'reserve_date' =>$request->reserve_date,
            'reserve_time' => $request->reserve_time,
            'reserve_datetime' => $dateTime,
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

}
