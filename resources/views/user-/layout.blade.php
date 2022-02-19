<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ url('user/images/favicon.png') }}">
    <title>
        Welcome to FlatShop
    </title>
    <link href="{{ url('user/css/bootstrap.css') }}" rel="stylesheet">
    <link
        href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,500italic,100italic,100'
        rel='stylesheet' type='text/css'>
    <link href="{{ url('user/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('user/css/flexslider.css') }}" type="text/css" media="screen" />
    <link href="{{ url('user/css/style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="{{ url('css/user/index.css') }}" rel="stylesheet">
    <style>
        .d-flex {
            display: flex;
        }
    </style>
    @yield('css')
</head>

<body>
    <div class="wrapper" x-data="userIndex">
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-2">
                        <div class="logo">
                            <a href="{{ route('getHomeIndex') }}">
                                {{-- <img src="{{ url('user/images/logo.png') }}" alt="FlatShop"> --}}
                                <img src="{{ url('css/frontend-css/img_psd/logo-market.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-10">
                        <div class="header_top">
                            <div class="row">
                                <div class="col-md-3">
                                    <ul class="option_nav">
                                        {{-- <li class="dorpdown">
                                            <a href="#">
                                                Eng
                                            </a>
                                            <ul class="subnav">
                                                <li>
                                                    <a href="#">
                                                        Eng
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Vns
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Fer
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Gem
                                                    </a>
                                                </li>
                                            </ul>
                                        </li> --}}
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    {{-- <ul class="topmenu">
                                        <li>
                                            <a href="#">
                                                About Us
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                News
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                Service
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                Recruiment
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                Media
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                Support
                                            </a>
                                        </li>
                                    </ul> --}}
                                </div>
                                <div class="col-md-3">
                                    <ul class="usermenu">
                                        @if (Auth::check())
                                            <li class="name-user">
                                                <a href="{{ route('login') }}" class="log">
                                                    {{ Auth::user()->email }}
                                                </a>
                                                <ul class="option-cart-item user-info">
                                                        <li>
                                                            <a href="{{ route('userTransfer') }}">Order history</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('userLogout') }}">Logout</a>
                                                        </li>
                                                </ul>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ route('login') }}" class="log">
                                                    Login
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('register') }}" class="reg">
                                                    Register
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix">
                        </div>
                        <div class="header_bottom">
                            <ul style="" class="option d-flex justify-content-end">
                                <li id="search" class="search">
                                    <form method="get" action="{{ route('searchProduct') }}">
                                        @csrf
                                        <div class="d-flex flex-row-reverse">
                                            <input type="text" name="product_name" style="margin-right: 10px; width: 500px;">
                                            <input class="search-submit" type="submit" value="">
                                        </div>
                                        <input class="search-input" placeholder="Enter your search term..."
                                            type="text" value="" name="search">
                                    </form>
                                </li>
                                <li class="option-cart">
                                    <a href="{{ route('userGetCart') }}" class="cart-icon">
                                        cart
                                        <span class="cart_no" x-text="lengthCart">
                                        </span>
                                    </a>
                                    <ul class="option-cart-item">
                                        <template x-for="(item, itemIndex) in cartProducts">
                                            <li x-show="itemIndex < 3">
                                                <div class="cart-item">
                                                    <div class="image">
                                                        <a :href="'home-user/detail/' + item.product.id">
                                                            <img :src="'profile_images/' + item.product.prod_img"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                    <div class="item-description">
                                                        <p class="name" x-text="item.product.prod_name">
                                                        </p>
                                                        <p>
                                                            Size:
                                                            <span class="light-red">
                                                                One size
                                                            </span>
                                                            <br>
                                                            Quantity:
                                                            <span class="light-red" x-text="item.quantity">
                                                            </span>
                                                        </p>
                                                    </div>
                                                    <div class="right">
                                                        <p class="price" x-text="item.total_price">
                                                            $30.00
                                                        </p>
                                                        <a href="#" @click.prevent="removeCart(item.id)"
                                                            class="remove">
                                                            <img src="{{ url('user/images/remove.png') }}"
                                                                alt="remove">
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        </template>
                                        <li>
                                            <span class="total">
                                                Total
                                                <strong x-text="subTotal">
                                                    $60.00
                                                </strong>
                                            </span>
                                            <button class="checkout">
                                                <a href="{{ route('userGetCart') }}">
                                                    My Cart
                                                </a>
                                            </button>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target=".navbar-collapse">
                                    <span class="sr-only">
                                        Toggle navigation
                                    </span>
                                    <span class="icon-bar">
                                    </span>
                                    <span class="icon-bar">
                                    </span>
                                    <span class="icon-bar">
                                    </span>
                                </button>
                            </div>
                            <div class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li class="layout-menu layout-home">
                                        <a href="{{ route('getHomeIndex') }}">
                                            Home
                                        </a>
                                        {{-- <div class="dropdown-menu">
                                            <ul class="mega-menu-links">
                                                <li>
                                                    <a href="index.html">
                                                        home
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="home2.html">
                                                        home2
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="home3.html">
                                                        home3
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="productlitst.html">
                                                        Productlitst
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="productgird.html">
                                                        Productgird
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="details.html">
                                                        Details
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="cart.html">
                                                        Cart
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="checkout.html">
                                                        CheckOut
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="checkout2.html">
                                                        CheckOut2
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="contact.html">
                                                        contact
                                                    </a>
                                                </li>
                                            </ul>
                                        </div> --}}
                                    </li>
                                    <li class="layout-menu layout-coupon">
                                        <a href="{{ route('userCoupon') }}">
                                            gift
                                        </a>
                                    </li>
                                    <li class="layout-menu layout-contact">
                                        <a href="{{ route('userContact') }}">
                                            contact us
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix">
        </div>
        <div class="container_fullwidth">
            <div class="container">
                @yield('content')
                <div class="clearfix">
                </div>
            </div>
        </div>
        <div class="clearfix">
        </div>
        <div class="footer">
            <div class="footer-info">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="footer-logo">
                                <a href="{{ route('getHomeIndex') }}">
                                    {{-- <img src="{{ url('user/images/logo.png') }}" alt=""> --}}
                                    <img src="{{ url('css/frontend-css/img_psd/logo-market.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <h4 class="title">
                                Contact
                                <strong>
                                    Info
                                </strong>
                            </h4>
                            <p>
                                Tran Phu, Nguyen Trai, Hanoi , Vietnam
                            </p>
                            <p>
                                Call Us : (084) 1900 1008
                            </p>
                            <p>
                                Email : hau@hanoi.us
                            </p>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <h4 class="title">
                                Customer
                                <strong>
                                    Support
                                </strong>
                            </h4>
                            <ul class="support">
                                <li>
                                    <a href="#">
                                        FAQ
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Payment Option
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Booking Tips
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Infomation
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h4 class="title">
                                Contact
                                <strong>
                                    Us
                                </strong>
                            </h4>
                            <p>
                                Lorem ipsum dolor ipsum dolor.
                            </p>
                            {{-- <form class="newsletter">
                                <input type="text" name="" placeholder="Type your email....">
                                <input type="submit" value="SignUp" class="button">
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-info">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <p>
                                Copyright © 2022. Designed by
                                <a href="#">
                                    HAU
                                </a>
                                . All rights reseved
                            </p>
                        </div>
                        <div class="col-md-6">
                            <ul class="social-icon">
                                <li>
                                    <a href="#" class="linkedin">
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="google-plus">
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="twitter">
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="facebook">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ url('user/js/jquery-1.10.2.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ url('user/js/jquery.easing.1.3.js') }}">
    </script>
    <script type="text/javascript" src="{{ url('user/js/bootstrap.min.js') }}">
    </script>
    <script defer src="{{ url('user/js/jquery.flexslider.js') }}">
    </script>
    <script type="text/javascript" src="{{ url('user/js/jquery.sequence-min.js') }}">
    </script>
    <script type="text/javascript" src="{{ url('user/js/jquery.carouFredSel-6.2.1-packed.js') }}">
    </script>
    <script type="text/javascript" src="{{ url('user/js/script.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ url('/js/app.js') }}" defer></script>
    @yield('js')
</body>

</html>
