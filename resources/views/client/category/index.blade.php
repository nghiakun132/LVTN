@extends('layouts.client')
@section('content')
@section('title', 'Danh mục')
<main id="main" class="main-site" style="background-color: rgb(245, 245, 250);">
    <div class="container">
        <div class="top-category-ads">
            <div class="ads-container">
                <div class="full item">
                    <a href="https://hoanghamobile.com/dien-thoai-di-dong/xiaomi-11t-pro-5g-12gb-256gb-chinh-hang-dgw?utm_source=web&amp;utm_medium=Homebanner&amp;utm_content=1108_xiaomi11Tpro&amp;utm_campaign=xiaomi11Tpro"
                        target="_top"><img
                            src="https://cdn.hoanghamobile.com/i/home/Uploads/2022/08/11/xiaomi-11-t-pro-1200x200_637958271379689466.jpg"
                            class="img-responsive img-border-radius"></a>
                </div>
            </div>
        </div>
        <section id="quick">
            <div class="lst-quickfilter q-manu ">
                <a href="dtdd-apple-iphone" class="box-quicklink__item bd-radius quicklink-logo">
                    <img src="//cdn.tgdd.vn/Brand/1/logo-iphone-220x48.png" width="30" class="no-text">
                </a>
                <a href="dtdd-samsung" data-href="dtdd-samsung" data-index="0"
                    class="box-quicklink__item bd-radius quicklink-logo">
                    <img src="//cdn.tgdd.vn/Brand/1/samsungnew-220x48-1.png" width="30" class="no-text">

                </a>
                <a href="dtdd-oppo" class="box-quicklink__item bd-radius quicklink-logo">
                    <img src="//cdn.tgdd.vn/Brand/1/OPPO42-b_5.jpg" width="30" class="no-text">

                </a>
                <a href="dtdd-xiaomi" class="box-quicklink__item bd-radius quicklink-logo">
                    <img src="//cdn.tgdd.vn/Brand/1/logo-xiaomi-220x48-5.png" width="30" class="no-text">

                </a>
                <a href="dtdd-vivo" class="box-quicklink__item bd-radius quicklink-logo">
                    <img src="//cdn.tgdd.vn/Brand/1/vivo-logo-220-220x48-3.png" width="30" class="no-text">

                </a>
                <a href="dtdd-realme" class="box-quicklink__item bd-radius quicklink-logo">
                    <img src="//cdn.tgdd.vn/Brand/1/Realme42-b_37.png" width="30" class="no-text">

                </a>
                <a href="dtdd-nokia" class="box-quicklink__item bd-radius quicklink-logo">
                    <img src="//cdn.tgdd.vn/Brand/1/Nokia42-b_21.jpg" width="30" class="no-text">

                </a>
            </div>
        </section>
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">Trang chủ</a></li>
                <li class="item-link"><span>@yield('title')</span></li>
            </ul>
        </div>
        <section id="filter-laptop">
            <div class="product-filters2">
                <div class="left">
                    <strong class="label">Lọc danh sách:</strong>
                    <div class="facet">
                        <label><a href="javascript:;">Danh mục <i class="icon-rightar"></i></a></label>
                        <div class="sub2">
                            <ul>
                                <li><a href="/dien-thoai-di-dong/iphone">Apple</a></li>
                                <li><a href="/dien-thoai-di-dong/samsung">Samsung</a></li>
                                <li><a href="/dien-thoai-di-dong/xiaomi">Xiaomi</a></li>
                                <li><a href="/dien-thoai-di-dong/oppo">OPPO</a></li>
                                <li><a href="/dien-thoai-di-dong/nokia">Nokia</a></li>
                                <li><a href="/dien-thoai-di-dong/realme">Realme</a></li>
                                <li><a href="/dien-thoai-di-dong/nubia">Nubia</a></li>
                                <li><a href="/dien-thoai-di-dong/vivo">Vivo</a></li>
                                <li><a href="/dien-thoai-di-dong/energizer">Energizer</a></li>
                                <li><a href="/dien-thoai-di-dong/masstel">Masstel</a></li>
                                <li><a href="/dien-thoai-di-dong/xor">XOR</a></li>
                                <li><a href="/dien-thoai-di-dong/blackberry">Blackberry</a></li>
                                <li><a href="/dien-thoai-di-dong/philips">Philips</a></li>
                                <li><a href="/dien-thoai-di-dong/itel">Itel</a></li>
                                <li><a href="/dien-thoai-di-dong/bphone">BPhone</a></li>
                                <li><a href="/dien-thoai-di-dong/tecno">TECNO</a></li>
                                <li><a href="/dien-thoai-di-dong/zte">ZTE</a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="facet">
                        <label>
                            <a href="javascript:;">Thương hiệu <i class="icon-rightar"></i></a>
                        </label>
                        <div class="sub2">
                            <ul>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;12&quot;}&amp;search=true">Vivo
                                        <i class="total">(19)</i></a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;216&quot;}&amp;search=true">XOR
                                        <i class="total">(13)</i></a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;20&quot;}&amp;search=true">Nokia
                                        <i class="total">(12)</i></a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;82&quot;}&amp;search=true">realme
                                        <i class="total">(12)</i></a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;214&quot;}&amp;search=true">TECNO
                                        <i class="total">(8)</i></a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;76&quot;}&amp;search=true">Energizer
                                        <i class="total">(5)</i></a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;114&quot;}&amp;search=true">Itel
                                        <i class="total">(4)</i></a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;115&quot;}&amp;search=true">Hoanghamobile
                                        <i class="total">(3)</i></a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;240&quot;}&amp;search=true">Nubia
                                        <i class="total">(3)</i></a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;6&quot;}&amp;search=true">ZTE
                                        <i class="total">(2)</i></a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;24&quot;}&amp;search=true">Philips
                                        <i class="total">(2)</i></a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;1&quot;}&amp;search=true">Apple
                                        <i class="total">(24)</i></a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;4&quot;}&amp;search=true">Samsung
                                        <i class="total">(27)</i></a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;7&quot;}&amp;search=true">Oppo
                                        <i class="total">(18)</i></a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;3&quot;}&amp;search=true">Xiaomi
                                        <i class="total">(21)</i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="facet">
                        <label>
                            <a href="javascript:;">Giá <i class="icon-rightar"></i></a>
                        </label>
                        <div class="sub2">
                            <ul>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;price&quot;:&quot;T100t&quot;}&amp;search=true">Trên
                                        100 triệu <i class="total">(8)</i></a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;price&quot;:&quot;1t&quot;}&amp;search=true">Dưới
                                        1 triệu <i class="total">(20)</i></a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;price&quot;:&quot;1t-2t&quot;}&amp;search=true">1
                                        đến 2 triệu <i class="total">(5)</i></a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;price&quot;:&quot;2t-3t&quot;}&amp;search=true">2
                                        đến 3 triệu <i class="total">(19)</i></a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;price&quot;:&quot;3t-4t&quot;}&amp;search=true">3
                                        đến 4 triệu <i class="total">(20)</i></a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;price&quot;:&quot;4t-5t&quot;}&amp;search=true">4
                                        đến 5 triệu <i class="total">(11)</i></a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;price&quot;:&quot;5t-6t&quot;}&amp;search=true">5
                                        đến 6 triệu <i class="total">(16)</i></a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;price&quot;:&quot;6t-8t&quot;}&amp;search=true">6
                                        đến 8 triệu <i class="total">(13)</i></a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;price&quot;:&quot;8t-10t&quot;}&amp;search=true">8
                                        đến 10 triệu <i class="total">(6)</i></a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;price&quot;:&quot;10t-12t&quot;}&amp;search=true">10
                                        đến 12 triệu <i class="total">(9)</i></a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;price&quot;:&quot;12t-15t&quot;}&amp;search=true">12
                                        đến 15 triệu <i class="total">(5)</i></a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;price&quot;:&quot;15t-20t&quot;}&amp;search=true">15
                                        đến 20 triệu <i class="total">(16)</i></a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;price&quot;:&quot;20t-100tr&quot;}&amp;search=true">20
                                        đến 100 triệu <i class="total">(26)</i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="right">
                    <div class="facet">
                        <label>Sắp xếp <i class="icon-rightar"></i></label>
                        <div class="sub2">
                            <ul>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;12&quot;}&amp;search=true"></span>
                                        Mặc định</a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;1&quot;}&amp;search=true"></span>
                                        Sản phẩm mới - cũ</a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;2&quot;}&amp;search=true"></span>
                                        Giá thấp đến cao</a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;3&quot;}&amp;search=true"></span>
                                        Giá cao đến thấp</a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;4&quot;}&amp;search=true"></span>
                                        Mới cập nhật</a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;5&quot;}&amp;search=true"></span>
                                        Sản phẩm cũ</a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;6&quot;}&amp;search=true"></span>
                                        Xem nhiều hôm nay</a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;7&quot;}&amp;search=true"></span>
                                        Xem nhiều tuần này</a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;8&quot;}&amp;search=true"></span>
                                        Xem nhiều tháng này</a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;10&quot;}&amp;search=true"></span>
                                        Xem nhiều năm nay</a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;9&quot;}&amp;search=true"></span>
                                        Xem nhiều nhất</a></li>
                                <li><a
                                        href="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;11&quot;}&amp;search=true"></span>
                                        Kết quả tìm kiếm</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-filters2-mobile">
            <div>
                <h3>Lọc danh sách:</h3>
                <div class="facet">
                    <label>Danh mục </label>
                    <select onchange="window.location = this.value;">
                        <option>Điện thoại</option>
                        <option value="/dien-thoai-di-dong/iphone">&nbsp; &nbsp; &nbsp; Apple</option>
                        <option value="/dien-thoai-di-dong/samsung">&nbsp; &nbsp; &nbsp; Samsung</option>
                        <option value="/dien-thoai-di-dong/xiaomi">&nbsp; &nbsp; &nbsp; Xiaomi</option>
                        <option value="/dien-thoai-di-dong/oppo">&nbsp; &nbsp; &nbsp; OPPO</option>
                        <option value="/dien-thoai-di-dong/nokia">&nbsp; &nbsp; &nbsp; Nokia</option>
                        <option value="/dien-thoai-di-dong/realme">&nbsp; &nbsp; &nbsp; Realme</option>
                        <option value="/dien-thoai-di-dong/nubia">&nbsp; &nbsp; &nbsp; Nubia</option>
                        <option value="/dien-thoai-di-dong/vivo">&nbsp; &nbsp; &nbsp; Vivo</option>
                        <option value="/dien-thoai-di-dong/energizer">&nbsp; &nbsp; &nbsp; Energizer</option>
                        <option value="/dien-thoai-di-dong/masstel">&nbsp; &nbsp; &nbsp; Masstel</option>
                        <option value="/dien-thoai-di-dong/xor">&nbsp; &nbsp; &nbsp; XOR</option>
                        <option value="/dien-thoai-di-dong/blackberry">&nbsp; &nbsp; &nbsp; Blackberry</option>
                        <option value="/dien-thoai-di-dong/philips">&nbsp; &nbsp; &nbsp; Philips</option>
                        <option value="/dien-thoai-di-dong/itel">&nbsp; &nbsp; &nbsp; Itel</option>
                        <option value="/dien-thoai-di-dong/bphone">&nbsp; &nbsp; &nbsp; BPhone</option>
                        <option value="/dien-thoai-di-dong/ngung-kinh-doanh">&nbsp; &nbsp; &nbsp; Ngừng kinh doanh
                        </option>
                        <option value="/dien-thoai-di-dong/tecno">&nbsp; &nbsp; &nbsp; TECNO</option>
                        <option value="/dien-thoai-di-dong/zte">&nbsp; &nbsp; &nbsp; ZTE</option>
                    </select>
                </div>


                <div class="facet">
                    <label>Thương hiệu</label>
                    <select onchange="window.location = this.value;">
                        <option>Chọn Thương hiệu</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;12&quot;}&amp;search=true">
                            Vivo (19)</option>
                        <option
                            value="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;216&quot;}&amp;search=true">
                            XOR (13)</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;20&quot;}&amp;search=true">
                            Nokia (12)</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;82&quot;}&amp;search=true">
                            realme (12)</option>
                        <option
                            value="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;214&quot;}&amp;search=true">
                            TECNO (8)</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;76&quot;}&amp;search=true">
                            Energizer (5)</option>
                        <option
                            value="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;114&quot;}&amp;search=true">
                            Itel (4)</option>
                        <option
                            value="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;115&quot;}&amp;search=true">
                            Hoanghamobile (3)</option>
                        <option
                            value="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;240&quot;}&amp;search=true">
                            Nubia (3)</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;6&quot;}&amp;search=true">
                            ZTE (2)</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;24&quot;}&amp;search=true">
                            Philips (2)</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;1&quot;}&amp;search=true">
                            Apple (24)</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;4&quot;}&amp;search=true">
                            Samsung (27)</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;7&quot;}&amp;search=true">
                            Oppo (18)</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;3&quot;}&amp;search=true">
                            Xiaomi (21)</option>
                    </select>
                </div>
                <div class="facet">
                    <label>Giá</label>
                    <select onchange="window.location = this.value;">
                        <option>Chọn Giá</option>
                        <option
                            value="/dien-thoai-di-dong?filters={&quot;price&quot;:&quot;T100t&quot;}&amp;search=true">
                            Trên 100 triệu (8)</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;price&quot;:&quot;1t&quot;}&amp;search=true">
                            Dưới 1 triệu (20)</option>
                        <option
                            value="/dien-thoai-di-dong?filters={&quot;price&quot;:&quot;1t-2t&quot;}&amp;search=true">
                            1 đến 2 triệu (5)</option>
                        <option
                            value="/dien-thoai-di-dong?filters={&quot;price&quot;:&quot;2t-3t&quot;}&amp;search=true">
                            2 đến 3 triệu (19)</option>
                        <option
                            value="/dien-thoai-di-dong?filters={&quot;price&quot;:&quot;3t-4t&quot;}&amp;search=true">
                            3 đến 4 triệu (20)</option>
                        <option
                            value="/dien-thoai-di-dong?filters={&quot;price&quot;:&quot;4t-5t&quot;}&amp;search=true">
                            4 đến 5 triệu (11)</option>
                        <option
                            value="/dien-thoai-di-dong?filters={&quot;price&quot;:&quot;5t-6t&quot;}&amp;search=true">
                            5 đến 6 triệu (16)</option>
                        <option
                            value="/dien-thoai-di-dong?filters={&quot;price&quot;:&quot;6t-8t&quot;}&amp;search=true">
                            6 đến 8 triệu (13)</option>
                        <option
                            value="/dien-thoai-di-dong?filters={&quot;price&quot;:&quot;8t-10t&quot;}&amp;search=true">
                            8 đến 10 triệu (6)</option>
                        <option
                            value="/dien-thoai-di-dong?filters={&quot;price&quot;:&quot;10t-12t&quot;}&amp;search=true">
                            10 đến 12 triệu (9)</option>
                        <option
                            value="/dien-thoai-di-dong?filters={&quot;price&quot;:&quot;12t-15t&quot;}&amp;search=true">
                            12 đến 15 triệu (5)</option>
                        <option
                            value="/dien-thoai-di-dong?filters={&quot;price&quot;:&quot;15t-20t&quot;}&amp;search=true">
                            15 đến 20 triệu (16)</option>
                        <option
                            value="/dien-thoai-di-dong?filters={&quot;price&quot;:&quot;20t-100tr&quot;}&amp;search=true">
                            20 đến 100 triệu (26)</option>
                    </select>
                </div>
                <div class="facet">
                    <label>Sắp xếp</label>
                    <select onchange="window.location = this.value;">
                        <option>Chọn cách sắp xếp</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;12&quot;}&amp;search=true">
                            Mặc định</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;1&quot;}&amp;search=true">
                            Sản phẩm mới - cũ</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;2&quot;}&amp;search=true">
                            Giá thấp đến cao</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;3&quot;}&amp;search=true">
                            Giá cao đến thấp</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;4&quot;}&amp;search=true">
                            Mới cập nhật</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;5&quot;}&amp;search=true">
                            Sản phẩm cũ</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;6&quot;}&amp;search=true">
                            Xem nhiều hôm nay</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;7&quot;}&amp;search=true">
                            Xem nhiều tuần này</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;8&quot;}&amp;search=true">
                            Xem nhiều tháng này</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;10&quot;}&amp;search=true">
                            Xem nhiều năm nay</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;9&quot;}&amp;search=true">
                            Xem nhiều nhất</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;sort&quot;:&quot;11&quot;}&amp;search=true">
                            Kết quả tìm kiếm</option>
                    </select>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="list-product">
                    <h3>Điện thoại</h3>
                    <div class="col-content lts-product">
                        <div class="item">

                            <div class="img">
                                <a href="/dien-thoai-di-dong/oppo-reno6-z-5g-chinh-hang"
                                    title="OPPO Reno6 Z 5G - Chính Hãng">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2021/07/07/reno6-z-bl.png"
                                        alt="OPPO Reno6 Z 5G - Chính Hãng" title="OPPO Reno6 Z 5G - Chính Hãng">
                                </a>
                            </div>


                            <div class="cover">
                                <div
                                    style="color: yellow;
                                background: #00483D;
                                margin: 25px 20px 15px 15px;
                                padding: 3px;
                                border-radius: 6px;
                                font-size:6px
                                font-weight: 600;">
                                    <marquee behavior="alternate">
                                        <marquee width="150">
                                            <span style="color:white">Hotsale giá sốc chỉ còn 6.090.000đ</span>
                                        </marquee>
                                    </marquee>
                                </div>
                            </div>

                            <div class="info">
                                <a href="/dien-thoai-di-dong/oppo-reno6-z-5g-chinh-hang" class="title"
                                    title="OPPO Reno6 Z 5G - Chính Hãng">OPPO Reno6 Z 5G - Chính Hãng</a>
                                <span class="price">
                                    <strong>5,990,000 ₫</strong>
                                    <strike>9,490,000 ₫</strike>
                                </span>

                            </div>
                            <div class="promote">
                                <a href="/dien-thoai-di-dong/oppo-reno6-z-5g-chinh-hang">
                                    <ul>
                                        <li><span class="bag">KM</span> Giảm thêm tới 500.000đ khi thanh toán qua
                                            VNPAY</li>
                                        <li><span class="bag">KM</span> Giảm thêm tới 600.000đ khi mở thẻ TP Bank
                                            EVO thành công</li>
                                        <li><span class="bag">KM</span> Tặng sim Reddi 055 chưa bao gồm gói cước
                                            (Trừ shop SiS) Hoặc sim data Mobifone Hera 5G (2.5GB/ngày) (Chưa bao gồm
                                            tháng đầu tiên) - Lưu ý: chỉ áp dụng mua trực tiếp tại cửa hàng.</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img">
                                <a href="/dien-thoai-di-dong/samsung-galaxy-a73-chinh-hang"
                                    title="Samsung Galaxy A73 5G - Chính hãng">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/04/10/image-removebg-preview.png"
                                        alt="Samsung Galaxy A73 5G - Chính hãng"
                                        title="Samsung Galaxy A73 5G - Chính hãng">
                                </a>
                            </div>

                            <div class="cover">
                                <div
                                    style="
                                color: yellow;
                                background: #00483D;
                                margin: -95px 5px 0 52px;
                                padding: 3px;
                                border-radius: 6px;
                                font-size: 11px;
                                font-weight: 600;
                                ">
                                    <span style="color:white">Hotsale giá sốc từ 19-22/08</span><br>
                                    <span style="color:yallow">Giá chỉ còn 10.290.000đ</span>
                                </div>
                            </div>

                            <div class="info">
                                <a href="/dien-thoai-di-dong/samsung-galaxy-a73-chinh-hang" class="title"
                                    title="Samsung Galaxy A73 5G - Chính hãng">Samsung Galaxy A73 5G - Chính hãng</a>
                                <span class="price">
                                    <strong>10,290,000 ₫</strong>
                                    <strike>11,990,000 ₫</strike>
                                </span>

                            </div>

                            <div class="promote">
                                <a href="/dien-thoai-di-dong/samsung-galaxy-a73-chinh-hang">
                                    <ul>
                                        <li><span class="bag">KM</span> Giảm thêm tới 500.000đ khi thanh toán qua
                                            VNPAY</li>
                                        <li><span class="bag">KM</span> Giảm thêm tới 600.000đ khi mở thẻ TP Bank
                                            EVO thành công</li>
                                        <li><span class="bag">KM</span> Giảm thêm 400.000đ khi tham gia Thu cũ - Lên
                                            đời điện thoại Android</li>
                                        <li><span class="bag">KM</span> Tặng sim Reddi 055 chưa bao gồm gói cước
                                            (Trừ shop SiS) Hoặc sim data Mobifone Hera 5G (2.5GB/ngày) (Chưa bao gồm
                                            tháng đầu tiên) - Lưu ý: chỉ áp dụng mua trực tiếp tại cửa hàng.</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">

                            <div class="img">
                                <a href="/dien-thoai-di-dong/xiaomi-redmi-note-10-pro-8gb-128gb-chinh-hang"
                                    title="Xiaomi Redmi Note 10 Pro 8GB/128GB - Chính hãng">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2021/03/16/image-removebg-preview-3.png"
                                        alt="Xiaomi Redmi Note 10 Pro 8GB/128GB - Chính hãng"
                                        title="Xiaomi Redmi Note 10 Pro 8GB/128GB - Chính hãng">
                                </a>
                            </div>

                            <span class="sales">
                                <i class="icon-flash2"></i> Giảm 1,510,000 ₫
                            </span>

                            <div class="info">
                                <a href="/dien-thoai-di-dong/xiaomi-redmi-note-10-pro-8gb-128gb-chinh-hang"
                                    class="title" title="Xiaomi Redmi Note 10 Pro 8GB/128GB - Chính hãng">Xiaomi
                                    Redmi Note 10 Pro 8GB/128GB - Chính hãng</a>
                                <span class="price">
                                    <strong>5,980,000 ₫</strong>
                                    <strike>7,490,000 ₫</strike>
                                </span>

                            </div>
                            <div class="promote">
                                <a href="/dien-thoai-di-dong/xiaomi-redmi-note-10-pro-8gb-128gb-chinh-hang">
                                    <ul>
                                        <li><span class="bag">KM</span> Giảm thêm tới 500.000đ khi thanh toán qua
                                            VNPAY</li>
                                        <li><span class="bag">KM</span> Giảm thêm tới 600.000đ khi mở thẻ TP Bank
                                            EVO thành công</li>
                                        <li><span class="bag">KM</span> Giảm thêm 400.000đ khi tham gia Thu cũ - Lên
                                            đời điện thoại Android</li>
                                        <li><span class="bag">KM</span> Tặng sim Reddi 055 chưa bao gồm gói cước
                                            (Trừ shop SiS) Hoặc sim data Mobifone Hera 5G (2.5GB/ngày) (Chưa bao gồm
                                            tháng đầu tiên) - Lưu ý: chỉ áp dụng mua trực tiếp tại cửa hàng.</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">

                            <div class="img">
                                <a href="/dien-thoai-di-dong/xiaomi-redmi-9c-4gb-128gb-chinh-hang-dgw"
                                    title="Xiaomi Redmi 9C - 4GB/128GB - Chính hãng">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2020/09/16/Artboard 1 copy 47.jpg"
                                        alt="Xiaomi Redmi 9C - 4GB/128GB - Chính hãng"
                                        title="Xiaomi Redmi 9C - 4GB/128GB - Chính hãng">
                                </a>
                            </div>


                            <span class="sales">
                                <i class="icon-flash2"></i> Giảm 600,000 ₫
                            </span>

                            <div class="info">
                                <a href="/dien-thoai-di-dong/xiaomi-redmi-9c-4gb-128gb-chinh-hang-dgw" class="title"
                                    title="Xiaomi Redmi 9C - 4GB/128GB - Chính hãng">Xiaomi Redmi 9C - 4GB/128GB -
                                    Chính hãng</a>
                                <span class="price">
                                    <strong>2,890,000 ₫</strong>
                                    <strike>3,490,000 ₫</strike>
                                </span>

                            </div>
                            <div class="promote">
                                <a href="/dien-thoai-di-dong/xiaomi-redmi-9c-4gb-128gb-chinh-hang-dgw">
                                    <ul>
                                        <li><span class="bag">KM</span> Giảm thêm tới 500.000đ khi thanh toán qua
                                            VNPAY</li>
                                        <li><span class="bag">KM</span> Giảm thêm tới 600.000đ khi mở thẻ TP Bank
                                            EVO thành công</li>
                                        <li><span class="bag">KM</span> Giảm thêm 400.000đ khi tham gia Thu cũ - Lên
                                            đời điện thoại Android</li>
                                        <li><span class="bag">KM</span> Tặng sim Reddi 055 chưa bao gồm gói cước
                                            (Trừ shop SiS) Hoặc sim data Mobifone Hera 5G (2.5GB/ngày) (Chưa bao gồm
                                            tháng đầu tiên) - Lưu ý: chỉ áp dụng mua trực tiếp tại cửa hàng.</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">

                            <div class="img">
                                <a href="/dien-thoai-di-dong/-redmi-note-11-4gb-64gb-chinh-hang"
                                    title="Redmi Note 11 - 4GB/64GB- chính hãng">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/01/27/thumb.jpg"
                                        alt="Redmi Note 11 - 4GB/64GB- chính hãng"
                                        title="Redmi Note 11 - 4GB/64GB- chính hãng">
                                </a>
                            </div>
                            <div class="cover">
                                <div
                                    style="
                                            color: yellow;
                                            background: #00483D;
                                            margin: -95px 5px 0 52px;
                                            padding: 3px;
                                            border-radius: 6px;
                                            font-size: 11px;
                                            font-weight: 600;
                                            ">
                                    <span style="color:white">Hotsale giá sốc từ 19-21/08</span><br>
                                    <span style="color:yellow">Giá chỉ còn 3.850.000đ</span>
                                </div>

                            </div>

                            <div class="info">
                                <a href="/dien-thoai-di-dong/-redmi-note-11-4gb-64gb-chinh-hang" class="title"
                                    title="Redmi Note 11 - 4GB/64GB- chính hãng">Redmi Note 11 - 4GB/64GB- chính
                                    hãng</a>
                                <span class="price">
                                    <strong>3,850,000 ₫</strong>
                                    <strike>4,690,000 ₫</strike>
                                </span>

                            </div>
                            <div class="promote">
                                <a href="/dien-thoai-di-dong/-redmi-note-11-4gb-64gb-chinh-hang">
                                    <ul>
                                        <li><span class="bag">KM</span> Giảm thêm tới 500.000đ khi thanh toán qua
                                            VNPAY</li>
                                        <li><span class="bag">KM</span> Giảm thêm tới 600.000đ khi mở thẻ TP Bank
                                            EVO thành công</li>
                                        <li><span class="bag">KM</span> Giảm thêm 400.000đ khi tham gia Thu cũ - Lên
                                            đời điện thoại Android</li>
                                        <li><span class="bag">KM</span> Tặng sim Reddi 055 chưa bao gồm gói cước
                                            (Trừ shop SiS) Hoặc sim data Mobifone Hera 5G (2.5GB/ngày) (Chưa bao gồm
                                            tháng đầu tiên) - Lưu ý: chỉ áp dụng mua trực tiếp tại cửa hàng.</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">

                            <div class="img">
                                <a href="/dien-thoai-di-dong/samsung-galaxy-s-22-8gb-128gb-chinh-hang"
                                    title="Samsung Galaxy S22 - 8GB/128GB - Chính hãng">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/02/09/image-removebg-preview-7.png"
                                        alt="Samsung Galaxy S22 - 8GB/128GB - Chính hãng"
                                        title="Samsung Galaxy S22 - 8GB/128GB - Chính hãng">
                                </a>
                            </div>

                            <div class="cover">
                                <div
                                    style="
            color: yellow;
            background: #00483D;
            margin: -95px 5px 0 52px;
            padding: 3px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            ">
                                    <span style="color:white">Hotsale giá sốc từ 19-22/08</span><br>
                                    <span style="color:yallow">Giá chỉ còn 15.990.000đ</span>
                                </div>
                            </div>

                            <div class="info">
                                <a href="/dien-thoai-di-dong/samsung-galaxy-s-22-8gb-128gb-chinh-hang" class="title"
                                    title="Samsung Galaxy S22 - 8GB/128GB - Chính hãng">Samsung Galaxy S22 - 8GB/128GB
                                    - Chính hãng</a>
                                <span class="price">
                                    <strong>15,990,000 ₫</strong>
                                    <strike>21,990,000 ₫</strike>
                                </span>

                            </div>

                            <div class="promote">
                                <a href="/dien-thoai-di-dong/samsung-galaxy-s-22-8gb-128gb-chinh-hang">
                                    <ul>
                                        <li><span class="bag">KM</span> Giảm thêm tới 500.000đ khi thanh toán qua
                                            VNPAY</li>
                                        <li><span class="bag">KM</span> Giảm thêm tới 600.000đ khi mở thẻ TP Bank
                                            EVO thành công</li>
                                        <li><span class="bag">KM</span> Ưu đãi quà tặng trên Galaxy Gift lên đến 1.7
                                            triệu trên HBO GO, Zing MP3, Galaxy Play, Phúc Long </li>
                                        <li><span class="bag">KM</span> Giảm 140k khi mua cùng Ốp lưng Silicone kèm
                                            dây đeo giá chỉ còn 250.000đ</li>
                                        <li><span class="bag">KM</span> Tặng sim Reddi 055 chưa bao gồm gói cước
                                            (Trừ shop SiS) Hoặc sim data Mobifone Hera 5G (2.5GB/ngày) (Chưa bao gồm
                                            tháng đầu tiên) - Lưu ý: chỉ áp dụng mua trực tiếp tại cửa hàng.</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">

                            <div class="img">
                                <a href="/dien-thoai-di-dong/samsung-galaxy-s22-8gb-256gb-chinh-hang"
                                    title="Samsung Galaxy S22 - 8GB/256GB - Chính hãng">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/02/09/image-removebg-preview-7.png"
                                        alt="Samsung Galaxy S22 - 8GB/256GB - Chính hãng"
                                        title="Samsung Galaxy S22 - 8GB/256GB - Chính hãng">
                                </a>
                            </div>



                            <div class="cover">
                                <div
                                    style="
            color: yellow;
            background: #00483D;
            margin: -95px 5px 0 52px;
            padding: 3px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            ">
                                    <span style="color:white">Hotsale giá sốc từ 19-22/08</span><br>
                                    <span style="color:yallow">Giá chỉ còn 17.390.000đ</span>
                                </div>
                            </div>

                            <div class="info">
                                <a href="/dien-thoai-di-dong/samsung-galaxy-s22-8gb-256gb-chinh-hang" class="title"
                                    title="Samsung Galaxy S22 - 8GB/256GB - Chính hãng">Samsung Galaxy S22 - 8GB/256GB
                                    - Chính hãng</a>
                                <span class="price">
                                    <strong>17,390,000 ₫</strong>
                                    <strike>23,490,000 ₫</strike>
                                </span>

                            </div>

                            <div class="promote">
                                <a href="/dien-thoai-di-dong/samsung-galaxy-s22-8gb-256gb-chinh-hang">
                                    <ul>
                                        <li><span class="bag">KM</span> Giảm thêm tới 500.000đ khi thanh toán qua
                                            VNPAY</li>
                                        <li><span class="bag">KM</span> Ưu đãi giảm 30% gói bảo hành mở rộng Samsung
                                            Care+ chỉ còn 1.430.000đ</li>
                                        <li><span class="bag">KM</span> Giảm thêm tới 600.000đ khi mở thẻ TP Bank
                                            EVO thành công</li>
                                        <li><span class="bag">KM</span> Ưu đãi quà tặng trên Galaxy Gift lên đến 1.7
                                            triệu trên HBO GO, Zing MP3, Galaxy Play, Phúc Long </li>
                                        <li><span class="bag">KM</span> Giảm 140k khi mua cùng Ốp lưng Silicone kèm
                                            dây đeo giá chỉ còn 250.000đ</li>
                                        <li><span class="bag">KM</span> Tặng sim Reddi 055 chưa bao gồm gói cước
                                            (Trừ shop SiS) Hoặc sim data Mobifone Hera 5G (2.5GB/ngày) (Chưa bao gồm
                                            tháng đầu tiên) - Lưu ý: chỉ áp dụng mua trực tiếp tại cửa hàng.</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                        <div class="item">

                            <div class="img">
                                <a href="/dien-thoai-di-dong/samsung-galaxy-s22-Plus-8gb-128gb-chinh-hang"
                                    title="Samsung Galaxy S22 Plus - 8GB/128GB - Chính hãng">
                                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2022/02/09/image-removebg-preview_637800437459949020.png"
                                        alt="Samsung Galaxy S22 Plus - 8GB/128GB - Chính hãng"
                                        title="Samsung Galaxy S22 Plus - 8GB/128GB - Chính hãng">
                                </a>
                            </div>



                            <div class="cover">
                                <div
                                    style="
            color: yellow;
            background: #00483D;
            margin: -95px 5px 0 52px;
            padding: 3px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            ">
                                    <span style="color:white">Hotsale giá sốc từ 19-22/08</span><br>
                                    <span style="color:yallow">Giá chỉ còn 19.790.000đ</span>
                                </div>

                            </div>

                            <div class="info">
                                <a href="/dien-thoai-di-dong/samsung-galaxy-s22-Plus-8gb-128gb-chinh-hang"
                                    class="title" title="Samsung Galaxy S22 Plus - 8GB/128GB - Chính hãng">Samsung
                                    Galaxy S22 Plus - 8GB/128GB - Chính hãng</a>
                                <span class="price">
                                    <strong>19,790,000 ₫</strong>
                                    <strike>25,990,000 ₫</strike>
                                </span>

                            </div>
                            <div class="promote">
                                <a href="/dien-thoai-di-dong/samsung-galaxy-s22-Plus-8gb-128gb-chinh-hang">
                                    <ul>
                                        <li><span class="bag">KM</span> Giảm thêm tới 500.000đ khi thanh toán qua
                                            VNPAY</li>
                                        <li><span class="bag">KM</span> Gói dịch vụ ưu tiên cao cấp và phòng chờ
                                            thương gia</li>
                                        <li><span class="bag">KM</span> Ưu đãi giảm 30% gói bảo hành mở rộng Samsung
                                            Care+ chỉ còn 1.430.000đ</li>
                                        <li><span class="bag">KM</span> Giảm thêm tới 600.000đ khi mở thẻ TP Bank
                                            EVO thành công</li>
                                        <li><span class="bag">KM</span> Ưu đãi quà tặng trên Galaxy Gift lên đến 1.7
                                            triệu trên HBO GO, Zing MP3, Galaxy Play, Phúc Long </li>
                                        <li><span class="bag">KM</span> Giảm 140k khi mua cùng Ốp lưng Silicone kèm
                                            dây đeo giá chỉ còn 250.000đ</li>
                                        <li><span class="bag">KM</span> Tặng sim Reddi 055 chưa bao gồm gói cước
                                            (Trừ shop SiS) Hoặc sim data Mobifone Hera 5G (2.5GB/ngày) (Chưa bao gồm
                                            tháng đầu tiên) - Lưu ý: chỉ áp dụng mua trực tiếp tại cửa hàng.</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
@stop
