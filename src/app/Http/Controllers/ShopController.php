<?php


namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Favorite;
use App\Models\Genre;
use App\Models\Area;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Support\Facades\Auth;


class ShopController extends Controller
{
    public function index()
    {
        //$shops = Shop:: with('area', 'genre')->get();

        $userId = Auth::id();

        // クエリビルダを使用してクエリを作成
        $query = Shop::leftJoin('favorites', function ($join) use ($userId) {
            $join->on('shops.id', '=', 'favorites.shop_id')
            ->where('favorites.user_id', '=', $userId);
        })
            ->select('shops.*', \DB::raw('CASE WHEN favorites.user_id IS NOT NULL THEN TRUE ELSE FALSE END AS is_favorite'))
            ->get();

        // $shops =  load('area', 'genre')->get();
        $shops = Shop::with('area', 'genre')->findMany($query->pluck('id'))->each(function ($shop) use ($query) {
            $shop->is_favorite = $query->firstWhere('id', $shop->id)->is_favorite;
        });

        return view('index', compact('shops'));
    }

    public function detail($id)
    {
        $shop = Shop::with('area', 'genre')->findOrFail($id);
        return view('detail', compact('shop'));
    }
}