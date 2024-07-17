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
    <div class="container">
        <h1>{{ $shop->shop_name }}</h1>
        <a href="{{ url('/') }}">＜ 戻る</a>
        <div class="shop-detail">
            <img src="{{ asset($shop->shop_url) }}" alt="{{ $shop->shop_name }}">
            <p>#{{ $shop->area->area_name }}</p>
            <p>#{{ $shop->genre->genre_name }}</p>
            <p>{{ $shop->shop_explanation }}</p>
        </div>
        <div class="reservation-form">
            <h2>予約</h2>
            <form action="/reserve_store" method="POST">
                @csrf
                <div class="form-group">
                    <label for="date">予約日</label>
                    <input type="date" name="reserve_date" id="date" value="{{ old('reserve_date') }}">
                </div>
                <div class="form__error">
                    <font color="red">
                        @error('tell')
                        {{ $message }}
                        @enderror
                    </font>
                </div>
                <div class="form-group">
                    <label for="time">予約時間</label>
                    <input type="time" name="reserve_time" id="time" value="{{ old('reserve_time') }}">
                </div>
                <div class="form__error">
                    <font color="red">
                        @error('tell')
                        {{ $message }}
                        @enderror
                    </font>
                </div>
                <div class="form-group">
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
                <div class="form__error">
                    <font color="red">
                        @error('tell')
                        {{ $message }}
                        @enderror
                    </font>
                </div>
                <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                <input type="hidden" name="user" value="{{$user ?? ''}}">
                <button type="submit">予約する</button>
            </form>
        </div>
    </div>
</body>

</html>
@endsection