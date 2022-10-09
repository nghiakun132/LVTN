@extends('layouts.admin')
@section('title', 'Quản lý sản phẩm')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Quản lý sản phẩm</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Quản lý sản phẩm</li>
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
                                        <a class="btn btn-outline-warning btn-sm text-muted"
                                            href="{{ route('admin.product.create') }}">
                                            <i class="fa fa-user-circle " aria-hidden="true"></i> Thêm mới
                                        </a>
                                        <a href="{{ route('admin.product.export') }}"
                                            class="btn btn-outline-warning btn-sm text-danger float-right">
                                            <i class="fa fa-file-excel" aria-hidden="true"></i>
                                            Xuất Excel
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#import"
                                            class="btn btn-outline-success btn-sm text-dark float-right mr-3">
                                            <i class="fa fa-file-pdf" aria-hidden="true"></i>
                                            Nhập Excel
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Tên</th>
                                                        <th>Ảnh</th>
                                                        <th>Giá</th>
                                                        <th>Trạng thái</th>
                                                        <th>
                                                            Tải lên
                                                        </th>
                                                        <th>Hành động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($products as $product)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $product->pro_name }}</td>
                                                            <td>
                                                                <img src="{{ asset('/images/products/' . $product->pro_avatar) }}"
                                                                    alt="" width="50" height="50">
                                                            </td>
                                                            <td>{{ number_format($product->pro_price, 0, ',', '.') }} VNĐ
                                                            </td>
                                                            <td>
                                                                @if ($product->pro_active == 1)
                                                                    <a href="{{ route('admin.product.changeStatus', $product->pro_id) }}"
                                                                        class="badge badge-success">Đang hiển
                                                                        thị</a>
                                                                @else
                                                                    <a href="{{ route('admin.product.changeStatus', $product->pro_id) }}"
                                                                        class="badge badge-danger">Đang ẩn</a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <form method="post"
                                                                    action="{{ route('admin.product.add-image', $product->pro_id) }}"
                                                                    enctype="multipart/form-data" id="images-product">
                                                                    @csrf
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input"
                                                                                name="pro_avatar"
                                                                                aria-describedby="inputGroupFileAddon04">
                                                                            <label class="custom-file-label"
                                                                                for="inputGroupFile04">Chọn ảnh</label>
                                                                        </div>
                                                                        <button class="btn btn-primary">Upload</button>
                                                                    </div>
                                                                </form>
                                                            </td>
                                                            <td align="center">
                                                                <div class="btn-group">
                                                                    <button class="btn btn-secondary btn-sm" type="button">
                                                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                                                    </button>
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a href="{{ route('admin.product.update', $product->pro_id) }}"
                                                                            class="dropdown-item text-warning">
                                                                            <i class="fa fa-edit"></i>
                                                                            Sửa
                                                                        </a>
                                                                        <a class="delete_product dropdown-item text-danger"
                                                                            data-id="{{ $product->pro_id }}"
                                                                            data-url="{{ route('admin.product.delete') }}">
                                                                            <i class="fa fa-trash"></i>
                                                                            Xóa
                                                                        </a>
                                                                        <a href="{{ route('admin.product.detail', $product->pro_id) }}"
                                                                            class="dropdown-item text-success">
                                                                            <i class="fa fa-eye"></i>
                                                                            Chi tiết
                                                                        </a>
                                                                        <a href="{{ route('admin.product.addSales', $product->pro_id) }}"
                                                                            class="dropdown-item text-secondary">
                                                                            <i class="fa fa-percent"></i>
                                                                            Khuyến mãi
                                                                        </a>
                                                                    </div>
                                                                </div>
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
    <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.product.import') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mt-4">
                                        <label for="pro_name">File</label>
                                        <input type="file" name="file" class="form-control" id="file">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@stop
