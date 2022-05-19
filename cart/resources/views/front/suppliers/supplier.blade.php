@extends('layouts.app')

@section('content')
<supplier :slug="{{ $supplier->id }}" :supplier="{{ $supplier }}"></supplier>
@endsection

@section('style')
    <link href="{{ asset('front/css/supplier.css') }}" rel="stylesheet">
    <style>
        .supplier-aside{
            width: 270px;
        }
        .supplier-products {
            position: relative;
            width: 100%;
        }
        .supplierProductContainer{
            display: flex;
            align-items: center;
            position: relative;
            width: 100%;
            flex-wrap: wrap;
        }
        .supplierProduct{
            margin: 10px;
            padding: 10px;
            width: 100%;
        }

        @media (min-width: 480px) { 
            .supplierProduct {
                width: calc(50% - 20px);
            }
        }

        @media (min-width: 768px) { 
            .supplierProduct {
                width: calc(33.33% - 20px);
            }
        }
        @media (min-width: 992px) { 
            .supplierProduct {
                width: calc(33.33% - 20px);
            }
        }
        @media (min-width: 1200px) { 
            .supplierProduct {
                width: calc(25% - 20px);
            }
        }
        .supplier-products .product .details .supplier-cart{
            background-color: #0b3046
        }
        .supplier-cart svg {
            fill: #ffffff;
        }
    </style>

@endsection

@section('scripts')
<script src="https://unpkg.com/vue-toastr/dist/vue-toastr.umd.min.js"></script>

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