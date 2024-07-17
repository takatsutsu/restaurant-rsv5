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
        <div class="reservation-form">
            <h2>予約確認</h2>
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="店舗名">Date</label>
                    <input type="" name="shop_name" id="shop_name" required>
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="reserve_date" id="reserve_date" required>
                </div>
                <div class="form-group">
                    <label for="time">Time</label>
                    <input type="time" name="reserve_time" id="reserve_time" required>
                </div>
                <div class="form-group">
                    <label for="number">Number</label>
                    <input type="integer" name="reserve_num" id="reserve_num" required>
                </div>
                <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                <input type="hidden" name="user" value="{{$user}}">
                <button type="submit">予約確定</button>
            </form>
        </div>
    </div>
</body>

</html>
@endsection