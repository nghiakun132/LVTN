<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<style>
    * {
        font-family: DejaVu Sans !important;
        font-size: 12px;
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h5>Thông tin khách hàng</h5>
                <p><strong>Tên khách hàng:</strong> {{ $order->user->name }}</p>
                <p><strong>Số điện thoại:</strong> {{ $order->user->phone }}</p>
                <p><strong>Email:</strong> {{ $order->user->email }}</p>
                <p><strong>Địa chỉ:</strong> {{ $order->address->address }}</p>
            </div>
            <div class="col-6">

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <strong>Chi tiết đơn hàng: <p><strong>Mã đơn hàng:</strong> {{ $order->order_code }}</p></strong>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderDetails as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->product->pro_name }}</td>
                                <td>{{ number_format($item->price, 0, '', '.') }} đ</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->price * $item->quantity, 0, '', '.') }} đ</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" class="text-right"><strong>Tổng tiền:</strong></td>
                            <td><strong>{{ number_format($order->total, 0, '', '.') }} đ</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            <p><strong>Ghi chú:</strong> {{ $order->note }}</p>
        </div>
    </div>
</body>

</html>
