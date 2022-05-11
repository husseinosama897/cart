@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-cover">
        <img src="/front/images/CARD.png" alt="">
    </div>
    <div class="page-details p-4" style="text-align: center">
        <h2>طلب تغليفات مخصصة</h2>
        <p class="pt-2">يمكنك عمل تغليفات مخصصة طبوع عليها الونا هويتك والشعار الخاص بكم</p>
    </div>
    <div class="page-products">
        <div class="products">
            <div class="product">
                <div class="photo">
                    <img src="/front/images/purple-marble-cups-mockup-psd-handmade-experimental-art_53876-111290.png" alt="">
                </div>
                <div class="details">
                    <h6 class="pt-2" style="color: #0B3046">اسم المنتج</h6>
                    <p>وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف</p>
                    <a class="btn btn-sm btn-success" href="#" style="border-radius: 0;width:100%;background-color: #00786D">
                        طلب مماثل
                    </a>
                </div>
            </div>
            <div class="product">
                <div class="photo">
                    <img src="/front/images/purple-marble-cups-mockup-psd-handmade-experimental-art_53876-111290.png" alt="">
                </div>
                <div class="details">
                     <h6 class="pt-2" style="color: #0B3046">اسم المنتج</h6>
                    <p>وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف</p>
                    <a class="btn btn-sm btn-success" href="#" style="border-radius: 0;width:100%;background-color: #00786D">
                        طلب مماثل
                    </a>
                </div>
            </div>
            <div class="product">
                <div class="photo">
                    <img src="/front/images/purple-marble-cups-mockup-psd-handmade-experimental-art_53876-111290.png" alt="">
                </div>
                <div class="details">
                     <h6 class="pt-2" style="color: #0B3046">اسم المنتج</h6>
                    <p>وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف</p>
                    <a class="btn btn-sm btn-success" href="#" style="border-radius: 0;width:100%;background-color: #00786D">
                        طلب مماثل
                    </a>
                </div>
            </div>
            <div class="product">
                <div class="photo">
                    <img src="/front/images/purple-marble-cups-mockup-psd-handmade-experimental-art_53876-111290.png" alt="">
                </div>
                <div class="details">
                     <h6 class="pt-2" style="color: #0B3046">اسم المنتج</h6>
                    <p>وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف</p>
                    <a class="btn btn-sm btn-success" href="#" style="border-radius: 0;width:100%;background-color: #00786D">
                        طلب مماثل
                    </a>
                </div>
            </div>
            <div class="product">
                <div class="photo">
                    <img src="/front/images/purple-marble-cups-mockup-psd-handmade-experimental-art_53876-111290.png" alt="">
                </div>
                <div class="details">
                     <h6 class="pt-2" style="color: #0B3046">اسم المنتج</h6>
                     <p>وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف</p>
                    <a class="btn btn-sm btn-success" href="#" style="border-radius: 0;width:100%;background-color: #00786D">
                        طلب مماثل
                    </a>
                </div>
            </div>
            <div class="product">
                <div class="photo">
                    <img src="/front/images/purple-marble-cups-mockup-psd-handmade-experimental-art_53876-111290.png" alt="">
                </div>
                <div class="details">
                     <h6 class="pt-2" style="color: #0B3046">اسم المنتج</h6>
                     <p>وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف وصف</p>
                    <a class="btn btn-sm btn-success" href="#" style="border-radius: 0;width:100%;background-color: #00786D">
                        طلب مماثل
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
<style>
    .page-products .products{
        display: flex;
        flex-wrap: wrap;
        position: relative;
    }
    .page-products .product {
        margin: 10px 5px;
        width: 100%;
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