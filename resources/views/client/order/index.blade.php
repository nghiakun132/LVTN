@extends('layouts.client')
@section('content')
@section('title', 'Đơn hàng của tôi')


<main id="main" class="main-site" style="background-color: rgb(245, 245, 250);">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">Trang chủ</a></li>
                <li class="item-link"><span>Thông tin tài khoản</span></li>
            </ul>
        </div>
        <div class="main-content-area">
            <div class="wrapper">
                @include('components.aside')
                <div class="infomation">
                    <div class="account-info">Quản lý đơn hàng</div>
                    <div class="styles__StyledTab-sc-e27b7w-2 krSXKE">
                        <div width="16.666666666666668%" class="order-active"><a href="">Tất
                                cả đơn</a></div>
                        <div width="16.666666666666668%" class="order-status" data-status="pending"><a
                                href="{{ request()->fullUrlWithQuery(['status' => 'pending']) }}">Chờ
                                thanh toán</a></div>
                        <div width="16.666666666666668%" class="order-status" data-status="processing"><a
                                href="{{ request()->fullUrlWithQuery(['status' => 'processing']) }}">Đang
                                xử
                                lý</a></div>
                        <div width="16.666666666666668%" class="order-status" data-status="shipping"><a
                                href="{{ request()->fullUrlWithQuery(['status' => 'shipping']) }}">Đang
                                vận chuyển</a></div>
                        <div width="16.666666666666668%" class="order-status" data-status="shipped"><a
                                href="{{ request()->fullUrlWithQuery(['status' => 'shipped']) }}">Đã
                                giao</a></div>
                        <div width="16.666666666666668%" class="order-status" data-status="canceled"><a
                                href="{{ request()->fullUrlWithQuery(['status' => 'canceled']) }}">Đã
                                huỷ</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
