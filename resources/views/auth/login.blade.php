
@extends('layouts.account')
@section('content')
    <div class="app">
        <div class="header">
            <div class="grid">
                <div class="header-main">
                    <div class="header-logo header-logo1">
                        <a href="{{route('home')}}" class="logo__link">
                            <img src="{{asset('frontend/images/go.png')}}" alt="" width="160px" height="40px">
                        </a>
                        <div class="header-text">Đăng Nhập GoFood</div>
                    </div>
                    <a href="" class="help-center">Bạn cần giúp đỡ?</a>
                </div>
            </div>
        </div>
        <div class="app__container" style="background:#eee;padding-top:10px;">

            <div class="form">
                <div class="form-box form-register">
                    <h1 style="text-align: center">ĐĂNG NHẬP</h1>
                  <div class="auth-social">
                    <button class="sdt">
                        <span class="fas fa-mobile-alt"></span>
                        <span>Số điện thoại</span>
                    </button>
                    <a href="{{route('facebook-auth')}}">
                        <button class="fb">
                            <span class="fab fa-facebook" style=" line-height: 20px;width: 20px; height: 20px;left: 20px; position: absolute; top: 5px;font-size: 15px; text-align: center;"></span>
                            <span>FACEBOOK</span>
                        </button>
                    </a>
                   <a href="{{route('google-auth')}}">
                    <button  class="gg">
                        <span class="fab fa-google-plus " style=" line-height: 20px;width: 20px; height: 20px;left: 20px; position: absolute; top: 5px;font-size: 15px; text-align: center;"></span>
                        <span>GOOGLE</span>
                    </button>
                   </a>
                  </div>
                    <p class="ortext">
                        Hoặc <a href="{{route('register')}}" style="color: #0288d1;font-weight: 600;"> đăng ký</a> bằng tài khoản của bạn
                    </p>
                    <form method="POST" action="{{ route('login') }}">
                     
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="">{{ __('Email Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-check mb-3">
                              
                                    <label class="form-check-label" for="remember">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        {{ __('Remember Me') }}
                                    </label>
                                    

                            
                        </div>

                      
                            <div class="">
                               

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                            <form method="POST" action="{{ route('sendOtp') }}">
                                @csrf
                                <button class="fb" type="submit"><span>Quên mật khẩu</span></button>
                            </form>
                        <button class="fb" type="submit"><span>Đăng nhập ngay</span></button>
                        <p style="padding-left: 8px;font-size: 10px;color: #707070;">Bằng cách  <a href=@Url.Action("Register", "Account") style="color: #0288d1;font-weight: 600;"> đăng ký</a> hoặc đăng nhập, bạn đồng ý với Chính sách quy định của Fooddy </p>

                    </form>
                <div style="text-align:center;color:red;" class="error">
                    @if(Session::has('error'))
                        {{Session::get('error')}}
                    @endif
                </div>

                </div>
              
            </div>

            

        </div>
    </div>
@endsection
   


