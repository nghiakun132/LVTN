@extends('layouts.client')
@section('content')
@section('title', $category->c_name)
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
            <div class="lst-quickfilter q-manu">
                @foreach ($brands as $value)
                    <a href="{{ route('client.brand', [
                        'slug' => $category->c_slug,
                        'brand' => $value->b_slug,
                    ]) }}"
                        class="box-quicklink__item bd-radius quicklink-logo">
                        <img src="{{ asset('images/brands/' . $value->b_banner) }}" width="30" class="no-text">
                    </a>
                @endforeach
            </div>
        </section>
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('client.home') }}" class="link">Trang chủ</a></li>
                <li class="item-link"><a
                        href="{{ route('client.category', $category->c_slug) }}">{{ $category->c_name }}</a></li>
                <li class="item-link"><span>{{ $brand->b_name }}</span></li>
            </ul>
        </div>
        <section id="filter-laptop">
            <div class="product-filters2">
                <div class="left">
                    <strong class="label">Lọc danh sách:</strong>
                    <div class="facet">
                        <label>
                            <a href="javascript:;">Giá <i class="icon-rightar"></i></a>
                        </label>
                        <div class="sub2">
                            <ul>
                                <li><a href="{{ route('client.category', $category->c_slug) }}">
                                        Mặc định</a></li>
                                <li><a
                                        href="{{ request()->fullUrlWithQuery(['gia_tu' => '0', 'gia_den' => '3000000']) }}">
                                        Dưới 3 triệu
                                        <i class="total"></i></a></li>
                                <li><a
                                        href="{{ request()->fullUrlWithQuery(['gia_tu' => '3000000', 'gia_den' => '5000000']) }}">
                                        Từ 3 triệu - 5 triệu
                                        <i class="total"></i></a></li>
                                <li><a
                                        href="{{ request()->fullUrlWithQuery(['gia_tu' => '5000000', 'gia_den' => '7000000']) }}">
                                        Từ 5 triệu - 7 triệu
                                        <i class="total"></i></a></li>
                                <li><a
                                        href="{{ request()->fullUrlWithQuery(['gia_tu' => '7000000', 'gia_den' => '10000000']) }}">
                                        Từ 7 triệu - 10 triệu
                                        <i class="total"></i></a></li>
                                <li><a
                                        href="{{ request()->fullUrlWithQuery(['gia_tu' => '10000000', 'gia_den' => '15000000']) }}">
                                        Từ 10 triệu - 15 triệu
                                        <i class="total"></i></a></li>
                                <li><a
                                        href="{{ request()->fullUrlWithQuery(['gia_tu' => '15000000', 'gia_den' => '20000000']) }}">
                                        Từ 15 triệu - 20 triệu
                                        <i class="total"></i></a></li>
                                <li><a
                                        href="{{ request()->fullUrlWithQuery(['gia_tu' => '20000000', 'gia_den' => '50000000']) }}">
                                        Từ 20 triệu - 50 triệu
                                        <i class="total"></i></a></li>
                                <li><a
                                        href="{{ request()->fullUrlWithQuery(['gia_tu' => '50000000', 'gia_den' => '100000000']) }}">
                                        Từ 50 triệu - 100 triệu
                                        <i class="total"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="right">
                    <div class="facet">
                        <label>Sắp xếp <i class="icon-rightar"></i></label>
                        <div class="sub2">
                            <ul>
                                <li><a href="{{ route('client.category', $category->c_slug) }}"></span>
                                        Mặc định</a></li>
                                <li><a href="{{ request()->fullUrlWithQuery(['sort' => 'price_asc']) }}"></span>
                                        Giá thấp đến cao</a></li>
                                <li><a href="{{ request()->fullUrlWithQuery(['sort' => 'price_desc']) }}"></span>
                                        Giá cao đến thấp</a></li>
                                <li>
                                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'name_asc']) }}"></span>
                                        Tên: A - Z</a>
                                </li>
                                <li>
                                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'name_desc']) }}"></span>
                                        Tên: Z - A</a>
                                </li>
                                <li>
                                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'view']) }}"></span>
                                        Xem nhiều nhất</a>
                                </li>
                                <li>
                                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'new']) }}"></span>
                                        Mới nhất</a>
                                </li>
                                <li>
                                    <a href="{{ request()->fullUrlWithQuery(['sort' => 'old']) }}"></span>
                                        Cũ nhất</a>
                                </li>
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
                        <option value="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;216&quot;}&amp;search=true">
                            XOR (13)</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;20&quot;}&amp;search=true">
                            Nokia (12)</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;82&quot;}&amp;search=true">
                            realme (12)</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;214&quot;}&amp;search=true">
                            TECNO (8)</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;76&quot;}&amp;search=true">
                            Energizer (5)</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;114&quot;}&amp;search=true">
                            Itel (4)</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;115&quot;}&amp;search=true">
                            Hoanghamobile (3)</option>
                        <option value="/dien-thoai-di-dong?filters={&quot;brand&quot;:&quot;240&quot;}&amp;search=true">
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
                        <option value="">
                            Trên 100 triệu (8)</option>
                        <option value="#">
                            Dưới 1 triệu (20)</option>
                        <option value="#">
                            1 đến 2 triệu (5)</option>
                        <option value="#">
                            2 đến 3 triệu (19)</option>
                        <option value="#">
                            3 đến 4 triệu (20)</option>
                        <option value="#">
                            4 đến 5 triệu (11)</option>
                        <option value="#">
                            5 đến 6 triệu (16)</option>
                        <option value="#">
                            6 đến 8 triệu (13)</option>
                        <option value="#">
                            8 đến 10 triệu (6)</option>
                        <option value="#">
                            10 đến 12 triệu (9)</option>
                        <option value="#">
                            12 đến 15 triệu (5)</option>
                        <option value="#">
                            15 đến 20 triệu (16)</option>
                        <option value="#">
                            20 đến 100 triệu (26)</option>
                    </select>
                </div>
                <div class="facet">
                    <label>Sắp xếp</label>
                    <select onchange="window.location = this.value;">
                        <option>Chọn cách sắp xếp</option>
                        <option value="#">
                            Mặc định</option>
                        <option value="#">
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
                    <h3>{{ $category->c_name }}</h3>
                    <div class="col-content lts-product">
                        @foreach ($products as $product)
                            <div class="item">
                                <div class="img">
                                    <a href="{{ route('') }}" title="{{ $product->pro_name }}">
                                        <img src="{{ asset('images/products/' . $product->pro_avatar) }}"
                                            alt="{{ $product->pro_name }}" title="{{ $product->pro_name }}">
                                    </a>
                                </div>
                                @if ($product->pro_sale > 0)
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
                                                    <span style="color:white">Giảm tới
                                                        {{ number_format($product->pro_price * ($product->pro_sale / 100), 0, ',', '.') }}đ</span>
                                                </marquee>
                                            </marquee>
                                        </div>
                                    </div>
                                @endif
                                <div class="sticker sticker-left">
                                    <span><img src="{{ asset('images/bao-hanh-24t.png') }}"
                                            title="Chính hãng Apple"></span>
                                </div>
                                <div class="info">
                                    <a href="#" class="title"
                                        title="{{ $product->pro_name }}">{{ $product->pro_name }}</a>
                                    <span class="price">
                                        <strong>{{ number_format($product->pro_price - $product->pro_price * ($product->pro_sale / 100), 0, ',', '.') }}đ</strong>
                                        @if ($product->pro_sale > 0)
                                            <strike>{{ number_format($product->pro_price, 0, ',', '.') }}
                                                ₫</strike>
                                        @endif
                                    </span>

                                </div>
                                @if (count($product->sales))
                                    <div class="promote">
                                        <a href="/dien-thoai-di-dong/oppo-reno6-z-5g-chinh-hang">
                                            <ul>
                                                @foreach ($product->sales as $sale)
                                                    <li><span class="bag">KM</span>
                                                        {{ $sale->sales->s_name }}</li>
                                                @endforeach
                                            </ul>
                                        </a>
                                    </div>
                                @endif

                            </div>
                        @endforeach
                    </div>
                    <ul class="pagination pagination-lg">
                        {!! $products->appends(Request::all())->links() !!}
                    </ul>
                </div>
            </div>
        </section>
    </div>
</main>
@stop
