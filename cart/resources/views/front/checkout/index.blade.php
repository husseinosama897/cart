@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-5 mt-5">
        <h3 class="text-center">معلومات  الشحن</h3>
    </div>
    <div class="errors mb-3">
        @foreach ($errors->all() as $error)
        <div class="alert alert-warning text-right" role="alert" style="border-radius: 4px">
           {{ $error}}
          </div>
        @endforeach
        @if (session('error'))
        <div class="alert alert-warning text-right" role="alert" style="border-radius: 4px">
            {{ session('error') }}
        </div>
        @endif
    </div>
    <form class="js-validate" method="POST" action="/saveorder">
        @csrf
        <div class="row">
            <div class="col-lg-7 order-lg-1">
                <div class="pb-4 mb-4">
                    <!-- Title -->
                    <div class="border-bottom border-color-1 mb-4">
                        <h3 class="section-title mb-0 pb-2 font-size-25">عنوان الشحن</h3>
                    </div>
                    <!-- End Title -->

                    <!-- Billing Form -->
                    <div class="row">
                        <div class="col-12">
                            <!-- Input -->
                            <div class="js-form-message mb-4">
                                <label class="form-label text-right">
                                    الاسم بالكامل
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" {{ old('firstName') }} class="form-control" name="billing_name" placeholder="محمد" aria-label="محمد" required="" data-msg="من فضلك اكتب الاسم الاول" data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Input -->
                            <div class="js-form-message mb-4">
                                <label class="form-label text-right">
                                   البريد الالكتروني
                                </label>
                                <input type="email" name="billing_email" class="form-control" placeholder="example@gmail.com" aria-label="+1 (062) 109-9222" data-msg="من فضلك اكتب رقم هاتفك" data-error-class="u-has-error" data-success-class="u-has-success" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Input -->
                            <div class="js-form-message mb-4">
                                <label class="form-label text-right">
                                    رقم الهاتف
                                </label>
                                <input type="text" name="billing_number" class="form-control" placeholder="01000000000" aria-label="+1 (062) 109-9222" data-msg="من فضلك اكتب رقم هاتفك" data-error-class="u-has-error" data-success-class="u-has-success" required>
                            </div>
                        </div>
                        <!-- End Input -->
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <!-- Input -->
                            <div class="js-form-message mb-4">
                                <label class="form-label text-right">
                                    المدينة
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="details_address" class="form-control" placeholder="اكتب هنا" required="" data-msg="Please enter a valid address." data-error-class="u-has-error" data-success-class="u-has-success">
                            </div>
                            <!-- End Input -->
                        </div>
                        <div class="col-md-6">
                            <!-- Input -->
                            <div class="js-form-message mb-4">
                                <label class="form-label text-right">
                                    المنطقة
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="billing_area" class="form-control" name="streetAddress" placeholder="اكتب هنا" required="" data-msg="Please enter a valid address." data-error-class="u-has-error" data-success-class="u-has-success">
                            </div>
                            <!-- End Input -->
                        </div>
                        <div class="col-md-6">
                            <!-- Input -->
                            <div class="js-form-message mb-4">
                                <label class="form-label text-right">
                                    الشارع
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="billing_street" class="form-control" name="streetAddress" placeholder="اكتب هنا" required="" data-msg="Please enter a valid address." data-error-class="u-has-error" data-success-class="u-has-success">
                            </div>
                            <!-- End Input -->
                        </div>
                        <div class="col-md-6">
                            <!-- Input -->
                            <div class="js-form-message mb-4">
                                <label class="form-label text-right">
                                    اسم المطعم
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="billing_restaurant" class="form-control" name="streetAddress" placeholder="اكتب هنا" required="" data-msg="Please enter a valid address." data-error-class="u-has-error" data-success-class="u-has-success">
                            </div>
                            <!-- End Input -->
                        </div>
                        <div class="w-100"></div>
                        <div class="w-100"></div>
                    </div>
                    <!-- End Billing Form -->
                    <!-- Input -->
                    <div class="js-form-message mb-4">
                        <label class="form-label text-right">
                            ملاحظات اضافية
                        </label>

                        <div class="input-group">
                            <textarea class="form-control p-3" rows="4" name="notes" placeholder="اكتب هنا"></textarea>
                        </div>
                    </div>
                    <!-- End Input -->
                </div>
            </div>
            <div class="col-lg-5 order-lg-2 mb-4 mb-lg-0">
                <div class="ps-lg-3">
                    <div class="bg-gray-1 rounded-lg">
                        <!-- Order Summary -->
                        <div class="p-4 mb-4 checkout-table">
                            <!-- Title -->
                            <div class="border-bottom border-color-1 mb-4">
                                <h3 class="section-title mb-0 pb-2 font-size-25">طلباتك</h3>
                            </div>
                            <!-- End Title -->

                            <!-- Product Content -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-name text-right">المنتجات</th>
                                        <th class="product-total text-left">اجمالي السعر</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                    @php
                                        $totalPriceProducts = 0;
                                    @endphp
                                    @foreach ($data as $items)
                                    <tr class="cart_item">
                                        <td class="text-right"> {{ $items->product->name }} <strong class="product-quantity"> × {{ $items->quantity }}</strong></td>
                                        <td class="text-left"> {{ $items->product->price *  $items->quantity}} ر.س</td>
                                    </tr>
                                    @php
                                        $totalPriceProducts += $items->product->price *  $items->quantity;
                                    @endphp
                                    @endforeach
                                </tbody>
                                <tfoot class="border-0">
                                    <tr>
                                        <th class="text-right">إجمالي سعر المنتجات</th>
                                        <td class="text-left"><strong class="products-price"></strong> {{ $totalPriceProducts }} ر.س</td>
                                    </tr>
                                    <tr>
                                        <th class="text-right">القيمه المضافه</th>
                                        <td class="text-left"><strong class="shipping-cost">{{ $tax }}</strong><span> ر.س</span></td>
                                    </tr>
                                    <tr>
                                        <th class="text-right">إجمالي السعر</th>
                                        <td class="text-left"><strong class="total-price"></strong>{{ $total }} ر.س</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- End Product Content -->
                            <div class="form-group d-flex align-items-center justify-content-between px-3 mb-5">
                                <div class="form-check d-flex">
                                    <label class="form-check-label form-label" for="defaultCheck10">
                                        لقد قرأت ووافقت على  <a href="#" class="text-blue">شروط وأحكام الموقع</a>
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck10" required="" data-msg="Please agree terms and conditions." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary-dark-w btn-block btn-pill font-size-20 mb-3 py-3" style="border-radius: 3px">تاكيد الطلب</button>
                        </div>
                        <!-- End Order Summary -->
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('style')
<style>
    .checkout-table .table th, .checkout-table .table td {
    padding: 0.75rem 0;
    border-color: #dddddd;
    }
    .text-right {
        text-align: right !important;
    }
    .btn-primary-dark-w {
        color: #333e48;
        background-color: #fed700;
        border-color: #fed700;
    }
    .font-size-20 {
    font-size: 1.25038rem;
    }
    .rounded-lg {
        border-radius: 0.4375rem !important;
    }
    .bg-gray-1 {
        background-color: #f5f5f5 !important;
    }
    .btn-block {
        display: block;
        width: 100%;
    }
</style>
@endsection