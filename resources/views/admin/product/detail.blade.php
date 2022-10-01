@extends('layouts.admin')
@section('title', 'Quản lý sản phẩm')
@section('content')
    <style>
        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }
    </style>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Quản lý sản phẩm</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Quản lý sản phẩm</li>
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
                                        <div class="row">
                                            <div class="col-md-4">
                                                <form action="{{ route('admin.product.image', $product->pro_id) }}"
                                                    method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="">Ảnh</label>
                                                        <input type="file" name="images[]" class="form-control"
                                                            placeholder="" aria-describedby="helpId" multiple>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                                </form>
                                                <div id="demo" class="carousel slide mt-4" data-ride="carousel">
                                                    <ul class="carousel-indicators">
                                                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                                                        <li data-target="#demo" data-slide-to="1"></li>
                                                        <li data-target="#demo" data-slide-to="2"></li>
                                                    </ul>
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img src="{{ asset('images/products/13pro1.jpg') }}"
                                                                alt="Los Angeles">
                                                        </div>
                                                        @foreach ($product->images as $images)
                                                            <div class="carousel-item">
                                                                <img src="{{ asset('images/products/' . $images->path) }}"
                                                                    alt="Los Angeles">
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                                        <span class="carousel-control-prev-icon"></span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#demo" data-slide="next">
                                                        <span class="carousel-control-next-icon"></span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <form action="{{ route('admin.product.detailPost', $product->pro_id) }}"
                                                    method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="">File excel </label>
                                                        <input type="file" name="file" class="form-control"
                                                            placeholder="" aria-describedby="helpId">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                                </form>
                                                <div class="table-responsive mt-4">
                                                    <table class="table table-bordered table-hover">
                                                        @foreach ($data as $key => $item)
                                                            <tr>
                                                                <th>{{ $key }}</th>
                                                                <td class="item-detail">{{ $item }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-4">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-bordered">
                                                        <tr>
                                                            <th>Danh mục</th>
                                                            <td>{{ $product->category->c_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Hãng</th>
                                                            <td>{{ $product->brand->b_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Số lượng</th>
                                                            <td>{{ $product->pro_quantity }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Nhóm</th>
                                                            @if ($product->group_id == 0)
                                                                <td>Không có</td>
                                                            @else
                                                                <td>{{ $product->group->name }}</td>
                                                            @endif
                                                        </tr>
                                                        <tr>
                                                            <th>Số lượng view</th>
                                                            <td>{{ $product->pro_view }}</td>
                                                        </tr>
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

@endsection
