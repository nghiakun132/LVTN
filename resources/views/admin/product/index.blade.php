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
                                        <a class="btn btn-success btn-sm text-white" data-toggle="modal"
                                            data-target="#addProduct">
                                            <i class="fa fa-user-circle " aria-hidden="true"></i> Thêm mới
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
                                                        <th>Danh mục</th>
                                                        <th>Giá</th>
                                                        <th>Trạng thái</th>
                                                        <th>Ngày tạo</th>
                                                        <th>Hành động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

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
                                    <div class="form-group">
                                        <label for="pro_price">Giá</label>
                                        <input type="number" placeholder="Nhập giá" name="pro_price" class="form-control"
                                            id="pro_price">
                                    </div>
                                    @if ($errors->has('pro_price'))
                                        <span class="text-danger">{{ $errors->first('pro_price') }}</span>
                                    @endif
                                    <div class="form-group">
                                        <label for="pro_sale">Giảm giá</label>
                                        <input type="number" placeholder="Nhập giảm giá" name="pro_sale"
                                            class="form-control" id="pro_sale">
                                    </div>
                                    @if ($errors->has('pro_sale'))
                                        <span class="text-danger">{{ $errors->first('pro_sale') }}</span>
                                    @endif
                                    <div class="form-group">
                                        <label for="pro_content">Nội dung</label>
                                        <textarea name="pro_content" id="pro_content" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="inputGroupFile04" name="c_banner">
                                        <button class="btn btn-outline-secondary" type="button"
                                            id="inputGroupFileAddon04">Button</button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pro_name">Danh mục</label>
                                        <select class="form-control form-control-xl" name="pro_category_id" id="categories">
                                            <option value="0" selected>Chọn danh mục</option>
                                            @foreach ($categoriesGlobal as $categoriesGlobal)
                                                <option value="{{ $categoriesGlobal->c_id }}">
                                                    {{ $categoriesGlobal->c_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="pro_name">Thương hiệu</label>
                                        <select class="form-control form-control-xl" name="pro_brand_id" id="brands">
                                            <option value="0" selected>Chọn thương hiệu</option>
                                        </select>
                                    </div>

                                    <div class=" input-group mb-3" style="top:32px">
                                        <div class="input-group-prepend">
                                            <a href="#" class="btn btn-outline-secondary" data-toggle="modal"
                                                data-target="#addGroup">Button</a>
                                        </div>
                                        <select class="custom-select" id="groups"
                                            aria-label="Example select with button addon" name="group_id" id="group">
                                            <option selected>Chọn nhóm</option>
                                            @foreach ($groupGlobal as $groupGlobal)
                                                <option value="{{ $groupGlobal->group_id }}">
                                                    {{ $groupGlobal->name }}
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
                                        <label for="pro_name">Tên</label>
                                        <input type="text" placeholder="Nhập tên" name="pro_name"
                                            class="form-control" id="pro_name">
                                    </div>
                                    @if ($errors->has('pro_name'))
                                        <span class="text-danger">{{ $errors->first('pro_name') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
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
                        <button type="submit" class="btn btn-primary" id="submitFormAddGroup">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@stop
