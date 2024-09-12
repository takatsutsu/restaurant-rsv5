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
        $user_id = Auth::id();
        $genres = Genre::all();
        $areas = Area::all();

        $user = Auth::user();


        // クエリビルダを使用してクエリを作成
        $query = Shop::leftJoin('favorites', function ($join) use ($user_id) {
            $join->on('shops.id', '=', 'favorites.shop_id')
            ->where('favorites.user_id', '=', $user_id);
        })
            ->select('shops.*', \DB::raw('CASE WHEN favorites.user_id IS NOT NULL THEN TRUE ELSE FALSE END AS is_favorite'))
            ->get();

        // $shops =  load('area', 'genre')->get();
        $shops = Shop::with('area', 'genre')->findMany($query->pluck('id'))->each(function ($shop) use ($query) {
            $shop->is_favorite = $query->firstWhere('id', $shop->id)->is_favorite;
        });

        return view('index', compact('shops','genres', 'areas', 'user'));
    }

    public function search(Request $request)
    {
        $userId = Auth::id();
        $genres = Genre::all();
        $areas = Area::all();

        $search_area = $request->search_area;
        $search_genre = $request->search_genre;
        $search_shop = $request->search_shop;

        $query = Shop::leftJoin('favorites', function ($join) use ($userId) {
            $join->on('shops.id', '=', 'favorites.shop_id')
            ->where('favorites.user_id', '=', $userId);
        })
        ->select('shops.*', \DB::raw('CASE WHEN favorites.user_id IS NOT NULL THEN TRUE ELSE FALSE END AS is_favorite'));

        if (!empty($search_area)) {
            $query->where('area_id', $search_area);
        }

        if (!empty($search_genre)) {
            $query->where('genre_id', $search_genre);
        }

        if (!empty($search_shop)) {
            $query->where('shop_name', 'like', '%' . $search_shop . '%');
        }

        $query = $query->get();

        $shops = Shop::with('area', 'genre')->findMany($query->pluck('id'))->each(function ($shop) use ($query) {
            $shop->is_favorite = $query->firstWhere('id', $shop->id)->is_favorite;
        });

        return view('index', compact('shops', 'genres', 'areas', 'search_area','search_genre', 'search_shop'));
    }


    public function detail($id)
    {
        $shop = Shop::with('area', 'genre')->findOrFail($id);
        return view('detail', compact('shop'));
    }
}