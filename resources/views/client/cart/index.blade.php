@extends('layouts.client')
@section('content')
@section('title', 'Giỏ hàng')

<main id="main" class="main-site">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('client.home') }}" class="link">Trang chủ</a></li>
                <li class="item-link"><span>Giỏ hàng</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            <div class="wrap-iten-in-cart">
                <h3 class="box-title">Tên</h3>
                <ul class="products-cart">
                    @foreach ($carts as $cart)
                        <li class="pr-cart-item">
                            <div class="product-image">
                                <figure><img src="{{ '../images/products/' . $cart->products->pro_avatar }} "
                                        alt="">
                                </figure>
                            </div>
                            <div class="product-name">
                                <a class="link-to-product"
                                    href="{{ route('client.product', [
                                        'slug' => $cart->products->category->c_slug,
                                        'brand' => $cart->products->brand->b_slug,
                                        'product' => $cart->products->pro_slug,
                                    ]) }}">{{ $cart->products->pro_name }}</a>
                            </div>
                            <div class="price-field produtc-price">
                                <p class="price">
                                    {{ number_format($cart->price, 0, ',', ',') . ' VND' }}</p>
                            </div>
                            <div class="quantity">
                                <div class="quantity-input">
                                    <input type="number" name="product_quantity" value="{{ $cart->quantity }}"
                                        class="pro_quantity{{ $cart->id }}" min="1" pattern="[0-9]*"
                                        data-max="{{ $cart->products->pro_quantity }}">
                                    <a class="btn btn-increase" href="#"></a>
                                    <a class="btn btn-reduce" href="#"></a>
                                </div>
                            </div>
                            <input type="hidden" value="{{ $cart->id }}" name="cart_id">
                            <div class="price-field sub-total">
                                <p class="price">
                                    {{ number_format($cart->price * $cart->quantity, 0, ',', ',') . ' VND' }}
                            </div>
                            <div class="delete">
                                <button class="btn btn-warning update_cart" title=""
                                    data-id="{{ $cart->id }}">
                                    <span>Cập nhật</span>
                                    <i class="fa fa-edit"></i>
                                </button>
                            </div>

                            <div class="delete">
                                <a class="btn btn-delete2 delete-cart" data-id="{{ $cart->id }}" title="">
                                    <span>Xóa</span>
                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="summary">
                <div class="order-summary">
                    <h4 class="title-box">Đơn hàng</h4>
                    <p class="summary-info"><span class="title">Tạm tính</span><b class="index">
                            {{ number_format($total, 0, ',', ',') . ' VND' }}</b></p>
                    </b></p>
                    <p class="summary-info"><span class="title">Phí vận chuyển</span><b class="index">Miễn phí</b></p>
                    <p class="summary-info total-info "><span class="title">Thành tiền</span><b class="index">
                            {{ number_format($total, 0, ',', ',') . ' VND' }}</b></p>
                    </b>
                    </p>
                </div>
                <div class="checkout-info">
                    <a class="btn btn-checkout" href="{{ route('client.cart.checkout') }}">Thanh toán</a>
                    {{-- @if ($countCart > 0)
                    @else
                    <a class="btn btn-checkout" id="disabled_btn" disabled href="#" onclick="return alert('Giỏ hàng đang rỗng, Hãy thêm gì đó vào giỏ hang !!!')">Check out</a>
                    @endif --}}
                </div>
                <div class="update-clear">
                    <a class="btn btn-clear btn-primary" href="{{ route('client.home') }}">Tiếp tục mua hàng <i
                            class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    <a class="btn btn-clear btn-danger" id="delete-all" href="#">Xóa tất cả <i
                            class="fa fa-trash-o" aria-hidden="true"></i></a>
                    <a class="btn btn-clear btn-success" id="update-all" href="#">Cập nhật tất cả <i
                            class="fa fa-refresh" aria-hidden="true"></i></a>
                </div>
            </div>

            <div class="wrap-show-advance-info-box style-1 box-in-site">
                <h3 class="title-box">Sản phẩm nhiều lượt xem nhất</h3>
                <div class="wrap-products">
                    <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                        data-loop="true" data-nav="true" data-dots="false" data-autoplay="true"
                        data-autoplay-timeout="2000" data-autoplay-hover-pause="true"
                        data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>
                        @foreach ($mostViews as $mostView)
                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{ route('client.product', [
                                        'slug' => $mostView->category->c_slug,
                                        'brand' => $mostView->brand->b_slug,
                                        'product' => $mostView->pro_slug,
                                    ]) }}"
                                        title="{{ $mostView->pro_name }}">
                                        <figure><img src="images/products/{{ $mostView->pro_avatar }}" width="214"
                                                height="214" alt="{{ $mostView->pro_name }}">
                                        </figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item new-label" style="background-color: red">hot</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="{{ route('client.product', [
                                            'slug' => $mostView->category->c_slug,
                                            'brand' => $mostView->brand->b_slug,
                                            'product' => $mostView->pro_slug,
                                        ]) }}"
                                            class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="{{ route('client.product', [
                                        'slug' => $mostView->category->c_slug,
                                        'brand' => $mostView->brand->b_slug,
                                        'product' => $mostView->pro_slug,
                                    ]) }}"
                                        class="product-name"><span>{{ $mostView->pro_name }}</span></a>
                                    <div class="wrap-price"><span class="product-price">
                                            {{ number_format($mostView->pro_price - ($mostView->pro_price * $mostView->pro_sale) / 100, 0, ',', '.') }}
                                            ₫</span>
                                        @if ($mostView->pro_sale > 0)
                                            <del>
                                                <p class="product-price">
                                                    {{ number_format($mostView->pro_price, 0, ',', '.') }}
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
</main>
@stop
