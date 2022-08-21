@extends('layouts.client')
@section('content')
@section('title', 'Detail')
<main id="main" class="main-site" style="background-color: rgb(245, 245, 250);">
    <div class="container">
        <div class="wrap-breadcrumb khong-cach">
            <ul>
                <li class="item-link"><a href="#" class="link">Trang chủ</a></li>
                <li class="item-link"><a href="#" class="link">Sản phẩm</a></li>
                <li class="item-link"><span>@yield('title')</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="wrap-product-detail">
                    <div class="detail-media">
                        <div class="product-gallery">
                            <ul class="slides">
                                <li data-thumb="../images/banner/1.png">
                                    <img src="../images/banner/1.png" />
                                </li>
                                <li data-thumb="../images/banner/3.png">
                                    <img src="../images/banner/3.png" />
                                </li>
                                <li data-thumb="../images/banner/4.png">
                                    <img src="../images/banner/4.png" />
                                </li>
                                <li data-thumb="../images/banner/5.jpg">
                                    <img src="../images/banner/5.jpg" />
                                </li>
                                <li data-thumb="../images/banner/1.png">
                                    <img src="../images/banner/1.png" />
                                </li>
                            </ul>
                        </div>
                    </div>
                    <form action="#" method="post">
                        @csrf
                        <div class="detail-info">
                            <div class="product-rating">

                                <a href="#" class="count-review">(3 đánh giá)</a>
                            </div>
                            <h2 class="product-name"></h2>
                            <div class="short-desc">
                            </div>
                            <div class="wrap-price"><span class="product-price"></span><span class="product-price"> /
                                </span></div>
                            <div class="stock-info in-stock">
                                {{-- @if ($product->pro_qty > 0)
                                    <p class="availability">Số lượng có sẵn: <b>3</b></p>
                                @else
                                    <p class="availability">Số lượng có sẵn: <b>Hết hàng</b></p>
                                @endif --}}
                            </div>
                            <div class="quantity">
                                <span>Số lượng: </span>
                                <div class="quantity-input">
                                    <input type="text" name="product_quatity" value="1" data-max="4"
                                        pattern="[0-9]*">
                                    <a class="btn btn-reduce" href="#"></a>
                                    <a class="btn btn-increase" href="#"></a>
                                </div>
                            </div>
                            <input type="hidden" name="pro_id" value="">
                            <input type="hidden" name="pro_price" value="">
                            <input type="hidden" name="pro_avatar" value="#">
                            <div class="wrap-butons">
                                {{-- @if ($product->pro_qty > 0)
                                    <button class="btn add-to-cart">Thêm vào giỏ hàng</button>
                                @else
                                    <button class="btn add-to-cart" disabled>Hết hàng</button>
                                @endif --}}
                                <div class="wrap-btn">
                                    <a href="#" class="btn btn-compare">Add Compare</a>
                                    {{-- <a href="{{ route('addWishlist', $product->pro_id) }}" class="btn btn-wishlist">Thêm
                                        vào Wishlist</a> --}}
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="advance-info">
                        <div class="tab-control normal">
                            <a href="#description" class="tab-control-item active">Mô tả</a>
                            <a href="#add_infomation" class="tab-control-item">Thông tin thêm</a>
                            <a href="#review" class="tab-control-item">Bình luận && Đánh giá</a>
                        </div>
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="description">
                            </div>
                            <div class="tab-content-item " id="add_infomation">
                                <table class="shop_attributes">
                                    <tbody>
                                        <tr>
                                            <th>Weight</th>
                                            <td class="product_weight">1 kg</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-content-item " id="review">
                                <div class="wrap-review-form">
                                    <div id="comments">
                                        <h2 class="woocommerce-Reviews-title"># đánh giá cho
                                            {{-- <span>{{ $product->pro_name }}</span> --}}
                                        </h2>
                                        <ol class="commentlist">
                                            {{-- @foreach ($comments as $cm)
                                                <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1"
                                                    id="li-comment-20">
                                                    <div id="comment-20" class="comment_container">
                                                        @if ($cm->type == 'Google')
                                                            <img alt="" src="{{ $cm->avatar }}" height="80"
                                                                width="80">
                                                        @else
                                                            @if ($cm->avatar == null)
                                                                <img alt=""
                                                                    src="{{ asset('uploads/avatar/default.png') }}"
                                                                    height="80">
                                                            @else
                                                                <img alt=""
                                                                    src="{{ asset('uploads/avatar/' . $cm->avatar) }}"
                                                                    height="80" width="80">
                                                            @endif
                                                        @endif
                                                        <div class="comment-text">
                                                            <div class="star-rating">
                                                                <span
                                                                    class="width-{{ $cm->cm_star * 20 }}-percent">Rated
                                                                    <strong class="rating">5</strong> out of
                                                                    5</span>
                                                            </div>
                                                            <p class="meta">
                                                                <strong
                                                                    class="woocommerce-review__author">{{ $cm->name }}</strong>
                                                                <span class="woocommerce-review__dash">–</span>
                                                                <time class="woocommerce-review__published-date"
                                                                    datetime="2008-02-14 20:00">{{ $cm->created_at }}</time>
                                                            </p>
                                                            <div class="description">
                                                                <p>{{ $cm->cm_content }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach --}}
                                        </ol>
                                        <div>
                                            <div class="woocommerce-pagination">
                                                {{-- {{ $comments->links() }} --}}
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <div id="review_form_wrapper">
                                        <div id="review_form">
                                            <div id="respond" class="comment-respond">
                                                <form action="#" method="post" id="commentform"
                                                    class="comment-form" novalidate="">
                                                    @csrf
                                                    <h4 class="comment-notes">
                                                        Để lại đánh giá của bạn, vui lòng điền đầy đủ thông tin bên
                                                        dưới.
                                                    </h4>
                                                    <div class="comment-form-rating">
                                                        <span>Đánh giá của bạn: </span>
                                                        <p class="stars">
                                                            <label for="rated-1"></label>
                                                            <input type="radio" id="rated-1" name="rating"
                                                                value="1">
                                                            <label for="rated-2"></label>
                                                            <input type="radio" id="rated-2" name="rating"
                                                                value="2">
                                                            <label for="rated-3"></label>
                                                            <input type="radio" id="rated-3" name="rating"
                                                                value="3">
                                                            <label for="rated-4"></label>
                                                            <input type="radio" id="rated-4" name="rating"
                                                                value="4">
                                                            <label for="rated-5"></label>
                                                            <input type="radio" id="rated-5" name="rating"
                                                                value="5" checked="checked">
                                                        </p>
                                                    </div>
                                                    <p class="comment-form-comment">
                                                        <label for="comment">Bình luận của bạn <span
                                                                class="required">*</span>
                                                        </label>
                                                        <textarea id="comment" name="comment" cols="45" rows="8"></textarea>
                                                    </p>
                                                    {{-- @if ($errors->has('comment'))
                                                        <div class="alert alert-danger">
                                                            <strong>{{ $errors->first('comment') }}</strong>
                                                        </div>
                                                    @endif --}}

                                                    <p class="form-submit">
                                                        <input name="submit" type="submit" id="submit"
                                                            class="submit" value="Bình luận">
                                                    </p>
                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget widget-our-services ">
                    <div class="widget-content">
                        <ul class="our-services">
                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Miễn phí vận chuyển</b>
                                        <span class="subtitle">Cho toàn bộ đơn hàng</span>
                                    </div>
                                </a>
                            </li>
                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-gift" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Quà tặng</b>
                                        <span class="subtitle">Mã giảm giá</span>
                                        <p class="desc">Khi mua đơn hàng trên 1.000.000đ</p>
                                        </p>
                                    </div>
                                </a>
                            </li>
                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Hoàn trả</b>
                                        <span class="subtitle">Trả hàng nếu không đúng mô tả</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="widget mercado-widget widget-product">
                    <h2 class="widget-title">Sản phẩm phổ biến</h2>
                    <div class="widget-content">
                        <ul class="products">
                            {{-- @foreach ($popularProducts as $popularProducts)
                                <li class="product-item">
                                    <div class="product product-widget-style">
                                        <div class="thumbnnail">
                                            <a href="{{ route('detail', $popularProducts->pro_slug) }}"
                                                title="{{ $popularProducts->pro_name }}">
                                                <figure><img
                                                        src="{{ asset('uploads/products/' . $popularProducts->pro_avatar) }}"
                                                        alt=""></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{ route('detail', $popularProducts->pro_slug) }}"
                                                class="product-name"><span>{{ $popularProducts->pro_name }}</span></a>
                                            <div class="wrap-price"><span
                                                    class="product-price">{{ number_format($popularProducts->pro_price - $popularProducts->pro_price * $popularProducts->pro_sale, 0, ',', ',') . ' VND' }}</span>
                                            </div>
                                            @if ($popularProducts->pro_sale > 0)
                                                <div class="wrap-price"><span class="product-price"
                                                        style="color:red;text-decoration-line: line-through">{{ number_format($popularProducts->pro_price, 0, ',', ',') . ' VND' }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            @endforeach --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wrap-show-advance-info-box style-1 box-in-site">
                    <h3 class="title-box">Sản phẩm tương tự</h3>
                    <div class="wrap-products">
                        <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                            data-loop="false" data-nav="true" data-dots="false"
                            data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>
                            {{-- @foreach ($productRelated as $related)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('detail', $related->pro_slug) }}"
                                            title="{{ $related->pro_name }}">
                                            <figure><img src="{{ asset('uploads/products/' . $related->pro_avatar) }}"
                                                    width="214" height="214" alt="{{ $related->pro_name }}">
                                            </figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">new</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="{{ route('detail', $related->pro_slug) }}"
                                                class="function-link">Xem chi tiết</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ route('detail', $related->pro_slug) }}"
                                            class="product-name"><span>{{ $related->pro_name }}</span></a>
                                        <div class="wrap-price"><span
                                                class="product-price">{{ number_format($related->pro_price - $related->pro_price * $related->pro_sale, 0, ',', ',') . ' VND' }}</span>
                                        </div>
                                        @if ($related->pro_sale > 0)
                                            <div class="wrap-price"><span class="product-price"
                                                    style="color:red;text-decoration-line: line-through">{{ number_format($related->pro_price, 0, ',', ',') . ' VND' }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@stop
