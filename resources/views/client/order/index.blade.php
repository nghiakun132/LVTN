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
                    <div class="wrap-product-detail">
                        <div class="advance-info khong-cach">
                            <div class="tab-control normal">
                                <a href="#orders" class="tab-control-item active">Tất cả đơn hàng</a>
                                <a href="#wait" class="tab-control-item">Đang chờ duyệt</a>
                                <a href="#confirmed" class="tab-control-item">Đã xác nhận</a>
                                <a href="#delivered" class="tab-control-item">Đã giao hàng</a>
                                <a href="#cancel" class="tab-control-item">Đã hủy</a>
                            </div>
                            <div class="tab-contents">
                                <div class="tab-content-item active" id="orders">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="myTable" width="100%"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID đơn hàng</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Ngày đặt</th>
                                                    <th>Trạng thái</th>
                                                    <th>Mã giảm giá (Nếu có)</th>
                                                    <th>Hình thức thanh toán</th>
                                                    <th>Chi tiết</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-content-item " id="wait">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="myTable" width="100%"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID đơn hàng</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Ngày đặt</th>
                                                    <th>Trạng thái</th>
                                                    <th>Mã giảm giá (Nếu có)</th>
                                                    <th>Hình thức thanh toán</th>
                                                    <th>Chi tiết</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-content-item " id="delivered">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="myTable" width="100%"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID đơn hàng</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Ngày đặt</th>
                                                    <th>Trạng thái</th>
                                                    <th>Mã giảm giá (Nếu có)</th>
                                                    <th>Hình thức thanh toán</th>
                                                    <th>Chi tiết</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-content-item " id="cancel">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="myTable" width="100%"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID đơn hàng</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Ngày đặt</th>
                                                    <th>Trạng thái</th>
                                                    <th>Mã giảm giá (Nếu có)</th>
                                                    <th>Hình thức thanh toán</th>
                                                    <th>Chi tiết</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
