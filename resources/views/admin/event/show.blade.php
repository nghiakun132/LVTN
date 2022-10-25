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
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('admin.event.index') }}">Quản lý sự
                                    kiện</a></li>
                            <li class="breadcrumb-item active">{{ $event->id }}</li>
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
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <form action="" method="post" id="form-event">
                                                                            @csrf
                                                                            <div class="form-group">
                                                                                <label for="">Sản phẩm</label>
                                                                                <select name="product_id" id=""
                                                                                    class="form-control">
                                                                                    <option value="">Chọn sản phẩm
                                                                                    </option>
                                                                                    @foreach ($products as $product)
                                                                                        <option
                                                                                            value="{{ $product->pro_id }}">
                                                                                            {{ $product->pro_name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>

                                                                                @if ($errors->has('product_id'))
                                                                                    <div class="error text-danger">
                                                                                        {{ $errors->first('product_id') }}
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">% giảm</label>
                                                                                <input type="number" name="percentage"
                                                                                    class="form-control">
                                                                            </div>
                                                                            @if ($errors->has('percentage'))
                                                                                <div class="error text-danger">
                                                                                    {{ $errors->first('percentage') }}
                                                                                </div>
                                                                            @endif
                                                                            <button type="submit"
                                                                                class="btn btn-success">Lưu</button>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-bordered table-hover">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>STT</th>
                                                                                        <th>Sản phẩm</th>
                                                                                        {{-- <th>Số lượng</th> --}}
                                                                                        <th>% giảm</th>
                                                                                        <th>Thao tác</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach ($event->event_details as $event)
                                                                                        <tr>
                                                                                            <td>{{ $loop->index + 1 }}</td>
                                                                                            <td>{{ $event->products->pro_name }}
                                                                                            </td>
                                                                                            {{-- <td>{{ $event->quantity }}</td> --}}
                                                                                            <td>{{ $event->percentage }}
                                                                                            </td>
                                                                                            <td>
                                                                                                <a href="#"
                                                                                                    class="btn btn-sm btn-danger js-delete-event"
                                                                                                    data-id="{{ $event->id }}"
                                                                                                    data-url="{{ route('admin.event.deleteDetail') }}"><i
                                                                                                        class="fa fa-trash"></i>
                                                                                                    Xóa</a>
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
