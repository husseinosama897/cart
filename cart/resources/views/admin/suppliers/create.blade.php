@extends('layouts.admin')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">إضافة مورد جديد</h1>
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
                <form method="POST" action="{{ route('createsupplier') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="">
                        <div class="form-group">
                            <label for="name" class="form-label">الاسم</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="الاسم">
                        </div>
                        <div class="form-group">
                            <label for="demo" class="form-label">الصورة</label>
                            <input id="" type="file" name="image" accept=".jpg, .png, image/jpeg, image/png">
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