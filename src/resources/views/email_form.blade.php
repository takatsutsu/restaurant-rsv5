@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap_custom2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection
@section('content')
<div class="thank_head">
    <h2 class="thank_tittle">メール送信画面</h2>



    <form action="/send_email" method="POST">
        @csrf
        <label for="shop_id">店舗:</label>
        <select id="shop_id" name="shop_id" required>
            @foreach($shops ?? '' as $shop)
            <option value="{{ $shop->id }}">{{ $shop->shop_name }}</option>
            @endforeach
        </select><br>

        <label for="subject">件名:</label>
        <input type="text" id="subject" name="subject" required><br>

        <label for="message">メッセージ:</label>
        <textarea id="message" name="message" required></textarea><br>

        <button type="submit">送信</button>
    </form>
    @endsection