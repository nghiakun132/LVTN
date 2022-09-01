@extends('layouts.admin')
@section('title', 'Quản lý mã giảm giá')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Quản lý mã giảm giá</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Quản lý mã giảm giá</li>
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
                                                        <th>Mã giảm giá</th>
                                                        <th>% Giảm</th>
                                                        <th>Trạng thái</th>
                                                        <th>Ngày tạo</th>
                                                        <th>Hành động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($coupons as $cp)
                                                        <tr>
                                                            <td>{{ $cp->coupon_id }}</td>
                                                            <td>{{ $cp->coupon_code }}</td>
                                                            <td>{{ $cp->coupon_discount }}%</td>
                                                            <td>
                                                                @if ($cp->coupon_status == 1)
                                                                    <span class="badge badge-success">Đang hoạt động</span>
                                                                @else
                                                                    <span class="badge badge-danger">Đã khóa</span>
                                                                @endif
                                                            </td>
                                                            <td>{{ $cp->created_at }}</td>
                                                            <td>
                                                                <a class="btn btn-danger btn-sm text-white"
                                                                    href="{{ route('admin.coupon.delete', $cp->coupon_id) }}">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i> Xóa
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
                                        <label for="pro_name">% giảm</label>
                                        <input type="number" placeholder="Nhập % giảm" name="coupon_discount"
                                            class="form-control" id="coupon_discount">
                                    </div>
                                    @if ($errors->has('coupon_discount'))
                                        <span class="text-danger">{{ $errors->first('coupon_discount') }}</span>
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
