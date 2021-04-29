<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Title  -->
        <title>Threads Mania | Home</title>

        <!-- Favicon  -->
        <link rel="icon" href="{{ asset('client/img/core-img/logo2.png') }}">

        <!-- Core Style CSS -->
        <link rel="stylesheet" href="{{ asset('client/css/core-style.css') }}">
        <link rel="stylesheet" href="{{ asset('client/style.css') }}">
    </head>
    <body>
        <!-- Search Wrapper Area Start -->
        <div class="search-wrapper section-padding-100">
            <div class="search-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="search-content">
                            <form action="{{route('product.index')}}" method="get">
                                <input type="search" name="search_key" id="search" placeholder="Type your keyword...">
                                <input name="title" value="Search Results" hidden>
                                <button type="submit"><img src="{{ asset('client/img/core-img/search.png')}}" alt=""></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Wrapper Area End -->

        <!-- ##### Main Content Wrapper Start ##### -->
        <div class="main-content-wrapper d-flex clearfix">

            <!-- Mobile Nav (max width 767px)-->
            <div class="mobile-nav">
                <!-- Navbar Brand -->
                <div class="amado-navbar-brand">
                    <a href="/"><img src="{{asset('client/img/core-img/logo.png')}}" alt=""></a>
                </div>
                <!-- Navbar Toggler -->
                <div class="amado-navbar-toggler">
                    <span></span><span></span><span></span>
                </div>
            </div>

            <!-- Header Area Start -->
            <header class="header-area clearfix">
                <!-- Close Icon -->
                <div class="nav-close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </div>
                <!-- Logo -->
                <div class="logo">
                    <a href="/"><img src="{{asset('client/img/core-img/logo.png')}}" alt=""></a>
                </div>
                <!-- Amado Nav -->
                <nav class="amado-nav">
                    <ul>
                        @auth
                            <li>
                                <p class="avaibility"><i class="fa fa-circle" style="color: #67D54B"></i> Welcome {{auth()->user()->name}}</p>
                            </li>
                        <hr>
                        @endauth
                        <li class="{{request()->is('/') ? 'nav-item active' : 'nav-item'}}">
                            <a href="/">
                                <img src="{{asset('client/img/core-img/home.png')}}" alt="" class="nav-icons">Home
                            </a>
                        </li>
                        <li class="{{ request()->is('shop') ? 'nav-item active' : 'nav-item' }}">
                            <a href="/shop">
                                <img src="{{asset('client/img/core-img/shop.png')}}" alt="" class="nav-icons">Shop
                            </a>
                        </li>
                        <li class="{{ request()->is('cart') ? 'nav-item active' : 'nav-item' }}">
                            <a href="/cart" class="cart-nav">
                                <img src="{{asset('client/img/core-img/cart.png')}}" alt="" class="nav-icons"> Cart <span>({{Gloudemans\Shoppingcart\Facades\Cart::count()}})</span>
                            </a>
                        </li>
                        @auth
                            <li class="{{ request()->is('favorites') ? 'nav-item active' : 'nav-item'}}">
                                <a href="{{route('product.index' ,['order_by' =>'favourites' , 'title'=> 'Favourite'])}}" class="fav-nav">
                                    <img src="{{asset('client/img/core-img/favorites.png')}}" alt="" class="nav-icons">
                                    Favourite
                                </a>
                            </li>
                        @endauth
                        <li class="{{ request()->is('best-sellers') ? 'nav-item active' : 'nav-item' }}">
                            <a href="{{route('product.index' ,['order_by' =>'popularity' , 'title'=> 'Best Sellers'])}}">
                                <img src="{{asset('client/img/core-img/best-sellers.pn')}}g" alt="" class="nav-icons">
                                Best Sellers
                            </a>
                        </li>
                        <li>
                            <a href="#" class="search-nav">
                                <img src="{{asset('client/img/core-img/search.png')}}" alt="" class="nav-icons">Search
                            </a>
                        </li>
                        @auth
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16" style="color: #BBBBBB">
                                        <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                                        <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/>
                                    </svg>
                                    <span class="ml-2">
                                        {{ __('Logout') }}
                                    </span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}" \>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16" style="color: #BBBBBB">
                                        <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                                        <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/>
                                    </svg>
                                    <span class="ml-2">
                                        {{ __('Login') }}
                                    </span>
                                </a>
                            </li>
                        @endauth
                    </ul>
                </nav>
                <!-- Button Group -->
                <!-- <div class="amado-btn-group mt-30 mb-100">
                <a href="#" class="btn amado-btn mb-15">%Discount%</a>
                <a href="#" class="btn amado-btn active">New this week</a>
            </div> -->
                <!-- Cart Menu -->
                <!-- <div class="cart-fav-search mb-100">
                <a href="cart.html" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Cart <span>(0)</span></a>
                <a href="#" class="fav-nav"><img src="img/core-img/favorites.png" alt=""> Favourite</a>
                <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Search</a>
            </div> -->
                <!-- Social Button -->
                <hr />
                <div class="social-info d-flex justify-content-between mt-3">
                    <a href="https://www.pinterest.com/pin/381820874665311068/"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    <a href="https://www.instagram.com/threads_mania/?hl=en"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href="https://www.facebook.com/ThreadsMania/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                </div>
            </header>
            <!-- Header Area End -->
            @yield('content')
        </div>
        <!-- ##### Main Content Wrapper End ##### -->

        <!-- ##### Newsletter Area Start ##### -->
        <!-- <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center"> -->
        <!-- Newsletter Text -->
        <!-- <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2>Subscribe for a <span>25% Discount</span></h2>
                        <p>Nulla ac convallis lorem, eget euismod nisl. Donec in libero sit amet mi vulputate consectetur. Donec auctor interdum purus, ac finibus massa bibendum nec.</p>
                    </div>
                </div> -->
        <!-- Newsletter Form -->
        <!-- <div class="col-12 col-lg-6 col-xl-5">
                    <div class="newsletter-form mb-100">
                        <form action="#" method="post">
                            <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
        <!-- ##### Newsletter Area End ##### -->

        <!-- ##### Footer Area Start ##### -->
        <footer class="footer_area clearfix">
            <div class="container">
                <div class="row align-items-center ">
                    <!-- Single Widget Area -->
                    <div class="col-12 col-lg-4">
                        <div class="single_widget_area text-center">
                            <!-- Logo -->
                            <div class="footer-logo">
                                <a href="/"><img src="{{asset('client/img/core-img/logo2.png')}}" alt="" width="150px"></a>
                            </div>
                            <!-- Copywrite Text -->
                            <p class="copywrite">
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());

                                </script> All rights reserved
                            </p>
                        </div>
                    </div>
                    <!-- Single Widget Area -->
                    <div class="col-12 col-lg-8">
                        <div class="single_widget_area">
                            <!-- Footer Menu -->
                            <div class="footer_menu">
                                <nav class="navbar navbar-expand-lg justify-content-end">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#footerNavContent" aria-controls="footerNavContent"
                                        aria-expanded="false" aria-label="Toggle navigation"><i
                                            class="fa fa-bars"></i></button>
                                    <div class="collapse navbar-collapse" id="footerNavContent">
                                        <ul class="navbar-nav ml-auto">
                                            <li class="{{ request()->is('/') ? 'nav-item active' : 'nav-item' }}">
                                                <a class="nav-link" href="/">Home</a>
                                            </li>
                                            <li class="{{ request()->is('/shop') ? 'nav-item active' : 'nav-item' }}">
                                                <a class="nav-link" href="/shop">Shop</a>
                                            </li>
                                            <li class="{{ request()->is('/') ? 'nav-item active' : 'nav-item' }}">
                                                <a class="nav-link" href="product-details.html">Product</a>
                                            </li>
                                            <li class="{{ request()->is('/cart') ? 'nav-item active' : 'nav-item' }}">
                                                <a class="nav-link" href="cart.html">Cart</a>
                                            </li>
                                            <li class="{{ request()->is('/') ? 'nav-item active' : 'nav-item' }}">
                                                <a class="nav-link" href="checkout.html">Checkout</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ##### Footer Area End ##### -->

        <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
        <script src="{{ asset('client/js/jquery/jquery-2.2.4.min.js') }}"></script>
        <!-- Popper js -->
        <script src="{{ asset('client/js/popper.min.js') }}"></script>
        <!-- Bootstrap js -->
        <script src="{{ asset('client/js/bootstrap.min.js') }}"></script>
        <!-- Plugins js -->
        <script src="{{ asset('client/js/plugins.js') }}"></script>
        <!-- Active js -->
        <script src="{{ asset('client/js/active.js') }}"></script>

    </body>

</html>
