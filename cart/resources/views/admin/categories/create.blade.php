@extends('layouts.admin')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">إضافة قسم جديد</h1>
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
                <form method="POST" action="{{ route('categories_save') }}">
                    @csrf
                    <div class="">
                        <div class="form-group">
                            <label for="name" class="form-label">الاسم</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="الاسم">
                        </div>
                        <div class="form-group">
                            <label for="demo" class="form-label">الصورة</label>
                            <input id="demo" type="file" name="image" accept=".jpg, .png, image/jpeg, image/png">
                        </div>
                    </div>
                    <button class="btn btn-primary mt-4 mb-0">إضافة</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Row -->
@endsection

@section('script')
<!-- INTERNAL File-Uploads Js-->
<script src="{{ asset('/admin/assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
<script src="{{ asset('/admin/assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
<script src="{{ asset('/admin/assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
<script src="{{ asset('/admin/assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
<script src="{{ asset('/admin/assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
@endsection