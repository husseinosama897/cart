@extends('layouts.app')

@section('content')
    <div class="container"> 
        <div class="page-details" style="padding:4rem;text-align: center">
            <h2>طلب تغليفات مخصصة</h2>
            <p class="pt-2">يمكنك عمل تغليفات مخصصة طبوع عليها الونا هويتك والشعار الخاص بكم</p>
        </div>
        <create-packing></create-packing>
    </div>
@endsection
@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('/front/css/jquery.fileuploader.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/front/css/jquery.fileuploader-theme-dragdrop.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .orders {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .order {
        background: #EBF2F1;
        padding: 80px;
        text-align: center;
        border-radius: 20px;
        width: 1024px;
    }
    @media (max-width: 479px) { 
        .page-products .product {
            text-align: center;
        }
    }
    @media (min-width: 480px) { 
        .page-products .product {
            width: calc(50% - 10px);
        }
    }
    @media (min-width: 576px) { 
        .page-products .product {
            width: calc(33.33% - 10px);
        }
    }
    @media (min-width: 768px) { 
        .page-products .product {
            width: calc(25% - 10px);
        }
    }
    @media (min-width: 992px) { 
        .page-products .product {
            width: calc(20% - 10px);
        }
    }
    .page-products .product .photo{
        
    }
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('/front/js/jquery.fileuploader.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.select2-select').select2();
    });
    $('input:file').fileuploader({
    // Options will go here
    });
</script>
@endsection