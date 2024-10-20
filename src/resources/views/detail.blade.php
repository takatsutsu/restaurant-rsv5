@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap_custom2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/detail.css')}}">
@endsection

@section('content')
<html>

<head>
    <title>{{ $shop->shop_name }}</title>
</head>

<body>
    <div class="detail_container">
        <div class="detail_shop-info">
            <h1>{{ $shop->shop_name }}</h1>
            <a href="{{ url('/') }}">＜ 戻る</a>
            <img src="{{ Storage::url($shop->genre->genre_picture) }}" alt="Shop Picture">
            <p>#{{ $shop->area->area_name }}</p>
            <p>#{{ $shop->genre->genre_name }}</p>
            <p>{{ $shop->shop_explanation }}</p>
        </div>
        <div class="detail_reservation">
            <h2>予約</h2>
            <form action="/reserve_store" method="POST">
                @csrf
                <div class="detail_rese-input">
                    <label for="date">予約日</label>
                    <input type="date" name="reserve_date" id="date" value="{{ old('reserve_date') }}">
                </div>
                <div class="detail_rese-error">
                    <font color="red">
                        @error('reserve_date')
                        {{ $message }}
                        @enderror
                    </font>
                </div>
                <div class="detail_rese-error">
                    <font color="red">
                        @error('reserve_before-date')
                        {{ $message }}
                        @enderror
                    </font>
                </div>
                <div class="detail_rese-input">
                    <label for="time">予約時間</label>
                    <input type="time" name="reserve_time" id="time" value="{{ old('reserve_time') }}">
                </div>
                <div class="detail_rese-error">
                    <font color="red">
                        @error('reserve_time')
                        {{ $message }}
                        @enderror
                    </font>
                </div>
                <div class="detail_rese-error">
                    <font color="red">
                        @error('reserve_before-time')
                        {{ $message }}
                        @enderror
                    </font>
                </div>

                <div class="detail_rese-input">
                    <label for="number">予約人数</label>
                    <select name="reserve_num" id="reserve_num" value="{{ old('reserve_num') }}">
                        <option value="1">1人</option>
                        <option value="2">2人</option>
                        <option value="3">3人</option>
                        <option value="4">4人</option>
                        <option value="5">5人</option>
                        <option value="6">6人</option>
                        <option value="7">7人</option>
                        <option value="8">8人</option>
                    </select>
                </div>
                <P></P>
                <div class="detail_rese-error">
                    <font color="reserve_num">
                        @error('tell')
                        {{ $message }}
                        @enderror
                    </font>
                </div>
                <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                <input type="hidden" name="user" value="{{$user ?? ''}}">
                <button type="submit" class="detail_rese-button">予約する</button>
            </form>
        </div>
    </div>
</body>

</html>
@endsection