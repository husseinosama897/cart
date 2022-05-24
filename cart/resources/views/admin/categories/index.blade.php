@extends('layouts.admin')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">الاقسام</h1>
    <div class="col-xl-2 col-lg-2">
        <a href="{{route('categories_create')}}" class="btn btn-primary btn-block float-end my-2"><i class="fa fa-plus-square me-2"></i>إضافة قسم جديد</a>
    </div>
</div>

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
<!-- PAGE-HEADER END -->
<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">الاسم</th>
                                <th class="wd-15p border-bottom-0">الرابط</th>
                                <th class="wd-25p border-bottom-0">تاريخ التأسيس</th>
                                <th class="wd-10p border-bottom-0">إعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    @php
                                        setlocale(LC_ALL, 'ar.utf8');
                                        $date = Carbon\Carbon::parse($category->created_at)->translatedFormat('l j F Y H:i:s');
                                    @endphp
                                    <td>{{ $date }}</td>
                                    <td name="bstable-actions"><div class="btn-list">
                                        <a id="bEdit" type="button" class="btn btn-sm btn-primary" style="color:white">
                                            <span class="fe fe-eye"></span>
                                        </a>
                                        <a id="bDel" type="button" class="btn  btn-sm btn-danger" style="color:white">
                                            <span class="fe fe-trash-2"> </span>
                                        </a>
                                    </div></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Row -->
@endsection

@section('style')
    <link href="{{ asset('/admin/assets/scss/plugins/_dataTables.bootstrap.scss') }}" rel="stylesheet"/>
    <link href="{{ asset('/admin/assets/scss/plugins/_buttons.bootstrap5.scss') }}" rel="stylesheet"/>
    <link href="{{ asset('/admin/assets/scss/plugins/_responsive.bootstrap.scss') }}" rel="stylesheet"/>
@endsection

@section('script')
    <script src="{{ asset('/admin/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/admin/assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('/admin/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/admin/assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('/admin/assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{ asset('/admin/assets/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{ asset('/admin/assets/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{ asset('/admin/assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('/admin/assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('/admin/assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset('/admin/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('/admin/assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('/admin/assets/js/table-data.js')}}"></script>
@endsection