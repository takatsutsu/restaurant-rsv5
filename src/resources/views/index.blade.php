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
        <!-- 検索フォームの追加 -->
        <div class="shop_search-form">
            <form action="/search" method="post">
                @csrf
                <select name="search_area" class="shop_search-field">
                    <option value="">エリアを選択</option>
                    <!-- エリアのオプションを追加 -->
                    @foreach($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                    @endforeach
                </select>
                <select name="search_genre" class="shop_search-field">
                    <option value="">ジャンルを選択</option>
                    <!-- ジャンルのオプションを追加 -->
                    @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                    @endforeach
                </select>
                <input type="text" name="search_shop" class="shop_search-field" placeholder="店舗名を入力">
                <button type="submit" class="btn btn-primary">検索</button>
            </form>
        </div>
        <!-- 検索フォームの終わり -->
        <div class="shop_grid-container">
            @foreach($shops as $shop)
            <div class="shop_card">
                <form class="shop_detail-form" action="/detail" method="get">
                    <input type="hidden" name="id_detail" value="{{ $shop->id}}" />
                    <img src="{{ asset('storage/' . $shop->shop_picture) }}" alt="Shop Picture">
                    <h2>{{ $shop->shop_name }}</h2>
                    <p>#{{ $shop->area->area_name }} #{{ $shop->genre->genre_name }}</p>
                    <div class="shop_button-group">
                        <a href="/detail/{{ $shop->id }}" class="shop_btn btn-content">詳しく見る</a>
                        @if (Auth::check() && Auth::user()->hasVerifiedEmail())
                        @if($shop->is_favorite)
                        <a href="/favo_delete/{{ $shop->id }}" class="shop_btn-favorite"><img src="{{ asset('images/filled-heart.png') }}" alt="お気に入り解除" class="shop_heart-icon"></a>
                        @else
                        <a href="/favo_store/{{ $shop->id }}" class="shop_btn-unfavorite"><img src="{{ asset('images/empty-heart2.png') }}" alt="お気に入りに追加" class="shop_heart-icon"></a>
                        @endif
                        @endif
                    </div>
                </form>
            </div>

            @endforeach
        </div>
    </div>
</body>

</html>
@endsection