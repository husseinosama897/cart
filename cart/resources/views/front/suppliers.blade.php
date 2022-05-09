@extends('layouts.app')

@section('content')
<suppliers></suppliers>
@endsection

@section('style')
    <link href="{{ asset('front/css/supplier.css') }}" rel="stylesheet">
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