<!DOCTYPE html>
<html>

<head>
    <title>予約リマインド</title>
</head>

<body>
    <p>{{ $reservation->user->name }}様、</p>
    <p>以下の予約情報をお知らせいたします。</p>
    <ul>
        <li>予約店舗: {{ $reservation->shop_id }}:{{$reservation->shop->shop_name}}</li>
        <li>予約日: {{ $reservation->reserve_date }}</li>
        <li>予約時間: {{ $reservation->reserve_time }}</li>
    </ul>
    <p>お待ちしております。</p>
</body>

</html>