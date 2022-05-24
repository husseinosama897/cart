@extends('layouts.admin')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">إضافة منتج جديد</h1>
</div>
<!-- PAGE-HEADER END -->

<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-4">
                    <label class="col-md-3 form-label">اسم المنتج :</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="اسم المنتج">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-md-3 form-label">السعر :</label>
                    <div class="col-md-9">
                        <input type="number" class="form-control">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-md-3 form-label">الكمية :</label>
                    <div class="col-md-9">
                        <input type="number" class="form-control">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-md-3 form-label">القسم :</label>
                    <div class="col-md-9">
                        <select name="country" class="form-control form-select select2" data-bs-placeholder="Select Country">
                            @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                    </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-md-3 form-label">المورد :</label>
                    <div class="col-md-9">
                        <select name="country" class="form-control form-select select2" data-bs-placeholder="Select Country">
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
                        <input id="demo" type="file" name="files" accept=".jpg, .png, image/jpeg, image/png" multiple>
                    </div>
                </div>
                <!--End Row-->
            </div>
            <div class="card-footer">
                <!--Row-->
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        <a href="javascript:void(0)" class="btn btn-primary">أضف المنتج</a>
                        <a href="javascript:void(0)" class="btn btn-default float-end">تجاهل</a>
                    </div>
                </div>
                <!--End Row-->
            </div>
        </div>
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