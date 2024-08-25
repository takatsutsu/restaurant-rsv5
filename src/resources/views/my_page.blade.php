@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap_custom2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/my_page.css')}}">
@endsection

<html>
@section('content')
<div class="my_main">
    <div class="my_container">
        <h1>{{ $user->name }}さん</h1>
        <div class="my_content"> <!-- 修正ポイント -->
            <div class="my_reservatiion">
                <h2>予約状況</h2>
                <div class="my_rese_container">
                    @foreach($reservations as $reservation)
                    <div class="my_rese_card">
                        <form class="my_reserve_form" action="/reserve_delete" method="post">
                            @csrf
                            <div class="my_rese_card-body">
                                <input type="submit" class="my_rese_card-btn" value="❌" onclick='return confirm("予約を取消しますか？")'>
                                <h5 class="my_rese_card-title">{{ $reservation->shop->shop_name }}</h5>
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

            <div class="my_favorites"> <!-- 修正ポイント -->
                <h2>お気に入り店舗</h2>
                <div class="my_favo_container">
                    @foreach($favorites as $favorite)
                    <div class="my_favo_card">
                        <form class="my_favo_form" action="/detail" method="get">
                            @csrf
                            <input type="hidden" name="id_detail" value="{{$favorite->shop_id}}" />
                            <img src="{{ asset($favorite->shop->shop_url) }}" alt="{{ $favorite->shop->name }}">
                            <h2>{{ $favorite->shop->shop_name }}</h2>
                            <p>#{{ $favorite->shop->area->area_name  }} #{{ $favorite->shop->genre->genre_name }}</p>
                            <div class="my_favo_btn-group">
                                <a href="/detail/{{ $favorite->shop_id }}" class="my_favo_btn my_favo_btn-content">詳しく見る</a>
                                @if (Auth::check() && Auth::user()->hasVerifiedEmail())
                                <a href="/favo_delete/{{ $favorite->shop_id }}" class="my_favo_favorite"><img src="{{ asset('images/filled-heart.png') }}" alt="お気に入り解除" class="my_favo_heart-icon"></a>
                                @endif
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