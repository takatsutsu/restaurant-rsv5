@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap_custom2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/reserve_qr.css') }}">
@endsection
@section('content')
<div class="rese_qrcode">
    {{-- QRコードを表示 --}}
    {!! $qrcode !!}

    {{-- URLを表示 --}}
    <p class="rese_url">{{ $url }}</p>
</div>
@endsection