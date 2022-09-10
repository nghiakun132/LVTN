@extends('layouts.admin')
@section('title', 'Quản lý sự kiện')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Quản lý sự kiện</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Quản lý sự kiện</li>
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
                                        <a class="btn btn-success btn-sm text-white float-right" data-toggle="modal"
                                            data-target="#addEvent">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới
                                        </a>
                                        <a class="btn btn-secondary btn-sm text-white float-right mr-3" href="#">
                                            <i class="fa fa-check" aria-hidden="true"></i> Kiểm tra
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive-xl">
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Ngày bắt đầu</th>
                                                        <th>Ngày kết thúc</th>
                                                        <th>Trạng thái</th>
                                                        <th>Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($events as $event)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $event->start_date }}</td>
                                                            <td>{{ $event->end_date }}</td>
                                                            <td>
                                                                @if ($event->status == 0)
                                                                    <span
                                                                        class="badge badge-success">{{ __('Đang diễn ra') }}</span>
                                                                @else
                                                                    <span
                                                                        class="badge badge-danger">{{ __('Đã kết thúc') }}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-warning btn-sm text-white"
                                                                    href="{{ route('admin.event.show', $event->id) }}">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                                    Chi tiết
                                                                </a>
                                                                <a class="btn btn-danger btn-sm text-white"
                                                                    href="{{ route('admin.event.delete', $event->id) }}">
                                                                    <i class="fas fa-trash">
                                                                    </i>
                                                                    Xóa
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
    <div class="modal fade" id="addEvent" tabindex="-1" aria-labelledby="addEvent" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới khuyến mãi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mt-4">
                                        <label for="start_date">Ngày bắt đầu</label>
                                        <input type="datetime-local" placeholder="Nhập ngày bắt đầu" class="form-control"
                                            id="start_date" name="start_date">
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="end_date">Ngày kết thúc</label>
                                        <input type="datetime-local" placeholder="Nhập ngày kết thúc" class="form-control"
                                            id="end_date" name="end_date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
