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
                    <h5 class="card-title">{{ $reservation->shop->name }}</h5>
                    <p class="card-text">Date: {{ $reservation->date }}</p>
                    <p class="card-text">Time: {{ $reservation->time }}</p>
                    <p class="card-text">Number: {{ $reservation->number }}人</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-6">
            <h2>お気に入り店舗</h2>
            @foreach($favorites as $favorite)
            <div class="card mb-3">
                <img src="{{ $favorite->shop->image_url }}" class="card-img-top" alt="{{ $favorite->shop->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $favorite->shop->name }}</h5>
                    <p class="card-text">{{ $favorite->shop->area->name }} #{{ $favorite->shop->category }}</p>
                    <a href="#" class="btn btn-primary">詳しくみる</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<html>
@endsection