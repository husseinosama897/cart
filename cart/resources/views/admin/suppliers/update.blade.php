@extends('layouts.admin')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">تعديل المورد</h1>
</div>
@foreach ($errors->all() as $error)
<div class="alert alert-danger " role="alert" style="border-radius: 4px">
   {{ $error }}
  </div>
@endforeach
<!-- PAGE-HEADER END -->
<!-- Row -->
<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('categories_save') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="name" class="form-label">اسم المورد</label>
                            <input type="text" class="form-control" id="name" name="comp" placeholder="الاسم" value="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name" class="form-label">البريد الالكتروني</label>
                            <input type="text" class="form-control" id="name" name="email" placeholder="رقم الهاتف" value="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name" class="form-label">رقم الهاتف</label>
                            <input type="text" class="form-control" id="name" name="phone" placeholder="رقم الهاتف" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name" class="form-label">الرقم الضريبي</label>
                            <input type="text" class="form-control" id="name" name="tax_number" placeholder="الرقم الضريبي" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name" class="form-label">الوكيل</label>
                            <input type="text" class="form-control" id="name" name="representative" placeholder="الوكيل" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="name" class="form-label">الدولة</label>
                            <input type="text" class="form-control" id="name" name="country" placeholder="الدولة" value="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name" class="form-label">المدينة</label>
                            <input type="text" class="form-control" id="name" name="city" placeholder="المدينة" value="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name" class="form-label">الرمز البريدي</label>
                            <input type="text" class="form-control" id="name" name="postal_code" placeholder="الرمز البريدي" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name" class="form-label">اسم الشارع</label>
                            <input type="text" class="form-control" id="name" name="street_name" placeholder="اسم الشارع" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name" class="form-label">رقم المبني</label>
                            <input type="text" class="form-control" id="name" name="building_num" placeholder="رقم المبنى" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name" class="form-label">الموقع</label>
                            <input type="text" class="form-control" id="name" name="location" placeholder="الموقع" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="demo" class="form-label">صوره المورد</label>
                        <input id="" type="file" name="image" accept=".jpg, .png, image/jpeg, image/png">
                    </div>
                    <button class="btn btn-primary mt-4 mb-0">إضافة</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Row -->
@endsection