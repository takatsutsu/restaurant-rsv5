@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap_custom2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/mypage.css')}}">

@endsection
<html>

@section('content')
<div class="container">
    <h1>{{ $user->name }}さん</h1>
    <div class="row">
        <div class="col-md-6">
            <h2>予約状況</h2>
            @foreach($reservations as $reservation)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $reservation->shop->shop_name }}</h5>
                    <p class="card-text">予約番号: {{ $reservation->id }}</p>
                    <p class="card-text">Date: {{ $reservation->reserve_date }}</p>
                    <p class="card-text">Time: {{ $reservation->reserve_time }}</p>
                    <p class="card-text">Number: {{ $reservation->reserve_num }}人</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-6">
            <h2>お気に入り店舗</h2>
            @foreach($favorites as $favorite)
            <div class="card mb-3">
                <img src="{{ $favorite->shop->shop_url }}" class="card-img-top" alt="{{ $favorite->shop->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $favorite->shop->shop_name }}</h5>
                    <p class="card-text">#{{ $favorite->shop->area->area_name }} #{{ $favorite->shop->genre->genre_name }}</p>
                    <a href="#" class="btn btn-primary">詳しくみる</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<html>
@endsection