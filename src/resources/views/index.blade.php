@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap_custom2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<html>

<head>
    <title>Shops</title>
</head>

<body>
    <div class="container">
        <h1>Shops</h1>
        <div class="grid-container">
            @foreach($shops as $shop)
            <div class="shop-card">
                <form class="id_detail" action="/detail" method="get">
                    <input type="hidden" name="id_detail" value="{{ $shop->id}}" />
                    <img src="{{ asset($shop->shop_url) }}" alt="{{ $shop->shop_name }}">
                    <h2>{{ $shop->shop_name }}</h2>
                    <p>#{{ $shop->area->area_name }} #{{ $shop->genre->genre_name }}</p>
                    <a href="/detail/{{ $shop->id }}" class="btn btn-primary">詳しく見る</a>
                </form>
                <form action="">
                    @if (Auth::check() && Auth::user()->hasVerifiedEmail())
                
                    <input type="hidden" name="id_favorite" value="{{ $shop->id}}" />
                    <a href="/favo_store/{{ $shop->id }}" class="btn btn-favorite">🤍</a>
                    <a href="/favo_delete/{{ $shop->id }}" class="btn btn-favorite">💛</a>
                    @endif
                </form>
            </div>

            @endforeach
        </div>
    </div>
</body>

</html>
@endsection