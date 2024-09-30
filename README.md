# restaurant-rsv1


##README 2024/09/28 修正

## アプリケーション名

飲食店予約管理システム
![alt text](<スクリーンショット 2024-09-30 9.39.45.png>)
![alt text](<スクリーンショット 2024-09-30 9.20.02.png>)
![alt text](<スクリーンショット 2024-09-30 9.20.39.png>)
![alt text](<スクリーンショット 2024-09-30 9.20.22.png>)
![alt text](<スクリーンショット 2024-09-30 9.21.29.png>)
![alt text](<スクリーンショット 2024-09-30 9.21.51.png>)
![alt text](<スクリーンショット 2024-09-30 9.24.07.png>)


## 作成した目的

飲食店の情報HPを構築し、お店情報を掲載。ユーザが予約、お気に入り登録できるようにする

## アプリケーション URL

- 店舗一覧ページ http://localhost/

## レポジトリー
https://github.com/takatsutsu/restaurant-rsv1.git

## 他のレポジトリー

## 機能一覧

- 会員情報登録
- ログイン
- ログアウト
- ユーザー情報取得
- ユーザー飲食店お気に入り一覧取得
- ユーザー飲食店予約情報取得
- 飲食店一覧取得
- 飲食店詳細取得
- 飲食店お気に入り追加
- 飲食店お気に入り削除
- 飲食店予約情報追加
- 飲食店予約情
- エリアで検索する
- ジャンルで検索する
- 店名で検索する

##  追加機能
- 予約変更機能
- バリデーション
- レスポンシブデザイン
- 管理画面
- ストレージ
- 認証
- メール送信
- リマインダー
- QRコード
- 環境の切り分け

##  　追加機能（未実施項目）
- 評価機能
- 決済機能
- AWS


## 使用技術(実行環境)

- PHP 7.4.9
- Laravel Framework 8.83.8
- MySQL 8.0.26
- phpmyadmin 5.2.1

## テーブル設計
![alt text](<スクリーンショット 2024-09-30 10.24.41-1.png>)
![alt text](<スクリーンショット 2024-09-30 10.25.23.png>)
![alt text](<スクリーンショット 2024-09-30 10.25.35.png>)
![alt text](<スクリーンショット 2024-09-30 10.26.04.png>)
![alt text](<スクリーンショット 2024-09-30 10.26.14.png>)
![alt text](<スクリーンショット 2024-09-30 10.26.27-1.png>)

## ER 図

![alt text](coachtech上級案件.drawio.png)


## 環境構築

**Docker ビルド**

$ `cd coachtech/laravel`

$ `git clone git@github.com:coachtech-material/laravel-docker-template.git`

$ `mv laravel-docker-template [restaurant-rsv1]`  
※[attendannce1]は任意のフォルダ名


開発の履歴を残すために、個人個人のリモートリポジトリの url を変更します。
[attendannce1]名のリポジトリ―を GITHUB にて作成

ターミナルより以下コマンドで　ローカルリポジトリのデータをリモートリポジトリに反映  
$ `git add .`

$ `git commit -m "リモートリポジトリの変更"`

$ `git push origin main`

**LARAVEL 環境構築**


$ `cd [restaurant-rsv1]
$ `docker-compose up -d --build`
$ `code .`

DockerDesktop アプリを立ち上げる
コンテナに[restaurant-rsv1]が存在していればOK

$ `docker-compose exec php bash`

$ `composer install`
  $ `exit`
 「.env.example」ファイルを 「.env」ファイルに命名を変更  
  $ `cp .env.example .env`
  $ `exit`

  テスト環境とする場合はテスト環境用.env.testとしてコピー
    `cp .env.example .env.test`　
    .env.testの設定を変更　　

   `cp .env.test .env` 
    最終 .envを置き換える

  本番環境についても、.env.prod として作成しておく

  `cp .env.example .env.prod`　
   .env.prodの設定を変更　　

  `cp .env.prod .env`
     .envを置き換える

⑥ .env (.env.test   .env.prod )に以下の環境変数を追加

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```

⑦ アプリケーションキーの作成  
$ `docker-compose exec php bash`

$ `php artisan key:generate`

⑥ マイグレーションの実行  
$ `docker-compose exec php bash`

$ `php artisan migrate`

⑨ シーディングの実行 
$ `docker-compose exec php bash`

$ `php artisan db:seed`

シーダーで作成するデータ
   １.users
     管理者          admin@gmail.com
     店舗管理者会員   19ユーザを登録
                    shop0001@gmail.comから  shop0019@gmail.com
     一般会員        17ユーザを登録
                   ログインID（メールアドレス）
                   aa@gmail.com
                   bb@gmail.com
                   cc@gmail.com
                       ・
                       ・
                       ・


      ログイン初期パスワードは全て password

  　2.shops
     店舗管理者会員　と連動連動して19店舗を登録
    
    ３.areas
      全国都道府県を登録
    4.genres
      1 イタリアン
      2 ラーメン
      3 居酒屋
      4 寿司
      5 焼肉


