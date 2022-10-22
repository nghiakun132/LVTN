@extends('layouts.admin')
@section('title', 'Quản lý thương hiệu')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Quản lý thương hiệu</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Quản lý thương hiệu</li>
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
                                        <a class="btn btn-success btn-sm text-white" data-toggle="modal"
                                            data-target="#exampleModal">
                                            <i class="fa fa-user-circle " aria-hidden="true"></i> Thêm mới
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Tên thương hiệu</th>
                                                        <th>Danh mục</th>
                                                        <th>Avatar</th>
                                                        <th>Trạng thái</th>
                                                        <th>Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($brands as $brand)
                                                        <tr>
                                                            <td>{{ $brand->b_id }}</td>
                                                            <td>{{ $brand->b_name }}</td>
                                                            <td>{{ $brand->category->c_name }}</td>
                                                            <td>
                                                                <img src="{{ asset('images/brands/' . $brand->b_banner) }}"
                                                                    alt="" height="100" width="100">
                                                            </td>
                                                            <td>
                                                                @if ($brand->b_status == 1)
                                                                    <a
                                                                        href="{{ route('admin.brand.changeStatus', $brand->b_id) }}"><span
                                                                            class="badge badge-success">Đang
                                                                            hoạt động</span></a>
                                                                @else
                                                                    <a
                                                                        href="{{ route('admin.brand.changeStatus', $brand->b_id) }}"><span
                                                                            class="badge badge-danger">Đang
                                                                            khóa</span></a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('admin.brand.show', $brand->b_id) }}"
                                                                    class="btn btn-primary btn-sm">
                                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                                    Sửa
                                                                </a>
                                                                <a href="{{ route('admin.brand.delete', $brand->b_id) }}"
                                                                    class="btn btn-danger btn-sm">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
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
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm thương hiệu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="quickForm" method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="b_name">Tên thương hiệu</label>
                                        <input type="text" placeholder="Nhập tên thương hiệu" name="b_name"
                                            class="form-control
                                            @error('b_name') is-invalid @enderror"
                                            id="b_name">
                                        @if ($errors->has('b_name'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('b_name') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="b_category">Danh mục</label>
                                        <select
                                            class="custom-select custom-select-md @error('b_category_id') is-invalid @enderror"
                                            name="b_category_id">
                                            <option value="" selected>Chọn danh mục</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->c_id }}">{{ $category->c_name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('b_category_id'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('b_category_id') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="b_banner">Avatar</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="inputGroupFile04"
                                                name="b_banner">
                                            <button class="btn btn-outline-secondary" type="button"
                                                id="delete-img">Xóa</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Thêm mới
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
