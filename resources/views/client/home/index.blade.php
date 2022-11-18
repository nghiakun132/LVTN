@extends('layouts.client')
@section('content')
@section('title', 'Trang chủ')
<style>
    .mb-4 {
        margin-bottom: 4rem !important;
    }
</style>
<style>
    .jssorl-009-spin img {
        animation-name: jssorl-009-spin;
        animation-duration: 1.6s;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
    }

    @keyframes jssorl-009-spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    /*jssor slider arrow skin 106 css*/
    .jssora106 {
        display: block;
        position: absolute;
        cursor: pointer;
    }

    .jssora106 .c {
        fill: #fff;
        opacity: .3;
    }

    .jssora106 .a {
        fill: none;
        stroke: #000;
        stroke-width: 350;
        stroke-miterlimit: 10;
    }

    .jssora106:hover .c {
        opacity: .5;
    }

    .jssora106:hover .a {
        opacity: .8;
    }

    .jssora106.jssora106dn .c {
        opacity: .2;
    }

    .jssora106.jssora106dn .a {
        opacity: 1;
    }

    .jssora106.jssora106ds {
        opacity: .3;
        pointer-events: none;
    }

    /*jssor slider thumbnail skin 101 css*/
    .jssort101 .p {
        position: absolute;
        top: 0;
        left: 0;
        box-sizing: border-box;
        background: #000;
    }

    .jssort101 .p .cv {
        position: relative;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 2px solid #000;
        box-sizing: border-box;
        z-index: 1;
    }

    .jssort101 .a {
        fill: none;
        stroke: #fff;
        stroke-width: 400;
        stroke-miterlimit: 10;
        visibility: hidden;
    }

    .jssort101 .p:hover .cv,
    .jssort101 .p.pdn .cv {
        border: none;
        border-color: transparent;
    }

    .jssort101 .p:hover {
        padding: 2px;
    }

    .jssort101 .p:hover .cv {
        background-color: rgba(0, 0, 0, 6);
        opacity: .35;
    }

    .jssort101 .p:hover.pdn {
        padding: 0;
    }

    .jssort101 .p:hover.pdn .cv {
        border: 2px solid #fff;
        background: none;
        opacity: .35;
    }

    .jssort101 .pav .cv {
        border-color: #fff;
        opacity: .35;
    }

    .jssort101 .pav .a,
    .jssort101 .p:hover .a {
        visibility: visible;
    }

    .jssort101 .t {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
        opacity: .6;
    }

    .jssort101 .pav .t,
    .jssort101 .p:hover .t {
        opacity: 1;
    }
