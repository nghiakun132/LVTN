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
                                    <div class="card-body">
                                        <form id="quickForm" method="post"
                                            action="{{ route('admin.product.update', $product->pro_id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="pro_name">Tên</label>
                                                            <input type="text" placeholder="Nhập tên" name="pro_name"
                                                                class="form-control" id="pro_name"
                                                                value="{{ $product->pro_name }}">
                                                        </div>
                                                        @if ($errors->has('pro_name'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('pro_name') }}</span>
                                                        @endif
                                                        <div class="form-group mt-4">
                                                            <label for="pro_price">Giá</label>
                                                            <input type="number" placeholder="Nhập giá" name="pro_price"
                                                                class="form-control" id="pro_price"
                                                                value="{{ $product->pro_price }}">
                                                        </div>
                                                        @if ($errors->has('pro_price'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('pro_price') }}</span>
                                                        @endif
                                                        <div class="form-group mt-4">
                                                            <label for="pro_sale">Giảm giá</label>
                                                            <input type="text" placeholder="Nhập giảm giá"
                                                                name="pro_sale" class="form-control" id="pro_sale"
                                                                value="{{ $product->pro_sale }}">
                                                        </div>
                                                        @if ($errors->has('pro_sale'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('pro_sale') }}</span>
                                                        @endif

                                                        <div class="input-group">
                                                            <input type="file" class="form-control" id="inputGroupFile04"
                                                                name="pro_avatar">
                                                            <button class="btn btn-outline-secondary" type="button"
                                                                id="delete-img">Xóa</button>
                                                        </div>
                                                        @if ($errors->has('pro_avatar'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('pro_avatar') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="pro_name">Danh mục</label>
                                                            <select class="form-control form-control-xl"
                                                                name="pro_category_id" id="categories">
                                                                <option value="0">Chọn danh mục</option>
                                                                @foreach ($categoriesGlobal as $categoriesGlobal)
                                                                    <option value="{{ $categoriesGlobal->c_id }}"
                                                                        {{ $categoriesGlobal->c_id == $product->pro_category_id ? 'selected' : '' }}>
                                                                        {{ $categoriesGlobal->c_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group mt-4">
                                                            <label for="pro_name">Thương hiệu</label>
                                                            <select class="form-control form-control-xl" name="pro_brand_id"
                                                                id="brands">
                                                                <option selected value="{{ $product->brand->b_id }}">
                                                                    {{ $product->brand->b_name }}</option>
                                                            </select>
                                                        </div>
                                                        <div class=" input-group mb-3 mt-4" style="top:32px">
                                                            <div class="input-group-prepend">
                                                                <a href="#" class="btn btn-outline-primary"
                                                                    data-toggle="modal" data-target="#addGroup">Thêm
                                                                    nhóm</a>
                                                            </div>
                                                            <select class="custom-select" id="groups" name="group_id"
                                                                id="group">
                                                                <option selected value="0">Chọn nhóm</option>
                                                                @foreach ($groupGlobal as $groupGlobal)
                                                                    <option value="{{ $groupGlobal->group_id }}"
                                                                        {{ $groupGlobal->group_id == $product->group_id ? 'selected' : '' }}>
                                                                        {{ $groupGlobal->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class=" input-group mb-3" style="top:32px">
                                                            <div class="input-group-prepend">
                                                                <a href="#" class="btn btn-outline-primary"
                                                                    data-toggle="modal" data-target="#addColor">Thêm màu</a>
                                                            </div>
                                                            <select class="custom-select" id="colors" name="color">
                                                                <option selected>Chọn màu</option>
                                                                @foreach ($colorGlobal as $colorGlobal)
                                                                    <option value="{{ $colorGlobal->color }}"
                                                                        {{ $colorGlobal->color_id == $product->color_id ? 'selected' : '' }}>
                                                                        {{ $colorGlobal->color }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('pro_category_id'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('pro_category_id') }}</span>
                                                    @endif
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="pro_quantity">Số lượng</label>
                                                            <input type="text" placeholder="Nhập số lượng"
                                                                name="pro_quantity" class="form-control"
                                                                id="pro_quantity" value="{{ $product->pro_quantity }}">
                                                        </div>
                                                        @if ($errors->has('pro_quantity'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('pro_quantity') }}</span>
                                                        @endif


                                                        <div class="form-group mt-4">
                                                            <label for="pro_content">Nội dung</label>
                                                            <textarea name="pro_content" id="pro_content" cols="30" rows="2.5" class="form-control">
                                                                {{ $product->pro_content }}
                                                            </textarea>
                                                        </div>
                                                        <div class="form-group mt-4">
                                                            <label for="pro_description">Mô tả</label>
                                                            <textarea name="pro_description" id="pro_description" cols="30" rows="2" class="form-control">
                                                                {{ $product->pro_description }}
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Thêm</button>
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
                                    <div class="form-group">
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
                        <button type="submit" class="btn btn-primary" id="submitFormAddGroup">Thêm</button>
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
                                    <div class="form-group">
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
@endsection
