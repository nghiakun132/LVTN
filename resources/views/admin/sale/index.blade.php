@extends('layouts.admin')
@section('title', 'Quản lý khuyến mãi')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Quản lý khuyến mãi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Quản lý khuyến mãi</li>
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
                                            data-target="#addSale">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive-xl">
                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Tên khuyến mãi</th>
                                                        <th>Trạng thái</th>
                                                        <th>Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($sales as $key => $sale)
                                                        <tr>
                                                            <td>{{ $sale->id }}</td>
                                                            <td>{{ $sale->s_name }}</td>
                                                            <td>
                                                                @if ($sale->s_active == 1)
                                                                    <a
                                                                        href="{{ route('admin.sale.changeStatus', $sale->id) }}">
                                                                        <span class="badge badge-success">Đang hoạt
                                                                            động</span></a>
                                                                @else
                                                                    <a
                                                                        href="{{ route('admin.sale.changeStatus', $sale->id) }}">
                                                                        <span class="badge badge-danger">Ngừng hoạt
                                                                            động</span></a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('admin.sale.delete', $sale->id) }}"
                                                                    class="btn btn-danger btn-sm text-white">
                                                                    <i class="fa fa-trash"></i> Xóa
                                                                </a>
                                                                <input type="file" id="file"
                                                                    style="display:none;" />
                                                                <button id="button" name="button" value="Upload"
                                                                    onclick="thisFileUpload();">Upload</button>
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
    <script>
        function thisFileUpload() {
            document.getElementById("file").click();
        };
    </script>
    <div class="modal fade" id="addSale" tabindex="-1" aria-labelledby="addSale" aria-hidden="true">
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
                                        <label for="s_name">Tên</label>
                                        <input type="text" placeholder="Nhập tên" name="s_name" class="form-control">
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
