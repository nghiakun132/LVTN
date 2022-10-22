@extends('layouts.client')
@section('content')
@section('title', 'Danh sách yêu thích')
<main id="main" class="main-site" style="background-color: rgb(245, 245, 250);">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('client.home') }}" class="link">Trang chủ</a></li>
                <li class="item-link"><span>Danh sách yêu thích </span></li>
            </ul>
        </div>
        <section>
            <div class="container">
                <div class="list-product">
                    <h3>Danh sách yêu thích </h3>
                    <div class="card">
                        @if (isset($products) && count($products) == 0)
                            Không có sản phẩm nào trong danh sách yêu
                            thích
                        @else
                            <div class="col-content lts-product col-product">
                                @foreach ($products as $product)
                                    <div class="item">
                                        <div class="img">
                                            <a href="{{ route('client.product', [
                                                'slug' => $product->product->category->c_slug,
                                                'brand' => $product->product->brand->b_slug,
                                                'product' => $product->product->pro_slug,
                                            ]) }}"
                                                title="{{ $product->product->pro_name }}">
                                                <img style="height: 200px"
                                                    src="{{ asset('images/products/' . $product->product->pro_avatar) }}"
                                                    alt="{{ $product->product->pro_name }}"
                                                    title="{{ $product->product->pro_name }}">
                                            </a>
                                        </div>
                                        @if ($product->product->pro_sale > 0)
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
                                                                {{ number_format($product->product->pro_price * ($product->product->pro_sale / 100), 0, ',', '.') }}đ</span>
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
                                                'slug' => $product->product->category->c_slug,
                                                'brand' => $product->product->brand->b_slug,
                                                'product' => $product->product->pro_slug,
                                            ]) }}"
                                                class="title"
                                                title="{{ $product->product->pro_name }}">{{ $product->product->pro_name }}</a>
                                            <span class="price">
                                                <strong>{{ number_format($product->product->pro_price - $product->product->pro_price * ($product->product->pro_sale / 100), 0, ',', '.') }}đ</strong>
                                                @if ($product->product->pro_sale > 0)
                                                    <strike>{{ number_format($product->product->pro_price, 0, ',', '.') }}
                                                        ₫</strike>
                                                @endif
                                            </span>

                                        </div>
                                        @if ($product->product->sales && count($product->product->sales) > 0)
                                            <div class="promote">
                                                <a
                                                    href="{{ route('client.product', [
                                                        'slug' => $product->product->category->c_slug,
                                                        'brand' => $product->product->brand->b_slug,
                                                        'product' => $product->product->pro_slug,
                                                    ]) }}">
                                                    <ul>
                                                        @foreach ($product->product->sales as $sale)
                                                            <li><span class="bag">KM</span>
                                                                {{ $sale->sales->s_name }}</li>
                                                        @endforeach
                                                    </ul>
                                                </a>
                                            </div>
                                        @endif
                                        <a class="btn delete-wishlist"
                                            data-id="{{ $product->product->pro_id }}">Xóa</a>

                                    </div>
                                @endforeach
                            </div>
                        @endif

                    </div>
                </div>
                <ul class="pagination pagination-lg">
                    {{ $products ? $products->appends(Request::all())->links() : '' }}
                </ul>
            </div>
    </div>
    </section>
    </div>
</main>
@stop
