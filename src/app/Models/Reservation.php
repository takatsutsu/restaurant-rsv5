<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_id',
        'reserve_date',
        'reserve_time',
        'reserve_datetime',
        'reserve_num'
    ];

    protected $casts = [
        'reserve_time' => 'datetime:H:i',  // 時間をCarbonインスタンスとして扱う
    ];

    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }

    public function shop()
    {
        return $this->belongsTo("App\Models\Shop");
    }


}


