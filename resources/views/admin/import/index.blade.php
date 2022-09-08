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
                                                        <th>Lô hàng</th>
                                                        <th>Ngày nhập</th>
                                                        <th>Người nhập</th>
                                                        <th>Tổng tiền</th>
                                                        <th>Trạng thái</th>
                                                        <th>Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($imports as $import)
                                                        <tr>
                                                            <td>
                                                                {{ $import->i_code }}
                                                            </td>
                                                            <td>
                                                                {{ $import->created_at }}
                                                            </td>
                                                            <td>
                                                                {{ $import->admin->name }}
                                                            </td>
                                                            <td>
                                                                {{ number_format($import->i_total, 0, ',', '.') }} VNĐ
                                                            </td>
                                                            <td>

                                                                @if ($import->i_status == 1)
                                                                    <a
                                                                        href="{{ route('admin.import.changestatus', $import->i_id) }}"><span
                                                                            class="badge badge-danger">Chưa
                                                                            duyệt</span></a>
                                                                @else
                                                                    <a
                                                                        href="{{ route('admin.import.changestatus', $import->i_id) }}"><span
                                                                            class="badge badge-success">Đã
                                                                            duyệt</span></a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('admin.import.detail', $import->i_id) }}"
                                                                    class="btn btn-outline-primary btn-sm">
                                                                    <i class="fas fa-eye"></i> Xem chi tiết
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
