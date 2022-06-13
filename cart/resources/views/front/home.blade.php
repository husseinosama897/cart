@extends('layouts.app')

@section('content')
    <section class="slider">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="https://k.nooncdn.com/cms/pages/20220407/d9ba9e34afb4063d17c01dc0e41d474f/ar_banner-01.gif" class="d-block w-100" alt="">
                    </div>
                    <div class="carousel-item">
                    <img src="https://k.nooncdn.com/cms/pages/20220329/f019b7e5062c31f7968b4418e9534634/ar_slider-02.png" class="d-block w-100" alt="">
                    </div>
                    <div class="carousel-item">
                    <img src="https://k.nooncdn.com/ads/banner-1440x1440/ar_slider-01%20(86).1649753297.592674.png" class="d-block w-100" alt="">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

    </section>
    <section class="suppliers">
        <div class="container">
            <h5 class="mb-2">الموردون المعتمدون</h5>
            <div class="owl-carousel">
            @foreach($suppliers as $supplier)
                <div class="supplier">
                    <div class="photo">
                   <a href="{{ route('suppliers.page', ['slug'=>$supplier->slug,'supplier'=>$supplier->id]) }}">
                        <img src="{{ asset('uploads/suppliers/'.$supplier->image) }}" alt="">
                   </a>
                    </div>
                    <span>{{$supplier->comp}}</span>
                </div>
             @endforeach
              
            </div>
        </div>
    </section>
    <section class="categories">
        <div class="container">
            <h5 class="mb-4">التصنيفات الرئيسية</h5>
            <div class="categories-content row mb-4">

            @foreach($categories as $category)
                <div class="category col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6">
                    <div class="photo">
                    <a href="{{ route('categorypage', ['slug'=>$category->slug,'category'=>$category->id]) }}">
                        <img src="{{asset('/uploads/categories/'.$category->image)}}" alt="{{$category->name}}" style="height: 150px;object-fit: cover;width: auto;">
                    </a>
                    </div>
                    <span>{{$category->name}}</span>
                </div>
               @endforeach
    
       
            </div>
            <h5 class="mb-4">ادوات المطاعم والكافيهات</h5>
            <div class="tools-content row justify-content-center">
                <div class="tool col-xl-3 col-lg-4 col-sm-6 col-auto">
                    <div class="photo">
                        <img src="/front/images/223141-AFIA_Logo_AR.webp" alt="">
                    </div>
                    <span>عافية</span>
                </div>
                <div class="tool col-xl-3 col-lg-4 col-sm-6 col-auto">
                    <div class="photo">
                        <img src="/front/images/223141-AFIA_Logo_AR.webp" alt="">
                    </div>
                    <span>عافية</span>
                </div>
                <div class="tool col-xl-3 col-lg-4 col-sm-6 col-auto">
                    <div class="photo">
                        <img src="/front/images/223141-AFIA_Logo_AR.webp" alt="">
                    </div>
                    <span>عافية</span>
                </div>
                <div class="tool col-xl-3 col-lg-4 col-sm-6 col-auto">
                    <div class="photo">
                        <img src="/front/images/223141-AFIA_Logo_AR.webp" alt="">
                    </div>
                    <span>عافية</span>
                </div>
            </div>
        </div>
    </section>
    <section class="unavailable py-4">
        <div class="container d-flex flex-column align-items-center">
            <h1>يمكن طلب طلبات غير متوفرة من هنا </h1>
            <a href="{{ route('pna') }}" class="btn btn-primary my-2">معرفة المزيد</a>
        </div>
    </section>
@endsection

@section('owl')
<link href="{{ asset('front/css/owl.carousel.min.css') }}" rel="stylesheet">
@endsection

@section('scripts')
<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js"></script>
<script src="{{ asset('/front/js/owl.carousel.js') }}"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav:true,
        dots: false,
        rtl: true,
        autoplay:true,
        autoplayTimeout:1000,
        autoplayHoverPause:true,
        autoPlay: 3000,
        responsive : {
            // breakpoint from 0 up
            0 : {
                items: 1,
            },
            // breakpoint from 480 up
            480 : {
                items: 2,
            },
            // breakpoint from 768 up
            768 : {
                items: 3,
            },
            1024 : {
                items: 4,
            },
            1280 : {
                items: 5,
            }
        }
    })
</script>
@endsection