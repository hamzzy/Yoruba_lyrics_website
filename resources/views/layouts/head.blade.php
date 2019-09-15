<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Yoruba Lyrics</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">

</head>
<style>
    body{
        font-family: Roboto;
    }
</style>
<body>
<!-- Preloader -->
<div class="preloader d-flex align-items-center justify-content-center">
    <div class="lds-ellipsis">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ##### Header Area Start ##### -->
<header class="header-area navbar-dark">
    <!-- Navbar Area -->
    <div class="oneMusic-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                    <!-- Nav brand -->
                    <a href="{{ route('index') }}" class="nav-brand"><h1>YL</h1></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>

                                <li><a href="{{ route('lyrics') }}">Albums</a></li>


                            </ul>

                            <ul>
                                @guest
                                    <li>
                                        <a  href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li >
                                            <a  href="{{ route('register') }}"><i class="fa fa-address-book" aria-hidden="true"></i> Register</a>
                                        </li>
                                    @endif
                                @else
                                    <li ><a href="{{ route('Addly') }}">Add Song</a></li>
                                    <li >
                                        <a href="#"> {{ Auth::user()->name }} </a>

                                        <ul class="dropdown">

                                            <li>
                                                <a href="{{ route('home') }}">
                                                    Dashboard
                                                </a>
                                            </li>
                                            <li>
                                                <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </li>


                                @endguest
                            </ul>

                        </div>
                        <!-- Nav End -->

                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->


@yield('content')


<footer class="footer-area">
    <div class="container">
        <div class="row d-flex flex-wrap align-items-center">
            <div class="col-12 col-md-6">
                <a href="#"><p>YL</p></a>
                <p class="copywrite-text"> YorubaLyrics<a href="#">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> reserved <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="hamzzy.pythonanywhere.com" target="_blank"> YorubaLyrics</a></a>

            </div>


            <div class="col-12 col-md-6">
                <div class="footer-nav">
                    <ul>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">Twitter</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ##### Footer Area Start ##### -->

<!-- ##### All Javascript Script ##### -->
<!-- jQuery-2.2.4 js -->

<script src="{{ asset('js/app.js')}}"></script>
<script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
<!-- Popper js -->
<script src="{{ asset('js/bootstrap/popper.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
<!-- All Plugins js -->
<script src="{{ asset('js/plugins/plugins.js') }}"></script>

<!-- Active js -->
<script src="{{ asset('js/active.js') }}"></script>

</body>

</html>