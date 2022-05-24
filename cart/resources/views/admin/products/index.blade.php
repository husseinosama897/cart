@extends('layouts.admin')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">المنتجات</h1>
</div>
<!-- PAGE-HEADER END -->

<!-- Row -->
<div class="row row-cards">

    <div class="col-xl-12 col-lg-8">
        <div class="row">
            <div class="col-xl-12">
                <div class="card p-0">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-xl-5 col-lg-8 col-md-8 col-sm-8">
                                <div class="input-group d-flex w-100 float-start">
                                    <input type="text" class="form-control border-end-0 my-2" placeholder="بحث ...">
                                    <button class="btn input-group-text bg-transparent border-start-0 text-muted my-2">
                                        <i class="fe fe-search text-muted" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">

                            </div>
                            <div class="col-xl-3 col-lg-12">
                                <a href="{{route('create_products')}}" class="btn btn-primary btn-block float-end my-2"><i class="fa fa-plus-square me-2"></i>إضافة منتج جديد</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="tab-11">
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-md-6 col-xl-3 col-sm-6">
                        <div class="card">
                            <div class="product-grid6">
                                <div class="product-image6 p-5">
                                    <ul class="icons">
                                        <li>
                                            <a href="/product/{{$product->slug}}/{{ $product->id }}" class="bg-primary text-white border-primary border">    
                                                <i class="fe fe-eye"></i> 
                                            </a>
                                        </li>
                                        <li>
                                            <a href="add-product.html" class="bg-success text-white border-success border">
                                                <i  class="fe fe-edit"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="bg-danger text-white border-danger border">
                                                <i class="fe fe-x"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <a class="bg-light">
                                        <img class="img-fluid br-7 w-100" src="/uploads/product/{{$product->img}}" alt="img" style="height: 245px !important;object-fit: contain;">
                                    </a>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="product-content text-center">
                                        <h1 class="title fw-bold fs-20">
                                            <a href="shop-description.html">
                                                {{ $product->name }}
                                            </a>
                                        </h1>
                                        {{-- <div class="mb-2 text-warning">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star-half-o text-warning"></i>
                                            <i class="fa fa-star-o text-warning"></i>
                                        </div> --}}
                                        <div class="price">
                                            {{$product->price}} ر.س
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="mb-5">
                        <div class="float-end">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- COL-END -->
    </div>
    <!-- ROW-1 CLOSED -->
</div>
<!-- End Row -->
@endsection
