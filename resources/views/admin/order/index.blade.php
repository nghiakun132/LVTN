@extends('layouts.admin')
@section('title', 'Quản lý mã giảm giá')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Quản lý mã giảm giá</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Quản lý mã giảm giá</li>
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
                                            href="{{ route('admin.home') }}">
                                            <i class="fa fa-user-circle " aria-hidden="true"></i> Quay lại
                                        </a>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link {{ !request()->get('status') == 1 ? 'active' : '' }}"
                                                    href="{{ route('admin.order.index') }}">Tất cả
                                                    đơn
                                                    hàng</a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link {{ request()->get('status') == 'cho-xac-nhan' ? 'active' : '' }}"
                                                    href="{{ request()->fullUrlWithQuery(['status' => 'cho-xac-nhan']) }}">Chờ
                                                    xác nhận</a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link {{ request()->get('status') == 'da-xac-nhan' ? 'active' : '' }}"
                                                    href="{{ request()->fullUrlWithQuery(['status' => 'da-xac-nhan']) }}">Đã
                                                    xác nhận</a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link {{ request()->get('status') == 'dang-van-chuyen' ? 'active' : '' }}"
                                                    href="{{ request()->fullUrlWithQuery(['status' => 'dang-van-chuyen']) }}">Đang
                                                    vận chuyển</a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link {{ request()->get('status') == 'da-giao' ? 'active' : '' }}"
                                                    href="{{ request()->fullUrlWithQuery(['status' => 'da-giao']) }}">Đã
                                                    giao</a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link {{ request()->get('status') == 'da-huy' ? 'active' : '' }}"
                                                    href="{{ request()->fullUrlWithQuery(['status' => 'da-huy']) }}">Đã
                                                    hủy</a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive-xl">
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Mã đơn hàng</th>
                                                        <th>Tổng tiền</th>
                                                        <th>Trạng thái</th>
                                                        <th>Thời gian đặt hàng</th>
                                                        <th>Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (isset($orders))
                                                        @foreach ($orders as $order)
                                                            <tr>
                                                                <td>
                                                                    {{ $loop->iteration }}
                                                                </td>
                                                                <td>
                                                                    #{{ $order->order_code }}
                                                                </td>
                                                                <td>
                                                                    {{ number_format($order->total, 0, ',', '.') }} VNĐ
                                                                </td>
                                                                <td>
                                                                    <a
                                                                        href="{{ $order->status != 0
                                                                        ? route('admin.order.confirm', $order->id) : 'javascript:;' }}">
                                                                        {!! $order->getStatus($order->status) !!}
                                                                    </a>
                                                                </td>
                                                                </td>
                                                                <td>
                                                                    {{ $order->created_at }}
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('admin.order.detail', $order->id) }}"
                                                                        class="btn btn-primary btn-sm text-white">
                                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                                        Xem
                                                                    </a>
                                                                    @if ($order->status == 1)
                                                                        <a href="{{ route('admin.order.cancel', $order->id) }}"
                                                                            class="btn btn-danger btn-sm text-white">
                                                                            <i class="fa fa-times" aria-hidden="true"></i>
                                                                            Huỷ
                                                                        </a>
                                                                    @endif
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
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
