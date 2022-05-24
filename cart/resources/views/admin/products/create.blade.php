@extends('layouts.admin')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">إضافة منتج جديد</h1>
</div>
<!-- PAGE-HEADER END -->
@foreach ($errors->all() as $error)
<div class="alert alert-danger " role="alert" style="border-radius: 4px">
   {{ $error }}
  </div>
@endforeach
<div class="errors mb-3 mt-2">
    @if (session('success'))
    <div class="alert alert-success" role="alert"> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-warning text-right" role="alert" style="border-radius: 4px">
       {{ session('error') }}
    </div>
    @endif
 </div>
<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-lg-12">
        <form method="POST" action="{{ route('save_products') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row mb-4">
                        <label class="col-md-3 form-label">اسم المنتج :</label>
                        <div class="col-md-9">
                            <input type="text" name="name" class="form-control" placeholder="اسم المنتج">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label">السعر :</label>
                        <div class="col-md-9">
                            <input type="number" name="price" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label">خصم :</label>
                        <div class="col-md-9">
                            <input type="number" name="discount" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label">عرض :</label>
                        <div class="col-md-9">
                            <input type="number" name="offer" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label">عدد المنتجات :</label>
                        <div class="col-md-9">
                            <select name="qty_type" class="form-control form-select select2" data-bs-placeholder="Select Country">
                                    <option value="1">عدد عادي</option>
                                    <option value="2">عدد لانهائي</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label">الكمية :</label>
                        <div class="col-md-9">
                            <input type="number" name="qty" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label">بيع ب :</label>
                        <div class="col-md-9">
                            <select name="option" class="form-control form-select select2" data-bs-placeholder="Select Country">
                                <option value="1">القطعه</option>
                                <option value="2">الجمله</option>
                        </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label">القسم :</label>
                        <div class="col-md-9">
                            <select name="category_id" class="form-control form-select select2" data-bs-placeholder="Select Country">
                                @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label">المورد :</label>
                        <div class="col-md-9">
                            <select name="supplier_id" class="form-control form-select select2" data-bs-placeholder="Select Country">
                                @foreach ($suppliers as $item)
                                <option value="{{ $item->id }}">{{ $item->comp }}</option>
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <!-- Row -->
                    <div class="row">
                        <label class="col-md-3 form-label mb-4">وصف المنتج :</label>
                        <div class="col-md-9 mb-4">
                            <textarea class="content" name="description"></textarea>
                        </div>
                    </div>
                    <!--End Row-->

                    <!--Row-->
                    <div class="row">
                        <label class="col-md-3 form-label mb-4">صورة المنتج :</label>
                        <div class="col-md-9">
                            <input id="image" type="file" name="image" accept=".jpg, .png, image/jpeg, image/png">
                        </div>
                    </div>
                    <!--End Row-->
                </div>
                <div class="card-footer">
                    <!--Row-->
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-primary">أضف المنتج</button>
                            <a href="{{ route('products_index') }}" class="btn btn-default float-end">تجاهل</a>
                        </div>
                    </div>
                    <!--End Row-->
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /ROW-1 CLOSED -->
@endsection

@section('script')
<!-- INTERNAL WYSIWYG Editor JS -->
<script src="{{ asset('/admin/assets/plugins/wysiwyag/jquery.richtext.js')}}"></script>
<script src="{{ asset('/admin/assets/plugins/wysiwyag/wysiwyag.js ')}}"></script>

<!-- INTERNAL File-Uploads Js-->
<script src="{{ asset('/admin/assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
<script src="{{ asset('/admin/assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
<script src="{{ asset('/admin/assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
<script src="{{ asset('/admin/assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
<script src="{{ asset('/admin/assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
@endsection