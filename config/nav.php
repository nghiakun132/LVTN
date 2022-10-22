<?php

return [
    'admin' =>
    [
        'name' => 'Dashboard',
        'route' => 'admin.home',
        'icons' => '<i class="nav-icon fas fa-home"></i>',
        'prefix' => 'ascasc',
    ],
    [
        'name' => 'Nhân viên',
        'route' => 'admin.staff.index',
        'icons' => '<i class="nav-icon fas fa-tachometer-alt"></i>',
        'prefix' => 'panel/staff',
    ],
    [
        'name' => 'Khách hàng',
        'route' => 'admin.user.index',
        'icons' => '<i class="nav-icon fas fa-tachometer-alt"></i>',
        'prefix' => 'panel/user',
    ],
    [
        'name' => 'Danh mục sản phẩm',
        'route' => 'admin.category.index',
        'icons' => '<i class="nav-icon fas fa-tachometer-alt"></i>',
        'prefix' => 'panel/category',
    ], [
        'name' => 'Thương hiệu',
        'route' => 'admin.brand.index',
        'icons' => '<i class="nav-icon fas fa-tachometer-alt"></i>',
        'prefix' => 'panel/brand',
    ], [
        'name' => 'Sản phẩm',
        'route' => 'admin.product.index',
        'icons' => '<i class="nav-icon fas fa-tachometer-alt"></i>',
        'prefix' => 'panel/product',
    ],
    [
        'name' => 'Đơn hàng',
        'route' => 'admin.order.index',
        'icons' => '<i class="nav-icon fas fa-tachometer-alt"></i>',
        'prefix' => 'panel/order',
    ],
    [
        'name' => 'Nhập hàng',
        'route' => 'admin.import.index',
        'icons' => '<i class="nav-icon fas fa-tachometer-alt"></i>',
        'prefix' => 'panel/import',
    ],

    [
        'name' => 'Mã giảm giá',
        'route' => 'admin.coupon.index',
        'icons' => '<i class="nav-icon fas fa-tachometer-alt"></i>',
        'prefix' => 'panel/coupon',
    ],
    [
        'name' => 'Khuyến mãi',
        'route' => 'admin.sale.index',
        'icons' => '<i class="nav-icon fas fa-tachometer-alt"></i>',
        'prefix' => 'panel/sale',
    ],
    [
        'name' => 'Bình luận',
        'route' => 'admin.comment.index',
        'icons' => '<i class="nav-icon fas fa-tachometer-alt"></i>',
        'prefix' => 'panel/comment',
    ],
    [
        'name' => 'Thống kê',
        'route' => 'admin.home',
        'icons' => '<i class="nav-icon fas fa-tachometer-alt"></i>',
        'prefix' => 'panel/home',
    ],
    [
        'name' => 'Chương trình khuyến mãi',
        'route' => 'admin.event.index',
        'icons' => '<i class="nav-icon fas fa-tachometer-alt"></i>',
        'prefix' => 'panel/event',
    ],
    [
        'name' => 'Đơn vị vận chuyển',
        'route' => 'admin.delivery.index',
        'icons' => '<i class="nav-icon fas fa-tachometer-alt"></i>',
        'prefix' => 'panel/delivery',
    ],
    [
        'name' => 'Bài viết',
        'route' => 'admin.home',
        'icons' => '<i class="nav-icon fas fa-tachometer-alt"></i>',
        'prefix' => 'panel/home',
    ],
    [
        'name' => 'Đăng xuất',
        'route' => 'admin.logout',
        'icons' => '<i class="fa-solid fa-right-to-bracket"></i>',
        'prefix' => 'panel/logout',
    ]
];
