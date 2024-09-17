@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap_custom2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/shop_reserve.css')}}">
@endsection

<html>
@section('content')
<div class="shop_rese_main">
    <div class="shop_reservatiion">
        <h2>予約状況</h2>
        <div class="shop_rese_box">
            @foreach($reservations as $reservation)
            <div class="shop_rese_card">
                <form class="shop_reserve_form" action="/shop_reserve" method="get">
                    @csrf
                    <div class="shop_rese_card-body">
                        <h5 class="shop_rese_card-title">{{ $reservation->shop->shop_name }}</h5>
                        <p class="shop_rese_card-text">予約者名: {{ $reservation->user->name }}様</p>
                        <p class="shop_rese_card-text">予約番号: {{ $reservation->id }}</p>
                        <p class="shop_rese_card-text">予約日: {{ $reservation->reserve_date }}</p>
                        <p class="shop_rese_card-text">予約時間: {{ $reservation->reserve_time }}</p>
                        <p class="shop_rese_card-text">人数: {{ $reservation->reserve_num }}人</p>
                    </div>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</div>

</html>
@endsection