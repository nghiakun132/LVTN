@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Đơn hàng mới nhất</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0 table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Tên khách hàng</th>
                                                <th>Tổng tiền</th>
                                                <th>Trạng thái</th>
                                                <th>Ngày đặt hàng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ordersLatest as $order)
                                                <tr>
                                                    <td><a
                                                            href="{{ route('admin.order.detail', $order->id) }}">{{ $order->order_code }}</a>
                                                    </td>
                                                    <td>{{ $order->user->name }}</td>

                                                    <td>
                                                        {!! $order->getStatus($order->status) !!}
                                                    </td>
                                                    <td>
                                                        <div class="sparkbar">
                                                            {{ number_format($order->total, 0, ',', '.') }} VNĐ
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{ $order->created_at }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer clearfix">
                                <a href="{{ route('admin.order.index') }}" class="btn btn-sm btn-secondary float-right">
                                    Xem tất cả đơn hàng
                                </a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Khách hàng mới nhất</h3>

                                <div class="card-tools">
                                    <span class="badge badge-danger">{{ count($users) }} khách hàng mới</span>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <ul class="users-list clearfix">
                                    @foreach ($users as $user)
                                        <li>
                                            <img src="{{ $user->type == 2 ? $user->avatar : asset('images/avatar/' . $user->avatar) }}"
                                                alt="User Image">
                                            <a class="users-list-name" href="#">
                                                {{ $user->name }}
                                                <span class="users-list-date">{{ $user->created_at }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <!-- /.users-list -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <a href="javascript:">View All Users</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Doanh thu</h3>
                                    <div class="dropdown">
                                        <button class="btn btn-tool dropdown-toggle" type="button" data-toggle="dropdown">
                                            <i class="fas fa-calendar-alt"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{ request()->fullUrlWithQuery(['period' => 'week']) }}"
                                                class="dropdown-item">
                                                <i class="fas fa-calendar-week"></i> Week
                                            </a>
                                            <a href="{{ request()->fullUrlWithQuery(['period' => 'month']) }}"
                                                class="dropdown-item">
                                                <i class="fas fa-calendar"></i> Month
                                            </a>
                                            <a href="{{ request()->fullUrlWithQuery(['period' => 'year']) }}"
                                                class="dropdown-item">
                                                <i class="fas fa-calendar-times"></i> Year
                                            </a>
                                        </div>
                                    </div>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">
                                            {{ number_format($total, 0, ',', '.') . ' đ' }}
                                        </span>
                                        {{-- <span>Sales Over Time</span> --}}
                                    </p>
                                    <p class="ml-auto d-flex flex-column text-right">
                                        @if ($totalBefore > $total && $totalBefore != 0)
                                            <span class="text-danger">
                                                <i class="fas fa-arrow-down"></i>
                                                {{ number_format(($totalBefore / $total) * 100 - 100, 0, ',', '.') . '%' }}
                                            </span>
                                        @else
                                            <span class="text-success">
                                                <i class="fas fa-arrow-up"></i>
                                                {{ !empty($totalBefore) ? number_format(($total / $totalBefore) * 100 - 100, 0, ',', '.') . '%' : '0%' }}
                                            </span>
                                        @endif
                                        <span class="text-muted">So với
                                            {{ $period == 'week' ? 'tuần trước' : ($period == 'month' ? 'tháng trước' : 'năm trước') }}</span>
                                    </p>
                                </div>

                                <div class="position-relative mb-4">
                                    <canvas id="sales-chart" height="200"></canvas>
                                </div>

                                <div class="d-flex flex-row justify-content-end">
                                    <span class="mr-2 title-bar">
                                        <i class="fas fa-square text-primary"></i> This year
                                    </span>
                                    <span class="title-bar">
                                        <i class="fas fa-square text-gray"></i> Last year
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">Online Store Overview</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                    <p class="text-success text-xl">
                                        <i class="ion ion-ios-refresh-empty"></i>
                                    </p>
                                    <p class="d-flex flex-column text-right">
                                        <span class="font-weight-bold">
                                            <i class="ion ion-android-arrow-up text-success"></i> 12%
                                        </span>
                                        <span class="text-muted">CONVERSION RATE</span>
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                    <p class="text-warning text-xl">
                                        <i class="ion ion-ios-cart-outline"></i>
                                    </p>
                                    <p class="d-flex flex-column text-right">
                                        <span class="font-weight-bold">
                                            <i class="ion ion-android-arrow-up text-warning"></i> 0.8%
                                        </span>
                                        <span class="text-muted">SALES RATE</span>
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-0">
                                    <p class="text-danger text-xl">
                                        <i class="ion ion-ios-people-outline"></i>
                                    </p>
                                    <p class="d-flex flex-column text-right">
                                        <span class="font-weight-bold">
                                            <i class="ion ion-android-arrow-down text-danger"></i> 1%
                                        </span>
                                        <span class="text-muted">REGISTRATION RATE</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
