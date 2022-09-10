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
                                        <a class="btn btn-outline-warning btn-sm text-muted" data-toggle="modal"
                                            data-target="#addProduct">
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
                                                        <th>ID</th>
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
                                                            <td>{{ $product->pro_id }}</td>
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
                                                                    action="{{ route('admin.product.image', $product->pro_id) }}"
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
                                                            <td>
                                                                <a href="{{ route('admin.product.update', $product->pro_id) }}"
                                                                    class="btn btn-primary btn-sm text-white">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <a href="{{ route('admin.product.delete', $product->pro_id) }}"
                                                                    class="btn btn-danger btn-sm text-white"
                                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                                <a href="{{ route('admin.product.detail', $product->pro_id) }}"
                                                                    class="btn btn-success btn-sm text-white">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                                <a href="{{ route('admin.product.addSales', $product->pro_id) }}"
                                                                    class="btn btn-warning btn-sm text-white">
                                                                    <i class="fa fa-percent"></i>
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
    <div class="modal" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="quickForm" method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pro_name">Tên</label>
                                        <input type="text" placeholder="Nhập tên" name="pro_name" class="form-control"
                                            id="pro_name">
                                    </div>
                                    @if ($errors->has('pro_name'))
                                        <span class="text-danger">{{ $errors->first('pro_name') }}</span>
                                    @endif
                                    <div class="form-group mt-4">
                                        <label for="pro_price">Giá</label>
                                        <input type="number" placeholder="Nhập giá" name="pro_price"
                                            class="form-control" id="pro_price">
                                    </div>
                                    @if ($errors->has('pro_price'))
                                        <span class="text-danger">{{ $errors->first('pro_price') }}</span>
                                    @endif
                                    <div class="form-group mt-4">
                                        <label for="pro_sale">Giảm giá</label>
                                        <input type="number" placeholder="Nhập giảm giá" name="pro_sale"
                                            class="form-control" id="pro_sale">
                                    </div>
                                    @if ($errors->has('pro_sale'))
                                        <span class="text-danger">{{ $errors->first('pro_sale') }}</span>
                                    @endif

                                    <div class="input-group">
                                        <input type="file" class="form-control" id="inputGroupFile04"
                                            name="pro_avatar">
                                        <button class="btn btn-outline-secondary" type="button"
                                            id="delete-img">Xóa</button>
                                    </div>
                                    @if ($errors->has('pro_avatar'))
                                        <span class="text-danger">{{ $errors->first('pro_avatar') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pro_name">Danh mục</label>
                                        <select class="form-control form-control-xl" name="pro_category_id"
                                            id="categories">
                                            <option value="0" selected>Chọn danh mục</option>
                                            @foreach ($categoriesGlobal as $categoriesGlobal)
                                                <option value="{{ $categoriesGlobal->c_id }}">
                                                    {{ $categoriesGlobal->c_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="pro_name">Thương hiệu</label>
                                        <select class="form-control form-control-xl" name="pro_brand_id" id="brands">
                                            <option value="0" selected>Chọn thương hiệu</option>
                                        </select>
                                    </div>
                                    <div class=" input-group mb-3 mt-4" style="top:32px">
                                        <div class="input-group-prepend">
                                            <a href="#" class="btn btn-outline-primary" data-toggle="modal"
                                                data-target="#addGroup">Thêm nhóm</a>
                                        </div>
                                        <select class="custom-select" id="groups" name="group_id" id="group">
                                            <option selected value="0">Chọn nhóm</option>
                                            @foreach ($groupGlobal as $groupGlobal)
                                                <option value="{{ $groupGlobal->group_id }}">
                                                    {{ $groupGlobal->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class=" input-group mb-3 mt-4" style="top:32px">
                                        <div class="input-group-prepend">
                                            <a href="#" class="btn btn-outline-primary" data-toggle="modal"
                                                data-target="#addColor">Thêm màu</a>
                                        </div>
                                        <select class="custom-select" id="colors" name="color">
                                            <option selected value="0">Chọn màu</option>
                                            @foreach ($colorGlobal as $colorGlobal)
                                                <option value="{{ $colorGlobal->color }}">
                                                    {{ $colorGlobal->color }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @if ($errors->has('pro_category_id'))
                                    <span class="text-danger">{{ $errors->first('pro_category_id') }}</span>
                                @endif
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pro_quantity">Số lượng</label>
                                        <input type="text" placeholder="Nhập số lượng" name="pro_quantity"
                                            class="form-control" id="pro_quantity">
                                    </div>
                                    @if ($errors->has('pro_quantity'))
                                        <span class="text-danger">{{ $errors->first('pro_quantity') }}</span>
                                    @endif


                                    <div class="form-group mt-4">
                                        <label for="pro_content">Nội dung</label>
                                        <textarea name="pro_content" id="pro_content" cols="30" rows="2.5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="pro_description">Mô tả</label>
                                        <textarea name="pro_description" id="pro_description" cols="30" rows="2" class="form-control"></textarea>
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
    <div class="modal fade" id="addGroup" tabindex="-1" aria-labelledby="addGroupLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm nhóm sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addGroupForm" method="post" action="{{ route('admin.product.addGroup') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mt-4">
                                        <label for="pro_name">Tên</label>
                                        <input type="text" placeholder="Nhập tên" name="name" class="form-control"
                                            id="group_name">
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submitFormAddGroup">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addColor" tabindex="-1" aria-labelledby="addColorLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm màu sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addColorForm" method="post" action="{{ route('admin.product.addColor') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mt-4">
                                        <label for="pro_name">Tên</label>
                                        <input type="text" placeholder="Nhập màu" name="color" class="form-control"
                                            id="color_name">
                                    </div>
                                    @if ($errors->has('color'))
                                        <span class="text-danger">{{ $errors->first('color') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submitFormAddColor">Thêm</button>
                    </form>
                </div>
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
