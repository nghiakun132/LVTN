@extends('layouts.client')
@section('content')
@section('title', 'Sổ địa chỉ')
<main id="main" class="main-site" style="background-color: rgb(245, 245, 250);">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">Trang chủ</a></li>
                <li class="item-link"><span>@yield('title')</span></li>
            </ul>
        </div>
        <div class="main-content-area">
            <div class="wrapper">
                @include('components.aside')
                <div class="infomation">
                    <div class="fJeMaX">
                        <div class="heading">Tạo sổ địa chỉ</div>
                        <div class="inner">
                            <form method="POST"
                                action="{{ empty($address) ? route('client.address.store') : route('client.address.update', $address->id) }} ">
                                @csrf
                                @if ($errors->has('name'))
                                    <p class="text-danger text-center" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </p>
                                @endif
                                <div class="form-control3">
                                    <label for="name" class="input-label">Họ và tên:</label>
                                    <div><input type="text" name="name" placeholder="Nhập họ và tên"
                                            maxlength="50" class="girQwT"
                                            value="{{ empty($address) ? Session::get('user')->name : $address->name }}">
                                    </div>
                                </div>

                                @if ($errors->has('phone'))
                                    <p class="text-danger text-center" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </p>
                                @endif
                                <div class="form-control3 ">
                                    <label for="phone" class="input-label">Số điện
                                        thoại:</label>
                                    <div>
                                        <input type="text" name="phone" placeholder="Nhập số điện thoại"
                                            class="girQwT" value="{{ empty($address) ? '' : $address->phone }}">

                                    </div>
                                </div>

                                @if ($errors->has('address'))
                                    <p class="text-danger text-center" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </p>
                                @endif
                                <div class="form-control3 ">
                                    <label for="address" class="input-label">Địa chỉ:</label>
                                    <div>
                                        <textarea name="address" rows="5" placeholder="Nhập địa chỉ">{{ empty($address) ? '' : $address->address }}</textarea>
                                    </div>
                                </div>

                                <div class="form-control3">
                                    <label for="type" class="input-label">Loại địa chỉ:</label>
                                    <label class="kpLnYz">
                                        <input type="radio" name="type" value="0"
                                            {{ !empty($address) && $address->type == 0 ? 'checked' : '' }}
                                            {{ empty($address) ? 'checked' : '' }}>
                                        <span class="radio-fake"></span>
                                        <span class="label2">Nhà riêng</span>
                                    </label>
                                    <label class="kpLnYz">
                                        <input type="radio" name="type" value="1"
                                            {{ !empty($address) && $address->type == 1 ? 'checked' : '' }}>
                                        <span class="radio-fake"></span>
                                        <span class="label2">Cơ quan</span>
                                    </label>
                                </div>
                                <div class="form-control3">
                                    <label class="input-label">&nbsp;</label>
                                    <label class="etNXAi">
                                        <input type="checkbox" name="default">
                                        <span class="checkbox-fake"></span>
                                        <span class="label2">Đặt làm địa chỉ mặc định</span>
                                    </label>
                                </div>
                                <div class="form-control3">
                                    <label class="input-label">&nbsp;</label>
                                    <button type="submit" class="btn-submit2">Cập nhật</button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</main>

@stop
