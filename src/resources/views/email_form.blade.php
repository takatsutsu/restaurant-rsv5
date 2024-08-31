@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap_custom2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/email_form.css') }}">
@endsection
@section('content')
<div class="email_container">
    <h2 class="email_head-tittle">メール送信画面</h2>



    <form action="/send_email" method="POST">
        @csrf
        <label for="shop_id" class="email_tittle">店舗:</label>
        <select class="email_shop_id" id="shop_id" name="shop_id" required>
            <option value="">店舗を選択</option>
            @foreach($shops ?? '' as $shop)
            <option value="{{ $shop->id }}">{{ $shop->shop_name }}</option>
            @endforeach
        </select><br>

        <label for="subject" class="email_tittle">件名:</label>
        <input type="text" id="subject" name="subject" required><br>

        <label for="message" class="email_tittle">内容:</label>
        <textarea id="message" class="email_message" name="message" required></textarea><br>

        <button type="submit">送信</button>
    </form>
    @endsection