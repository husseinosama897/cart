@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col py-4">
            <div class="page-title-box">
                <h4 class="page-title">عربة التسوق</h4>
            </div>
        </div>
    </div>
    <cart></cart>
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