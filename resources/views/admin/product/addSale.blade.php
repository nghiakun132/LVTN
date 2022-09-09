@extends('layouts.admin')
@section('title', 'Thêm khuyến mãi')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Thêm khuyến mãi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Thêm khuyến mãi</li>
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
                                    <div class="card-body">
                                        <form method="post"
                                            action="{{ route('admin.product.addSalesPost', $product->pro_id) }}">
                                            @csrf
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h3>Danh sách khuyến mãi</h3>
                                                        <div class="list-group">
                                                            <ul>
                                                                @foreach ($sales as $sale)
                                                                    <li class="list-group-item">
                                                                        <input type="checkbox" name="sale_id[]"
                                                                            id="sale-{{ $sale->id }}"
                                                                            value="{{ $sale->id }}">
                                                                        <label
                                                                            for="sale-{{ $sale->id }}">{{ $sale->s_name }}</label>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h3>Khuyến mãi đã chọn</h3>
                                                        <div class="list-group">
                                                            <ul>
                                                                @foreach ($saleProduct as $sd)
                                                                    <li class="list-group-item">
                                                                        {{ $sd->sales->s_name }}
                                                                        <a href="{{ route('admin.product.deleteSale', $sd->sale_id) }}"
                                                                            class="btn btn-danger btn-sm">Xóa</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>

                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Thêm</button>

                                                </div>
                                            </div>
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

@endsection
