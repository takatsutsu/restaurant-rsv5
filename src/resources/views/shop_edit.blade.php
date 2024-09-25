<!-- resources/views/shops/edit.blade.php -->

@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap_custom2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/shop_info.css')}}">
@endsection

@section('content')
<div class="shop_edit_container">
    <h1>店舗情報の更新</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form class="shop_edit_form" action="shop_update" method="POST" novalidate>
        @csrf

        <div class="shop_edit_group">
            <label for="shop_name">店舗名</label>
            <input type="text" name="shop_name" id="shop_name" class="shop-edit_name" value="{{ old('shop_name', $shop->shop_name) }}" required>
            <font color="red">
                @error('shop_name')
                    {{ $message }}
                @enderror
            </font>
        </div>

        <div class="shop_edit_group">
            <label for="shop_explanation">店舗の説明</label>
            <textarea name="shop_explanation" id="shop_explanation" class="shop-edit_explanation" required>{{ old('shop_explanation', $shop->shop_explanation) }}</textarea>
            <font color="red">
                @error('shop_explanation')
                    {{ $message }}
                @enderror
            </font>
        </div>

        <div class="shop_edit_group">
            <label for="area_id">エリア</label>
            <select name="area_id" id="area_id" class="shop-edit_area" required>
                <option value="">エリアを選択</option>
                @foreach($areas as $area)
                <option value="{{ $area->id }}" {{ $shop->area_id == $area->id ? 'selected' : '' }}>
                    {{ $area->area_name }}
                </option>
                @endforeach
            </select>
            <font color="red">
                @error('area_id')
                    {{$message }}
                @enderror
            </font>
        </div>

        <div class="shop_edit_group">
            <label for="genre_id">ジャンル</label>
            <select name="genre_id" id="genre_id" class="shop-edit_genre" required>
                <option value="">ジャンルを選択</option>
                @foreach($genres as $genre)
                <option value="{{ $genre->id }}" {{ $shop->genre_id == $genre->id ? 'selected' : '' }}>
                    {{ $genre->genre_name }}
                </option>
                @endforeach
            </select>
            <font color="red">
                @error('genre_id')
                    {{$message }}
                @enderror
            </font>
        </div>

        <button type="submit" class="btn btn-primary shop-edit_button">更新</button>
    </form>
</div>
@endsection