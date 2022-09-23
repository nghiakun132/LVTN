<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>404</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="text-center">
            <h1 class="display-1 fw-bold">404</h1>
            <p class="fs-3"> <span class="text-danger">Lỗi rồi!</span> Không tìm thấy trang này.</p>
            <p class="lead">
                Trang bạn đang tìm kiếm có thể đã bị xóa, tên đã thay đổi hoặc tạm thời không khả dụng.
            </p>
            <a href="{{ route('client.home') }}" class="btn btn-primary">Quay lại trang chủ</a>
        </div>
    </div>
</body>


</html>
