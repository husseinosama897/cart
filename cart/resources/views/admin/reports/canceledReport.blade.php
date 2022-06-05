@extends('layouts.admin')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">طلبات تم إلغاؤها </h1>
</div>
<!-- Row -->
<canceledreport></canceledreport>
 <!-- End Row -->
@endsection

@section('style')
<link href="{{ asset('/admin/assets/scss/plugins/_dataTables.bootstrap.scss') }}" rel="stylesheet"/>
<link href="{{ asset('/admin/assets/scss/plugins/_buttons.bootstrap5.scss') }}" rel="stylesheet"/>
<link href="{{ asset('/admin/assets/scss/plugins/_responsive.bootstrap.scss') }}" rel="stylesheet"/>
<style>
    .dropdown-menu{
        background-color: #0d6efd;
    }
    #file-datatable_wrapper .row:first-child{
        margin-bottom: 2rem;
    }
</style>
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
{{-- <script>
    $('#basic-datatable').DataTable({
        "searching": false,
        "info": false,
        language: {
            searchPlaceholder: 'بحث...',
            sSearch: '',
            "url": "https://cdn.datatables.net/plug-ins/1.12.0/i18n/ar.json"
        }
    });
</script> --}}
<script src="{{ asset('/admin/assets/js/table-data.js')}}"></script>

@endsection