@extends('layouts.client')
@section('content')
@section('title', 'Detail')
<main id="main" class="main-site">
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
                            <ul class="slides">
                                @foreach ($images as $image)
                                    <li data-thumb="{{ asset('images/products/' . $image->path) }}">
                                        <img src="{{ asset('images/products/' . $image->path) }}"
                                            alt="{{ $image->path }}" />
                                    </li>
                                @endforeach
                            </ul>
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
                        <input type="hidden" name="pro_avatar" value="{{ $product->pro_avatar }}">

                        <div class="product-action">
                            <a title="Mua ngay" id="quick-buy" class="btn-red btnQuickOrder btnbuy"><strong>MUA
                                    NGAY</strong><span> Giao tận nhà (COD) <br>Hoặc Nhận tại cửa hàng</span></a>

                            <a style="width:120px; display:flex; flex-direction:column; max-width:100%; padding:5px;"
                                id="add-to-cart" title="Thêm vào giỏ hàng"
                                data-id="{{ Session::get('user')->id ?? 0 }}"
                                class="add-cart btn-orange btnbuy btn-icon"><i class="fa fa-cart-arrow-down mt-4"
                                    style="margin-top:10px" aria-hidden="true"></i><label style="font-size:11px;">Thêm
                                    giỏ
                                    hàng</label></a>
                        </div>
                    </div>
                    <div class="advance-info">
                        <div class="tab-control normal">
                            <a href="#description" class="tab-control-item active">Mô tả</a>
                            <a href="#add_infomation" class="tab-control-item">Thông tin kỹ thuật</a>
                        </div>
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="description">
                                <div class=" description-block">
                                    <?php echo $product->pro_description; ?>
                                </div>
                                <div class="view-more">
                                    <a class="btn" id="view-more">Xem thêm</a>
                                </div>
                            </div>
                            <div class="tab-content-item " id="add_infomation">
                                <div class="table-responsive mt-4">
                                    <table class="table table-bordered table-hover">
                                        @foreach ($tt as $key => $item)
                                            <tr>
                                                <th>{{ $key }}</th>
                                                <td class="item-detail">{{ $item }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
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
                             @foreach ($popularProducts as $popularProducts)
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
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div> --}}
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
                                        <p class="note">Để gửi bình luận, bạn cần đăng nhập hoặc đăng ký tài khoản.
                                        </p>
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
