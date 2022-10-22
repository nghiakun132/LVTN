@extends('layouts.admin')
@section('title', 'Quản lý khách hàng')
@section('content')
    <style>
        .user-active {
            cursor: pointer;
        }
    </style>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Quản lý khách hàng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Quản lý khách hàng</li>
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
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Họ tên</th>
                                                        <th>Email</th>
                                                        <th>Số điện thoại</th>
                                                        <th>Địa chỉ</th>
                                                        <th>
                                                            Tổng tiền đã mua
                                                        </th>
                                                        <th>Trạng thái</th>
                                                        <th>Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($users as $user)
                                                        <tr>
                                                            <td>
                                                                {{ $user->id }}
                                                            </td>
                                                            <td>
                                                                {{ $user->name }}
                                                            </td>
                                                            <td>
                                                                {{ $user->email }}
                                                            </td>
                                                            <td>
                                                                {{ $user->phone }}
                                                            </td>
                                                            <td>
                                                                @foreach ($user->address as $address)
                                                                    <span
                                                                        class="badge badge-{{ rand(1, 5) == 1 ? 'primary' : (rand(1, 5) == 2 ? 'success' : (rand(1, 5) == 3 ? 'warning' : (rand(1, 5) == 4 ? 'danger' : 'info'))) }}
                                                                        ">{{ $address->address }}</span>
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @php
                                                                    $total = 0;
                                                                    foreach ($user->order as $order) {
                                                                        $total += $order->total;
                                                                    }
                                                                @endphp
                                                                {{ number_format($total) }} VNĐ
                                                            </td>
                                                            <td>
                                                                @if ($user->status == 0)
                                                                    <a data-id="{{ $user->id }}"
                                                                        class="user-active"><span
                                                                            class="badge badge-success">Hoạt
                                                                            động</span></a>
                                                                @else
                                                                    <a data-id="{{ $user->id }}"
                                                                        class="user-active"><span
                                                                            class="badge
                                                                        badge-danger">Khóa</span></a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-danger btn-sm text-white"
                                                                    href="{{ route('admin.user.delete', $user->id) }}">
                                                                    <i class="fas fa-trash">
                                                                    </i>
                                                                    Xóa
                                                                </a>
                                                            </td>
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
                </section>
            </div>
        </div>
    </div>
@stop
