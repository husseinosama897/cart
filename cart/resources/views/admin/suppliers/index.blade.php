@extends('layouts.admin')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">الموردين</h1>
    <div class="col-xl-2 col-lg-2">
        <a href="{{route('admin.suppliers.create')}}" class="btn btn-primary btn-block float-end my-2">
            <i class="fa fa-plus-square me-2"></i>
            إضافة مورد جديد
        </a>
    </div>
</div>
<!-- PAGE-HEADER END -->
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
                                <th class="wd-15p border-bottom-0">البريد الالكتروني</th>
                                <th class="wd-20p border-bottom-0">رقم الهاتف</th>
                                <th class="wd-15p border-bottom-0">الدولة</th>
                                <th class="wd-10p border-bottom-0">إعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $supplier)
                                <tr>
                                    <td>{{ $supplier->comp }}</td>
                                    <td>{{ $supplier->email }}</td>
                                    <td>{{ $supplier->phone }}</td>
                                    <td>{{ $supplier->country }}</td>
                                    {{-- @php
                                        setlocale(LC_ALL, 'ar.utf8');
                                        $date = Carbon\Carbon::parse($supplier->created_at)->translatedFormat('l j F Y H:i:s');
                                    @endphp
                                    <td>{{ $date }}</td> --}}
                                    <td name="bstable-actions"><div class="btn-list">
                                        <a href="/suppliers/{{ $supplier->comp }}/{{ $supplier->id }}" id="bEdit" type="button" class="btn btn-sm btn-primary" style="color:white">
                                            <span class="fe fe-eye"></span>
                                        </a>
                                        <a  href="/editsupp/{{ $supplier->id }}" id="bEdit" type="button" class="btn btn-sm btn-primary" style="color:white">
                                            <span class="fe fe-edit"></span>
                                        </a>
                                        <a href="/deletesupp/{{ $supplier->id }}" onclick="return confirm('هل انت متاكد من حذف المورد {{ $supplier->comp }}')" id="bDel" type="button" class="btn  btn-sm btn-danger" style="color:white">
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