@extends('layouts.client')
@section('content')
@section('title', $product->pro_name)
<main id="main" class="main-site">
    <style>
        .table-border,
        .table-border th,
        .table-border td {
            border: 1px solid #dedede;
            padding: 5px 8px;
            font-size: 13px;
            color: #333;
        }

        .table-border {
            border-collapse: collapse;
        }

        .table-border th {
            color: #fff;
            background: #1362a6;
            text-align: center;
        }

        .table-border,
        .table-border th,
        .table-border td {
            border: 1px solid #dedede;
            padding: 5px 8px;
            font-size: 13px;
            color: #333;
        }

        .f-16 {
            font-size: 16px;
            color: #fff;
        }

        .table-gray {
            background: #efefef;
        }

        .ol-specs {
            padding: 0;
            margin: 0 0 0 17px;
            list-style: disc;
        }

        .ol-specs li {
            padding-bottom: 5px;
            font-size: 14px;
        }

        .ol-specs li {
            padding-bottom: 5px;
            font-size: 14px;
        }
    </style>
    <style>
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        /*jssor slider arrow skin 106 css*/
        .jssora106 {
            display: block;
            position: absolute;
            cursor: pointer;
        }

        .jssora106 .c {
            fill: #fff;
            opacity: .3;
        }

        .jssora106 .a {
            fill: none;
            stroke: #000;
            stroke-width: 350;
            stroke-miterlimit: 10;
        }

        .jssora106:hover .c {
            opacity: .5;
        }

        .jssora106:hover .a {
            opacity: .8;
        }

        .jssora106.jssora106dn .c {
            opacity: .2;
        }

        .jssora106.jssora106dn .a {
            opacity: 1;
        }

        .jssora106.jssora106ds {
            opacity: .3;
            pointer-events: none;
        }

        /*jssor slider thumbnail skin 101 css*/
        .jssort101 .p {
            position: absolute;
            top: 0;
            left: 0;
            box-sizing: border-box;
            background: #000;
        }

        .jssort101 .p .cv {
            position: relative;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 2px solid #000;
            box-sizing: border-box;
            z-index: 1;
        }

        .jssort101 .a {
            fill: none;
            stroke: #fff;
            stroke-width: 400;
            stroke-miterlimit: 10;
            visibility: hidden;
        }

        .jssort101 .p:hover .cv,
        .jssort101 .p.pdn .cv {
            border: none;
            border-color: transparent;
        }

        .jssort101 .p:hover {
            padding: 2px;
        }

        .jssort101 .p:hover .cv {
            background-color: rgba(0, 0, 0, 6);
            opacity: .35;
        }

        .jssort101 .p:hover.pdn {
            padding: 0;
        }

        .jssort101 .p:hover.pdn .cv {
            border: 2px solid #fff;
            background: none;
            opacity: .35;
        }

        .jssort101 .pav .cv {
            border-color: #fff;
            opacity: .35;
        }

        .jssort101 .pav .a,
        .jssort101 .p:hover .a {
            visibility: visible;
        }

        .jssort101 .t {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            opacity: .6;
        }

        .jssort101 .pav .t,
        .jssort101 .p:hover .t {
            opacity: 1;
        }
    </style>
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('client.home') }}" class="link">Trang chủ</a></li>
                <li class="item-link"><a href="{{ route('client.category', $product->category->c_slug) }}"
                        class="link">{{ $product->category->c_name }}</a></li>
                <li class="item-link"><a
                        href="{{ route('client.brand', [
                            'slug' => $product->category->c_slug,
                            'brand' => $product->brand->b_slug,
                        ]) }}"
                        class="link">{{ $product->brand->b_name }}</a></li>
                @if ($product->group)
                    <li class="item-link"><a
                            href="{{ route('client.group', [
                                'slug' => $product->category->c_slug,
                                'brand' => $product->brand->b_slug,
                                'group' => $product->group->slug,
                            ]) }}"
                            class="link">{{ $product->group->name }}</a></li>
                @endif
                <li class="item-link"><span>{{ $product->pro_name }}</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-content-area">
                <div class="wrap-product-detail">
                    <div class="detail-media">
                        <div class="product-gallery">
                            <div class="love-this-button">
                                <a title="Thêm vào sản phẩm yêu thích" id="add-wishlist"
                                    data-id="{{ $product->pro_id }}">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </a>
                            </div>
                            {{-- <ul class="slides">
                                @foreach ($images as $image)
                                    <li data-thumb="{{ asset('images/products/' . $image->path) }}">
                                        <img src="{{ asset('images/products/' . $image->path) }}"
                                            alt="{{ $image->path }}" />
                                    </li>
                                @endforeach
                            </ul> --}}

                            <div class="banner-carousel" style="margin-top: 2rem">
                                <div id="jssor_1"
                                    style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:480px;overflow:hidden;visibility:hidden;min-height: 400px">
                                    <!-- Loading Screen -->
                                    <div data-u="loading" class="jssorl-009-spin"
                                        style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(252, 247, 247, 0.7);">
                                        <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;"
                                            src="{{ asset('client/images/spin.svg') }}" />
                                    </div>
                                    <div data-u="slides"
                                        style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
                                        @foreach ($images as $image)
                                            <div>
                                                <img data-u="image"src="{{ asset('images/products/' . $image) }}" />
                                                <img data-u="thumb" src="{{ asset('images/products/' . $image) }}" />
                                            </div>
                                        @endforeach

                                    </div>
                                    <div data-u="thumbnavigator" class="jssort101"
                                        style="position:absolute;left:0px;bottom:0px;width:980px;height:100px;background-color:#000;"
                                        data-autocenter="1" data-scale-bottom="0.75">
                                        <div data-u="slides">
                                            <div data-u="prototype" class="p" style="width:190px;height:90px;">
                                                <div data-u="thumbnailtemplate" class="t"></div>

                                            </div>
                                        </div>
                                    </div>
                                    <div data-u="arrowleft" class="jssora106"
                                        style="width:55px;height:55px;top:162px;left:30px;" data-scale="0.75">
                                        <svg viewbox="0 0 16000 16000"
                                            style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                            <circle class="c" cx="8000" cy="8000" r="6260.9">
                                            </circle>
                                            <polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3 ">
                                            </polyline>
                                            <line class="a" x1="10573.9" y1="8000" x2="5426.1"
                                                y2="8000"></line>
                                        </svg>
                                    </div>
                                    <div data-u="arrowright" class="jssora106"
                                        style="width:55px;height:55px;top:162px;right:30px;" data-scale="0.75">
                                        <svg viewbox="0 0 16000 16000"
                                            style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                            <circle class="c" cx="8000" cy="8000" r="6260.9">
                                            </circle>
                                            <polyline class="a"
                                                points="8069.6,5495.7 10573.9,8000 8069.6,10504.3 "></polyline>
                                            <line class="a" x1="5426.1" y1="8000" x2="10573.9"
                                                y2="8000"></line>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail-info">
                        <div class="product-rating">
                            @for ($i = 1; $i <= $stars; $i++)
                                <i class="fa fa-star" aria-hidden="true"></i>
                            @endfor
                            {{-- <a href="#" class="count-review">({{ $countComments }} đánh giá)</a> --}}
                        </div>
                        <h2 class="product-name">{{ $product->pro_name }}</h2>
                        <div class="short-desc">
                            <?php echo $product->pro_content; ?>
                        </div>
                        <div class="wrap-price"><span
                                class="product-price">{{ number_format($product->pro_price - ($product->pro_price * $product->pro_sale) / 100, 0, ',', ',') . ' đ' }}</span>
                            @if ($product->pro_sale)
                                <del>
                                    <p class="product-price">
                                        {{ number_format($product->pro_price, 0, ',', ',') . ' đ' }}</p>
                                </del>
                            @endif
                        </div>
                        <div class="stock-info in-stock">
                            @if ($product->pro_quantity > 0)
                                <p class="availability">Còn hàng</b></p>
                            @else
                                <p class="availability"><b>Hết hàng</b></p>
                            @endif
                        </div>
                        @if (count($product->sales) > 0)
                            <div class="product-promotion">
                                <strong class="label">KHUYẾN MÃI</strong>
                                <ul>
                                    @foreach ($product->sales as $sales)
                                        <li><span class="bag">KM {{ $loop->index + 1 }}
                                            </span></li>
                                        <li>
                                            {{ $sales->sales->s_name }}
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        @endif
                        <div class="quantity">
                            <span>Số lượng: </span>
                            <div class="quantity-input">
                                <input type="number" name="product_quantity" value="1" id="product-quantity"
                                    max="{{ $product->pro_quantity }}" min="1"
                                    data-max="{{ $product->pro_quantity }}" pattern="[0-9]*">
                                <a class="btn btn-reduce" href="#"></a>
                                <a class="btn btn-increase" href="#"></a>
                            </div>
                        </div>
                        <input type="hidden" name="pro_id" value="{{ $product->pro_id }}">
                        <input type="hidden" name="pro_price"
                            value="{{ $product->pro_price - ($product->pro_price * $product->pro_sale) / 100 }}">

                        <div class="product-action">
                            <a title="Mua ngay" id="quick-buy" class="btn-red btnQuickOrder btnbuy"><strong>MUA
                                    NGAY</strong><span> Giao tận nhà (COD) <br>Hoặc Nhận tại cửa hàng</span></a>
                            @if ($product->pro_quantity > 0)
                                <a style="width:120px; display:flex; flex-direction:column; max-width:100%; padding:5px;"
                                    id="add-to-cart" title="Thêm vào giỏ hàng"
                                    data-id="{{ Session::get('user')->id ?? 0 }}"
                                    class="add-cart btn-orange btnbuy btn-icon"><i class="fa fa-cart-arrow-down mt-4"
                                        style="margin-top:10px" aria-hidden="true"></i><label
                                        style="font-size:11px;">Thêm
                                        giỏ
                                        hàng</label></a>
                            @endif
                        </div>
                    </div>
                    <div class="advance-info">
                        <div class="tab-control normal">
                            <a href="#description" class="tab-control-item active">Mô tả</a>
                            <a href="#add_infomation" class="tab-control-item">Thông tin kỹ thuật</a>
                        </div>
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="description">
                                @if ($product->pro_description)
                                    <div class=" description-block">
                                        <?php echo $product->pro_description; ?>
                                    </div>
                                    <div class="view-more">
                                        <a class="btn" id="view-more">Xem thêm</a>
                                    </div>
                                @else
                                    <div>
                                        <p>Chưa có mô tả cho sản phẩm này</p>
                                    </div>
                                @endif

                            </div>
                            <div class="tab-content-item " id="add_infomation">
                                <div class="table-responsive mt-4">
                                    <?php echo $product->pro_detail; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wrap-show-advance-info-box style-1 box-in-site">
                    <h3 class="title-box">Sản phẩm tương tự</h3>
                    <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                        data-loop="true" data-nav="true" data-dots="false" data-autoplay="true"
                        data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>
                        @foreach ($related as $related)
                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{ route('client.product', [
                                        'slug' => $product->category->c_slug,
                                        'brand' => $product->brand->b_slug,
                                        'product' => $product->pro_slug,
                                    ]) }}"
                                        title="{{ $related->pro_name }}">
                                        <figure><img src="{{ asset('images/products/' . $related->pro_avatar) }}"
                                                width="214" height="214" alt="{{ $related->pro_name }}">
                                        </figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item new-label">new</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="{{ route('client.product', [
                                            'slug' => $product->category->c_slug,
                                            'brand' => $product->brand->b_slug,
                                            'product' => $product->pro_slug,
                                        ]) }}"
                                            class="function-link">Xem chi tiết</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="{{ route('client.product', [
                                        'slug' => $product->category->c_slug,
                                        'brand' => $product->brand->b_slug,
                                        'product' => $product->pro_slug,
                                    ]) }}"
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
                        @endforeach
                    </div>
                </div>
                <div class="full-width-content">
                    <form id="comment-form"
                        action="{{ route('client.product.comment', [
                            'slug' => $product->category->c_slug,
                            'brand' => $product->brand->b_slug,
                            'product' => $product->pro_slug,
                        ]) }}">
                        <div class="heading3">
                            <h3>Có {{ count($comments) }} bình luận về {{ $product->pro_name }} </h3>
                        </div>
                        <div class="comment-form-rating">
                            <span>Đánh giá của bạn: </span>
                            <p class="stars">
                                <label for="rated-1"></label>
                                <input type="radio" id="rated-1" name="rating" value="1">
                                <label for="rated-2"></label>
                                <input type="radio" id="rated-2" name="rating" value="2">
                                <label for="rated-3"></label>
                                <input type="radio" id="rated-3" name="rating" value="3">
                                <label for="rated-4"></label>
                                <input type="radio" id="rated-4" name="rating" value="4">
                                <label for="rated-5"></label>
                                <input type="radio" id="rated-5" name="rating" value="5"
                                    checked="checked">
                            </p>
                        </div>
                        <div class="rc-form review-form">
                            <div class="rc-form comment-form">
                                <div class="row">
                                    <div class="col">
                                        <div class="control">
                                            <textarea title="Nội dung" placeholder="Nội dung. Tối thiểu 15 ký tự *" name="content" id="content"
                                                style="height: 52px; overflow-y: hidden;"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        {{-- <p class="note">Để gửi bình luận, bạn cần đăng nhập hoặc đăng ký tài khoản.
                                        </p> --}}
                                    </div>
                                    <div class="col col-end">
                                        <button id="btn-submit" type="submit"
                                            data-check={{ Session::get('user')->id ?? 0 }}></i> Gửi
                                            bình
                                            luận</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    @foreach ($comments as $comment)
                        <div class="item-comment">
                            <div class="avt">
                                @if ($comment->user->type != 0)
                                    <img src="{{ $comment->user->avatar }}">
                                @else
                                    <img src="{{ asset('images/default.png') }}">
                                @endif
                            </div>
                            <div class="info">
                                <p>
                                    <strong class="name">{{ $comment->user->name }}</strong>
                                </p>
                                <p><label><i>{{ $comment->getDiffedTimeAttribute() }}</i></label></p>
                                <div class="content">
                                    <div class="stars-comment">
                                        @for ($i = 1; $i <= $comment->star; $i++)
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        @endfor
                                    </div>
                                    {{ $comment->content }}
                                </div>
                                <div class="childs">
                                    @foreach ($comment->replies as $reply)
                                        <div class="comment-list">
                                            <div class="item-comment">
                                                <div class="avt">
                                                    @if ($reply->user->type != 0)
                                                        <img src="{{ $reply->user->avatar }}">
                                                    @else
                                                        <img src="{{ asset('images/default.png') }}">
                                                    @endif
                                                </div>
                                                <div class="info">
                                                    <p>
                                                        <strong class="name">{{ $reply->user->name }}</strong>
                                                    </p>
                                                    <p><label><i>{{ $reply->getDiffedTimeAttribute() }}</i></label>
                                                    </p>
                                                    <div class="content">
                                                        <div class="stars-comment">
                                                            @for ($i = 1; $i <= $reply->star; $i++)
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            @endfor
                                                        </div>
                                                        {{ $reply->content }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="replyHolder replyCommentHolder" style="display: none;">
                                    <input type="text" placeholder="Nhập bình luận của bạn" name="content"
                                        data-id="{{ $comment->id }}" class="replyComment{{ $comment->id }}">
                                    <button class="btnReplyComment" data-id="{{ $comment->id }}"
                                        data-check={{ Session::get('user')->id ?? 0 }}>Gửi</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <ol class="pagination">
                        {{ $comments->links() }}
                    </ol>
                </div>
            </div>
        </div>

    </div>
    </div>
</main>
@stop
