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
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Quản lý sản phẩm</a>
                            </li>
                            <li class="breadcrumb-item active">Thêm mới</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <section class="content">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body">
                                <form id="quickForm" method="post" action="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 mt-4">
                                            <div class="form-group">
                                                <label for="pro_name">Tên</label>
                                                <input type="text" placeholder="Nhập tên" name="pro_name"
                                                    class="form-control" id="pro_name">
                                            </div>
                                            @if ($errors->has('pro_name'))
                                                <span class="text-danger">{{ $errors->first('pro_name') }}</span>
                                            @endif
                                            <div class="form-group">
                                                <label for="sku">SKU</label>
                                                <input type="text" placeholder="Nhập tên" name="sku"
                                                    class="form-control" id="sku">
                                            </div>
                                            @if ($errors->has('sku'))
                                                <span class="text-danger">{{ $errors->first('sku') }}</span>
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
                                            <div class="form-group">
                                                <label for="pro_avatar">Ảnh đại diện</label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" id="inputGroupFile04"
                                                        name="pro_avatar">
                                                    <button class="btn btn-outline-secondary" type="button"
                                                        id="delete-img">Xóa</button>
                                                </div>
                                            </div>
                                            @if ($errors->has('pro_avatar'))
                                                <span class="text-danger">{{ $errors->first('pro_avatar') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 mt-4">
                                            <div class="form-group">
                                                <label for="pro_name">Danh mục</label>
                                                <select class="custom-select custom-select-md mb-3" name="pro_category_id"
                                                    id="categories">
                                                    <option value="0">Chọn danh mục</option>
                                                    <?php echo $showSelect; ?>
                                                </select>
                                            </div>
                                            @if ($errors->has('pro_category_id'))
                                                <span class="text-danger">{{ $errors->first('pro_category_id') }}</span>
                                            @endif
                                            <div class="form-group">
                                                <label for="pro_name">Thương hiệu</label>
                                                <select class="form-control form-control-xl" name="pro_brand_id"
                                                    id="brands">
                                                    <option value="0" selected>Chọn thương hiệu</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="pro_name">Nhóm</label>
                                                <div class=" input-group" style="">
                                                    <div class="input-group-prepend">
                                                        <a href="#" class="btn btn-outline-primary"
                                                            data-toggle="modal" data-target="#addGroup">Thêm nhóm</a>
                                                    </div>
                                                    <select class="custom-select" id="groups" name="group_id"
                                                        id="group">
                                                        <option selected value="0">Chọn nhóm</option>
                                                        @foreach ($groupGlobal as $groupGlobal)
                                                            <option value="{{ $groupGlobal->group_id }}">
                                                                {{ $groupGlobal->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="pro_name">Hóa đơn nhập hàng</label>
                                                <select class="custom-select" name="import_id" id="import">
                                                    <option selected value="0">Chọn
                                                        @foreach ($imports as $imports)
                                                    <option value="{{ $imports->i_id }}">
                                                        {{ $imports->i_code }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-4">
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
                                            <div class="form-group mt-4">
                                                <label for="pro_detail">Chi tiết</label>
                                                <textarea name="pro_detail" id="pro_detail" cols="30" rows="2" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Thêm mới</button>

                                    </div>
                                </form>
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
@stop
