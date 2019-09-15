<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>YL</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<style>
body{
    font-family: Roboto;
}
</style>
<body >
<!-- Preloader -->
<div class="preloader d-flex align-items-center justify-content-center">
    <div class="lds-ellipsis">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

<div id="app">
<!-- ##### Header Area Start ##### -->
<header class="header-area">
    <!-- Navbar Area -->
    <div class="oneMusic-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between"   style="color: gray;" id="oneMusicNav">

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
                        <div class="classynav" style="color: black">
                            <ul>

                                <li><a href="{{ route('lyrics') }}">Lyrics</a></li>


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
                                    <li class="dropdown">
                                        <a href=""> {{ Auth::user()->name }} </a>


                                          <li>
                                                <a href="{{ route('home') }}">
                                                    Dashboard
                                                </a>
                                          </li>

                                            <li>
                                                <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Logout
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </a>


                                            </li>
                                        </ul>
                                    </li>


                                @endguest


                        </div>
                        <!-- Nav End -->

                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->

<!-- ##### Hero Area Start ##### -->
<br/>
<br/>
<div class="">
   <div class="jumbotron" style="background-image: url('img/bg-img/e6.jpg'); background-repeat: no-repeat;background-size: cover; height:500px; ">
       <div class="container">
                   <div class=" text-center" style="margin-top: 100px; ">
                       <h1 class="text-center" style="color: gray;" >Yoruba Lyrics</h1>
                   </div>
           <div class="row">
               <div class="col-12" style="margin-left: 30px;">
                   <search-component></search-component>
                   </div>
           </div>
   </div>
</div>
<!-- ##### Hero Area End ##### -->



<!-- ##### Buy Now Area Start ##### -->
<section class="oneMusic-buy-now-area has-fluid bg-gray section-padding-100">
    <div class="container-fluid" >
        <div class="row">
            <div class="col-12">
                <div class="section-heading style-2">
                    <p>Latest Lyrics</p>

                </div>
            </div>
        </div>

        <latest></latest>

        <div class="row">
            <div class="col-12">
                <div class="load-more-btn text-center wow fadeInUp" data-wow-delay="300ms">
                    <a href="{{ route('lyrics') }}" class="btn oneMusic-btn">Load More <i class="fa fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Buy Now Area End ##### -->


</div>
<!-- ##### Contact Area End ##### -->
</div>
<!-- ##### Footer Area Start ##### -->
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