@extends('layouts.admin')
@section('title', 'Quản lý bình luận')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Quản lý bình luận</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Quản lý bình luận</li>
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
                                        <div class="table-responsive-xl">
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th style="">
                                                            <div class="dropdown">
                                                                <span class="dropdown-toggle" data-toggle="dropdown">
                                                                </span>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <div class="dropdown-item">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input" id="checkAll">
                                                                            <label class="custom-control-label"
                                                                                for="checkAll">Check All</label>
                                                                        </div>
                                                                    </div>
                                                                    <a class="dropdown-item" id="deleteAll">
                                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                                        Xóa
                                                                    </a>
                                                                    <a class="dropdown-item" id="activeAll">
                                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                                        Duyệt
                                                                    </a>
                                                                </div>
                                                            </div>

                                                        </th>
                                                        <th>Tên người bình luận</th>
                                                        <th>Nội dung bình luận</th>\
                                                        <th>Sao đánh giá</th>
                                                        <th>SP bình luận</th>
                                                        <th>Ngày bình luận</th>
                                                        <th>Trạng thái</th>
                                                        <th>Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($comments as $key => $comment)
                                                        <tr>
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="customCheckbox{{ $comment->id }}"
                                                                        name="customCheckbox[]" value="{{ $comment->id }}">
                                                                    <label class="custom-control-label"
                                                                        for="customCheckbox{{ $comment->id }}"></label>
                                                                </div>
                                                            </td>
                                                            <td>{{ $comment->user->name }}</td>
                                                            <td>{{ $comment->content }}</td>
                                                            <td>
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    <i
                                                                        class="fa fa-star {{ $i <= $comment->star ? 'text-warning' : '' }}"></i>
                                                                @endfor
                                                            </td>
                                                            <td>
                                                                @if ($comment->product->pro_name != null)
                                                                    {{ $comment->product->pro_name }}
                                                                @endif
                                                            </td>
                                                            <td>{{ $comment->created_at }}</td>
                                                            <td>
                                                                @if ($comment->status == 1)
                                                                    <span class="badge badge-success">Đã duyệt</span>
                                                                @else
                                                                    <a
                                                                        href="{{ route('admin.comment.confirm', $comment->id) }}">
                                                                        <span class="badge badge-danger">Chưa duyệt</span>
                                                                    </a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-danger btn-sm text-white"
                                                                    href="{{ route('admin.comment.delete', $comment->id) }}">
                                                                    <i class="fas fa-trash"></i>
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

@stop
