@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap_custom2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/my_page.css')}}">
@endsection

<html>
@section('content')
<div class="my_main">
    <div class="my_container">
        <div class="my_content">
            <div class="my_reservatiion">
                <h2>予約状況</h2>
                <div class="my_rese_container">
                    @foreach($reservations as $reservation)
                    <div class="my_rese_card">
                        <form class="my_reserve_form" action="/shop_reserve" method="get">
                            @csrf
                            <div class="my_rese_card-body">
                                <h5 class="my_rese_card-title">{{ $reservation->shop->shop_name }}</h5>
                                <p class="my_rese_card-text">予約者名: {{ $reservation->user->name }}様</p>
                                <p class="my_rese_card-text">予約番号: {{ $reservation->id }}</p>
                                <p class="my_rese_card-text">予約日: {{ $reservation->reserve_date }}</p>
                                <p class="my_rese_card-text">予約時間: {{ $reservation->reserve_time }}</p>
                                <p class="my_rese_card-text">人数: {{ $reservation->reserve_num }}人</p>
                                <input type="hidden" name="reserve_number" value="{{$reservation->id}}" />
                                <a href="/reserve_edit/{{ $reservation->id }}" class="">予約変更</a>
                            </div>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>

</html>
@endsection