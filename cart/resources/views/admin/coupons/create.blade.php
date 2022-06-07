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
                <form method="POST" action="{{ route('coupon.save') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="">
                        <div class="form-group">
                            <label for="name" class="form-label">الكود</label>
                            <input type="text" class="form-control" id="name" name="code" placeholder="الكود">
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">النوع</label>
                            <select class="form-select d-inline-block type" name="type">
                                <option value="voucher">voucher</option>
                                <option value="percent">percent_off</option>
                            </select>
                        </div>
                        <div class="form-group" id="value">
                            <label for="name" class="form-label">القيمة</label>
                            <input type="text" class="form-control" id="name" name="value" placeholder="القيمة">
                        </div>

                        <div class="form-group percent" id="percent">
                            <label for="name" class="form-label">percent</label>
                            <input type="text" class="form-control" id="name" name="percent_off" placeholder="percent">
                        </div>
                        <div class="form-group" >
                            <label for="name" class="form-label">expire</label>
                            <input type="date" class="form-control" id="name" name="expire" placeholder="percent">
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
<script src="{{ asset('/admin/assets/js/review.js')}}"></script>
<script>
$('.type').change(function (e) { 
    e.preventDefault();

    var statusCode = $('.type').val();
    console.log(statusCode);

    if(statusCode == 'voucher'){
        $('#value').removeClass('value');
    }else{
        $('#value').addClass('value');
    }

    
    if(statusCode == 'percent'){
        $('#percent').removeClass('percent');
    }else{
        $('#percent').addClass('percent');
    }

});
</script>
@endsection

@section('style')
<style>
    .value{
        display: none !important
    }
    .percent{
        display: none !important
    }
</style>
@endsection