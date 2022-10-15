@extends('layouts.admin')
@section('title', 'Sửa đơn vị vận chuyển')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Sửa đơn vị vận chuyển</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Sửa đơn vị vận chuyển</li>
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
                                            <i class="fa fa-chevron-circle-left " aria-hidden="true"></i> Quay lại
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('admin.delivery.update', $delivery->id) }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Tên đơn vị</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ $delivery->name }}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="code">Mã</label>
                                                <input type="text" class="form-control" id="code" name="code"
                                                    value="{{ $delivery->code }}">
                                                @error('code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="fee">Giá</label>
                                                <input type="text" class="form-control" id="fee" name="fee"
                                                    value="{{ $delivery->fee }}">
                                                @error('fee')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary">Cập nhật</button>

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
