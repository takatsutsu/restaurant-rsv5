<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin
        $now = Carbon::now();
        $param = [
            'name' => '管理者',
            'email' => 'admin@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'admin',
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        //shop-manager　５件のみ登録
        $param = [
            'name' => '仙人（管理者）',
            'email' => 'shop0001@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'shop-admin',
            'shop_id' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '牛助（管理者）',
            'email' => 'shop0002@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'shop-admin',
            'shop_id' => 2,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '戦慄（管理者）',
            'email' => 'shop0003@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'shop-admin',
            'shop_id' => 3,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'ルーク（管理者）',
            'email' => 'shop0004@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'shop-admin',
            'shop_id' => 4,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '志摩屋（管理者）',
            'email' => 'shop0005@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'shop-admin',
            'shop_id' => 5,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '香（管理者）',
            'email' => 'shop0006@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'shop-admin',
            'shop_id' => 6,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'JJ（管理者）',
            'email' => 'shop0007@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'shop-admin',
            'shop_id' => 7,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'らーめん極み（管理者）',
            'email' => 'shop0008@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'shop-admin',
            'shop_id' => 8,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);


        $param = [
            'name' => '鳥雨(管理者）',
            'email' => 'shop0009@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'shop-admin',
            'shop_id' => 9,
            'created_at' => $now,
            'updated_at' => $now,
            ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '築地色合(管理者）',
            'email' => 'shop0010@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'shop-admin',
            'shop_id' => 10,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '晴海(管理者）',
            'email' => 'shop0011@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'shop-admin',
            'shop_id' => 11,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '三子(管理者）',
            'email' => 'shop0012@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'shop-admin',
            'shop_id' => 12,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '八戒(管理者）',
            'email' => 'shop0013@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'shop-admin',
            'shop_id' => 13,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '福助(管理者）',
            'email' => 'shop0014@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'shop-admin',
            'shop_id' => 14,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'ラー北(管理者）',
            'email' => 'shop0015@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'shop-admin',
            'shop_id' => 15,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '翔(管理者）',
            'email' => 'shop0016@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'shop-admin',
            'shop_id' => 16,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '漆(管理者）',
            'email' => 'shop0017@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'shop-admin',
            'shop_id' => 17,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '経緯(管理者）',
            'email' => 'shop0018@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'shop-admin',
            'shop_id' => 18,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => 'THE TOOL(管理者）',
            'email' => 'shop0019@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'shop-admin',
            'shop_id' => 19,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);



        //一般利用者
        $param = [
            'name' => '山田太郎',
            'email' => 'aa@gmail.com',
            'email_verified_at' => $now,
            'password' =>bcrypt('password'),
            'role' => 'user',
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '佐藤次郎',
            'email' => 'bb@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'user',
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '鈴木三郎',
            'email' => 'cc@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'user',
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '加藤花子',
            'email' => 'dd@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'user',
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '井上陽子',
            'email' => 'ee@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'user',
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '山下ひろみ',
            'email' => 'ff@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'user',
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '佐々木健一',
            'email' => 'gg@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'user',
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '加藤良子',
            'email' => 'hh@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'user',
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '吉田恵',
            'email' => 'ii@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'user',
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '本田亮一',
            'email' => 'jj@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'created_at' => $now,
            'updated_at' => $now,
            'role' => 'user',
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '斎藤まい',
            'email' => 'kk@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'user',
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '竹下恵子',
            'email' => 'll@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'user',
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '阿部貴子',
            'email' => 'mm@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'user',
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '森田康夫',
            'email' => 'nn@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'user',
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '松田栄子',
            'email' => 'oo@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'user',
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '中野啓介',
            'email' => 'pp@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'user',
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '橋本まりこ',
            'email' => 'qq@gmail.com',
            'email_verified_at' => $now,
            'password' => bcrypt('password'),
            'role' => 'user',
            'created_at' => $now,
            'updated_at' => $now,
        ];
        DB::table('users')->insert($param);
    }
}
