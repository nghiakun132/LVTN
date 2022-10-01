@extends('layouts.client')
@section('content')
@section('title', 'Trang chủ')
<main id="main">
    <div class="container">
        <div class="wrap-main-slide">
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
        </div>
        <!--On Sale-->
        @if ($end)
            <div class="wrap-show-advance-info-box style-1 has-countdown" id="sale">
                <h3 class="title-box">Flash sale Online</h3>
                <div class="wrap-countdown mercado-countdown" data-expire="{{ $end }}"></div>
                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                    data-loop="false" data-nav="true" data-dots="false" data-autoplay="false"
                    data-autoplay-timeout="1000" data-autoplay-hover-pause="true"
                    data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                    @foreach ($details as $detail)
                        <div class="product product-style-2 equal-elem">
                            <div class="product-thumnail product-thumnail3">
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
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                @for ($i = 0; $i < 9; $i++)
                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('/images/clock/1.png') }}" width="800"
                                                        height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker [White]</span></a>
                                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                        </div>
                                    </div>
                                @endfor

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
                    <a href="#">APPLE AUTHORISED RESELLER</a>
                </h3>
            </div>
            <div class="col-content lts-product col-product">
                @foreach ($apple as $apple)
                    <div class="item">
                        <div class="img">
                            <a
                                href="{{ route('client.product', [
                                    'slug' => $apple->category->c_slug,
                                    'brand' => $apple->brand->b_slug,
                                    'product' => $apple->pro_slug,
                                ]) }}">
                                <img src="{{ asset('images/products/' . $apple->pro_avatar) }}" alt=""
                                    style="height: 210px">
                            </a>
                        </div>
                        <div class="sticker sticker-left">
                            <span><img src="{{ asset('images/apple.png') }}" title="Chính hãng Apple"></span>
                        </div>
                        {{-- <div class="cover">
                            <div
                                style="color: yellow;background: #00483D;margin: 25px 20px 15px 15px;padding: 3px;border-radius: 6px;font-size:14px;font-weight: 600;">
                                <marquee behavior="alternate">
                                    <span style="color:white">Tặng PMH 300.000đ</span><br>
                                </marquee>
                            </div>
                        </div> --}}
                        @if ($apple->pro_sale > 0)
                            <span class="sales">
                                <i class="icon-flash2"></i> Giảm
                                {{ number_format(($apple->pro_price * ($apple->pro_sale / 100)) / 1000, 0, ',', '.') }}K
                            </span>
                        @endif
                        <div class="info">
                            <a href="{{ route('client.product', [
                                'slug' => $apple->category->c_slug,
                                'brand' => $apple->brand->b_slug,
                                'product' => $apple->pro_slug,
                            ]) }}"
                                class="title"
                                title="Apple iPhone 12 - 64GB - chính hãng VN/A">{{ $apple->pro_name }}</a>
                            <span class="price">
                                <strong>
                                    {{ number_format($apple->pro_price - ($apple->pro_price * $apple->pro_sale) / 100, 0, ',', '.') }}
                                    ₫</strong>
                                @if ($apple->pro_sale > 0)
                                    <strike>{{ number_format($apple->pro_price, 0, ',', '.') }}
                                        ₫</strike>
                                @endif
                            </span>
                        </div>
                        @if (count($apple->sales) > 0)
                            <div class="promote">
                                <a href="#">
                                    <ul>
                                        @foreach ($apple->sales as $sales)
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
            <div class="header-title">
                <h3>
                    <a href="#">ĐIỆN THOẠI NỔI BẬT</a>
                </h3>
            </div>

            <div class="col-content lts-product col-product">
                @foreach ($phones as $phone)
                    <div class="item">
                        <div class="img">
                            <a
                                href="{{ route('client.product', [
                                    'slug' => $phone->category->c_slug,
                                    'brand' => $phone->brand->b_slug,
                                    'product' => $phone->pro_slug,
                                ]) }}">
                                <img src="{{ asset('images/products/' . $phone->pro_avatar) }}" alt=""
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
                        @if ($phone->pro_sale > 0)
                            <span class="sales">
                                <i class="icon-flash2"></i> Giảm
                                {{ number_format(($phone->pro_price * ($phone->pro_sale / 100)) / 1000, 0, ',', '.') }}K
                            </span>
                        @endif
                        <div class="info">
                            <a href="{{ route('client.product', [
                                'slug' => $phone->category->c_slug,
                                'brand' => $phone->brand->b_slug,
                                'product' => $phone->pro_slug,
                            ]) }}"
                                class="title"
                                title="Apple iPhone 12 - 64GB - chính hãng VN/A">{{ $phone->pro_name }}</a>
                            <span class="price">
                                <strong>
                                    {{ number_format($phone->pro_price - ($phone->pro_price * $phone->pro_sale) / 100, 0, ',', '.') }}
                                    ₫</strong>
                                @if ($phone->pro_sale > 0)
                                    <strike>{{ number_format($phone->pro_price, 0, ',', '.') }}
                                        ₫</strike>
                                @endif
                            </span>
                        </div>
                        @if (count($phone->sales) > 0)
                            <div class="promote">
                                <a href="#">
                                    <ul>
                                        @foreach ($phone->sales as $sales)
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
            <div class="header-title">
                <h3>
                    <a href="#">Laptop nổi bật</a>
                </h3>
            </div>

            <div class="col-content lts-product col-product">
                @foreach ($laptops as $laptop)
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
            <div class="title1">
                <div id="wrap-text" class="ins-selectable-element ins-element-wrap ins-element-text">
                    <div id="text" class="ins-element-content ins-editable-text" not-sortable="true"
                        data-background-color-changed="true"
                        style="font-size: 16px !important; color: rgb(0, 0, 0) !important;">
                        <a href="javascript:void(0);" class="ins-element-link">
                            <div class="ins-editable ins-element-editable" data-bind-menu="notification|text_editing">
                                &nbsp; &nbsp; &nbsp; &nbsp;ĐỒNG HỒ NỔI
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
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                @foreach ($watchs as $watch)
                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail product-thumnail2 product-thumnail3">
                                            <a href="
                                            {{ route('client.product', [
                                                'slug' => $watch->category->c_slug,
                                                'brand' => $watch->brand->b_slug,
                                                'product' => $watch->pro_slug,
                                            ]) }}"
                                                title="{{ $watch->pro_avatar }}">
                                                <figure>
                                                    <img src="{{ asset('images/products/' . $watch->pro_avatar) }}"
                                                        width="800" height="800"
                                                        alt="{{ $watch->pro_avatar }}" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">hot</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="
                                                {{ route('client.product', [
                                                    'slug' => $watch->category->c_slug,
                                                    'brand' => $watch->brand->b_slug,
                                                    'product' => $watch->pro_slug,
                                                ]) }}"
                                                    class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="
                                            {{ route('client.product', [
                                                'slug' => $watch->category->c_slug,
                                                'brand' => $watch->brand->b_slug,
                                                'product' => $watch->pro_slug,
                                            ]) }}"
                                                class="product-name"><span>{{ $watch->pro_name }}</span></a>
                                            <div class="wrap-price">
                                                <ins>
                                                    <p class="product-price">
                                                        {{ number_format($watch->pro_price - ($watch->pro_price * $watch->pro_sale) / 100, 0, ',', '.') }}
                                                        ₫
                                                    </p>
                                                </ins>
                                                @if ($watch->pro_sale > 0)
                                                    <del>
                                                        <p class="product-price">
                                                            {{ number_format($watch->pro_price, 0, ',', '.') }}
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
                                data-bind-menu="notification|text_editing">&nbsp; &nbsp; &nbsp; &nbsp;TABLET
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
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                @for ($i = 0; $i < 8; $i++)
                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail product-thumnail2">
                                            <a href="detail.html" title="">
                                                <figure>
                                                    <img src="{{ asset('/images/clock/1.png') }}" width="800"
                                                        height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker [White]</span></a>
                                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                        </div>
                                    </div>
                                @endfor
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
                                data-bind-menu="notification|text_editing">&nbsp; &nbsp; &nbsp; &nbsp;LOA-TAI NGHE NỔI
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
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                @for ($i = 0; $i < 8; $i++)
                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail product-thumnail2">
                                            <a href="detail.html"
                                                title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('/images/clock/1.png') }}" width="800"
                                                        height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker [White]</span></a>
                                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                        </div>
                                    </div>
                                @endfor

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section>
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
        </section>
    </div>
</main>

@stop
