@extends('layouts.client')
@section('content')
@section('title', 'Đơn hàng của tôi')

<main id="main" class="main-site" style="background-color: rgb(245, 245, 250);">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('client.home') }}" class="link">Trang chủ</a></li>
                <li class="item-link"><a href="{{ route('client.order') }}">Đơn hàng của tôi</a></li>
                <li class="item-link"><span>
                        {{ $order->id }}
                    </span></li>
            </ul>
        </div>
        <div class="main-content-area">
            <div class="wrapper">
                @include('components.aside')
                <div class="jXurFV">
                    <div class="width-screen2">
                        <div class="order-heading"><span>Chi tiết đơn hàng #{{ $order->order_code }}</span><span
                                class="split">-</span><span
                                class="status">{{ $order->getStatus($order->status) }}</span>
                        </div>
                        <div class="created-date">Ngày đặt hàng: {{ $order->created_at }}</div>
                        <div class="infomation-order">
                            <div class="gQjSfs">
                                <div class="title">Địa chỉ người nhận</div>
                                <div class="content">
                                    <p class="name">{{ $order->user->name }}</p>
                                    <p class="address"><span>Địa chỉ: </span>{{ $order->address->address }}</p>
                                    <p class="phone"><span>Điện thoại: </span>{{ $order->user->phone }}</p>
                                </div>
                            </div>
                            <div class="gQjSfs">
                                <div class="title">Hình thức giao hàng</div>
                                <div class="content">
                                    <p class="address"><span>Tên: </span>{{ $order->deliveryAgent->name }}</p>
                                    <p class="address"><span>Thời gian giao hàng:
                                        </span><b>
                                            {{ $order->deliveryAgent->getTimeDelivery($order->deliveryAgent->created_at) }}</b>
                                    </p>
                                    <p class="phone"><span>Phí vận chuyển:
                                        </span>{{ number_format($order->deliveryAgent->fee, 0, ',', '.') }}₫</p>
                                </div>
                            </div>
                            <div class="gQjSfs">
                                <div class="title">Hình thức thanh toán</div>
                                <div class="content">
                                    <p class="">Thanh toán bằng {{ $order->payment_method }}</p>
                                </div>
                            </div>
                            @if ($order->status == 0)
                                <div class="gQjSfs">
                                    <div class="title">Hủy đơn hàng</div>
                                    <div class="content">
                                        <p class="address"><span>Lý do: </span>{{ $order->deliveryAgent->name }}</p>
                                        <p class="address"><span>Ngày hủy: </span>{{ $order->deliveryAgent->name }}</p>

                                    </div>
                                </div>
                            @endif
                        </div>
                        <table class="table-order">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Giảm giá</th>
                                    <th>Tạm tính</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderDetails as $detail)
                                    <tr>
                                        <td>
                                            <div class="product-item"><img
                                                    src="{{ asset('images/products/' . $detail->product->pro_avatar) }}"
                                                    alt="{{ $detail->product->pro_name }}">
                                                <div class="product-info"><a class="product-name"
                                                        href="{{ route('client.product', [
                                                            'slug' => $detail->product->category->c_slug,
                                                            'brand' => $detail->product->brand->b_slug,
                                                            'product' => $detail->product->pro_slug,
                                                        ]) }}">{{ $detail->product->pro_name }}</a>
                                                    <div class="product-review"><a
                                                            href="{{ route('client.product', [
                                                                'slug' => $detail->product->category->c_slug,
                                                                'brand' => $detail->product->brand->b_slug,
                                                                'product' => $detail->product->pro_slug,
                                                            ]) }}"
                                                            target="_blank">Mua
                                                            lại</a></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="price">{{ number_format($detail->price, 0, ',', '.') }}₫</td>
                                        <td class="quantity">{{ $detail->quantity }}</td>
                                        <td class="discount-amount">0 ₫</td>
                                        <td class="raw-total">
                                            {{ number_format($detail->price * $detail->quantity, 0, ',', '.') }}₫</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4"><span>Tạm tính</span></td>
                                    <td>{{ number_format($total, 0, ',', '.') }}₫</td>
                                </tr>
                                <tr>
                                    <td colspan="4"><span>Phí vận chuyển</span></td>
                                    <td>{{ number_format($order->deliveryAgent->fee, 0, ',', '.') }}₫</td>
                                </tr>
                                <tr>
                                    <td colspan="4"><span>Tổng cộng</span></td>
                                    <td><span class="sum">
                                            {{ number_format($total + $order->deliveryAgent->fee, 0, ',', '.') }}₫
                                        </span></td>
                                </tr>

                                <tr>
                                    {{-- <td colspan="4"><span>Trạng thái</span></td> --}}
                                    <td colspan="8">
                                        @if ($order->status == 1)
                                            <a data-toggle="modal" data-target="#cancel-order" <button
                                                class="btn btn-danger btn-sm">
                                                <i class="fa fa-times" aria-hidden="true"></i> Hủy đơn hàng
                                                </button>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="cancel-order" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times text-danger"
                            aria-hidden="true"></i></button>
                    <h4 class="modal-title">Hủy đơn hàng</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="form-cancel">
                        @csrf
                        <div class="form-group">
                            <label for="reason">Lý do hủy đơn hàng</label>
                            <textarea name="reason" id="reason" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">Hủy đơn hàng</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
@stop
