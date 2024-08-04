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
                    <!--ここからメニュー-->
                    <div class="menu-content">
                        <ul>
                            @if (Auth::check() && Auth::user()->hasVerifiedEmail())
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

                    <div class="header_box">
                        <a class="header_comp-logo" href="">
                            Rese
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <main>
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