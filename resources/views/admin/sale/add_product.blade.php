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
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <form action="" method="POST">
                                                    @csrf
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-secondary dropdown-toggle"
                                                                            type="button" data-toggle="dropdown"
                                                                            aria-haspopup="true" aria-expanded="false">
                                                                        </button>
                                                                        <ul class="dropdown-menu">
                                                                            <li class="dropdown-item">
                                                                                <input type="checkbox" name="checkAll"
                                                                                    id="checkAll">
                                                                                <label for="checkAll">Chọn tất cả</label>
                                                                            </li>
                                                                            <li class="dropdown-item">
                                                                                <button type="submit"
                                                                                    class="btn btn-primary btn-sm">Thêm</button>
                                                                            </li>
                                                                        </ul>

                                                                    </div>
                                                                </th>
                                                                <th>Tên sản phẩm</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($productsNotIn as $productNotIn)
                                                                <tr>
                                                                    <td>
                                                                        <input type="checkbox" name="product_id[]"
                                                                            value="{{ $productNotIn->pro_id }}"
                                                                            id="product_{{ $productNotIn->pro_id }}">
                                                                    </td>
                                                                    <td>
                                                                        <label for="product_{{ $productNotIn->pro_id }}">
                                                                            {{ $productNotIn->pro_name }}
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <button type="submit" class="btn btn-primary">Thêm
                                                                        sản phẩm</button>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </form>
                                            </div>
                                            <div class="col-6">
                                                <div class="card">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 10px">#</th>
                                                                <th>Tên sản phẩm</th>
                                                                <th style="width: 40px">Hành động</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($products as $key => $products)
                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td>{{ $products->pro_name }}</td>
                                                                    <td>
                                                                        <a href="{{ route('admin.sale.delete.product', ['id' => $products->pro_id]) }}"
                                                                            class="btn btn-danger btn-sm text-white">
                                                                            <i class="fa fa-trash"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                    </table>
                                                </div>
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
@stop
