@extends('layouts.client')
@section('content')
@section('title', 'Thanh toán')
<main id="main" class="main-site">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('client.home') }}" class="link">Trang chủ</a></li>
                <li class="item-link"><span>Thanh toán</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            <div class="wrap-iten-in-cart">
                <h3 class="box-title">Tên sản phẩm</h3>
                <ul class="products-cart">
                    @foreach ($carts as $cart)
                        <li class="pr-cart-item">
                            <div class="product-image">
                                <figure><img src="../../images/products/{{ $cart->products->pro_avatar }}"
                                        alt="">
                                </figure>
                            </div>
                            <div class="product-name">
                                <a class="link-to-product" href="#">{{ $cart->products->pro_name }}</a>
                            </div>
                            <div class="price-field produtc-price">
                                <p class="price">
                                    {{ number_format($cart->price, 0, ',', '.') . ' VND' }}
                                </p>
                            </div>
                            <div class="quantity">
                                <div class="quantity-input">
                                    <input type="text" name="product_quatity" value="{{ $cart->quantity }}" disabled>
                                </div>
                            </div>
                            <input type="hidden" value="#" name="cart_id">
                            <div class="price-field sub-total">
                                <p class="price">
                                    {{ number_format($cart->price * $cart->quantity, 0, ',', '.') . ' VND' }}
                                </p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="summary summary-checkout">
                <form action="{{ route('client.cart.checkoutPost') }}" method="post">
                    @csrf
                    <div class="summary-item payment-method">
                        <h4 class="title-box">Phương thức thanh toán</h4>
                        <div class="choose-payment-methods">
                            <label class="payment-method">
                                <input name="payment_method" id="payment-method-bank" value="VnPay" type="radio"
                                    required>
                                <span>Thanh toán qua VnPay</span>
                            </label>
                            <label class="payment-method">
                                <input name="payment_method" id="payment-method-visa" value="COD" type="radio"
                                    required>
                                <span>Thanh toán khi nhận hàng</span>
                            </label>
                            <label class="payment-method">
                                <input name="payment_method" id="payment-method-momo" value="MOMO" type="radio"
                                    required>
                                <span>Thanh toán qua MOMO</span>
                            </label>
                            <label class="payment-method">
                                <input name="payment_method" id="payment-method-paypal" value="Paypal" type="radio"
                                    required>
                                <span>Thanh toán qua Paypal</span>
                            </label>
                        </div>
                        <p class="summary-info grand-total"><span>Giảm giá</span> <span
                                class="grand-total-price text-danger">&nbsp;&nbsp;


                                {{ session('coupon') ? number_format($total * (session('coupon')['discount'] / 100), 0, ',', '.') . ' VND' : 0 }}</span>
                        </p>
                        </span>
                        </p>
                        <p class="summary-info grand-total"><span>Thành tiền</span> <span class="grand-total-price">
                                {{ session('coupon')
                                    ? number_format($total - $total * (session('coupon')['discount'] / 100), 0, ',', '.') . ' VND'
                                    : number_format($total, 0, ',', '.') . ' VND' }}
                            </span>
                        </p>

                        <textarea name="note" id="note" cols="10" class="form-control" rows="5" style="margin-bottom: 5px" placeholder="Ghi chú đơn hàng"></textarea>

                        <button class="btn btn-medium btn-order">Đặt hàng ngay</button>
                        {{-- @if ($countCart > 0)
                            <button class="btn btn-medium" name="redirect">Đặt hàng ngay</button>
                        @else
                            <button class="btn btn-medium" disabled
                                onclick="return alert('Thêm gì đó vào giỏ hàng đi!!!!!!!')">Đặt hàng ngay</button>
                        @endif --}}
                    </div>
                    <div class="summary-item shipping-method">
                        <h4 class="title-box f-title">Thông tin người nhận</h4>
                        <table class="table table-striped">
                            <tr>
                                <th>
                                    Họ tên :
                                </th>
                                <td>
                                    <b>{{ $user->name }}</b>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Địa chỉ :
                                </th>
                                <td>
                                    <select class="form-control select_add" name="address_user" id="address-user">
                                        @foreach ($user->address as $address)
                                            <option value="{{ $address->id }}"
                                                {{ $address->default == 1 ? 'selected' : '' }}>{{ $address->address }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    SĐT :
                                </th>
                                <td>
                                    <b>{{ $user->phone }}</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="{{ route('client.address.create') }}" id="myBtn"
                                        class="btn btn-info">Thêm địa chỉ</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
                <br>
                <div class="summary-item shipping-method">
                    <h4 class="title-box">Mã giảm giá</h4>
                    <form action="{{ route('client.cart.applyCoupon') }}" method="POST">
                        @csrf
                        <p class="row-in-form">
                            <label for="coupon-code">Nhập mã giảm giá:</label>
                            <input id="coupon-code2" type="text" name="coupon_code" placeholder="Nhập mã giảm giá"
                                value="{{ session('coupon') ? session('coupon')['name'] : '' }}"
                                {{ session('coupon') ? 'disabled' : '' }}>
                            <button type="submit" class="btn btn-small" {{ session('coupon') ? 'disabled' : '' }}>Áp
                                dụng</button>
                        </p>
                        <a href="#" class="btn btn-small btn-delete-coupon"
                            {{ session('coupon') ? '' : 'disabled' }}>Xóa
                            mã giảm giá</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@stop
