@extends('layouts.client')
@section('content')
@section('title', 'Đăng nhập')
<style>
    .card {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 0.25rem;
        font-size: 16px
    }

    .card-body {
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1.25rem;
    }

    .card-title {
        margin-bottom: 0.75rem;
    }

    .card-subtitle {
        margin-top: -0.375rem;
        margin-bottom: 0;
    }

    .card-text:last-child {
        margin-bottom: 0;
    }

    .card-link:hover {
        text-decoration: none;
    }

    .card-link+.card-link {
        margin-left: 1.25rem;
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: rgba(0, 0, 0, 0.03);
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    }

    .card-header:first-child {
        border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
    }

    .card-footer {
        padding: 0.75rem 1.25rem;
        background-color: rgba(0, 0, 0, 0.03);
        border-top: 1px solid rgba(0, 0, 0, 0.125);
    }

    .card-footer:last-child {
        border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px);
    }
</style>
<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">Trang chủ</a></li>
                <li class="item-link"><span>Đăng nhập</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('client.login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email hoặc số điện thoại:</label>
                                <input type="text" class="form-control" name="email" id="email">
                            </div>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif

                            <div class="form-group">
                                <label for="password">Mật khẩu:</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                            <div class="checkbox">
                                <label><input type="checkbox" name="remember"> Ghi nhớ</label>
                            </div>
                            <button type="submit" class="btn btn-login">Đăng nhập</button>
                        </form>
                        <div>
                            <p class="no-account">Bạn chưa có tài khoản? <a data-target="#register"
                                    data-toggle="modal">Đăng ký</a></p>
                            <div class="social">
                                <p class="social-heading">
                                    <span>Hoặc đăng nhập bằng</span>
                                </p>
                                <ul class="social__items">
                                    {{-- <li class="social__item">
                                            <a href="#"><img src="{{ asset('images/fb.png') }}" alt=""></a>
                                        </li> --}}
                                    <li class="social__item">
                                        <a href="{{ route('client.login.google') }}"><img
                                                src="{{ asset('images/gg.png') }}" alt=""></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->

    </div>
    <!--end container-->

</main>
@stop
