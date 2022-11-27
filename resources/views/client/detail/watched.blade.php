@extends('layouts.client')
@section('content')
@section('title', 'Sản phẩm đã xem')
<main id="main" class="main-site" style="background-color: rgb(245, 245, 250);">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('client.home') }}" class="link">Trang chủ</a></li>
                <li class="item-link"><span>Sản phẩm đã xem</span></li>
            </ul>
        </div>
        <section>
            <div class="container">
                <div class="list-product">
                    <h3>Sản phẩm đã xem</h3>
                    @if (isset($products) && count($products) == 0)
                        Không có sản phẩm nào trong danh sách đã xem
                    @else
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
                                            <img style="height: 200px"
                                                src="{{ asset('images/products/' . $product->pro_avatar) }}"
                                                alt="{{ $product->pro_name }}" title="{{ $product->pro_name }}">
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
                                            <a
                                                href="{{ route('client.product', [
                                                    'slug' => $product->category->c_slug,
                                                    'brand' => $product->brand->b_slug,
                                                    'product' => $product->pro_slug,
                                                ]) }}">
                                                <ul>
                                                    @foreach ($product->sales as $sale)
                                                    @if ($sale->sales->s_active == 1)
                                                    <li><span class="bag">KM</span>
                                                        {{ $sale->sales->s_name }}</li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </a>
                                        </div>
                                    @endif

                                </div>
                            @endforeach
                        </div>
                    @endif
                    <ul class="pagination pagination-lg">
                        {{ $products ? $products->appends(Request::all())->links() : '' }}
                    </ul>
                </div>
            </div>
        </section>
    </div>
</main>
@stop
