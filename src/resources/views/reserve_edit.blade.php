@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap_custom2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/reserve_edit.css')}}">
@endsection

@section('content')
<html>

<head>
</head>

<body>
    <div class="detail_container">
        <div class="detail_reservation">
            <h2>予約変更</h2>
            <form action="/reserve_update" method="POST">
                @csrf
                <div class="detail_rese-input">
                    <label for="date">予約日</label>
                    <input type="date" name="reserve_date" id="date" value="{{ old('reserve_date', $reservation->reserve_date) }}">
                </div>
                <div class="detail_rese-error">
                    <font color="red">
                        @error('reserve_date')
                        {{ $message }}
                        @enderror
                    </font>
                </div>
                <div class="detail_rese-error">
                    <font color="red">
                        @error('reserve_before-date')
                        {{ $message }}
                        @enderror
                    </font>
                </div>
                <div class="detail_rese-input">
                    <label for="time">予約時間</label>
                    <input type="time" name="reserve_time" step="900" value="{{ old('reserve_time', $reservation->reserve_time->format('H:i')) }}">
                </div>
                <div class="detail_rese-error">
                    <font color="red">
                        @error('reserve_time')
                        {{ $message }}
                        @enderror
                    </font>
                </div>
                <div class="detail_rese-error">
                    <font color="red">
                        @error('reserve_before-time')
                        {{ $message }}
                        @enderror
                    </font>
                </div>

                <div class="detail_rese-input">
                    <label for="number">予約人数</label>
                    <select name="reserve_num" id="reserve_num">
                        <option value="1" {{ $reservation->reserve_num == 1 ? 'selected' : '' }}>1人</option>
                        <option value="2" {{ $reservation->reserve_num == 2 ? 'selected' : '' }}>2人</option>
                        <option value="3" {{ $reservation->reserve_num == 3 ? 'selected' : '' }}>3人</option>
                        <option value="4" {{ $reservation->reserve_num == 4 ? 'selected' : '' }}>4人</option>
                        <option value="5" {{ $reservation->reserve_num == 5 ? 'selected' : '' }}>5人</option>
                        <option value="6" {{ $reservation->reserve_num == 6 ? 'selected' : '' }}>6人</option>
                        <option value="7" {{ $reservation->reserve_num == 7 ? 'selected' : '' }}>7人</option>
                        <option value="8" {{ $reservation->reserve_num == 8 ? 'selected' : '' }}>8人</option>
                    </select>
                </div>

                <div class="detail_rese-error">
                    <font color="reserve_num">
                        @error('tell')
                        {{ $message }}
                        @enderror
                    </font>
                </div>
                <P></p>

                <button type="submit" class="detail_rese-button">予約変更する</button>
                <input type="hidden" name="reserve_id" value="{{ $reservation->id }}">
            </form>
        </div>
    </div>
</body>
@endsection

</html>