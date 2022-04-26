@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="login my-4 col-lg-5 col" style="display: flex;flex-direction: column;justify-content: center;">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <span class="d-block mb-3 fs-4">قم بتسجيل الدخول</span>
                <div class="mb-3">
                    <label for="email" class="form-label">البريد الالكتروني</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="text-align: end">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">كلمة المرور</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2 d-flex justify-content-end">
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}" style="font-size: 14px">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
                <span class="line" style="display:block; margin:25px">
                    <h2 style="font-size:15px; text-align:center; border-bottom:1px solid rgb(214, 214, 214); position:relative; ">
                        <span style="background-color: white; position: relative; top: 10px; padding: 0 10px;">او</span>
                    </h2>
                </span>
                <div class="row">
                    <div class="col-6 d-flex flex-column align-items-center">
                        <span class="d-block mb-3">ادخل بواسطة</span>
                        <div >
                            <a href="#" class="mx-1">
                               <img src="{{ asset('front/icons/facebook.png') }}" width="20" alt="" srcset="">
                            </a>
                            <a href="#" class="mx-1">
                                <img src="{{ asset('front/icons/search.png') }}" width="20" alt="" srcset="">
                            </a>
                            <a href="#" class="mx-1">
                                <img src="{{ asset('front/icons/linkedin.png') }}" width="20" alt="" srcset="">
                            </a>
                        </div>
                    </div>
                    <div class="col-6 d-flex flex-column align-items-center">
                        <span class="d-block mb-3">جديد بالموقع ؟</span>
                        <a href="{{ route('register') }}">أنشاء حساب</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="banner col-lg-7 d-none d-lg-block ">
            <img src="/front/images/auth-one-bg.jpg" alt="">
        </div>
    </div>
</div>
@endsection

@section('style')
<style>
    .banner img{
        width: 100%;
    }
</style>
@endsection