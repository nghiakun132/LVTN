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
                                        <a class="btn btn-outline-warning btn-sm text-muted float-right" data-toggle="modal"
                                            data-target="#addCoupon">
                                            <i class="fa fa-user-circle " aria-hidden="true"></i> Tạo phiếu nhập
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
                                                        <th>Nhà cung cấp</th>
                                                        <th>Người lập phiếu</th>
                                                        <th>Ngày lập phiếu</th>
                                                        <th>Tổng tiền</th>
                                                        <th>Trạng thái</th>
                                                        <th>Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($imports as $import)
                                                        <tr>
                                                            <td>{{ $import->i_id }}</td>
                                                            <td>{{ $import->supplier->s_name }}</td>
                                                            <td>{{ $import->admin->name }}</td>
                                                            <td>{{ $import->i_date }}</td>
                                                            <td>{{ number_format($import->i_total, 0, ',', '.') }} VNĐ</td>
                                                            <td>
                                                                @if ($import->i_status == 1)
                                                                    <span class="badge badge-warning">Chưa xác nhận</span>
                                                                @else
                                                                    <span class="badge badge-success">Đã xác nhận</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('admin.import.show', $import->i_id) }}"
                                                                    class="btn btn-info btn-sm"><i
                                                                        class="fas fa-file-import"></i></a>
                                                                <a href="#" class="btn btn-danger btn-sm"><i
                                                                        class="fas fa-trash"></i></a>
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
    <div class="modal fade" id="addCoupon" tabindex="-1" aria-labelledby="addCoupon" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm phiếu nhập</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Ngày nhập</label>
                                        <input type="date" class="form-control" name="i_date" id="i_date"
                                            placeholder="Ngày nhập">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <a class="btn btn-outline-secondary" data-toggle="modal" href="#"
                                                data-target="#addSupplier">Thêm</a>
                                        </div>
                                        <select class="custom-select" id="suppliers" name="supplier_id">
                                            >
                                            @foreach ($supplierGlobal as $supplier)
                                                <option value="{{ $supplier->s_id }}">{{ $supplier->s_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addSupplier" tabindex="-8" aria-hidden="true" aria-labelledby="addSupplier">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">=== Thêm nhà cung cấp ===</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('admin.supplier.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="s_name">Tên nhà cung cấp</label>
                                            <input type="text" placeholder="Nhập tên nhà cung cấp" name="s_name"
                                                class="form-control" id="s_name">
                                        </div>
                                        @if ($errors->has('s_name'))
                                            <span class="text-danger">{{ $errors->first('s_name') }}</span>
                                        @endif
                                        <div class="form-group">
                                            <label for="s_address">Địa chỉ</label>
                                            <input type="text" placeholder="Nhập địa chỉ" name="s_address"
                                                class="form-control" id="s_address">
                                        </div>
                                        @if ($errors->has('s_address'))
                                            <span class="text-danger">{{ $errors->first('s_address') }}</span>
                                        @endif
                                        <div class="form-group">
                                            <label for="s_phone">Số điện thoại</label>
                                            <input type="text" placeholder="Nhập số điện thoại" name="s_phone"
                                                class="form-control" id="s_phone">
                                        </div>
                                        @if ($errors->has('s_phone'))
                                            <span class="text-danger">{{ $errors->first('s_phone') }}</span>
                                        @endif
                                        <div class="form-group">
                                            <label for="s_email">Email</label>
                                            <input type="text" placeholder="Nhập email" name="s_email"
                                                class="form-control" id="s_email">
                                        </div>
                                        @if ($errors->has('s_email'))
                                            <span class="text-danger">{{ $errors->first('s_email') }}</span>
                                        @endif

                                    </div>
                                    <button type="submit" class="btn btn-primary" id="submitAddSupplier">Thêm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
