<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') | Nghiakun.online</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/images/2.png') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/animate.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/test.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/chosen.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/test2.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/color-01.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/login.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/responsive.css') }}" />
</head>
<style>
    .modal {
        top: 20% !important;
    }

    .login-btn {
        cursor: pointer;
    }

    .back-to-top {
        position: fixed;
        bottom: 20px;
        right: 29px;
        display: none;
        width: 67px;
        height: 60px;
        z-index: 9999;
        cursor: pointer;
        display: block;
        background: #00483d;
        opacity: 2.5;
        border-radius: 8px;
    }


    .back-to-top i {
        font-size: 40px;
        color: #fff;
        text-align: center;
    }

    .list_hover:hover a {
        background-color: #2e9ed5;
        color: rgb(241, 226, 226) !important;
        font-weight: 400 !important;
        cursor: pointer;
    }

    .list_hover a:hover {
        color: rgb(241, 226, 226) !important;
        font-weight: 400 !important;
    }

    .list_hover:hover {
        background-color: #2e9ed5;
        color: rgb(241, 226, 226) !important;
        font-weight: 400 !important;
        cursor: pointer;
    }

    .bg-nha {
        background-color: rgb(26, 148, 255);
    }

    .wrap-list-cate {
        position: absolute;
        top: 6px;
        right: 23px;
        width: 125px;
        height: 35px;
        border: none;
        outline: none;
        background: none !important;
    }

    .wrap-list-cate i {
        font-size: 27px;
        text-align: center;
    }
</style>

