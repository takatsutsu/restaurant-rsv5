<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        $param = [
            'genre_name' => 'イタリアン',
            'genre_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws. com/image/italian.jpg',
            'genre_picture' => 'italian.jpg',
            'created_at' => $now,
            'updated_at' => $now
        ];
        DB::table('genres')->insert($param);

        $param = [
            'genre_name' => 'ラーメン',
            'genre_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws. com/image/ramen.jpg',
            'genre_picture' => 'ramen.jpg',
            'created_at' => $now,
            'updated_at' => $now
        ];
        DB::table('genres')->insert($param);

        $param = [
            'genre_name' => '居酒屋',
            'genre_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws. com/image/izakaya.jpg',
            'genre_picture' => 'izakaya.jpg',
            'created_at' => $now,
            'updated_at' => $now
        ];
        DB::table('genres')->insert($param);


        $param = [
            'genre_name' => '寿司',
            'genre_url'=>'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg',
            'genre_picture' => 'sushi.jpg',
            'created_at' => $now,
            'updated_at' => $now
        ];
        DB::table('genres')->insert($param);

        $param = [
            'genre_name' => '焼肉',
            'genre_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws. com/image/yakiniku.jpg',
            'genre_picture' => 'yakiniku.jpg',
            'created_at' => $now,
            'updated_at' => $now
        ];
        DB::table('genres')->insert($param);

    }
}
