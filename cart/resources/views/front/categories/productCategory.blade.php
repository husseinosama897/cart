@extends('layouts.app')

@section('content')
    <div class="container py-3">
        @if ($category !== null)
            <h3 class="text-center">منتجات الفئة {{ $category->name }}</h3>
        @endif
        <div class="supplier-products">
            <product-category :category="{{ $category }}"></product-category>
        </div>
    </div>
@endsection

@section('style')

    <link href="{{ asset('front/css/supplier.css') }}" rel="stylesheet">

@endsection