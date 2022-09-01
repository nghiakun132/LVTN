@extends('layouts.admin')
@section('title', 'Quản lý nhà cung cấp')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Quản lý nhà cung cấp</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Quản lý nhà cung cấp</li>
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
                                        <a class="btn btn-outline-warning btn-sm text-muted float-right" data-toggle="modal"
                                            data-target="#addCoupon">
                                            <i class="fa fa-user-circle " aria-hidden="true"></i> Thêm mới
                                        </a>
                                        <a class="btn btn-secondary btn-sm text-white" href="{{ route('admin.home') }}">
                                            <i class="fa fa-user-circle " aria-hidden="true"></i> Quay lại
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive-xl">
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Tên nhà cung cấp</th>
                                                        <th>Địa chỉ</th>
                                                        <th>Số điện thoại</th>
                                                        <th>Email</th>
                                                        <th>Trạng thái</th>
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
    <div class="modal fade" id="addCoupon" tabindex="-1" aria-labelledby="addCoupon" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mã giảm giá</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" action="#" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="s_name">Tên nhà cung cấp</label>
                                        <input type="number" placeholder="Nhập tên nhà cung cấp" name="s_name"
                                            class="form-control" id="s_name">
                                    </div>
                                    @if ($errors->has('s_name'))
                                        <span class="text-danger">{{ $errors->first('s_name') }}</span>
                                    @endif
                                    <div class="form-group">
                                        <label for="s_address">Địa chỉ</label>
                                        <input type="number" placeholder="Nhập địa chỉ" name="s_address"
                                            class="form-control" id="s_address">
                                    </div>
                                    @if ($errors->has('s_address'))
                                        <span class="text-danger">{{ $errors->first('s_address') }}</span>
                                    @endif
                                    <div class="form-group">
                                        <label for="s_phone">Số điện thoại</label>
                                        <input type="number" placeholder="Nhập số điện thoại" name="s_phone"
                                            class="form-control" id="s_phone">
                                    </div>
                                    @if ($errors->has('s_phone'))
                                        <span class="text-danger">{{ $errors->first('s_phone') }}</span>
                                    @endif
                                    <div class="form-group">
                                        <label for="s_email">Email</label>
                                        <input type="number" placeholder="Nhập email" name="s_email" class="form-control"
                                            id="s_email">
                                    </div>
                                    @if ($errors->has('s_email'))
                                        <span class="text-danger">{{ $errors->first('s_email') }}</span>
                                    @endif

                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
