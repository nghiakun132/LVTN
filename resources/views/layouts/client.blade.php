<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') | Nghiakun.online</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/images/2.png') }}" />
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
                            <div class="checkbox">
                                <label><input type="checkbox" name="remember"> Ghi nhớ</label>
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
                                    {{-- <li class="social__item">
                                        <a href="#"><img src="{{ asset('images/fb.png') }}" alt=""></a>
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
        <div id="register" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times text-danger"
                                aria-hidden="true"></i></button>
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
                                                <a title="Đơn hàng" href="#">Đơn hàng</a>
                                            </li>
                                            <li class="menu-item list_hover">
                                                <a title="Danh sách yêu thích" href="#">Danh
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
                                <a href="#" class="link-direction cart-cart">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <div class="left-info">
                                        <span class="index">4 items</span>
                                        <span class="title">CART</span>
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
                                <li class="menu-item">
                                    <a href="{{ route('client.category', $category->c_slug) }}" target="_self">
                                        <span class="icon-category"><?php echo $category->c_icon; ?></span>
                                        <span class="icon-category">{{ $category->c_name }}</span>
                                    </a>
                                    <div class="sub-container">
                                        <div class="sub">
                                            <div class="menu g1">
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
                                                <ul class="display-row format_1">
                                                    @foreach ($category->parent as $brand)
                                                        <h4><a
                                                                href="{{ route('client.category', $brand->c_slug) }}">{{ $brand->c_name }}</a>
                                                        </h4>
                                                        @foreach ($brand->brand as $value)
                                                            <li><a
                                                                    href="
                                                                {{ route('client.brand', [
                                                                    'slug' => $brand->c_slug,
                                                                    'brand' => $value->b_slug,
                                                                ]) }}">{{ $value->b_name }}</a>
                                                            </li>
                                                        @endforeach
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="menu g2">
                                                <h4><a href="/dien-thoai-duoi-1-trieu">Mức giá</a></h4>
                                                <ul class="display-row format_2">
                                                    <li><a
                                                            href="/dien-thoai-di-dong?filters={%22price%22:%22T100t%22}&amp;search=true">Trên
                                                            100 triệu</a></li>
                                                    <li><a
                                                            href="/dien-thoai-di-dong?=&amp;filters={&quot;sort&quot;:&quot;10&quot;,&quot;price&quot;:&quot;1t&quot;}">Dưới
                                                            1 triệu</a></li>
                                                    <li><a
                                                            href="/dien-thoai-di-dong?=&amp;filters={&quot;sort&quot;:&quot;10&quot;,&quot;price&quot;:&quot;2t-3t&quot;}">Từ
                                                            2 đến 3 triệu</a></li>
                                                    <li><a
                                                            href="/dien-thoai-di-dong?=&amp;filters={&quot;sort&quot;:&quot;10&quot;,&quot;price&quot;:&quot;3t-4t&quot;}">Từ
                                                            3 đến 4 triệu</a></li>
                                                    <li><a
                                                            href="/dien-thoai-di-dong?=&amp;filters={&quot;price&quot;:&quot;6t-8t&quot;}">Từ
                                                            6 đến 8 triệu</a></li>
                                                    <li><a
                                                            href="/dien-thoai-di-dong?=&amp;filters={&quot;price&quot;:&quot;15t-20t&quot;}">Từ
                                                            15 đến 20 triệu</a></li>
                                                    <li><a
                                                            href="/dien-thoai-di-dong?search=true&amp;filters={%22price%22:%2220t-100tr%22}&amp;search=true">Từ
                                                            20 đến 100 triệu</a></li>
                                                </ul>
                                            </div>
                                            <div class="menu g3">
                                                <h4><a>Quan tâm nhất</a></h4>
                                                <ul class="display-row format_2">
                                                    <li><a
                                                            href="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;6&quot;}">Hôm
                                                            nay</a></li>
                                                    <li><a
                                                            href="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;7&quot;}">Tuần
                                                            này</a></li>
                                                    <li><a
                                                            href="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;8&quot;}">Tháng
                                                            này</a></li>
                                                    <li><a
                                                            href="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;10&quot;}">Năm
                                                            nay</a></li>
                                                </ul>
                                            </div>
                                            <div class="menu ads" style="width:400px">
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
                                <h3 class="item-header">Contact Details</h3>
                                <div class="item-content">
                                    <div class="wrap-contact-detail">
                                        <ul>
                                            <li>
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                <p class="contact-txt">45 Grand Central Terminal New York,NY 1017
                                                    United State USA</p>
                                            </li>
                                            <li>
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                                <p class="contact-txt">0776585055 - (+123) 666 888</p>
                                            </li>
                                            <li>
                                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                                <p class="contact-txt">Contact@yourcompany.com</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                            <div class="wrap-footer-item">
                                <h3 class="item-header">Hot Line</h3>
                                <div class="item-content">
                                    <div class="wrap-hotline-footer">
                                        <span class="desc">Call Us toll Free</span>
                                        <b class="phone-number">0776585055 - (+123) 666 888</b>
                                    </div>
                                </div>
                            </div>

                            <div class="wrap-footer-item footer-item-second">
                                <h3 class="item-header">Sign up for newsletter</h3>
                                <div class="item-content">
                                    <div class="wrap-newletter-footer">
                                        <form action="#" class="frm-newletter" id="frm-newletter">
                                            <input type="email" class="input-email" name="email" value=""
                                                placeholder="Enter your email address" />
                                            <button class="btn-submit">Subscribe</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 box-twin-content">
                            <div class="row">
                                <div class="wrap-footer-item twin-item">
                                    <h3 class="item-header">My Account</h3>
                                    <div class="item-content">
                                        <div class="wrap-vertical-nav">
                                            <ul>
                                                <li class="menu-item"><a href="#" class="link-term">My
                                                        Account</a></li>
                                                <li class="menu-item"><a href="#" class="link-term">Brands</a>
                                                </li>
                                                <li class="menu-item"><a href="#" class="link-term">Gift
                                                        Certificates</a></li>
                                                <li class="menu-item"><a href="#"
                                                        class="link-term">Affiliates</a></li>
                                                <li class="menu-item"><a href="#" class="link-term">Wish
                                                        list</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap-footer-item twin-item">
                                    <h3 class="item-header">Infomation</h3>
                                    <div class="item-content">
                                        <div class="wrap-vertical-nav">
                                            <ul>
                                                <li class="menu-item"><a href="#" class="link-term">Contact
                                                        Us</a></li>
                                                <li class="menu-item"><a href="#" class="link-term">Returns</a>
                                                </li>
                                                <li class="menu-item"><a href="#" class="link-term">Site
                                                        Map</a></li>
                                                <li class="menu-item"><a href="#"
                                                        class="link-term">Specials</a></li>
                                                <li class="menu-item"><a href="#" class="link-term">Order
                                                        History</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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

                <div class="wrap-back-link">
                    <div class="container">
                        <div class="back-link-box">
                            <h3 class="backlink-title">Quick Links</h3>
                            <div class="back-link-row">
                                <ul class="list-back-link">
                                    <li><span class="row-title">Mobiles:</span></li>
                                    <li><a href="#" class="redirect-back-link" title="mobile">Mobiles</a>
                                    </li>
                                    <li><a href="#" class="redirect-back-link" title="yphones">YPhones</a>
                                    </li>
                                    <li><a href="#" class="redirect-back-link" title="Gianee Mobiles GL">Gianee
                                            Mobiles GL</a></li>
                                    <li><a href="#" class="redirect-back-link" title="Mobiles Karbonn">Mobiles
                                            Karbonn</a></li>
                                    <li><a href="#" class="redirect-back-link" title="Mobiles Viva">Mobiles
                                            Viva</a></li>
                                    <li><a href="#" class="redirect-back-link" title="Mobiles Intex">Mobiles
                                            Intex</a></li>
                                    <li><a href="#" class="redirect-back-link" title="Mobiles Micrumex">Mobiles
                                            Micrumex</a></li>
                                    <li><a href="#" class="redirect-back-link" title="Mobiles Bsus">Mobiles
                                            Bsus</a></li>
                                    <li><a href="#" class="redirect-back-link" title="Mobiles Samsyng">Mobiles
                                            Samsyng</a></li>
                                    <li><a href="#" class="redirect-back-link" title="Mobiles Lenova">Mobiles
                                            Lenova</a></li>
                                </ul>

                                <ul class="list-back-link">
                                    <li><span class="row-title">Tablets:</span></li>
                                    <li><a href="#" class="redirect-back-link" title="Plesc YPads">Plesc
                                            YPads</a></li>
                                    <li><a href="#" class="redirect-back-link" title="Samsyng Tablets">Samsyng
                                            Tablets</a></li>
                                    <li><a href="#" class="redirect-back-link" title="Qindows Tablets">Qindows
                                            Tablets</a></li>
                                    <li><a href="#" class="redirect-back-link" title="Calling Tablets">Calling
                                            Tablets</a></li>
                                    <li><a href="#" class="redirect-back-link"
                                            title="Micrumex Tablets">Micrumex Tablets</a></li>
                                    <li><a href="#" class="redirect-back-link"
                                            title="Lenova Tablets Bsus">Lenova Tablets Bsus</a></li>
                                    <li><a href="#" class="redirect-back-link" title="Tablets iBall">Tablets
                                            iBall</a></li>
                                    <li><a href="#" class="redirect-back-link" title="Tablets Swipe">Tablets
                                            Swipe</a></li>
                                    <li><a href="#" class="redirect-back-link"
                                            title="Tablets TVs, Audio">Tablets TVs, Audio</a></li>
                                </ul>

                                <ul class="list-back-link">
                                    <li><span class="row-title">Fashion:</span></li>
                                    <li><a href="#" class="redirect-back-link" title="Sarees Silk">Sarees
                                            Silk</a></li>
                                    <li><a href="#" class="redirect-back-link" title="sarees Salwar">sarees
                                            Salwar</a></li>
                                    <li><a href="#" class="redirect-back-link" title="Suits Lehengas">Suits
                                            Lehengas</a></li>
                                    <li><a href="#" class="redirect-back-link" title="Biba Jewellery">Biba
                                            Jewellery</a></li>
                                    <li><a href="#" class="redirect-back-link" title="Rings Earrings">Rings
                                            Earrings</a></li>
                                    <li><a href="#" class="redirect-back-link" title="Diamond Rings">Diamond
                                            Rings</a></li>
                                    <li><a href="#" class="redirect-back-link"
                                            title="Loose Diamond Shoes">Loose Diamond Shoes</a></li>
                                    <li><a href="#" class="redirect-back-link"
                                            title="BootsMen Watches">BootsMen Watches</a></li>
                                    <li><a href="#" class="redirect-back-link" title="Women Watches">Women
                                            Watches</a></li>
                                </ul>
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
    <?php
    $error = Session::get('error');
    $success = Session::get('success');
    if ($error) {
        echo '<script>alert("' . $error . '")</script>';
        Session::forget('error');
    }
    if ($success) {
        echo '<script>alert("' . $success . '")</script>';
        Session::forget('success');
    }
    ?>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
