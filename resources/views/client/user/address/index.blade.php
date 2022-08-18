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
                    <div class="styles__StyledAccountAdress-sc-c0g5bd-0 ilGfdX">
                        <div class="heading">Sổ địa chỉ</div>
                        <div class="inner">
                            <div class="new"><a href="{{ route('client.address.create') }}"><svg
                                        stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                        height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                                    </svg><span>Thêm địa chỉ mới</span></a></div>
                            @foreach ($address as $address)
                                <div class="item">
                                    <div class="info">
                                        <div class="name">{{ $address->name }}
                                            @if ($address->default == 1)
                                                <span><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                        viewBox="0 0 512 512" height="1em" width="1em"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z">
                                                        </path>
                                                    </svg>
                                                    <span>Địa chỉ mặc định</span>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="address"><span>Địa chỉ: </span>{{ $address->address }}</div>
                                        <div class="phone"><span>Điện thoại: </span>{{ $address->phone }}</div>
                                    </div>
                                    <div class="action">
                                        <a class="edit" href="#">Chỉnh
                                            sửa</a>
                                        @if ($address->default == 0)
                                            <a class="edit" href="#">Địa chỉ mặc định</a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@stop
