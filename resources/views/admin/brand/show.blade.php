@extends('layouts.admin')
@section('title', 'Chỉnh sửa thương hiệu')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Chỉnh sửa thương hiệu</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Chỉnh sửa thương hiệu</li>
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
                                        <a class="btn btn-secondary btn-sm text-white"
                                            href="{{ route('admin.category.index') }}">
                                            Quay lại <i class="fa fa-undo" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <form id="quickForm" method="post"
                                            action="{{ route('admin.brand.update', $brand->b_id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="b_name">Tên thương hiệu</label>
                                                            <input type="text" placeholder="Nhập tên thương hiệu"
                                                                name="b_name" class="form-control" id="b_name"
                                                                value="{{ $brand->b_name }}">
                                                        </div>
                                                        @if ($errors->has('b_name'))
                                                            <span class="text-danger">{{ $errors->first('b_name') }}</span>
                                                        @endif
                                                        <div class="form-group">
                                                            <label for="b_category">Danh mục</label>
                                                            <select class="custom-select custom-select-xl"
                                                                name="b_category_id">
                                                                <option>Chọn thương hiệu</option>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->c_id }}"
                                                                        {{ $brand->b_category_id == $category->c_id ? 'selected' : '' }}>
                                                                        {{ $category->c_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @if ($errors->has('b_category_id'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('b_category_id') }}</span>
                                                        @endif
                                                        <div class="input-group">
                                                            <input type="file" class="form-control" id="inputGroupFile04"
                                                                name="b_banner">
                                                            <button class="btn btn-outline-secondary" type="button"
                                                                id="delete-img">Xóa</button>
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
                    </div>
                </section>
            </div>
        </div>
    </div>
@stop
