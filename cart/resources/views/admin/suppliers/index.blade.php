@extends('layouts.admin')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">الطلبات</h1>
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