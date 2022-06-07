@extends('layouts.admin')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">الكوبونات</h1>
    <div class="col-xl-2 col-lg-2">
        <a href="{{route('categories_create')}}" class="btn btn-primary btn-block float-end my-2"><i class="fa fa-plus-square me-2"></i>إضافة كوبون جديد</a>
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
                                <th class="wd-15p border-bottom-0">الكود</th>
                                <th class="wd-15p border-bottom-0">النوع</th>
                                <th class="wd-25p border-bottom-0">القيمة</th>
                                <th class="wd-10p border-bottom-0">تاريخ انتهاء الكوبون</th>
                                <th class="wd-10p border-bottom-0">إعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $coupon)
                                <tr>
                                    <td>{{ $coupon->code }}</td>
                                    <td>{{ $coupon->type }}</td>
                                    <td>
                                        @if ($coupon->percent_off !== null)
                                            {{ $coupon->percent_off }}
                                            @else
                                            {{ $coupon->value }}
                                        @endif
                                    </td>
                                    <td>{{ $coupon->expire }}</td>
                                    <td name="bstable-actions"><div class="btn-list">
                                        <a  href="/categories_update/{{ $coupon->id }}" id="bEdit" type="button" class="btn btn-sm btn-primary" style="color:white">
                                            <span class="fe fe-edit"></span>
                                        </a>
                                        <a href="/categories_delete/{{ $coupon->id }}" onclick="return confirm('هل انت متاكد من حذف قسم {{ $coupon->code }}')" id="bDel" type="button" class="btn  btn-sm btn-danger" style="color:white">
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