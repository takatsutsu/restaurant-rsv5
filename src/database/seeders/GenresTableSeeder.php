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
            'genre_name' => 'フレンチ',
            'created_at' => $now,
            'updated_at' => $now
        ];
        DB::table('genres')->insert($param);

        $param = [
            'genre_name' => '中華',
            'created_at' => $now,
            'updated_at' => $now
        ];
        DB::table('genres')->insert($param);

        $param = [
            'genre_name' => 'イタリアン',
            'created_at' => $now,
            'updated_at' => $now
        ];
        DB::table('genres')->insert($param);

        $param = [
            'genre_name' => 'ラーメン',
            'created_at' => $now,
            'updated_at' => $now
        ];
        DB::table('genres')->insert($param);

        $param = [
            'genre_name' => '居酒屋',
            'created_at' => $now,
            'updated_at' => $now
        ];
        DB::table('genres')->insert($param);

        $param = [
            'genre_name' => 'ラーメン',
            'created_at' => $now,
            'updated_at' => $now
        ];
        DB::table('genres')->insert($param);

        $param = [
            'genre_name' => '寿司',
            'created_at' => $now,
            'updated_at' => $now
        ];
        DB::table('genres')->insert($param);

        $param = [
            'genre_name' => '焼肉',
            'created_at' => $now,
            'updated_at' => $now
        ];
        DB::table('genres')->insert($param);

        $param = [
            'genre_name' => '和食',
            'created_at' => $now,
            'updated_at' => $now
        ];
        DB::table('genres')->insert($param);
    }
}
