@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap_custom2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/email_form.css') }}">
@endsection
@section('content')
<div class="email_container">
    <h2 class="email_head-tittle">メール送信画面</h2>
    <!-- 店舗情報の表示 -->
    <p>店舗名: {{ $shop->shop_name }}</p>

    <form action="/send_email" method="POST" class="email_contents">
        @csrf
        <input type="hidden" name="shop_id" value="{{ $shop->id }}">

        <label for="subject" class="email_tittle">件名:</label>
        <input type="text" class="email_subject" id="subject" name="subject" required><br>

        <label for="message" class="email_tittle">内容:</label>
        <textarea id="message" class="email_message" name="message" required></textarea><br>

        <button type="submit" class="email_button">送信</button>
    </form>
    @endsection