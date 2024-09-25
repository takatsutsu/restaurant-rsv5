<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_name',
        'shop_explanation',
        'genre_id',
        'area_id',
    ];

    public function area()
    {
        return $this->belongsTo("App\Models\Area");
    }

    public function genre()
    {
        return $this->belongsTo("App\Models\Genre");
    }

    public function reservation()
    {
        return $this->hasMany("App\Models\Reservation");
    }

    public function favorite()
    {
        return $this->hasMany("App\Models\Favorite");
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'shop_id', 'id');
    }

}