<body class="home-page home-01">
    <div>
        <div id="login" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times text-danger"
                                aria-hidden="true"></i></button>
                        <h4 class="modal-title">Đăng nhập</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('client.login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email hoặc số điện thoại:</label>
                                <input type="text" class="form-control" name="email" id="email">
                            </div>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif

                            <div class="form-group">
                                <label for="password">Mật khẩu:</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif

                            <div class=" pull-right">
                                <label><a href="{{ route('forget.password.get') }}" style="color: #2e9ed5;">Quên mật
                                        khẩu?</a></label>
                            </div>
                            <button type="submit" class="btn btn-login">Đăng nhập</button>
                        </form>
                        <div>
                            <p class="no-account">Bạn chưa có tài khoản? <a data-target="#register"
                                    data-toggle="modal">Đăng ký</a></p>

                            <div class="social">
                                <p class="social-heading">
                                    <span>Hoặc đăng nhập bằng</span>
                                </p>
                                <ul class="social__items">
                                    <li class="social__item">
                                        <a href="#"><img src="{{ asset('images/fb.png') }}" alt=""></a>
                                    </li>
                                    <li class="social__item">
                                        <a href="{{ route('client.login.google') }}"><img
                                                src="{{ asset('images/gg.png') }}" alt=""></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div id="register" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><i
                                class="fa fa-times text-danger" aria-hidden="true"></i></button>
                        <h4 class="modal-title">Đăng ký thành viên</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('client.register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Họ và tên:</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                            <div class="form-group">
                                <label for="email2">Email</label>
                                <input type="email" class="form-control" name="email" id="email2">
                            </div>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                            <div class="form-group">
                                <label for="phone">Số điện thoại:</label>
                                <input type="text" class="form-control" name="phone" id="phone">
                            </div>
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                            <div class="form-group">
                                <label for="password2">Mật khẩu:</label>
                                <input type="password" class="form-control" name="password" id="password2">
                            </div>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                            <div class="form-group">
                                <label for="confirmed">Nhập lại mật khẩu:</label>
                                <input type="password" class="form-control" name="confirmed" id="confirmed">
                            </div>
                            @if ($errors->has('confirmed'))
                                <span class="text-danger">{{ $errors->first('confirmed') }}</span>
                            @endif
                            <div class="form-group">
                                <label for="address">Địa chỉ:</label>
                                <input type="text" class="form-control" name="address" id="address">
                            </div>
                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                            <div>
                                <button type="submit" class="btn btn-success">Đăng ký</button>
                            </div>
                        </form>
                        <div>
                            <div class="social">
                                <p class="social-heading">
                                    <span>Hoặc đăng nhập bằng</span>
                                </p>
                                <ul class="social__items">
                                    {{-- <li class="social__item">
                                        <a href="#"><img src="{{ asset('images/fb.png') }}"
                                                alt=""></a>
                                    </li> --}}
                                    <li class="social__item">
                                        <a href="{{ route('client.login.google') }}"><img
                                                src="{{ asset('images/gg.png') }}" alt=""></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>
    <header id="header" class="header header-style-1">
        <div class="container-fluid">
            <div class="row">
                <div class="topbar-menu-area">
                    <div class="container">
                        <div class="topbar-menu left-menu">
                            <ul>
                                <li class="menu-item">
                                    <a title="Hotline: 0776585055" href="#" style="color: #fff "><span
                                            class="icon label-before fa fa-mobile" style="color: #fff"></span>Hotline:
                                        0776585055</a>
                                </li>
                            </ul>
                        </div>
                        <div class="topbar-menu right-menu">
                            <ul>
                                <li class="menu-item"><a href="{{ route('client.product.watched') }}"
                                        style="color: #fff" title="Sản phẩm đã xem">Sản phẩm đã
                                        xem</a>
                                </li>
                                @if (Session::get('user'))
                                    <li class="menu-item" style="color: #fff">Chào :
                                        {{ Session::get('user')->name }}</li>
                                    <li class="menu-item menu-item-has-children parent">
                                        <a title="Tài khoản" href="#" style="color: #fff">Tài khoản<i
                                                class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul class="submenu curency">
                                            <li class="menu-item list_hover">
                                                <a title="Tài khoản của tôi"
                                                    href="{{ route('client.user.index') }}">Tài khoản
                                                    của tôi</a>
                                            </li>
                                            <li class="menu-item list_hover">
                                                <a title="Đơn hàng" href="{{ route('client.order') }}">Đơn hàng</a>
                                            </li>
                                            <li class="menu-item list_hover">
                                                <a title="Danh sách yêu thích"
                                                    href="{{ route('client.wishlist') }}">Danh
                                                    sách
                                                    yêu thích</a>
                                            </li>
                                            <li class="menu-item list_hover">
                                                <a title="Mã giảm giá" href="#">Mã giảm giá</a>
                                            </li>
                                            <li class="menu-item list_hover">
                                                <a title="Danh sách địa chỉ" href="#">Danh sách
                                                    địa chỉ</a>
                                            </li>

                                            <li class="menu-item list_hover">
                                                <a href="{{ route('client.logout') }}">Đăng xuất</a>
                                            </li>
                                        </ul>
                                    </li>
                                @else
                                    <li class="menu-item"><a style="color: #fff" title="Đăng nhập"
                                            data-toggle="modal" class="login-btn" data-target="#login">Đăng
                                            nhập</a></li>
                                    <li class="menu-item"><a style="color: #fff" title="Đăng ký" data-toggle="modal"
                                            class="login-btn" data-target="#register">Đăng
                                            ký</a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="container ">
                    <div id="navSocial">
                        <div class="social-banner">
                            <ul>
                                <li><a href="https://facebook.com/nghiakun1012" title="" target="_blank"
                                        class="blue"><span>
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </span></a></li>
                                <li><a href="https://www.youtube.com/@nghiakun1012" title="" target="_blank"
                                        class="red"><span>
                                            <i class="fa fa-youtube" aria-hidden="true"></i>
                                        </span></a></li>
                                {{-- <li><a href="" title="" target="_blank" class="rainbow"><span>
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                        </span></a></li> --}}
                                {{-- <li><a href="" title="Tiktok" target="_blank" class="black"><span>
                                            <i class="fa fa-tiktok" aria-hidden="true"></i>
                                        </span></a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="mid-section main-info-area">
                        <div class="wrap-logo-top left-section">
                            <a href="{{ route('client.home') }}" class="link-to-home"><img
                                    src="{{ asset('/images/2.png') }}" alt="mercado" /></a>
                        </div>

                        <div class="wrap-search center-section">
                            <div class="wrap-search-form">
                                <form action="{{ route('client.search') }}" id="form-search-top"
                                    name="form-search-top" method="GET">
                                    <input type="text" name="search" class="search_input" id="output"
                                        placeholder="Tìm kiếm ..." title="Tìm kiếm bằng văn bản">
                                    <button id="button-search-top" type="submit">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>

                                    <a href="#" class="wrap-list-cate2" style="display: block"
                                        onclick="runSpeechRecognition()"><i class="fa fa-microphone"
                                            aria-hidden="true"></i></a>
                                </form>
                                <div class="autocomplete-suggestions" style="">
                                </div>
                            </div>

                        </div>
                        <div class="wrap-icon right-section">
                            <div class="wrap-icon-section wishlist">
                                <a id="btnCheckOrder" href="#">
                                    <span class="icon">
                                        <i class="fa fa-truck icon_truck" aria-hidden="true"></i>
                                    </span>
                                    <span class="text">Kiểm tra đơn hàng</span>
                                </a>
                            </div>
                            <div class="wrap-icon-section minicart">
                                <a href="{{ route('client.cart') }}" class="link-direction cart-cart">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <div class="left-info">
                                        <span class="index">{{ $cartItem }} sp</span>
                                        <span class="title">Giỏ hàng</span>
                                    </div>
                                </a>

                            </div>

                            <div class="wrap-icon-section show-up-after-1024">
                                <a href="#" class="mobile-navigation">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav-section header-sticky">
                <nav style="z-index: 1000;" id="nav-scroll">
                    <div class="container">
                        <ul class="root clone-main-menu" data-menuname="Danh mục" id="mercado_main">
                            @foreach ($categoriesGlobal as $category)
                                <li class="menu-item {{ request()->is($category->c_slug . '*') ? 'actived' : '' }}">
                                    <a href="{{ route('client.category', $category->c_slug) }}" target="_self">
                                        <span class="icon-category">{{ $category->c_name }}</span>
                                    </a>
                                    <div class="sub-container">
                                        <div class="sub">
                                            <div class="menu g1">
                                                @if (count($category->parent) == 0)
                                                    <h4><a href="{{ $category->c_slug }}">Hãng sản xuất
                                                        </a></h4>
                                                    <ul class="display-column format_3">
                                                        @foreach ($category->brand as $brand)
                                                            <li><a
                                                                    href="{{ route('client.brand', [
                                                                        'slug' => $category->c_slug,
                                                                        'brand' => $brand->b_slug,
                                                                    ]) }}">{{ $brand->b_name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                                <ul class="display-row format_1">
                                                    @foreach ($category->parent as $brand)
                                                        <h4><a
                                                                href="{{ route('client.category', $brand->c_slug) }}">{{ $brand->c_name }}</a>
                                                        </h4>
                                                        @foreach ($brand->brand as $value)
                                                            <li><a
                                                                    href="{{ route('client.brand', [
                                                                        'slug' => $brand->c_slug,
                                                                        'brand' => $value->b_slug,
                                                                    ]) }}">{{ $value->b_name }}</a>
                                                            </li>
                                                        @endforeach
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="menu g2">
                                                <h4><a href="#">Mức giá</a></h4>
                                                <ul class="display-row format_2">
                                                    <li><a
                                                            href=" {{ '../' . $category->c_slug . '?gia_tu=0&gia_den=3000000' }}">
                                                            Dưới 3 triệu
                                                            <i class="total"></i></a>
                                                    </li>
                                                    <li><a
                                                            href="{{ '../' . $category->c_slug . '?gia_tu=3000000&gia_den=5000000' }}">
                                                            Từ 3 triệu - 5 triệu
                                                            <i class="total"></i></a></li>
                                                    <li><a
                                                            href="{{ '../' . $category->c_slug . '?gia_tu=5000000&gia_den=7000000' }}">
                                                            Từ 5 triệu - 7 triệu
                                                            <i class="total"></i></a></li>
                                                    <li><a
                                                            href="{{ '../' . $category->c_slug . '?gia_tu=7000000&gia_den=10000000' }}">
                                                            Từ 7 triệu - 10 triệu
                                                            <i class="total"></i></a></li>
                                                    <li><a
                                                            href="{{ '../' . $category->c_slug . '?gia_tu=10000000&gia_den=15000000' }}">
                                                            Từ 10 triệu - 15 triệu
                                                            <i class="total"></i></a></li>
                                                    <li><a
                                                            href="{{ '../' . $category->c_slug . '?gia_tu=15000000&gia_den=20000000' }}">
                                                            Từ 15 triệu - 20 triệu
                                                            <i class="total"></i></a></li>
                                                    <li><a
                                                            href="{{ '../' . $category->c_slug . '?gia_tu=20000000&gia_den=50000000' }}">
                                                            Từ 20 triệu - 50 triệu
                                                            <i class="total"></i></a></li>
                                                    <li><a
                                                            href="{{ '../' . $category->c_slug . '?gia_tu=50000000&gia_den=100000000' }}">
                                                            Từ 50 triệu - 100 triệu
                                                            <i class="total"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="menu g3">
                                                <h4><a>Quan tâm nhất</a></h4>
                                                <ul class="display-row format_2">
                                                    <li><a href="#">Hôm
                                                            nay</a></li>
                                                    <li><a href="#">Tuần
                                                            này</a></li>
                                                    <li><a href="#">Tháng
                                                            này</a></li>
                                                    <li><a href="#">Năm
                                                            nay</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    @yield('content')

    <div>
        <a class="back-to-top btn"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
    </div>
    <footer id="footer">
        <div class="wrap-footer-content footer-style-1">
            <div class="wrap-function-info">
                <div class="container">
                    <ul>
                        <li class="fc-info-item">
                            <i class="fa fa-truck" aria-hidden="true"></i>
                            <div class="wrap-left-info">
                                <h4 class="fc-name">Free Shipping</h4>
                                <p class="fc-desc">Free On Oder Over $99</p>
                            </div>
                        </li>
                        <li class="fc-info-item">
                            <i class="fa fa-recycle" aria-hidden="true"></i>
                            <div class="wrap-left-info">
                                <h4 class="fc-name">Guarantee</h4>
                                <p class="fc-desc">30 Days Money Back</p>
                            </div>
                        </li>
                        <li class="fc-info-item">
                            <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                            <div class="wrap-left-info">
                                <h4 class="fc-name">Safe Payment</h4>
                                <p class="fc-desc">Safe your online payment</p>
                            </div>
                        </li>
                        <li class="fc-info-item">
                            <i class="fa fa-life-ring" aria-hidden="true"></i>
                            <div class="wrap-left-info">
                                <h4 class="fc-name">Online Suport</h4>
                                <p class="fc-desc">We Have Support 24/7</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!--End function info-->

            <div class="main-footer-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <div class="wrap-footer-item">
                                <h3 class="item-header">We Using Safe Payments:</h3>
                                <div class="item-content">
                                    <div class="wrap-list-item wrap-gallery">
                                        <img src="{{ asset('client/assets/images/payment.png') }}"
                                            style="max-width: 260px" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <div class="wrap-footer-item">
                                <h3 class="item-header">Social network</h3>
                                <div class="item-content">
                                    <div class="wrap-list-item social-network">
                                        <ul>
                                            <li>
                                                <a href="#" class="link-to-item" title="twitter"><i
                                                        class="fa fa-twitter" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" class="link-to-item" title="facebook"><i
                                                        class="fa fa-facebook" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" class="link-to-item" title="pinterest"><i
                                                        class="fa fa-pinterest" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" class="link-to-item" title="instagram"><i
                                                        class="fa fa-instagram" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" class="link-to-item" title="vimeo"><i
                                                        class="fa fa-vimeo" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <div class="wrap-footer-item">
                                <h3 class="item-header">Dowload App</h3>
                                <div class="item-content">
                                    <div class="wrap-list-item apps-list">
                                        <ul>
                                            <li>
                                                <a href="#" class="link-to-item"
                                                    title="our application on apple store">
                                                    <figure>
                                                        <img src="{{ asset('client/assets/images/brands/apple-store.png') }}"
                                                            alt="apple store" width="128" height="36" />
                                                    </figure>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="link-to-item"
                                                    title="our application on google play store">
                                                    <figure>
                                                        <img src="{{ asset('client/assets/images/brands/google-play-store.png') }}"
                                                            alt="google play store" width="128" height="36" />
                                                    </figure>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="coppy-right-box">
                <div class="container">
                    <div class="coppy-right-item item-left">
                        <p class="coppy-right-text">Copyright © 2020 Surfside Media. All rights reserved</p>
                    </div>
                    <div class="coppy-right-item item-right">
                        <div class="wrap-nav horizontal-nav">
                            <ul>
                                <li class="menu-item"><a href="about-us.html" class="link-term">About us</a></li>
                                <li class="menu-item"><a href="privacy-policy.html" class="link-term">Privacy
                                        Policy</a></li>
                                <li class="menu-item"><a href="terms-conditions.html" class="link-term">Terms &
                                        Conditions</a></li>
                                <li class="menu-item"><a href="return-policy.html" class="link-term">Return
                                        Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    {{-- <script src="{{ asset('client/assets/js/jquery-ui-1.12.4.minb8ff.js') }}"></script>
    <script src="{{ asset('client/assets/js/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('client/assets/js/test.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery.flexslider.js') }}"></script>
    {{-- <script src="{{ asset('client/assets/js/chosen.jquery.min.js') }}"></script> --}}
    <script src="{{ asset('client/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('client/assets/js/functions.js') }}"></script>
    <script src="{{ asset('client/assets/js/jssor.slider-28.1.0.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script type="text/javascript">
        function jssor_1_slider_init() {

            var jssor_1_SlideshowTransitions = [{
                    $Duration: 800,
                    x: 0.3,
                    $During: {
                        $Left: [0.3, 0.7]
                    },
                    $Easing: {
                        $Left: $Jease$.$InCubic,
                        $Opacity: $Jease$.$Linear
                    },
                    $Opacity: 2
                },
                {
                    $Duration: 800,
                    x: -0.3,
                    $SlideOut: true,
                    $Easing: {
                        $Left: $Jease$.$InCubic,
                        $Opacity: $Jease$.$Linear
                    },
                    $Opacity: 2
                },
                {
                    $Duration: 800,
                    x: -0.3,
                    $During: {
                        $Left: [0.3, 0.7]
                    },
                    $Easing: {
                        $Left: $Jease$.$InCubic,
                        $Opacity: $Jease$.$Linear
                    },
                    $Opacity: 2
                },
                {
                    $Duration: 800,
                    x: 0.3,
                    $SlideOut: true,
                    $Easing: {
                        $Left: $Jease$.$InCubic,
                        $Opacity: $Jease$.$Linear
                    },
                    $Opacity: 2
                },
                {
                    $Duration: 800,
                    y: 0.3,
                    $During: {
                        $Top: [0.3, 0.7]
                    },
                    $Easing: {
                        $Top: $Jease$.$InCubic,
                        $Opacity: $Jease$.$Linear
                    },
                    $Opacity: 2
                },
                {
                    $Duration: 800,
                    y: -0.3,
                    $SlideOut: true,
                    $Easing: {
                        $Top: $Jease$.$InCubic,
                        $Opacity: $Jease$.$Linear
                    },
                    $Opacity: 2
                },
                {
                    $Duration: 800,
                    y: -0.3,
                    $During: {
                        $Top: [0.3, 0.7]
                    },
                    $Easing: {
                        $Top: $Jease$.$InCubic,
                        $Opacity: $Jease$.$Linear
                    },
                    $Opacity: 2
                },
                {
                    $Duration: 800,
                    y: 0.3,
                    $SlideOut: true,
                    $Easing: {
                        $Top: $Jease$.$InCubic,
                        $Opacity: $Jease$.$Linear
                    },
                    $Opacity: 2
                },
                {
                    $Duration: 800,
                    x: 0.3,
                    $Cols: 2,
                    $During: {
                        $Left: [0.3, 0.7]
                    },
                    $ChessMode: {
                        $Column: 3
                    },
                    $Easing: {
                        $Left: $Jease$.$InCubic,
                        $Opacity: $Jease$.$Linear
                    },
                    $Opacity: 2
                },
                {
                    $Duration: 800,
                    x: 0.3,
                    $Cols: 2,
                    $SlideOut: true,
                    $ChessMode: {
                        $Column: 3
                    },
                    $Easing: {
                        $Left: $Jease$.$InCubic,
                        $Opacity: $Jease$.$Linear
                    },
                    $Opacity: 2
                },
                {
                    $Duration: 800,
                    y: 0.3,
                    $Rows: 2,
                    $During: {
                        $Top: [0.3, 0.7]
                    },
                    $ChessMode: {
                        $Row: 12
                    },
                    $Easing: {
                        $Top: $Jease$.$InCubic,
                        $Opacity: $Jease$.$Linear
                    },
                    $Opacity: 2
                },
                {
                    $Duration: 800,
                    y: 0.3,
                    $Rows: 2,
                    $SlideOut: true,
                    $ChessMode: {
                        $Row: 12
                    },
                    $Easing: {
                        $Top: $Jease$.$InCubic,
                        $Opacity: $Jease$.$Linear
                    },
                    $Opacity: 2
                },
                {
                    $Duration: 800,
                    y: 0.3,
                    $Cols: 2,
                    $During: {
                        $Top: [0.3, 0.7]
                    },
                    $ChessMode: {
                        $Column: 12
                    },
                    $Easing: {
                        $Top: $Jease$.$InCubic,
                        $Opacity: $Jease$.$Linear
                    },
                    $Opacity: 2
                },
                {
                    $Duration: 800,
                    y: -0.3,
                    $Cols: 2,
                    $SlideOut: true,
                    $ChessMode: {
                        $Column: 12
                    },
                    $Easing: {
                        $Top: $Jease$.$InCubic,
                        $Opacity: $Jease$.$Linear
                    },
                    $Opacity: 2
                },
                {
                    $Duration: 800,
                    x: 0.3,
                    $Rows: 2,
                    $During: {
                        $Left: [0.3, 0.7]
                    },
                    $ChessMode: {
                        $Row: 3
                    },
                    $Easing: {
                        $Left: $Jease$.$InCubic,
                        $Opacity: $Jease$.$Linear
                    },
                    $Opacity: 2
                },
                {
                    $Duration: 800,
                    x: -0.3,
                    $Rows: 2,
                    $SlideOut: true,
                    $ChessMode: {
                        $Row: 3
                    },
                    $Easing: {
                        $Left: $Jease$.$InCubic,
                        $Opacity: $Jease$.$Linear
                    },
                    $Opacity: 2
                },
                {
                    $Duration: 800,
                    x: 0.3,
                    y: 0.3,
                    $Cols: 2,
                    $Rows: 2,
                    $During: {
                        $Left: [0.3, 0.7],
                        $Top: [0.3, 0.7]
                    },
                    $ChessMode: {
                        $Column: 3,
                        $Row: 12
                    },
                    $Easing: {
                        $Left: $Jease$.$InCubic,
                        $Top: $Jease$.$InCubic,
                        $Opacity: $Jease$.$Linear
                    },
                    $Opacity: 2
                },
                {
                    $Duration: 800,
                    x: 0.3,
                    y: 0.3,
                    $Cols: 2,
                    $Rows: 2,
                    $During: {
                        $Left: [0.3, 0.7],
                        $Top: [0.3, 0.7]
                    },
                    $SlideOut: true,
                    $ChessMode: {
                        $Column: 3,
                        $Row: 12
                    },
                    $Easing: {
                        $Left: $Jease$.$InCubic,
                        $Top: $Jease$.$InCubic,
                        $Opacity: $Jease$.$Linear
                    },
                    $Opacity: 2
                },
                {
                    $Duration: 800,
                    $Delay: 20,
                    $Clip: 3,
                    $Assembly: 260,
                    $Easing: {
                        $Clip: $Jease$.$InCubic,
                        $Opacity: $Jease$.$Linear
                    },
                    $Opacity: 2
                },
                {
                    $Duration: 800,
                    $Delay: 20,
                    $Clip: 3,
                    $SlideOut: true,
                    $Assembly: 260,
                    $Easing: {
                        $Clip: $Jease$.$OutCubic,
                        $Opacity: $Jease$.$Linear
                    },
                    $Opacity: 2
                },
                {
                    $Duration: 800,
                    $Delay: 20,
                    $Clip: 12,
                    $Assembly: 260,
                    $Easing: {
                        $Clip: $Jease$.$InCubic,
                        $Opacity: $Jease$.$Linear
                    },
                    $Opacity: 2
                },
                {
                    $Duration: 800,
                    $Delay: 20,
                    $Clip: 12,
                    $SlideOut: true,
                    $Assembly: 260,
                    $Easing: {
                        $Clip: $Jease$.$OutCubic,
                        $Opacity: $Jease$.$Linear
                    },
                    $Opacity: 2
                }
            ];

            var jssor_1_options = {
                $AutoPlay: 1,
                $SlideshowOptions: {
                    $Class: $JssorSlideshowRunner$,
                    $Transitions: jssor_1_SlideshowTransitions,
                    $TransitionsOrder: 1
                },
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$
                },
                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,
                    $SpacingX: 5,
                    $SpacingY: 5
                }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                } else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <script type="text/javascript">
        jssor_1_slider_init();
    </script>
    @include('components.toastr')
</body>

</html>
