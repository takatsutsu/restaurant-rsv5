<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function favo_store($id)
    {

        $user = Auth::User();
        $favorite = ([
            'user_id' => $user->id,
            'shop_id' => $id,
        ]);

        Favorite::create($favorite);
        return redirect('/');
    }

    public function favo_delete($id)
    {
        $user = Auth::User();
        Favorite::where('user_id', $user->id)
            ->where('shop_id', $id)
            ->delete();

        return redirect('/');
    }
}
