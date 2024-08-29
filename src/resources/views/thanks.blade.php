@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap_custom2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection
@section('content')
    <div class="thank_head">
    <h2 class="thank_tittle">予約完了画面</h2>
    <form action="/" method="get">
        <div class=" thank_main">
            予約完了しました。ありがとうございます。

        </div>
        <div class="thank_home-btn">
            <input type="submit" value="HOME" />
        </div>

    </form>

@endsection