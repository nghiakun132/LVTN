@extends('layouts.admin')
@section('title', 'Quản lý sản phẩm')
@section('content')
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
                                            </div>
                                            <div class="col-md-4">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover">
                                                        @foreach ($data as $key => $item)
                                                            <tr>
                                                                <th>{{ $key }}</th>
                                                                <td>{{ $item }}</td>
                                                            </tr>
                                                        @endforeach

                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h4>hllelwq</h4>
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
