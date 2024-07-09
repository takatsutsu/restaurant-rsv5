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
                <img src="{{ asset($shop->shop_url) }}" alt="{{ $shop->shop_name }}">
                <h2>{{ $shop->shop_name }}</h2>
                <p>{{ $shop->area->area_name }}</p>
                <p>{{ $shop->genre->genre_name }}</p>
                <a href="#" class="btn btn-primary">詳細</a>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>
@endsection