<aside class="wrapper-aside">
    <div class="account-info">
        <img src="
        {{ Session::get('user')->type == 2 ? Session::get('user')->avatar : 'images/' . Session::get('user')->avatar }}
        "
            alt="avatar">
        <div class="info">Tài khoản của<strong>{{ Session::get('user')->name }}</strong></div>
    </div>
    <ul class="list-action">
        <li>
            <a class="redirect
            {{ request()->is('tai-khoan') ? 'is-active' : '' }}
            "
                href="{{ route('client.user.index') }}">
                <span><i class="fa fa-user" aria-hidden="true"></i></span>
                <span>Thông tin tài khoản</span></a>
        </li>
        <li>
            <a class="redirect" href="{{ route('client.user.notification') }}">
                <span><i class="fa fa-bell" aria-hidden="true"></i></span>
                <span>Thông báo của tôi</span><span class="badge">{{ $noti }}</span></a>
        </li>
        <li>
            <a class="redirect
            {{ request()->is('tai-khoan/don-hang-cua-toi' . '*') ? 'is-active' : '' }}
            "
                href="{{ route('client.order') }}">
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                </span>
                <span>Quản lý đơn hàng</span></a>
        </li>
        <li>
            <a class="redirect
            {{ request()->is('tai-khoan/so-dia-chi' . '*') ? 'is-active' : '' }}
            "
                href="{{ route('client.address') }}">
                <span>
                    <i class="fa fa-location-arrow" aria-hidden="true"></i>
                </span>

                <span>Sổ địa chỉ</span></a>
        </li>
        <li><a href="#" class="redirect">
                <span>
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </span>
                <span>Nhận
                    xét sản phẩm đã mua</span></a></li>

        <li><a href="{{ route('client.product.watched') }}">
                <span>
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </span>
                <span>Sản phẩm bạn đã xem</span></a></li>
        <li>
            <a class="redirect" href="{{ route('client.wishlist') }}">
                <span>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                </span>
                <span>Sản phẩm yêu thích</span></a>
        </li>
    </ul>
</aside>
