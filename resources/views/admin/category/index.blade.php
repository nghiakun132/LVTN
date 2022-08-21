@extends('layouts.admin')
@section('title', 'Quản lý danh mục')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Quản lý danh mục</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Quản lý danh mục</li>
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
                                                        <th style="width:50px">ID</th>
                                                        <th style="width:100px"> Tên</th>
                                                        <th style="width:80px">Danh mục cha</th>
                                                        <th style="width:400px">Banner</th>
                                                        <th style="width:50px">Trạng thái</th>
                                                        <th style="width:50px">Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($categories as $category)
                                                        <tr>
                                                            <td>{{ $category->c_id }}</td>
                                                            <td>{{ $category->c_name }}</td>
                                                            <td>
                                                                @if ($category->parent_id == 0)
                                                                    {{ 'Danh mục cha' }}
                                                                @else
                                                                    {{ $category->parent_id }}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @isset($category->c_banner)
                                                                    <img src="{{ asset('images/categories/' . $category->c_banner) }}"
                                                                        alt="{{ $category->c_name }}" height="100px">
                                                                @endisset
                                                            </td>
                                                            <td>
                                                                @if ($category->c_status == 1)
                                                                    <span class="badge badge-success">Đang hoạt động</span>
                                                                @else
                                                                    <span class="badge badge-danger">Đang khóa</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('admin.category.show', $category->c_id) }}"
                                                                    class="btn btn-primary btn-sm">
                                                                    <i class="fa fa-edit"></i> Sửa
                                                                </a>
                                                                <a href="{{ route('admin.category.delete', $category->c_id) }}"
                                                                    class="btn btn-danger btn-sm">
                                                                    <i class="fa fa-trash"></i> Xóa
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
                    <h5 class="modal-title" id="exampleModalLabel">Thêm nhân viên</h5>
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
                                        <label for="c_name">Tên danh mục</label>
                                        <input type="text" placeholder="Nhập tên danh mục" name="c_name"
                                            class="form-control" id="c_name">
                                    </div>
                                    @if ($errors->has('c_name'))
                                        <span class="text-danger">{{ $errors->first('c_name') }}</span>
                                    @endif
                                    <div class="form-group">
                                        <label for="dob">Chọn danh mục cha</label>
                                        <select class="custom-select custom-select-lg mb-3" name="parent_id">
                                            <option value="0">Chọn danh mục cha</option>
                                            <?php echo $showSelect; ?>
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="inputGroupFile04" name="c_banner">
                                        <button class="btn btn-outline-secondary" type="button"
                                            id="inputGroupFileAddon04">Button</button>
                                    </div>
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
