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
    .items {
        background: #fff;
        border-radius: 5px;
        display: flex;
        column-gap: 20px;
        padding: 10px 20px;
    }
    .items .photo{
        border-left: 2px solid #e9e7e7;
        padding-left: 20px;
    }
    .items .photo span{
        font-size: 18px
    }
    .items .photo img {
        height: 150px;
        background: #e9e7e7;
        padding: 5px;
        margin-left: 15px;
    }
    .items .cart-supplier {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
    }
    .items .cart-supplier span:first-child {
        font-size: 12px;
        color: #c9c9c9;
    }
</style>
@endsection