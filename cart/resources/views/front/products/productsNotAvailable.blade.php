@extends('layouts.app')

@section('content')
    <div class="container py-3">
        <h3 class="text-center">طلب منتجات غير متوفرة</h3>
        <div class="pnaForm">
            <form action="">
                <div class="row mt-4" style="max-width: 576px; margin: 0 auto">
                    <div class="col-12 mb-4">
                        <input type="text" class="form-control" placeholder="الاسم">
                    </div>
                    <div class="col-12 mb-4">
                        <input type="text" class="form-control" placeholder="رقم الهاتف">
                    </div>
                    <div class="col-12 mb-4">
                        <input type="email" class="form-control text-start" placeholder="البريد الالكتروني">
                    </div>
                    <div class="col-12 mb-4">
                        <input type="text" class="form-control" placeholder="اسم المنتج">
                    </div>
                    <div class="col-12 mb-4">
                        <input type="file" class="form-control">
                    </div>
                    <button class="col-10 m-auto btn btn-sm btn-success">ارسال</button>
                </div>
            </form>
        </div>
    </div>
@endsection