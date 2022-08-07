@extends('layouts.client')
@section('content')
@section('title', 'Thông tin tài khoản')
<main id="main" class="main-site" style="background-color:rgb(245, 245, 250)">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('client.home') }}" class="link">Trang chủ</a></li>
                <li class="item-link"><span>Thông tin tài khoản</span></li>
            </ul>
        </div>
        <div class="main-content-area">
            <div class="wrapper">
                @include('components.aside')
                <div class="infomation">
                    <div class="account-info">Thông tin tài khoản</div>
                    <div class="infomation-wrapper">
                        <div class="info-v2">
                            <div class="info-left"><span class="info-title">Thông tin cá nhân</span>
                                <div class="info-content">
                                    <form action="{{ route('client.user.change_information') }}" method="POST">
                                        @csrf
                                        <div class="form-info">
                                            <div class="form-avatar">
                                                <div class="avatar">
                                                    <div>
                                                        <div class="avatar-view">
                                                            <img src=" {{ $user->type == 2 ? $user->avatar : 'images/' . $user->avatar }}"
                                                                alt="avatar" class="default">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-name">
                                                <div class="form-control2">
                                                    <label class="input-label">Họ &amp; Tên</label>
                                                    <div>
                                                        <div class="form-group2">
                                                            <input class="input" name="name" maxlength="128"
                                                                placeholder="Thêm họ tên" value="{{ $user->name }}">
                                                        </div>
                                                        @if ($errors->has('name'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('name') }}</span>
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="form-control2"><label class="input-label">Số điện
                                                        thoại</label>
                                                    <div>
                                                        <div class="form-group2"><input class="input" name="phone"
                                                                maxlength="128" placeholder="Thêm số điện thoại"
                                                                value="{{ $user->phone }}">
                                                        </div>
                                                        @if ($errors->has('phone'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('phone') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-control2"><label class="input-label">Email</label>
                                                    <div>
                                                        <div class="form-group2"><input class="input" name="email"
                                                                maxlength="128" placeholder="Thêm email"
                                                                value="{{ $user->email }}">
                                                        </div>
                                                        @if ($errors->has('email'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('email') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-control2"><label class="input-label">&nbsp;</label><button
                                                type="submit" class="btn-submit">Lưu thay
                                                đổi</button></div>
                                    </form>
                                </div>
                            </div>
                            <div class="info-vertical"></div>
                            <div class="info-right">
                                <span class="info-title">Bảo mật</span>
                                <div class="info-list">
                                    <div class="list-item">
                                        <div class="info">
                                            <i class="fa fa-lock icon" aria-hidden="true"></i>
                                            <div class="detail"><span>Đổi mật khẩu
                                                </span></div>
                                        </div>
                                        <div class="status"><span></span><button class="button active"
                                                data-toggle="modal" data-target="#change-password">Cập
                                                nhật</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<div id="change-password" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times text-danger"
                        aria-hidden="true"></i></button>
                <h4 class="modal-title">Đổi mật khẩu</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('client.user.change_password') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="password">Mật khẩu cũ:</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                    <div class="form-group">
                        <label for="new_password">Mật khẩu mới:</label>
                        <input type="password" class="form-control" name="new_password" id="new_password">
                    </div>
                    @if ($errors->has('new_password'))
                        <span class="text-danger">{{ $errors->first('new_password') }}</span>
                    @endif
                    <div class="form-group">
                        <label for="renew_password">Nhập lại mật khẩu mới:</label>
                        <input type="password" class="form-control" name="renew_password" id="renew_password">
                    </div>
                    @if ($errors->has('renew_password'))
                        <span class="text-danger">{{ $errors->first('renew_password') }}</span>
                    @endif
                    <button type="submit" class="btn btn-change">Đổi mật khẩu</button>
                </form>
            </div>
        </div>

    </div>
</div>
@stop