</style>
<main id="main">
    <div class="container">

        {{-- <div class="wrap-main-slide">
            <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true"
                data-dots="false" data-autoplay="true" data-autoplay-timeout="2000">
                @foreach (config('carousel.big') as $carousel)
                    <div class="item-slide">
                        <img src="{{ $carousel['path'] }}" alt="" class="img-slide" />
                    </div>
                @endforeach
            </div>
        </div>
        <div class="wrap-banner style-twin-default">
            @foreach (config('carousel.small') as $carousel)
                <div class="banner-item">
                    <a href="#" class="link-banner banner-effect-1">
                        <figure><img src="{{ $carousel['path'] }}" alt="" width="580" height="190" />
                        </figure>
                    </a>
                </div>
            @endforeach
        </div> --}}

        <div class="banner-carousel" style="margin-top: 2rem">
            <div id="jssor_1"
                style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:480px;overflow:hidden;visibility:hidden;">
                <!-- Loading Screen -->
                <div data-u="loading" class="jssorl-009-spin"
                    style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
                </div>
                <div data-u="slides"
                    style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
                    @foreach (config('carousel') as $carousel)
                        <div>
                            <img data-u="image"src="{{ $carousel['path'] }}" />
                            <img data-u="thumb" src="{{ $carousel['path'] }}" />
                        </div>
                    @endforeach

                </div>
                <div data-u="thumbnavigator" class="jssort101"
                    style="position:absolute;left:0px;bottom:0px;width:980px;height:100px;background-color:#000;"
                    data-autocenter="1" data-scale-bottom="0.75">
                    <div data-u="slides">
                        <div data-u="prototype" class="p" style="width:190px;height:90px;">
                            <div data-u="thumbnailtemplate" class="t"></div>

                        </div>
                    </div>
                </div>
                <div data-u="arrowleft" class="jssora106" style="width:55px;height:55px;top:162px;left:30px;"
                    data-scale="0.75">
                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                        <polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3 "></polyline>
                        <line class="a" x1="10573.9" y1="8000" x2="5426.1" y2="8000"></line>
                    </svg>
                </div>
                <div data-u="arrowright" class="jssora106" style="width:55px;height:55px;top:162px;right:30px;"
                    data-scale="0.75">
                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                        <polyline class="a" points="8069.6,5495.7 10573.9,8000 8069.6,10504.3 "></polyline>
                        <line class="a" x1="5426.1" y1="8000" x2="10573.9" y2="8000"></line>
                    </svg>
                </div>
            </div>
        </div>

        <!--On Sale-->
        @if ($end)
            <div class="wrap-show-advance-info-box style-1 has-countdown" id="sale">
                <h3 class="title-box">Flash sale Online</h3>
                <div class="wrap-countdown mercado-countdown" data-expire="{{ $end }}"></div>
                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                    data-loop="false" data-nav="true" data-dots="false" data-autoplay="true"
                    data-autoplay-timeout="2000" data-autoplay-hover-pause="true"
                    data-responsive='{"0":{"items":"2"},"480":{"items":"3"},"768":{"items":"4"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                    @foreach ($details as $detail)
                        <div class="product product-style-2 equal-elem">
                            <div class="product-thumnail">
                                <a href="{{ route('client.product', [
                                    'slug' => $detail->products->category->c_slug,
                                    'brand' => $detail->products->brand->b_slug,
                                    'product' => $detail->products->pro_slug,
                                ]) }}"
                                    title="{{ $detail->products->pro_name }}">
                                    <figure class="fix-height">
                                        <img src="{{ asset('images/products/' . $detail->products->pro_avatar) }}"
                                            alt="{{ $detail->products->pro_name }}" />
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">{{ $detail->percentage }} %</span>
                                </div>
                            </div>
                            <div class="product-info product-info2">
                                <a href="{{ route('client.product', [
                                    'slug' => $detail->products->category->c_slug,
                                    'brand' => $detail->products->brand->b_slug,
                                    'product' => $detail->products->pro_slug,
                                ]) }}"
                                    class="product-name"><span>{{ $detail->products->pro_name }}</span></a>
                                <div class="wrap-price">
                                    <ins>
                                        <p class="product-price">
                                            {{ number_format($detail->products->pro_price - ($detail->percentage / 100) * $detail->products->pro_price, 0, ',', '.') }}
                                            đ</p>
                                    </ins> <del>
                                        <p class="product-price">
                                            {{ number_format($detail->products->pro_price, 0, ',', '.') }}
                                            đ</p>
                                    </del>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!--Latest Products-->
        <div class="wrap-show-advance-info-box style-1" id="LATESTPRODUCTS">
            {{-- <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure>
                        <img src="{{ asset('/images/banner/qrc.png') }}" width="1170" height="240"
                            alt="" />
                    </figure>
                </a>
            </div> --}}
            {{-- <h3 class="title-box title1"><span> Latest Products</span></h3> --}}
            <div class="title1">
                <div id="wrap-text" class="ins-selectable-element ins-element-wrap ins-element-text">
                    <div id="text" class="ins-element-content ins-editable-text" not-sortable="true"
                        data-background-color-changed="true"
                        style="font-size: 16px !important; color: rgb(0, 0, 0) !important;">
                        <a href="javascript:void(0);" class="ins-element-link">
                            <div class="ins-editable ins-element-editable" id="editable-text-1454703450633"
                                data-bind-menu="notification|text_editing">&nbsp; &nbsp; &nbsp; &nbsp;CÓ THỂ BẠN SẼ
                                THÍCH</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="digital_1a">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                data-responsive='{"0":{"items":"2"},"480":{"items":"4"},"768":{"items":"4"},"992":{"items":"5"},"1200":{"items":"5"}}'>
                                @foreach ($washingMachines as $washingMachine)
                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail product-thumnail2">
                                            <a href="" title="{{ $washingMachine->pro_name }}">
                                                <figure>
                                                    <img src="{{ asset('/images/products/' . $washingMachine->pro_avatar) }}"
                                                        width="800" height="800" alt="{{ $washingMachine->pro_name }}" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                            </div>

                                        </div>
                                        <div class="product-info">
                                            <a href="#"
                                                class="product-name"><span>{{ $washingMachine->pro_name }}</span></a>
                                            <div class="wrap-price"><span class="product-price">
                                                    {{ number_format($washingMachine->pro_price - ($washingMachine->pro_price * $washingMachine->pro_sale) / 100, 0, ',', '.') }}
                                                    ₫</span>
                                                @if ($washingMachine->pro_sale > 0)
                                                    <del>
                                                        <p class="product-price">
                                                            {{ number_format($washingMachine->pro_price, 0, ',', '.') }}
                                                            ₫</p>
                                                    </del>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Product Categories-->
        <div class="wrap-show-advance-info-box style-1" id="PRODUCTCATEGORIES">
            <div class="header-title">
                <h3>
                    <a href="#">NHIỀU LƯỢT XEM NHẤT</a>
                </h3>
            </div>
            <div class="col-content lts-product col-product">
                @foreach ($liked as $liked)
                    <div class="item">
                        <div class="img">
                            <a
                                href="{{ route('client.product', [
                                    'slug' => $liked->category->c_slug,
                                    'brand' => $liked->brand->b_slug,
                                    'product' => $liked->pro_slug,
                                ]) }}">
                                <img src="{{ asset('images/products/' . $liked->pro_avatar) }}" alt=""
                                    style="height: 210px">
                            </a>
                        </div>
                        <div class="sticker sticker-left">
                            <span><img src="{{ asset('images/hot.png') }}" title="Chính hãng Apple"></span>
                        </div>
                        {{-- <div class="cover">
                            <div
                                style="color: yellow;background: #00483D;margin: 25px 20px 15px 15px;padding: 3px;border-radius: 6px;font-size:14px;font-weight: 600;">
                                <marquee behavior="alternate">
                                    <span style="color:white">Tặng PMH 300.000đ</span><br>
                                </marquee>
                            </div>
                        </div> --}}
                        {{-- @if ($liked->pro_sale > 0)
                            <span class="sales">
                                <i class="icon-flash2"></i> Giảm
                                {{ number_format(($liked->pro_price * ($liked->pro_sale / 100)) / 1000, 0, ',', '.') }}K
                            </span>
                        @endif --}}
                        <div class="info">
                            <a href="{{ route('client.product', [
                                'slug' => $liked->category->c_slug,
                                'brand' => $liked->brand->b_slug,
                                'product' => $liked->pro_slug,
                            ]) }}"
                                class="title"
                                title="Apple iPhone 12 - 64GB - chính hãng VN/A">{{ $liked->pro_name }}</a>
                            <span class="price">
                                <strong>
                                    {{ number_format($liked->pro_price - ($liked->pro_price * $liked->pro_sale) / 100, 0, ',', '.') }}
                                    ₫</strong>
                                @if ($liked->pro_sale > 0)
                                    <strike>{{ number_format($liked->pro_price, 0, ',', '.') }}
                                        ₫</strike>
                                @endif
                            </span>
                        </div>
                        @if (count($liked->sales) > 0)
                            <div class="promote">
                                <a href="#">
                                    <ul>
                                        @foreach ($liked->sales as $sales)
                                            <li><span class="bag">KM</span>{{ $sales->sales->s_name }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </a>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <div class="wrap-show-advance-info-box style-1 ">
            <div class="wrap-top-banner mb-4">
                <a href="#" class="link-banner banner-effect-2">
                    <figure>
                        <img src="{{ asset('/images/banner/laptopevent.png') }}" width="1170" height="240"
                            alt="" />
                    </figure>
                </a>
            </div>
            <div class="header-title">
                <h3>
                    <a href="#">Laptop nổi bật</a>
                </h3>
            </div>

            <div class="col-content lts-product col-product">
                @foreach ($laptops as $laptop)
                    @php
                        $rand = $laptop->sales ? rand(0, count($laptop->sales) - 1) : 0;

                    @endphp
                    <div class="item">
                        <div class="img">
                            <a
                                href="{{ route('client.product', [
                                    'slug' => $laptop->category->c_slug,
                                    'brand' => $laptop->brand->b_slug,
                                    'product' => $laptop->pro_slug,
                                ]) }}">
                                <img src="{{ asset('images/products/' . $laptop->pro_avatar) }}" alt=""
                                    style="height: 210px">
                            </a>
                        </div>
                        <div class="sticker sticker-left">
                            <span><img src="{{ asset('images/bao-hanh-24t.png') }}" title="Chính hãng Apple"></span>
                        </div>
                        {{-- <div class="cover">
                            <div
                                style="color: yellow;background: #00483D;margin: 25px 20px 15px 15px;padding: 3px;border-radius: 6px;font-size:14px;font-weight: 600;">
                                <marquee behavior="alternate">
                                    <span style="color:white">Tặng PMH 300.000đ</span><br>
                                </marquee>
                            </div>
                        </div> --}}
                        @if ($laptop->pro_sale > 0)
                            <span class="sales">
                                <i class="icon-flash2"></i> Giảm
                                {{ number_format(($laptop->pro_price * ($laptop->pro_sale / 100)) / 1000, 0, ',', '.') }}K
                            </span>
                        @else
                            @if (count($laptop->sales) > 0)
                                <div class="cover2">
                                    <div
                                        style="color: yellow;
                                                background: #00483D;
                                                margin: 25px 20px 15px 15px;
                                                padding: 3px;
                                                border-radius: 18px;
                                                font-size: 11px;
                                                font-weight: 400;">
                                        {{-- <marquee behavior="alternate"> --}}
                                        <span style="color:white">
                                            {{ $laptop->sales[$rand]->sales->s_name }}</span><br>
                                        {{-- </marquee> --}}
                                    </div>
                                </div>
                            @endif
                        @endif
                        <div class="info">
                            <a href="{{ route('client.product', [
                                'slug' => $laptop->category->c_slug,
                                'brand' => $laptop->brand->b_slug,
                                'product' => $laptop->pro_slug,
                            ]) }}"
                                class="title"
                                title="Apple iPhone 12 - 64GB - chính hãng VN/A">{{ $laptop->pro_name }}</a>
                            <span class="price">
                                <strong>
                                    {{ number_format($laptop->pro_price - ($laptop->pro_price * $laptop->pro_sale) / 100, 0, ',', '.') }}
                                    ₫</strong>
                                @if ($laptop->pro_sale > 0)
                                    <strike>{{ number_format($laptop->pro_price, 0, ',', '.') }}
                                        ₫</strike>
                                @endif
                            </span>
                        </div>
                        @if (count($laptop->sales) > 0)
                            <div class="promote">
                                <a href="#">
                                    <ul>
                                        @foreach ($laptop->sales as $sales)
                                            <li><span class="bag">KM</span>{{ $sales->sales->s_name }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </a>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <div class="wrap-show-advance-info-box style-1">
            {{-- <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure>
                        <img src="{{ asset('/images/banner/qrc.png') }}" width="1170" height="240"
                            alt="" />
                    </figure>
                </a>
            </div> --}}
            {{-- <h3 class="title-box title1"><span> Latest Products</span></h3> --}}
            <div class="title1">
                <div id="wrap-text" class="ins-selectable-element ins-element-wrap ins-element-text">
                    <div id="text" class="ins-element-content ins-editable-text" not-sortable="true"
                        data-background-color-changed="true"
                        style="font-size: 16px !important; color: rgb(0, 0, 0) !important;">
                        <a href="javascript:void(0);" class="ins-element-link">
                            <div class="ins-editable ins-element-editable" id="editable-text-1454703450633"
                                data-bind-menu="notification|text_editing">&nbsp; TỦ LẠNH NỔI BẬT
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="digital_1a">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                data-autoplay="true" data-autoplay-timeout="1500" data-autoplay-hover-pause="true"
                                data-responsive='{"0":{"items":"2"},"480":{"items":"3"},"768":{"items":"4"},"992":{"items":"5"},"1200":{"items":"5"}}'>
                                @foreach ($fridges as $fridge)
                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail product-thumnail2">
                                            <a href="{{ route('client.product', [
                                                'slug' => $fridge->category->c_slug,
                                                'brand' => $fridge->brand->b_slug,
                                                'product' => $fridge->pro_slug,
                                            ]) }}"
                                                title="">
                                                <figure>
                                                    <img src="{{ asset('/images/products/' . $fridge->pro_avatar) }}"
                                                        width="800" height="800" alt="{{ $fridge->pro_name }}">
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">Hot</span>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{ route('client.product', [
                                                'slug' => $fridge->category->c_slug,
                                                'brand' => $fridge->brand->b_slug,
                                                'product' => $fridge->pro_slug,
                                            ]) }}"
                                                class="product-name">
                                                <span>
                                                    {{ $fridge->pro_name }}
                                                </span>
                                            </a>
                                            <div class="wrap-price"><span class="product-price">
                                                    {{ number_format($fridge->pro_price - ($fridge->pro_price * $fridge->pro_sale) / 100, 0, ',', '.') }}
                                                    ₫</span>
                                                @if ($fridge->pro_sale > 0)
                                                    <del>
                                                        <p class="product-price">
                                                            {{ number_format($fridge->pro_price, 0, ',', '.') }}
                                                            ₫</p>
                                                    </del>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrap-show-advance-info-box style-1">
            {{-- <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure>
                        <img src="{{ asset('/images/banner/qrc.png') }}" width="1170" height="240"
                            alt="" />
                    </figure>
                </a>
            </div> --}}
            {{-- <h3 class="title-box title1"><span> Latest Products</span></h3> --}}
            <div class="title1">
                <div id="wrap-text" class="ins-selectable-element ins-element-wrap ins-element-text">
                    <div id="text" class="ins-element-content ins-editable-text" not-sortable="true"
                        data-background-color-changed="true"
                        style="font-size: 16px !important; color: rgb(0, 0, 0) !important;">
                        <a href="javascript:void(0);" class="ins-element-link">
                            <div class="ins-editable ins-element-editable" id="editable-text-1454703450633"
                                data-bind-menu="notification|text_editing">&nbsp; &nbsp; &nbsp; &nbsp;TIVI NỔI
                                BẬT
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="digital_1a">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                data-autoplay="true" data-autoplay-timeout="2000" data-autoplay-hover-pause="true"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                @foreach ($televisions as $television)
                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail product-thumnail2">
                                            <a href="detail.html" title="{{ $television->pro_name }}">
                                                <figure>
                                                    <img src="{{ asset('/images/products/' . $television->pro_avatar) }}"
                                                        width="800" height="800"
                                                        alt="{{ $television->pro_name }}" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#"
                                                class="product-name"><span>{{ $television->pro_name }}</span></a>
                                            <div class="wrap-price"><span class="product-price">
                                                    {{ number_format($television->pro_price - ($television->pro_price * $television->pro_sale) / 100, 0, ',', '.') }}
                                                    ₫</span>
                                                @if ($television->pro_sale > 0)
                                                    <del>
                                                        <p class="product-price">
                                                            {{ number_format($television->pro_price, 0, ',', '.') }}
                                                            ₫</p>
                                                    </del>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <section>
            <div class="container">
                <div class="news-home box-home">
                    <div class="header">
                        <h4><a href="#" style="color: #fff">TIN CÔNG NGHỆ</a></h4>
                    </div>

                    <div class="col-content">
                        <div class="item">
                            <div class="img">
                                <a href="/tin-tuc/soc-ty-phu-cong-nghe-elon-musk-sap-mua-lai-manschester-united"><img
                                        src="https://cdn1.hoanghamobile.com/tin-tuc/wp-content/uploads/2022/08/soc-ty-phu-cong-nghe-elon-musk-sap-mua-lai-manschester-united-218x150.jpg"></a>
                            </div>
                            <p>
                                <a href="/tin-tuc/soc-ty-phu-cong-nghe-elon-musk-sap-mua-lai-manschester-united">Sốc:
                                    tỷ phú công nghệ Elon Musk sắp mua lại Manschester United?</a>
                            </p>
                        </div>
                        <div class="item">
                            <div class="img">
                                <a
                                    href="/tin-tuc/anker-ra-mat-sac-du-phong-pin-khung-toi-24-000mah-co-man-hinh-phu-sac-nhanh-140w"><img
                                        src="https://cdn1.hoanghamobile.com/tin-tuc/wp-content/uploads/2022/08/Anker-PowerCore-24K-768x384-1-218x150.jpg"></a>
                            </div>
                            <p>
                                <a
                                    href="/tin-tuc/anker-ra-mat-sac-du-phong-pin-khung-toi-24-000mah-co-man-hinh-phu-sac-nhanh-140w">Anker
                                    ra mắt sạc dự phòng pin khủng tới 24.000mAh, có màn hình phụ, sạc nhanh 140W</a>
                            </p>
                        </div>
                        <div class="item">
                            <div class="img">
                                <a href="/tin-tuc/apple-watch-va-macbook-se-lan-dau-tien-duoc-san-xuat-tai-viet-nam"><img
                                        src="https://cdn1.hoanghamobile.com/tin-tuc/wp-content/uploads/2022/08/299003883_10160377239659571_5085910941608966176_n-218x150.jpg"></a>
                            </div>
                            <p>
                                <a href="/tin-tuc/apple-watch-va-macbook-se-lan-dau-tien-duoc-san-xuat-tai-viet-nam">Apple
                                    Watch và MacBook sẽ lần đầu tiên được sản xuất tại Việt Nam</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
    </div>
</main>

@stop
