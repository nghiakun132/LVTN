@extends('layouts.admin')
@section('title', 'Chi tiết đơn hàng')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Chi tiết đơn hàng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="btn btn-secondary btn-sm text-white float-right"
                                            href="{{ route('admin.order.index') }}">
                                            <i class="fa fa-user-circle " aria-hidden="true"></i> Quay lại
                                        </a>
                                        @if (!$order->status == 0)
                                            <a href="{{ route('admin.order.print', $order->id) }}" target="_blank"
                                                class="btn btn-primary btn-sm text-white float-right mr-2">
                                                <i class="fa fa-print" aria-hidden="true"></i> In đơn hàng
                                            </a>
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5>Thông tin khách hàng</h5>
                                                <p><strong>Tên khách hàng:</strong> {{ $order->user->name }}</p>
                                                <p><strong>Số điện thoại:</strong> {{ $order->user->phone }}</p>
                                                <p><strong>Email:</strong> {{ $order->user->email }}</p>
                                                <p><strong>Địa chỉ:</strong> {{ $order->address->address }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <h5>Thông tin đơn hàng</h5>
                                                <p><strong>Mã đơn hàng:</strong> {{ $order->order_code }}</p>
                                                <p>
                                                    Tổng tiền: <strong>{{ number_format($order->total, 0, '', '.') }}
                                                        đ</strong>
                                                </p>
                                                <p><strong>Trạng thái:</strong>
                                                    @if ($order->status == 1)
                                                        <span class="badge badge-primary">Chờ xác nhận</span>
                                                    @elseif($order->status == 2)
                                                        <span class="badge badge-success">Đã xác nhận</span>
                                                    @elseif($order->status == 3)
                                                        <span class="badge badge-warning">Đang vận chuyển</span>
                                                    @elseif($order->status == 4)
                                                        <span class="badge badge-info">Đã giao</span>
                                                    @else
                                                        <span class="badge badge-danger">Đã hủy</span>
                                                    @endif
                                                </p>
                                                <p><strong>Phương thức thanh toán:</strong>
                                                    <span class="badge badge-primary">{{ $order->payment_method }}</span>
                                                </p>
                                                <p><strong>Ngày đặt hàng:</strong> {{ $order->created_at }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5>Chi tiết đơn hàng</h5>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10px">#</th>
                                                            <th>Tên sản phẩm</th>
                                                            <th>Ảnh</th>
                                                            <th>Giá</th>
                                                            <th>Số lượng</th>
                                                            <th>Thành tiền</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($order->orderDetails as $key => $item)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $item->product->pro_name }}</td>
                                                                <td>
                                                                    <img src="{{ asset('images/products/' . $item->product->pro_avatar) }}"
                                                                        alt="{{ $item->product->pro_name }}" width="100"
                                                                        height="100">
                                                                </td>
                                                                <td>{{ number_format($item->price, 0, ',', '.') }} VNĐ</td>
                                                                <td>{{ $item->quantity }}</td>
                                                                <td>{{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                                                    VNĐ</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@stop
