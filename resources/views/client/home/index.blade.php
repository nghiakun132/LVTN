@extends('layouts.client')
@section('content')
    <main id="main">
        <div class="container">
            <div class="wrap-main-slide">
                <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true"
                    data-dots="false" data-autoplay="true" data-autoplay-timeout="2000">
                    @foreach (config('carousel.big') as $carousel)
                        <div class="item-slide">
                            <img src="{{ $carousel['path'] }}" alt="" class="img-slide" />
                            {{-- <div class="slide-info slide-1">
                                <h2 class="f-title">Kid Smart <b>Watches</b></h2>
                                <span class="subtitle">Compra todos tus productos Smart por internet.</span>
                                <p class="sale-info">Only price: <span class="price">$59.99</span></p>
                                <a href="#" class="btn-link">Shop Now</a>
                            </div> --}}
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
            <div class="wrap-show-advance-info-box style-1 has-countdown" id="sale">
                <h3 class="title-box">Flash sale Online</h3>
                <div class="wrap-countdown mercado-countdown" data-expire="2022/12/12 12:34:56"></div>
                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                    data-loop="false" data-nav="true" data-dots="false" data-autoplay="false" data-autoplay-timeout="1000"
                    data-autoplay-hover-pause="true"
                    data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                    <div class="product product-style-2 equal-elem">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure>
                                    <img src="{{ asset('client/assets/images/products/tools_equipment_7.jpg') }}"
                                        width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                </figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item sale-label">sale</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                    Speaker [White]</span></a>
                            <div class="wrap-price">
                                <ins>
                                    <p class="product-price">3.000.000 đ</p>
                                </ins> <del>
                                    <p class="product-price">4.000.000 đ</p>
                                </del>
                            </div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="{{ asset('client/assets/images/products/digital_18.jpg') }}"
                                        width="800" height="800" alt="" /></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item sale-label">5%</span>
                            </div>
                            {{-- <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div> --}}
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                    Speaker [White]</span></a>
                            <div class="wrap-price">
                                <ins>
                                    <p class="product-price">$168.00</p>
                                </ins> <del>
                                    <p class="product-price">$250.00</p>
                                </del>
                            </div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem">
                        <div class="product-thumnail">
                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure>
                                    <img src="{{ asset('client/assets/images/products/fashion_08.jpg') }}" width="800"
                                        height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                </figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item sale-label">sale</span>
                            </div>
                            {{-- <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div> --}}
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                    Speaker [White]</span></a>
                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem">
                        <div class="product-thumnail">
                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="{{ asset('client/assets/images/products/digital_17.jpg') }}"
                                        width="800" height="800" alt="" /></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item sale-label">sale</span>
                            </div>
                            {{-- <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div> --}}
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                    Speaker [White]</span></a>
                            <div class="wrap-price">
                                <ins>
                                    <p class="product-price">$168.00</p>
                                </ins> <del>
                                    <p class="product-price">$250.00</p>
                                </del>
                            </div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem">
                        <div class="product-thumnail">
                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure>
                                    <img src="{{ asset('client/assets/images/products/tools_equipment_3.jpg') }}"
                                        width="800" height="800" alt="" />
                                </figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item sale-label">sale</span>
                            </div>
                            {{-- <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div> --}}
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                    Speaker [White]</span></a>
                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem">
                        <div class="product-thumnail">
                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure>
                                    <img src="{{ asset('client/assets/images/products/fashion_05.jpg') }}" width="800"
                                        height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                </figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item sale-label">sale</span>
                            </div>
                            {{-- <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div> --}}
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                    Speaker [White]</span></a>
                            <div class="wrap-price">
                                <ins>
                                    <p class="product-price">$168.00</p>
                                </ins> <del>
                                    <p class="product-price">$250.00</p>
                                </del>
                            </div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem">
                        <div class="product-thumnail">
                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure>
                                    <img src="{{ asset('client/assets/images/products/digital_04.jpg') }}" width="800"
                                        height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                </figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item sale-label">sale</span>
                            </div>
                            {{-- <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div> --}}
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                    Speaker [White]</span></a>
                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem">
                        <div class="product-thumnail">
                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure>
                                    <img src="{{ asset('client/assets/images/products/kidtoy_05.jpg') }}" width="800"
                                        height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                </figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item sale-label">sale</span>
                            </div>
                            {{-- <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div> --}}
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional
                                    Speaker [White]</span></a>
                            <div class="wrap-price">
                                <ins>
                                    <p class="product-price">$168.00</p>
                                </ins> <del>
                                    <p class="product-price">$250.00</p>
                                </del>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Latest Products-->
            <div class="wrap-show-advance-info-box style-1" id="LATESTPRODUCTS">
                <div class="wrap-top-banner">
                    <a href="#" class="link-banner banner-effect-2">
                        <figure>
                            <img src="{{ asset('/images/banner/qrc.png') }}" width="1170" height="240"
                                alt="" />
                        </figure>
                    </a>
                </div>
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

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('/images/phone/11t.png') }}" width="800"
                                                        height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item sale-label">sale</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker [White]</span></a>
                                            <div class="wrap-price">
                                                <ins>
                                                    <p class="product-price">$168.00</p>
                                                </ins>
                                                <del>
                                                    <p class="product-price">$250.00</p>
                                                </del>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/digital_15.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                                <span class="flash-item sale-label">sale</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker [White]</span></a>
                                            <div class="wrap-price">
                                                <ins>
                                                    <p class="product-price">$168.00</p>
                                                </ins>
                                                <del>
                                                    <p class="product-price">$250.00</p>
                                                </del>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/digital_01.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item bestseller-label">Bestseller</span>
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

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/digital_21.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
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

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/digital_03.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item sale-label">sale</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker [White]</span></a>
                                            <div class="wrap-price">
                                                <ins>
                                                    <p class="product-price">$168.00</p>
                                                </ins>
                                                <del>
                                                    <p class="product-price">$250.00</p>
                                                </del>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/digital_04.jpg') }}"
                                                        width="800" height="800"
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

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/digital_05.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item bestseller-label">Bestseller</span>
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
                        <a href="#"> Product Categories</a>
                    </h3>
                </div>

                <div class="col-content lts-product">
                    @for ($i = 0; $i < 15; $i++)
                        <div class="item">
                            <div class="img">
                                <a href="">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2021/02/25/iphon12.png"
                                        alt="">
                                </a>
                            </div>
                            <div class="cover">
                                <div
                                    style="color: yellow;background: #00483D;margin: 25px 20px 15px 15px;padding: 3px;border-radius: 6px;font-size:14px;font-weight: 600;">
                                    <marquee behavior="alternate">
                                        <span style="color:white">Tặng PMH 300.000đ</span><br>
                                    </marquee>
                                </div>
                            </div>
                            <span class="sales">
                                <i class="icon-flash2"></i> Giảm 600,000 ₫
                            </span>
                            <div class="info">
                                <a href="#" class="title" title="Apple iPhone 12 - 64GB - chính hãng VN/A">Apple
                                    iPhone 12 - 64GB - chính hãng VN/A</a>
                                <span class="price">
                                    <strong>15,390,000 ₫</strong>
                                    <strike>24,990,000 ₫</strike>
                                </span>

                            </div>
                        </div>
                    @endfor
                </div>
                {{-- <div class="wrap-products">
                    <div class="wrap-product-tab tab-style-1">
                        <div class="tab-control">
                            <a href="#fashion_1a" class="tab-control-item active">Smartphone</a>
                            <a href="#fashion_1b" class="tab-control-item">Watch</a>
                            <a href="#fashion_1c" class="tab-control-item">Laptop</a>
                            <a href="#fashion_1d" class="tab-control-item">Tablet</a>
                        </div>
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="fashion_1a">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                    data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                    data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_01.jpg') }}"
                                                        width="800" height="800"
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
                                            <a href="#" class="product-name"><span>Lois Caron LCS-4027 Analog
                                                    Watch - For Men</span></a>
                                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_02.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item sale-label">sale</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Business Men Leather Laptop
                                                    Tote Bags Man Crossbody </span></a>
                                            <div class="wrap-price">
                                                <ins>
                                                    <p class="product-price">$168.00</p>
                                                </ins>
                                                <del>
                                                    <p class="product-price">$250.00</p>
                                                </del>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_09.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Alberto Torresi Borgo Yellow
                                                    Shoes - Alberto Torresi</span></a>
                                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_03.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                                <span class="flash-item sale-label">sale</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Alberto Torresi Borgo Yellow
                                                    Shoes - Alberto Torresi</span></a>
                                            <div class="wrap-price">
                                                <ins>
                                                    <p class="product-price">$168.00</p>
                                                </ins>
                                                <del>
                                                    <p class="product-price">$250.00</p>
                                                </del>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_07.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item bestseller-label">Bestseller</span>
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

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_08.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item sale-label">sale</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker [White]</span></a>
                                            <div class="wrap-price">
                                                <ins>
                                                    <p class="product-price">$168.00</p>
                                                </ins>
                                                <del>
                                                    <p class="product-price">$250.00</p>
                                                </del>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_06.jpg') }}"
                                                        width="800" height="800"
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

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_05.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item bestseller-label">Bestseller</span>
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
                                </div>
                            </div>

                            <div class="tab-content-item" id="fashion_1b">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                    data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                    data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_03.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item bestseller-label">Bestseller</span>
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

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_07.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item bestseller-label">Bestseller</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker [White]</span></a>
                                            <div class="wrap-price">
                                                <ins>
                                                    <p class="product-price">$168.00</p>
                                                </ins>
                                                <del>
                                                    <p class="product-price">$250.00</p>
                                                </del>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_08.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item bestseller-label">Bestseller</span>
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

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_09.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item bestseller-label">Bestseller</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quic view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker [White]</span></a>
                                            <div class="wrap-price">
                                                <ins>
                                                    <p class="product-price">$168.00</p>
                                                </ins>
                                                <del>
                                                    <p class="product-price">$250.00</p>
                                                </del>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_02.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item bestseller-label">Bestseller</span>
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

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_05.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item bestseller-label">Bestseller</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker [White]</span></a>
                                            <div class="wrap-price">
                                                <ins>
                                                    <p class="product-price">$168.00</p>
                                                </ins>
                                                <del>
                                                    <p class="product-price">$250.00</p>
                                                </del>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_08.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item bestseller-label">Bestseller</span>
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

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_04.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item bestseller-label">Bestseller</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker [White]</span></a>
                                            <div class="wrap-price">
                                                <ins>
                                                    <p class="product-price">$168.00</p>
                                                </ins>
                                                <del>
                                                    <p class="product-price">$250.00</p>
                                                </del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-content-item" id="fashion_1c">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                    data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                    data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_02.jpg') }}"
                                                        width="800" height="800"
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

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_03.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                                <span class="flash-item sale-label">sale</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker [White]</span></a>
                                            <div class="wrap-price">
                                                <ins>
                                                    <p class="product-price">$168.00</p>
                                                </ins>
                                                <del>
                                                    <p class="product-price">$250.00</p>
                                                </del>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_04.jpg') }}"
                                                        width="800" height="800"
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

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_05.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                                <span class="flash-item sale-label">sale</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker [White]</span></a>
                                            <div class="wrap-price">
                                                <ins>
                                                    <p class="product-price">$168.00</p>
                                                </ins>
                                                <del>
                                                    <p class="product-price">$250.00</p>
                                                </del>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_06.jpg') }}"
                                                        width="800" height="800"
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

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_07.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                                <span class="flash-item sale-label">sale</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker [White]</span></a>
                                            <div class="wrap-price">
                                                <ins>
                                                    <p class="product-price">$168.00</p>
                                                </ins>
                                                <del>
                                                    <p class="product-price">$250.00</p>
                                                </del>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_08.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quic view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker [White]</span></a>
                                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_09.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                                <span class="flash-item sale-label">sale</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quic view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker [White]</span></a>
                                            <div class="wrap-price">
                                                <ins>
                                                    <p class="product-price">$168.00</p>
                                                </ins>
                                                <del>
                                                    <p class="product-price">$250.00</p>
                                                </del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-content-item" id="fashion_1d">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                    data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                    data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_05.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker [White]</span></a>
                                            <div class="product-rating">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_04.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item sale-label">sale</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quic view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker [White]</span></a>
                                            <div class="product-rating">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                            <div class="wrap-price">
                                                <ins>
                                                    <p class="product-price">$168.00</p>
                                                </ins>
                                                <del>
                                                    <p class="product-price">$250.00</p>
                                                </del>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_03.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                                <span class="flash-item sale-label">sale</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quic view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker [White]</span></a>
                                            <div class="product-rating">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_02.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item bestseller-label">Bestseller</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quic view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker [White]</span></a>
                                            <div class="product-rating">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                            <div class="wrap-price">
                                                <ins>
                                                    <p class="product-price">$168.00</p>
                                                </ins>
                                                <del>
                                                    <p class="product-price">$250.00</p>
                                                </del>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_01.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quic view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker [White]</span></a>
                                            <div class="product-rating">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_06.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item sale-label">sale</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quic view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker [White]</span></a>
                                            <div class="product-rating">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                            <div class="wrap-price">
                                                <ins>
                                                    <p class="product-price">$168.00</p>
                                                </ins>
                                                <del>
                                                    <p class="product-price">$250.00</p>
                                                </del>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_08.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quic view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker [White]</span></a>
                                            <div class="product-rating">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                        </div>
                                    </div>

                                    <div class="product product-style-2 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure>
                                                    <img src="{{ asset('client/assets/images/products/fashion_09.jpg') }}"
                                                        width="800" height="800"
                                                        alt="T-Shirt Raw Hem Organic Boro Constrast Denim" />
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item bestseller-label">Bestseller</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="#" class="function-link">quic view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless
                                                    Omnidirectional Speaker [White]</span></a>
                                            <div class="product-rating">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                            <div class="wrap-price">
                                                <ins>
                                                    <p class="product-price">$168.00</p>
                                                </ins>
                                                <del>
                                                    <p class="product-price">$250.00</p>
                                                </del>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="wrap-show-advance-info-box style-1" id="PRODUCTCATEGORIES2">
                <div class="header-title">
                    <h3>
                        <a href="#">Test Categories</a>
                    </h3>
                </div>

                <div class="col-content lts-product">
                    @for ($i = 0; $i < 15; $i++)
                        <div class="item">
                            <div class="img">
                                <a href="">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2021/02/25/iphon12.png"
                                        alt="">
                                </a>
                            </div>
                            <div class="cover">
                                <div
                                    style=" background: #00483D; margin: -95px 5px 0 52px; padding: 3px; border-radius: 6px; font-size: 11px; font-weight: 600;">

                                    ">
                                    <span style="color:white">Giảm tới 500k VNPAY</span><br>
                                    <span style="color:yellow">-600k Khi mở thẻ TP Bank EVO</span>
                                </div>
                            </div>
                            <span class="sales">
                                <i class="icon-flash2"></i> Giảm 600,000 ₫
                            </span>
                            <div class="info">
                                <a href="#" class="title" title="Apple iPhone 12 - 64GB - chính hãng VN/A">Apple
                                    iPhone 12 - 64GB - chính hãng VN/A</a>
                                <span class="price">
                                    <strong>15,390,000 ₫</strong>
                                    <strike>24,990,000 ₫</strike>
                                </span>

                            </div>
                        </div>
                    @endfor
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
