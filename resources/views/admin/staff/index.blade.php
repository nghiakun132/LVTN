@extends('layouts.admin')
@section('title', 'Quản lý nhân viên')
@section('content')
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
                                                        <th>ID</th>
                                                        <th>Họ tên</th>
                                                        <th>Email</th>
                                                        <th>Địa chỉ</th>
                                                        <th>Số điện thoại</th>
                                                        <th>Chức vụ</th>
                                                        <th>Trạng thái</th>
                                                        <th>Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($staffs as $staff)
                                                        <tr>
                                                            <td>{{ $staff->id }}</td>
                                                            <td>{{ $staff->name }}</td>
                                                            <td>{{ $staff->email }}</td>
                                                            <td>{{ $staff->address }}</td>
                                                            <td>{{ $staff->phone }}</td>
                                                            <td>
                                                                @if ($staff->level == 0)
                                                                    <span class="badge badge-danger">CEO</span>
                                                                @elseif($staff->level == 1)
                                                                    <span class="badge badge-warning">Quản lý</span>
                                                                @elseif($staff->level == 2)
                                                                    <span class="badge badge-info">Nhân viên</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($staff->level !== 0)
                                                                    @if ($staff->status == 1)
                                                                        <a
                                                                            href="{{ route('admin.staff.changeStatus', $staff->id) }}">
                                                                            <span class="badge badge-success">Hoạt
                                                                                động</span>
                                                                        </a>
                                                                    @else
                                                                        <a
                                                                            href="{{ route('admin.staff.changeStatus', $staff->id) }}">
                                                                            <span class="badge badge-danger">Ngừng hoạt
                                                                                động</span>
                                                                        </a>
                                                                    @endif
                                                                @endif

                                                            </td>
                                                            <td>
                                                                @if ($staff->level !== 0)
                                                                    <a href="{{ route('admin.staff.show', $staff->id) }}"
                                                                        class="btn btn-primary btn-sm">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    <a href="{{ route('admin.staff.delete', $staff->id) }}"
                                                                        class="btn btn-danger btn-sm">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                @endif
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
                    <form id="quickForm" method="post" action="">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Họ tên</label>
                                        <input type="text" placeholder="Nhập họ tên" name="name" class="form-control"
                                            id="name">
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" placeholder="Nhập email" name="email" class="form-control"
                                            id="email">
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="text" placeholder="Nhập mật khẩu" name="password"
                                            class="form-control" id="password">
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                    <div class="form-group">
                                        <label for="dob">Chọn chức vụ</label>
                                        <select class="custom-select custom-select-lg mb-3" name="level">
                                            <option value="1">Quản lý</option>
                                            <option value="2">Nhân viên</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="text" placeholder="Nhập số điện thoại" name="phone"
                                            class="form-control" id="phone">
                                    </div>
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" placeholder="Nhập địa chỉ" name="address"
                                            class="form-control" id="address">
                                    </div>
                                    <div class="form-group">
                                        <label for="dob">Ngày sinh</label>
                                        <input type="date" placeholder="Nhập ngày sinh" name="dob"
                                            class="form-control" id="dob">
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
