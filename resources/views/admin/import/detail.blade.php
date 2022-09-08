@extends('layouts.admin')
@section('title', 'Quản lý nhập hàng')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Quản lý nhập hàng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Quản lý nhập hàng</li>
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
                                        <a class="btn btn-outline-warning btn-sm text-muted float-right"
                                            href="{{ route('admin.import.export') }}">
                                            <i class="fas fa-download"></i> Xuất file
                                        </a>
                                        <a class="btn btn-secondary btn-sm text-white"
                                            href="{{ route('admin.import.index') }}">
                                            <i class="fa fa-chevron-circle-left " aria-hidden="true"></i> Quay lại
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive-xl">
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Tên sản phẩm</th>
                                                        <th>Giá nhập</th>
                                                        <th>Số lượng</th>
                                                        <th>Thành tiền</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($import as $import)
                                                        @foreach ($import->import_details as $ip)
                                                            <tr>
                                                                <td>
                                                                    {{ $ip->product->pro_name }}
                                                                </td>
                                                                <td>
                                                                    {{ number_format($ip->price, 0, ',', '.') }} VNĐ
                                                                </td>
                                                                <td>
                                                                    {{ $ip->quantity }}
                                                                </td>
                                                                <td>
                                                                    {{ number_format($ip->price * $ip->quantity, 0, ',', '.') }}
                                                                    VNĐ
                                                                </td>
                                                            </tr>
                                                        @endforeach
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
