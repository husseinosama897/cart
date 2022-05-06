@extends('layouts.app')

@section('content')
<supplier slug="{{$supplier->slug}}"></supplier>
@endsection

@section('style')
    <link href="{{ asset('front/css/supplier.css') }}" rel="stylesheet">
    <style>
        .supplier-aside{
            width: 270px;
        }
        .supplier-products .product .details .supplier-cart{
            background-color: #0b3046
        }
        .supplier-products {
            position: relative;
        }
    </style>

@endsection

@section('scripts')
<script>
    $('#app main .filter').click(function (e) { 
        e.preventDefault();
        $('aside').addClass('active');
        $('nav .overlay').addClass('active');
    });
    $('nav .overlay').click(function (e) { 
        e.preventDefault();
        $('aside').removeClass('active');
        $('nav .overlay').removeClass('active');
        $('nav .mobile-menu').removeClass('active');
    });
</script>
@endsection