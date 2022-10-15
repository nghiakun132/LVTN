@extends('layouts.admin')
@section('title', 'Quản lý đơn vị vận chuyển')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Quản lý đơn vị vận chuyển</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Quản lý đơn vị vận chuyển</li>
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
                                        <a class="btn btn-secondary btn-sm text-white" href="{{ route('admin.home') }}">
                                            <i class="fa fa-chevron-circle-left " aria-hidden="true"></i> Quay lại
                                        </a>
                                        <a class="btn btn-success btn-sm text-white float-right" data-toggle="modal"
                                            data-target="#addDelivery">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive-xl">
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Tên đơn vị</th>
                                                        <th>Mã code</th>
                                                        <th>Phí</th>
                                                        <th>Trạng thái</th>
                                                        <th>Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($deliveries as $key => $delivery)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $delivery->name }}</td>
                                                            <td>{{ $delivery->code }}</td>
                                                            <td>{{ number_format($delivery->fee, 0, ',', '.') }} VNĐ</td>
                                                            <td>
                                                                @if ($delivery->status == 1)
                                                                    <span class="badge badge-success">Hiển thị</span>
                                                                @else
                                                                    <span class="badge badge-danger">Ẩn</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-primary btn-sm text-white"
                                                                    href="{{ route('admin.delivery.edit', $delivery->id) }}">
                                                                    <i class="fas fa-pencil-alt">
                                                                    </i>
                                                                    Sửa
                                                                </a>
                                                                <a class="btn btn-danger btn-sm text-white"
                                                                    href="{{ route('admin.delivery.delete', $delivery->id) }}">
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
    <div class="modal fade" id="addDelivery" tabindex="-1" aria-labelledby="addDelivery" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới đơn vị vận chuyển</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Tên đơn vị</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Nhập tên đơn vị">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="code">Mã code</label>
                                        <input type="text" class="form-control" id="code" name="code"
                                            placeholder="Nhập mã code">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="fee">Phí</label>
                                        <input type="number" class="form-control" id="fee" name="fee"
                                            placeholder="Nhập phí">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
