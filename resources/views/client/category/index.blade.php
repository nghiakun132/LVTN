@extends('layouts.client')
@section('content')
@section('title', $category->c_name)
<main id="main" class="main-site" style="background-color: rgb(245, 245, 250);">
    <div class="container">
        @if ($category->c_banner)
            <div class="top-category-ads">
                <div class="ads-container">
                    <div class="full item">
                        <a href="#" target="_top"><img src="{{ 'images/categories/' . $category->c_banner }}"
                                class="img-responsive img-border-radius"></a>
                    </div>
                </div>
            </div>
        @endif
        <section id="quick">
            <div class="lst-quickfilter q-manu">
                @foreach ($brands as $brand)
                    <a href="{{ route('client.brand', [
                        'slug' => $category->c_slug,
                        'brand' => $brand->b_slug,
                    ]) }}"
                        class="box-quicklink__item bd-radius quicklink-logo">
                        <img src="{{ asset('images/brands/' . $brand->b_banner) }}" width="30" class="no-text">
                    </a>
                @endforeach
            </div>
        </section>
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('client.home') }}" class="link">Trang chủ</a></li>
                <li class="item-link"><span>{{ $category->c_name }}</span></li>
            </ul>
        </div>
        <section id="filter-laptop">
            <div class="product-filters2">
                <div class="left">
                    <strong class="label">Lọc danh sách:</strong>
                    <div class="facet">
                        <label>
                            <a href="javascript:;">Giá <i class="icon-rightar"></i></a>
                        </label>
                        <div class="sub2">
                            <ul>
                                <li><a href="{{ route('client.category', $category->c_slug) }}">
                                        Mặc định</a></li>
                                <li><a
                                        href="{{ request()->fullUrlWithQuery(['gia_tu' => '0', 'gia_den' => '3000000']) }}">
                                        Dưới 3 triệu
                                        <i class="total"></i></a></li>
                                <li><a
                                        href="{{ request()->fullUrlWithQuery(['gia_tu' => '3000000', 'gia_den' => '5000000']) }}">
                                        Từ 3 triệu - 5 triệu
                                        <i class="total"></i></a></li>
                                <li><a
                                        href="{{ request()->fullUrlWithQuery(['gia_tu' => '5000000', 'gia_den' => '7000000']) }}">
                                        Từ 5 triệu - 7 triệu
                                        <i class="total"></i></a></li>
                                <li><a
                                        href="{{ request()->fullUrlWithQuery(['gia_tu' => '7000000', 'gia_den' => '10000000']) }}">
                                        Từ 7 triệu - 10 triệu
                                        <i class="total"></i></a></li>
                                <li><a
                                        href="{{ request()->fullUrlWithQuery(['gia_tu' => '10000000', 'gia_den' => '15000000']) }}">
                                        Từ 10 triệu - 15 triệu
                                        <i class="total"></i></a></li>
                                <li><a
                                        href="{{ request()->fullUrlWithQuery(['gia_tu' => '15000000', 'gia_den' => '20000000']) }}">
                                        Từ 15 triệu - 20 triệu
                                        <i class="total"></i></a></li>
                                <li><a
                                        href="{{ request()->fullUrlWithQuery(['gia_tu' => '20000000', 'gia_den' => '50000000']) }}">
                                        Từ 20 triệu - 50 triệu
                                        <i class="total"></i></a></li>
                                <li><a
                                        href="{{ request()->fullUrlWithQuery(['gia_tu' => '50000000', 'gia_den' => '100000000']) }}">
                                        Từ 50 triệu - 100 triệu
                                        <i class="total"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="facet">
                        <label>Sắp xếp <i class="icon-rightar"></i></label>
                        <div class="sub2">
                            <ul>
                                <li><a href="{{ route('client.category', $category->c_slug) }}"></span>
                                        Mặc định</a></li>
                                <li><a href="{{ request()->fullUrlWithQuery(['sort' => 'price_asc']) }}"></span>
                                        Giá thấp đến cao</a></li>
                                <li><a href="{{ request()->fullUrlWithQuery(['sort' => 'price_desc']) }}"></span>
                                        Giá cao đến thấp</a></li>
                                <li>
                                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'name_asc']) }}"></span>
                                        Tên: A - Z</a>
                                </li>
                                <li>
                                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'name_desc']) }}"></span>
                                        Tên: Z - A</a>
                                </li>
                                <li>
                                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'view']) }}"></span>
                                        Xem nhiều nhất</a>
                                </li>
                                <li>
                                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'new']) }}"></span>
                                        Mới nhất</a>
                                </li>
                                <li>
                                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'old']) }}"></span>
                                        Cũ nhất</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-filters2-mobile">
            <div>
                <h3>Lọc danh sách:</h3>
                <div class="facet">
                    <label>Giá</label>
                    <select onchange="window.location = this.value;">
                        <option>Chọn Giá</option>
                        <option value="{{ route('client.category', $category->c_slug) }}"> Mặc định</option>
                        <option value=" {{ request()->fullUrlWithQuery(['gia_tu' => '0', 'gia_den' => '3000000']) }}">
                            Dưới 3 triệu
                            </a>
                        </option>
                        <option
                            value="{{ request()->fullUrlWithQuery(['gia_tu' => '3000000', 'gia_den' => '5000000']) }}">
                            Từ 3 triệu - 5 triệu
                        </option>
                        <option
                            value="{{ request()->fullUrlWithQuery(['gia_tu' => '5000000', 'gia_den' => '7000000']) }}">
                            Từ 5 triệu - 7 triệu
                        </option>
                        <option
                            value="{{ request()->fullUrlWithQuery(['gia_tu' => '7000000', 'gia_den' => '10000000']) }}">
                            Từ 7 triệu - 10 triệu
                        </option>
                        <option
                            value="{{ request()->fullUrlWithQuery(['gia_tu' => '10000000', 'gia_den' => '15000000']) }}">
                            Từ 10 triệu - 15 triệu
                        </option>
                        <option
                            value="{{ request()->fullUrlWithQuery(['gia_tu' => '15000000', 'gia_den' => '20000000']) }}">
                            Từ 15 triệu - 20 triệu
                        </option>
                        <option
                            value="{{ request()->fullUrlWithQuery(['gia_tu' => '20000000', 'gia_den' => '50000000']) }}">
                            Từ 20 triệu - 50 triệu
                        </option>
                        <option
                            value="{{ request()->fullUrlWithQuery(['gia_tu' => '50000000', 'gia_den' => '100000000']) }}">
                            Từ 50 triệu - 100 triệu
                        </option>
                    </select>
                </div>
                <div class="facet">
                    <label>Sắp xếp</label>
                    <select onchange="window.location = this.value;">
                        <option>Chọn cách sắp xếp</option>
                        <option value="{{ route('client.category', $category->c_slug) }}">
                            Mặc định</option>
                        <option value="{{ request()->fullUrlWithQuery(['sort' => 'price_asc']) }}">
                            Giá thấp đến cao</option>
                        <option value="{{ request()->fullUrlWithQuery(['sort' => 'price_desc']) }}">
                            Giá cao đến thấp</option>
                        <option value="{{ request()->fullUrlWithQuery(['sort' => 'name_asc']) }}">
                            Tên: A - Z
                        </option>
                        <option value="{{ request()->fullUrlWithQuery(['sort' => 'name_desc']) }}">
                            Tên: Z - A
                        </option>
                        <option value="{{ request()->fullUrlWithQuery(['sort' => 'view']) }}">
                            Xem nhiều nhất
                        </option>
                        <option value="{{ request()->fullUrlWithQuery(['sort' => 'new']) }}">
                            Mới nhất
                        </option>
                        <option value="{{ request()->fullUrlWithQuery(['sort' => 'old']) }}">
                            Cũ nhất
                        </option>
                    </select>
                </div>
            </div>
        </section>
        <section>
            <div class="list-product">
                <h3>{{ $category->c_name }}</h3>
                @if (count($products) > 0)
                    <div class="col-content lts-product col-product">
                        @foreach ($products as $product)
                            <div class="item">
                                <div class="img">
                                    <a href="{{ route('client.product', [
                                        'slug' => $product->category->c_slug,
                                        'brand' => $product->brand->b_slug,
                                        'product' => $product->pro_slug,
                                    ]) }}"
                                        title="{{ $product->pro_name }}">
                                        <img src="{{ asset('images/products/' . $product->pro_avatar) }}"
                                            style="height: 200px" alt="{{ $product->pro_name }}"
                                            title="{{ $product->pro_name }}">
                                    </a>
                                </div>

                                <div class="stars-comment">
                                    @if ($product->comments)
                                        @for ($i = 0; $i < $product->comments->avg('star'); $i++)
                                            <i class="fa fa-star" aria-hidden="true" style="font-size:15px"></i>
                                        @endfor
                                    @else
                                        <i class="fa fa-star" aria-hidden="true" style="font-size:15px"></i>
                                    @endif
                                </div>
                                @if ($product->pro_sale > 0)
                                    <div class="cover">
                                        <div
                                            style="color: yellow;
                                        background: #00483D;
                                        margin: 25px 20px 15px 15px;
                                        padding: 3px;
                                        border-radius: 6px;
                                        font-size:6px
                                        font-weight: 600;">
                                            <marquee behavior="alternate">
                                                <marquee width="150">
                                                    <span style="color:white">Giảm tới
                                                        {{ number_format($product->pro_price * ($product->pro_sale / 100), 0, ',', '.') }}đ</span>
                                                </marquee>
                                            </marquee>
                                        </div>
                                    </div>
                                @endif
                                <div class="sticker sticker-left">
                                    @if (rand(1, 10) % 2 == 0)
                                        <span><img src="{{ asset('images/hot.png') }}" title="Chính hãng Apple"
                                                alt="s"></span>
                                    @else
                                        <span><img src="{{ asset('images/bao-hanh-24t.png') }}" alt="s"
                                                title="Chính hãng Apple"></span>
                                    @endif
                                </div>
                                <div class="info">
                                    <a href="{{ route('client.product', [
                                        'slug' => $product->category->c_slug,
                                        'brand' => $product->brand->b_slug,
                                        'product' => $product->pro_slug,
                                    ]) }}"
                                        class="title" title="{{ $product->pro_name }}">{{ $product->pro_name }}</a>
                                    <span class="price">
                                        <strong>{{ number_format($product->pro_price - $product->pro_price * ($product->pro_sale / 100), 0, ',', '.') }}đ</strong>
                                        @if ($product->pro_sale > 0)
                                            <strike>{{ number_format($product->pro_price, 0, ',', '.') }}
                                                ₫</strike>
                                        @endif
                                    </span>

                                </div>
                                @if (count($product->sales))
                                    <div class="promote">
                                        <ul>
                                            @foreach ($product->sales as $sale)
                                                @if ($sale->sales->s_active == 1)
                                                    <li><span class="bag">KM</span>
                                                        {{ $sale->sales->s_name }}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                            </div>
                        @endforeach
                    </div>
                @else
                    Không có sản phẩm nào phù hợp
                @endif
                <ul class="pagination pagination-lg">
                    {!! $products->appends(Request::all())->links() !!}
                </ul>
            </div>
        </section>
    </div>
</main>
@stop
