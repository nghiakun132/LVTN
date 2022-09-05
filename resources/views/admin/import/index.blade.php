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
                                        <a class="btn btn-secondary btn-sm text-white" href="{{ route('admin.home') }}">
                                            <i class="fa fa-chevron-circle-left " aria-hidden="true"></i> Quay lại
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive-xl">
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Ngày nhập</th>
                                                        <th>Tên sản phẩm</th>
                                                        <th>Danh mục</th>
                                                        <th>Số lượng</th>
                                                        <th>Giá nhập</th>
                                                        <th>Thành tiền</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($imports as $import)
                                                        <tr>
                                                            <td>{{ $import->i_id }}</td>
                                                            <td>{{ $import->created_at }}</td>
                                                            <td>{{ $import->products->pro_name }}</td>
                                                            <td>{{ $import->products->category->c_name }}</td>
                                                            <td>{{ $import->i_quantity }}</td>
                                                            <td>{{ number_format($import->i_price) }} VNĐ</td>
                                                            <td>{{ number_format($import->i_quantity * $import->i_price) }}
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
                </section>
            </div>
        </div>
    </div>

@stop
