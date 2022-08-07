@extends('layouts.client')
@section('content')
@section('title', 'Sổ địa chỉ')
<main id="main" class="main-site" style="background-color: rgb(245, 245, 250);">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">Trang chủ</a></li>
                <li class="item-link"><span>@yield('title')</span></li>
            </ul>
        </div>
        <div class="main-content-area">
            <div class="wrapper">
                @include('components.aside')
                <div class="infomation">
                    <div class="account-info">Quản lý địa chỉ</div>
                    <div class="infomation-wrapper">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên địa chỉ</th>
                                            <th>Địa chỉ</th>
                                            <th>Số điện thoại</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($address as $address)
                                            <tr>
                                                <td>{{ $address->id }}</td>
                                                <td>{{ $address->name }}</td>
                                                <td>{{ $address->address }}</td>
                                                <td>{{ $address->phone }}</td>
                                                <td>
                                                    {{-- <a href="{{ route('client.address.edit', $address->id) }}"
                                                class="btn btn-primary">Sửa</a>
                                            <a href="{{ route('client.address.delete', $address->id) }}"
                                                class="btn btn-danger">Xóa</a> --}}
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
</main>

@stop
