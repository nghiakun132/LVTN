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
                        <div width="16.666666666666668%"
                            class="
                            {{ !request()->get('status') == 1 ? 'order-active' : 'order-status' }}
                            ">
                            <a style="padding: 10px" href="{{ route('client.order') }}">Tất
                                cả đơn</a>
                        </div>
                        <div width="16.666666666666668%"
                            class="
                        {{ request()->get('status') == 'cho-xac-nhan' ? 'order-active' : 'order-status' }}
                        "
                            data-status="cho-xac-nhan"><a style="padding: 10px"
                                href="{{ request()->fullUrlWithQuery(['status' => 'cho-xac-nhan']) }}">Chờ xác nhận
                            </a></div>
                        <div width="16.666666666666668%"
                            class="{{ request()->get('status') == 'da-xac-nhan' ? 'order-active' : 'order-status' }}"
                            data-status="da-xac-nhan"><a style="padding: 10px"
                                href="{{ request()->fullUrlWithQuery(['status' => 'da-xac-nhan']) }}">Đã xác nhận</a>
                        </div>
                        <div width="16.666666666666668%"
                            class="{{ request()->get('status') == 'dang-van-chuyen' ? 'order-active' : 'order-status' }}"
                            data-status="dang-van-chuyen"><a style="padding: 10px"
                                href="{{ request()->fullUrlWithQuery(['status' => 'dang-van-chuyen']) }}">Đang
                                vận chuyển</a></div>
                        <div width="16.666666666666668%"
                            class="{{ request()->get('status') == 'da-giao' ? 'order-active' : 'order-status' }}"
                            data-status="da-giao"><a style="padding: 10px"
                                href="{{ request()->fullUrlWithQuery(['status' => 'da-giao']) }}">Đã
                                giao</a></div>
                        <div width="16.666666666666668%"
                            class="{{ request()->get('status') == 'da-huy' ? 'order-active' : 'order-status' }}"
                            data-status="da-huy"><a style="padding: 10px"
                                href="{{ request()->fullUrlWithQuery(['status' => 'da-huy']) }}">Đã
                                huỷ</a></div>
                    </div>
                    <div class="width-screen">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID đơn hàng</th>
                                        <th>Tổng tiền</th>
                                        <th>Ngày đặt</th>
                                        <th>Trạng thái</th>
                                        <th>Hình thức thanh toán</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($orders) > 0)
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>#{{ $order->order_code }}</td>
                                                <td>{{ number_format($order->total, 0, ',', ',') . 'đ' }}
                                                </td>
                                                <td>{{ $order->created_at }}</td>
                                                <td>
                                                    @if ($order->status == 1)
                                                        <span class="label label-warning">Đang
                                                            chờ</span>
                                                    @elseif ($order->status == 2)
                                                        <span class="label label-success">Đã xác
                                                            nhận</span>
                                                    @elseif ($order->status == 3)
                                                        <span class="label label-danger">Đang
                                                            vận chuyển</span>
                                                    @elseif ($order->status == 4)
                                                        <span class="label label-info">Đã giao
                                                            hàng</span>
                                                    @elseif ($order->status == 0)
                                                        <span class="label label-danger">Đã hủy
                                                            đơn</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $order->payment_method }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('client.order.detail', $order->id) }}"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>Chi tiết</a>
                                                    @if ($order->status == 1)
                                                        <a href="{{ route('client.order.cancel', $order->id) }}">
                                                            <button class="btn btn-danger btn-sm">
                                                                <i class="fa fa-times" aria-hidden="true"></i> Hủy
                                                            </button>
                                                        </a>
                                                    @endif
                                                </td>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" style="text-align:center">Không có đơn
                                                hàng
                                                nào</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @stop
