@extends('layouts.client')
@section('content')
@section('title', 'Đơn hàng của tôi')

<main id="main" class="main-site" style="background-color: rgb(245, 245, 250);">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">Trang chủ</a></li>
                <li class="item-link"><a href="#">Đơn hàng của tôi</a></li>
                <li class="item-link"><span>
                        {{ $order->id }}
                    </span></li>
            </ul>
        </div>
        <div class="main-content-area">
            <div class="wrapper">
                @include('components.aside')
                <div class="width-screen">

                </div>
            </div>
        </div>
    </div>
@stop
