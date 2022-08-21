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
                                                <div class="row">
                                                    <div class="col-md-12">
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
                                                                                <input type="text"
                                                                                    placeholder="Nhập họ tên" name="name"
                                                                                    class="form-control" id="name"
                                                                                    value="{{ $staff->name }}">
                                                                            </div>
                                                                            @if ($errors->has('name'))
                                                                                <span
                                                                                    class="text-danger">{{ $errors->first('name') }}</span>
                                                                            @endif
                                                                            <div class="form-group">
                                                                                <label for="email">Email</label>
                                                                                <input type="text"
                                                                                    placeholder="Nhập email" name="email"
                                                                                    class="form-control" id="email"
                                                                                    value="{{ $staff->email }}">
                                                                            </div>
                                                                            @if ($errors->has('email'))
                                                                                <span
                                                                                    class="text-danger">{{ $errors->first('email') }}</span>
                                                                            @endif
                                                                            <div class="form-group">
                                                                                <label for="dob">Chọn chức vụ</label>
                                                                                <select
                                                                                    class="custom-select custom-select-lg mb-3"
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
                                                                                <label for="phone">Số điện thoại</label>
                                                                                <input type="text"
                                                                                    placeholder="Nhập số điện thoại"
                                                                                    name="phone" class="form-control"
                                                                                    id="phone"
                                                                                    value="{{ $staff->phone }}">
                                                                            </div>
                                                                            @if ($errors->has('phone'))
                                                                                <span
                                                                                    class="text-danger">{{ $errors->first('phone') }}</span>
                                                                            @endif
                                                                            <div class="form-group">
                                                                                <label for="address">Address</label>
                                                                                <input type="text"
                                                                                    placeholder="Nhập địa chỉ"
                                                                                    name="address" class="form-control"
                                                                                    id="address"
                                                                                    value="{{ $staff->address }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="dob">Ngày sinh</label>
                                                                                <input type="date"
                                                                                    placeholder="Nhập ngày sinh"
                                                                                    name="dob" class="form-control"
                                                                                    id="dob">
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                    <button type="submit"
                                                                        class="btn btn-success">Submit</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
