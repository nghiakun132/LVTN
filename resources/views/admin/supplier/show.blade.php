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
                                        <a class="btn btn-secondary btn-sm text-white" href="{{ route('admin.home') }}">
                                            <i class="fa fa-user-circle " aria-hidden="true"></i> Quay lại
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="s_name">Tên nhà cung cấp</label>
                                                    <input type="text" placeholder="Nhập tên nhà cung cấp" name="s_name"
                                                        class="form-control" id="s_name" value="{{ $supplier->s_name }}">
                                                </div>
                                                @if ($errors->has('s_name'))
                                                    <span class="text-danger">{{ $errors->first('s_name') }}</span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="s_address">Địa chỉ</label>
                                                    <input type="text" placeholder="Nhập địa chỉ" name="s_address"
                                                        class="form-control" id="s_address"
                                                        value="{{ $supplier->s_address }}">
                                                </div>
                                                @if ($errors->has('s_address'))
                                                    <span class="text-danger">{{ $errors->first('s_address') }}</span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="s_phone">Số điện thoại</label>
                                                    <input type="text" placeholder="Nhập số điện thoại" name="s_phone"
                                                        class="form-control" id="s_phone"
                                                        value="{{ $supplier->s_phone }}">
                                                </div>
                                                @if ($errors->has('s_phone'))
                                                    <span class="text-danger">{{ $errors->first('s_phone') }}</span>
                                                @endif
                                                <div class="form-group">
                                                    <label for="s_email">Email</label>
                                                    <input type="text" placeholder="Nhập email" name="s_email"
                                                        class="form-control" id="s_email"
                                                        value="{{ $supplier->s_email }}">
                                                </div>
                                                @if ($errors->has('s_email'))
                                                    <span class="text-danger">{{ $errors->first('s_email') }}</span>
                                                @endif

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

@stop
