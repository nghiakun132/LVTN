@extends('layouts.client')
@section('content')
@section('title', $category->c_name . ' ' . $brand->b_name)
<style>
    .active-brand {
        border: 1px solid rgb(246, 13, 13);
    }
</style>
<main id="main" class="main-site" style="background-color: rgb(245, 245, 250);">
    <div class="container">
        {{-- <div class="top-category-ads">
            <div class="ads-container">
                <div class="full item">
                    <a href="https://hoanghamobile.com/dien-thoai-di-dong/xiaomi-11t-pro-5g-12gb-256gb-chinh-hang-dgw?utm_source=web&amp;utm_medium=Homebanner&amp;utm_content=1108_xiaomi11Tpro&amp;utm_campaign=xiaomi11Tpro"
                        target="_top"><img
                            src="https://cdn.hoanghamobile.com/i/home/Uploads/2022/08/11/xiaomi-11-t-pro-1200x200_637958271379689466.jpg"
                            class="img-responsive img-border-radius"></a>
                </div>
            </div>
        </div> --}}
        <section id="quick">
            <div class="lst-quickfilter q-manu">
                @foreach ($brands as $value)
                    <a href="{{ route('client.brand', [
                        'slug' => $category->c_slug,
                        'brand' => $value->b_slug,
                    ]) }}"
                        class="box-quicklink__item bd-radius quicklink-logo {{ $value->b_name == $brand->b_name ? 'active-brand' : '' }}">
                        <img src="{{ asset('images/brands/' . $value->b_banner) }}" width="30" class="no-text">
                    </a>
                @endforeach
            </div>
        </section>
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('client.home') }}" class="link">Trang chủ</a></li>
                <li class="item-link"><a
                        href="{{ route('client.category', $category->c_slug) }}">{{ $category->c_name }}</a></li>
                <li class="item-link"><span>{{ $brand->b_name }}</span></li>
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
            <div class="container">
                <div class="list-product">
                    <h3>{{ $category->c_name }} {{ $brand->b_name }}</h3>
                    <div class="card">
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
                                            <span><img src="{{ asset('images/bao-hanh-24t.png') }}"
                                                    title="Chính hãng Apple"></span>
                                        </div>
                                        <div class="info">
                                            <a href="{{ route('client.product', [
                                                'slug' => $product->category->c_slug,
                                                'brand' => $product->brand->b_slug,
                                                'product' => $product->pro_slug,
                                            ]) }}"
                                                class="title"
                                                title="{{ $product->pro_name }}">{{ $product->pro_name }}</a>
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
                                                <a href="/dien-thoai-di-dong/oppo-reno6-z-5g-chinh-hang">
                                                    <ul>
                                                        @foreach ($product->sales as $sale)
                                                            <li><span class="bag">KM</span>
                                                                {{ $sale->sales->s_name }}</li>
                                                        @endforeach
                                                    </ul>
                                                </a>
                                            </div>
                                        @endif

                                    </div>
                                @endforeach
                            </div>
                        @else
                            Không có sản phẩm nào
                        @endif
                    </div>
                    <ul class="pagination pagination-lg">
                        {!! $products->appends(Request::all())->links() !!}
                    </ul>
                </div>
            </div>
        </section>
    </div>
</main>
@stop
