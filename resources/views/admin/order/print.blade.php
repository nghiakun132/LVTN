<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h5>Thông tin khách hàng</h5>
                <p><strong>Tên khách hàng:</strong> {{ $order->user->name }}</p>
                <p><strong>Số điện thoại:</strong> {{ $order->user->phone }}</p>
                <p><strong>Email:</strong> {{ $order->user->email }}</p>
                <p><strong>Địa chỉ:</strong> {{ $order->address->address }}</p>
            </div>
            <div class="col-md-6">
                <h5>Thông tin đơn hàng</h5>
                <p><strong>Mã đơn hàng:</strong> {{ $order->order_code }}</p>
                <p>
                    Tổng tiền: <strong>{{ number_format($order->total, 0, '', '.') }}
                        đ</strong>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h5>Chi tiết đơn hàng</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                        @foreach ($order->orderDetails as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ number_format($item->price, 0, '', '.') }} đ</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->price * $item->quantity, 0, '', '.') }} đ</td>
                            </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>

</html>
