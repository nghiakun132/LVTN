@extends('layouts.admin')
@section('title', 'Quản lý nhân viên')
@section('content')
    <style>
        .breadcrumb-item+.breadcrumb-item {
            padding-left: 0
        }

        .card-title span {
            font-size: 1.2rem;
            font-weight: bold;
            color: rgb(255, 254, 254);
            text-transform: uppercase
        }
    </style>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Quản lý nhân viên</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Quản lý nhân viên</li>
                            <li class="breadcrumb-item active">{{ $staff->id }}</li>
                        </ol>
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
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Thông tin của
                                                            <span>{{ $staff->name }}</span>
                                                        </h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <form action="{{ route('admin.staff.update', $staff->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="name">Họ tên</label>
                                                                        <input type="text" placeholder="Nhập họ tên"
                                                                            name="name"
                                                                            class="form-control
                                                                                    @error('name') is-invalid @enderror"
                                                                            id="name" value="{{ $staff->name }}">
                                                                        @if ($errors->has('name'))
                                                                            <div class="invalid-feedback">
                                                                                {{ $errors->first('name') }}
                                                                            </div>
                                                                        @endif
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="email">Email</label>
                                                                        <input type="text" placeholder="Nhập email"
                                                                            id="email" name="email"
                                                                            class="form-control
                                                                                        @error('email') is-invalid @enderror"
                                                                            value="{{ $staff->email }}">
                                                                        @if ($errors->has('email'))
                                                                            <div class="invalid-feedback">
                                                                                {{ $errors->first('email') }}
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="dob">Chọn chức
                                                                            vụ</label>
                                                                        <select class="custom-select custom-select-md mb-3"
                                                                            name="level">
                                                                            <option value="1"
                                                                                {{ $staff->level == 1 ? 'selected' : '' }}>
                                                                                Quản lý
                                                                            </option>
                                                                            <option value="2"
                                                                                {{ $staff->level == 2 ? 'selected' : '' }}>
                                                                                Nhân viên
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="phone">Số điện
                                                                            thoại</label>
                                                                        <input type="text"
                                                                            placeholder="Nhập số điện thoại" name="phone"
                                                                            class="form-control
                                                                                        @error('phone') is-invalid @enderror"
                                                                            id="phone" value="{{ $staff->phone }}">
                                                                        @if ($errors->has('phone'))
                                                                            <div class="invalid-feedback">
                                                                                {{ $errors->first('phone') }}
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Address</label>
                                                                        <input type="text" placeholder="Nhập địa chỉ"
                                                                            name="address" class="form-control"
                                                                            id="address" value="{{ $staff->address }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="dob">Ngày sinh</label>
                                                                        <input type="date" placeholder="Nhập ngày sinh"
                                                                            name="dob" class="form-control"
                                                                            id="dob" value="{{ $staff->dob }}">
                                                                    </div>

                                                                </div>

                                                            </div>
                                                            <button type="submit" class="btn btn-success"> Cập
                                                                nhật</button>
                                                        </form>
                                                    </div>
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
        </div>
    </div>
@stop
