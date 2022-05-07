@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col py-2">
            <div class="page-title-box">
                <h5 class="page-title">عربة التسوق</h5>
            </div>
        </div>
    </div>
<<<<<<< HEAD
    <view-cart products="{{ $data }}"></view-cart>
=======
    <view-cart :product="{{$data}}"></view-cart>
>>>>>>> da536307d0b5ffb9ba4a489ee97fc1a2381790a8
</div>
@endsection

@section('style')
<style>
    .cart {
        border-right: 1px solid rgba(0, 0, 0, 0.125)
    }
    .text-muted {
        color: #7d879c !important;
    }
    .fs-sm{
        font-size: 12px;
        color: #222
    }
    [type="tel"], [type="url"], [type="email"], [type="number"] {
        direction: rtl;
    }
    .dlist-align {
        display: flex;
        justify-content: space-between
    }
@media (min-width: 576px){
    .text-sm-right {
        text-align: right !important;
    }
}
</style>
@endsection