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
    public function reserve_store(Request $request)
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

        return redirect('/mypage')->with('message', '予約を取消しました。');
    }

}
