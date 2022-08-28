@extends('layouts.admin')
@section('title', 'Chỉnh sửa danh mục')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Chỉnh sửa danh mục</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Chỉnh sửa danh mục</li>
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
                                            action="{{ route('admin.category.update', $category->c_id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="c_name">Tên danh mục</label>
                                                            <input type="text" placeholder="Nhập tên danh mục"
                                                                name="c_name" class="form-control" id="c_name"
                                                                value="{{ $category->c_name }}">
                                                        </div>
                                                        @if ($errors->has('c_name'))
                                                            <span class="text-danger">{{ $errors->first('c_name') }}</span>
                                                        @endif
                                                        <div class="form-group">
                                                            <label for="dob">Chọn danh mục cha</label>
                                                            <select class="custom-select custom-select-md mb-3"
                                                                name="parent_id">
                                                                <option value="0">Chọn danh mục cha</option>
                                                                <?php echo $showSelect; ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Icon</label>
                                                            <input type="text" placeholder="Nhập icon" name="c_icon"
                                                                value="{{ $category->c_icon }}" class="form-control">
                                                        </div>
                                                        <div class="input-group">
                                                            <input type="file" class="form-control" id="inputGroupFile04"
                                                                name="c_banner">
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
