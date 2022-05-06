@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col py-2 mt-3">
            <div class="page-title-box">
                <h5 class="page-title">تفاصيل المنتج</h5>
                <p >الرئيسية / التصنيفات</p>
            </div>
        </div>
    </div>
    <view-product
     :supplier="{{ App\Models\supplier::where('id', $product->supplier_id)->first() }}" 
     :category="{{ App\Models\category::where('id', $product->category_id)->first() }}" 
     :product="{{$product}}" 
     :related="{{ $related }}"></view-product>
</div>
@endsection

@section('owl')
<link href="{{ asset('front/css/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('front/css/view-product.css') }}" rel="stylesheet">
@endsection

@section('style')

@endsection

@section('scripts')
<script src="{{ asset('/front/js/owl.carousel.js') }}"></script>

<script src="https://unpkg.com/vue-toastr/dist/vue-toastr.umd.min.js"></script>


<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav:true,
        dots: false,
        rtl: true,
        items: 1
    });
</script>

@endsection