<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ham_menu.css') }}">
    @yield('css')
</head>

<body>
    <div class="container_box">
        <header class="header_band">
            <div class="header_band_box">
                <div class="hamburger-menu">
                    <input type="checkbox" id="menu-btn-check">
                    <label for="menu-btn-check" class="menu-btn"><span></span></label>
                    <div class="header_box">
                        <a class="header_comp-logo" href="">
                            Rese
                        </a>
                    </div>
                    <!--ここからメニュー-->
                    <div class="menu-content">
                        <ul>
                            @if (Auth::check() && Auth::user()->hasVerifiedEmail())
                            @if (Auth::user()->role === 'user')
                            <li>
                                <form class="form" action="/" method="get">
                                    @csrf
                                    <button class="menu-content_button">Home</button>
                                </form>
                            </li>
                            <li>
                                <form class="form" action="/logout" method="post">
                                    @csrf
                                    <button class="menu-content_button">Logout</button>
                                </form>
                            </li>
                            <li>
                                <form class="form" action="/my_page" method="get">
                                    @csrf
                                    <button class="menu-content_button">Mypage</button>
                                </form>
                            </li>
                            @endif
                            @if (Auth::user()->role === 'admin')
                            <li>
                                <form class="form" action="/" method="get">
                                    @csrf
                                    <button class="menu-content_button">Home</button>
                                </form>
                            </li>
                            <li>
                                <form class="form" action="/logout" method="post">
                                    @csrf
                                    <button class="menu-content_button">Logout</button>
                                </form>
                            </li>
                            <li>
                                <form class="form" action="/shop_admin_register" method="get">
                                    @csrf
                                    <button class="menu-content_button">ShopManager-Registration</button>
                                </form>
                            </li>
                            @endif
                            @if (Auth::user()->role === 'shop-admin')
                            <li>
                                <form class="form" action="/" method="get">
                                    @csrf
                                    <button class="menu-content_button">Home</button>
                                </form>
                            </li>
                            <li>
                                <form class="form" action="/logout" method="post">
                                    @csrf
                                    <button class="menu-content_button">Logout</button>
                                </form>
                            </li>
                            @if (Auth::user()->shop_id !== null)
                            <li>
                                <form class="form" action="/shop_edit" method="get">
                                    @csrf
                                    <button class="menu-content_button">ShopContents-Edit</button>
                                </form>
                            </li>
                            <li>
                                <form class="form" action="/email_form" method="get">
                                    @csrf
                                    <button class="menu-content_button">Notice-Email</button>
                                </form>
                            </li>
                            <li>
                                <form class="form" action="/shop_reserve" method="get">
                                    @csrf
                                    <button class="menu-content_button">Reservation-Info</button>
                                </form>
                            </li>
                            @else
                            <li>
                                <form class="form" action="/shop_new" method="get">
                                    @csrf
                                    <button class="menu-content_button">ShopContents-New</button>
                                </form>
                            </li>
                            @endif
                            @endif

                            @else
                            <li>
                                <form class="form" action="/" method="get">
                                    @csrf
                                    <button class="menu-content_button">Home</button>
                                </form>
                            </li>
                            <li>
                                <form class="form" action="/register" method="get">
                                    @csrf
                                    <button class="menu-content_button">Registration</button>
                                </form>
                            </li>
                            <li>
                                <form class="form" action="/login" method="get">
                                    @csrf
                                    <button class="menu-content_button">Login</button>
                                </form>
                            </li>
                            @endif
                        </ul>
                    </div>
                    <!--ここまでメニュー-->
                </div>
            </div>
        </header>


        <main>
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            @yield('content')
        </main>


        <footer class="footer">
            <div class="footer__inner">
                <div class="footer-utilities">
                    <a class="footer__logo" href="/">
                        <small>&copy; since2023 Rese,inc.</small>
                    </a>
                </div>
            </div>
        </footer>

    </div>
</body>

</html>