<aside class="wrapper-aside">
    <div class="account-info">
        <img src="
        {{ $user->type == 2 ? $user->avatar : 'images/' . $user->avatar }}
        " alt="avatar">
        <div class="info">Tài khoản của<strong>{{ $user->name }}</strong></div>
    </div>
    <ul class="list-action">
        <li>
            <a class="is-active" href="#">
                <span><i class="fa fa-user" aria-hidden="true"></i></span>
                <span>Thông tin tài khoản</span></a>
        </li>
        <li>
            <a class="" href="#">
                <span><i class="fa fa-bell" aria-hidden="true"></i></span>
                <span>Thông báo của tôi</span><span class="badge">3</span></a>
        </li>
        <li>
            <a class="" href="#">
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                </span>
                <span>Quản lý đơn hàng</span></a>
        </li>
        <li>
            <a class="" href="#">
                <span>
                    <i class="fa fa-retweet" aria-hidden="true"></i>
                </span>
                <span>
                    Quản lý đổi trả
                </span>
            </a>
        </li>
        <li>
            <a class="" href="#">
                <span>
                    <i class="fa fa-location-arrow" aria-hidden="true"></i>
                </span>

                <span>Sổ địa chỉ</span></a>
        </li>
        <li><a href="#" class="">
                <span>
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </span>
                <span>Nhận
                    xét sản phẩm đã mua</span></a></li>

        <li><a href="#">
                <span>
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </span>
                <span>Sản phẩm bạn đã xem</span></a></li>
        <li>
            <a class="" href="#">
                <span>
                    <i class="fa fa-heart" aria-hidden="true"></i>
                </span>
                <span>Sản phẩm yêu thích</span></a>
        </li>
        <li>
            <a href="#" class="">
                <span>
                    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                </span>
                <span>Sản phẩm mua sau</span>
            </a>
        </li>
        <li>
            <a class="" href="#">
                <span>
                    <i class="fa fa-star" aria-hidden="true"></i>
                </span>
                <span>Nhận xét của tôi</span>
            </a>
        </li>
    </ul>
</aside>
