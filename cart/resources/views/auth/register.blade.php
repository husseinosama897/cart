@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="login my-4 mx-lg-0 mx-3  col-lg-5 col" style="display: flex;flex-direction: column;justify-content: center;">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <span class="d-block mb-3 fs-4">{{ __('Register') }}</span>
                <div class="row mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="row mb-3">
                    <label class="col-md-4 form-label">نوع مؤسستك</label>
                    <select class="form-select" aria-label="Default select example">
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-md-4 form-label">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" style="text-align: end;">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 form-label">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="row mb-0">
                    <div class="col">
                        <button type="submit" class="btn btn-primary w-100">
                            {{ __('Register') }}
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
.banner img {
    height: 100%;
    width: 100%;
    object-fit: cover;
}
</style>
@endsection