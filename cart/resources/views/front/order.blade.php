@extends('layouts.app')

@section('content')
<section class="section-content">
    <div class="page-title-overlap pt-4">
    </div>
    <div class="container pb-5 mb-2 mb-md-4">
        @if (session('success'))
        <div class="row">
            <section class="col rounded-3 pt-1 p-0 mb-2">
                <div class="alert alert-success text-right mb-0" role="alert" style="border-radius: 4px">
                    {{ session('success') }}
                </div>
            </section>
        </div>
        @endif
        @if (session('error'))
        <div class="row">
            <section class="col rounded-3 shadow-lg pt-1 mb-2">
                <div class="alert alert-danger text-right mb-0" role="alert" style="border-radius: 4px">
                    {{ session('error') }}
                </div>
            </section>
        </div>
        @endif
    <div class="row">
        <!-- Sidebar-->
        <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-3">
            <div class="bg-white rounded-3 border pt-1 mb-5 mb-lg-0">
                <div class="d-md-flex justify-content-between align-items-center text-center text-md-end p-4">
                    <div class="d-md-flex align-items-center">
                        <div class="img-thumbnail rounded-circle position-relative flex-shrink-0 mx-auto mb-2 mx-md-0 mb-md-0" style="width: 6.375rem;height: 6.375rem">
                                <img class="rounded-circle h-100" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/avatars/avatar.jpg" alt="" style="object-fit: cover">
                            <img class="rounded-circle h-100" src="Avatar" alt="" style="object-fit: cover">

                        </div>
                        <div class="ps-md-3">
                            <h3 class="fs-base mb-0">محمد اشرف</h3><span class="text-accent fs-sm">mohamed@gmail.com</span>
                        </div>
                    </div><a class="btn btn-primary d-lg-none mb-2 mt-3 mt-md-0" href="#account-menu" data-bs-toggle="collapse" aria-expanded="false"><i class="ci-menu me-2"></i>الحساب</a>
                </div>
                <div class="d-lg-block collapse" id="account-menu">
                    <div class="border-bottom  px-4 py-3">
                        <h3 class="fs-sm mb-0 text-muted">الحساب</h3>
                    </div>
                    <ul class="list-unstyled mb-0 " style="padding-right: 1rem;">
                        <li class="border-bottom mb-0">
                            <a class="nav-link-style d-flex align-items-center px-2 py-3" href="/profile">
                            <i class="ci-user opacity-60 me-2"></i>
                            اعدادات الحساب
                        </a>
                        </li>
                        <li class="border-bottom mb-0">
                            <a class="nav-link-style d-flex align-items-center px-2 py-3" href="/order">
                                <i class="ci-location opacity-60 me-2"></i>
                                الطلبات
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <!-- Content  -->
        <section class="col-lg-8 bg-white rounded-3 border pt-3 p-3 mb-5 mb-lg-0">
            <!-- Orders-->
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
                        <tr class="text-align-center">
                            <td>محمد</td>
                            <td>اشرف</td>
                            @php
                                setlocale(LC_ALL, 'ar.utf8');
                                $date = Carbon\Carbon::parse()->translatedFormat('l j F Y H:i:s');
                            @endphp
                            <td>اليوم</td>
                            <td name="bstable-actions"><div class="btn-list">
                                <a  href="/categories_update/" id="bEdit" type="button" class="btn btn-sm btn-primary" style="color:white">
                                    <span class="fe fe-edit"></span>
                                </a>
                                <a href="/categories_delete/" onclick="return confirm('هل انت متاكد من حذف قسم ')" id="bDel" type="button" class="btn  btn-sm btn-danger" style="color:white">
                                    <span class="fe fe-trash-2"> </span>
                                </a>
                            </div></td>
                        </tr>
                        <tr class="text-align-center">
                            <td>محمد</td>
                            <td>اشرف</td>
                            @php
                                setlocale(LC_ALL, 'ar.utf8');
                                $date = Carbon\Carbon::parse()->translatedFormat('l j F Y H:i:s');
                            @endphp
                            <td>اليوم</td>
                            <td name="bstable-actions"><div class="btn-list">
                                <a  href="/categories_update/" id="bEdit" type="button" class="btn btn-sm btn-primary" style="color:white">
                                    <span class="fe fe-edit"></span>
                                </a>
                                <a href="/categories_delete/" onclick="return confirm('هل انت متاكد من حذف قسم ')" id="bDel" type="button" class="btn  btn-sm btn-danger" style="color:white">
                                    <span class="fe fe-trash-2"> </span>
                                </a>
                            </div></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Button trigger modal -->
            <!-- Modal -->
            <div class="modal fade" id="deleteOrder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                    متاكد من الغاء الطلب ؟
                    </div>
                    <div class="modal-footer">
                    <form action="https://www.pomegy.com/orders" method="POST">
                        <input type="hidden" name="_token" value="9RRXew3WAwMCDQYJLhFVtREgDmKz5oapn0MOxCR9">                    <input type="hidden" hidden="" name="cancel" id="cancel" value="">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger mr-2">الغاء الطلب</button>
                    </form>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </div>
    </div>
</section>
@endsection

@section('style')
    <!-- Styles -->

    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">


    <link href="{{ asset('/admin/assets/plugins/iconfonts/icons.css') }}" rel="stylesheet" />
    
    <link href="{{ asset('/admin/assets/scss/plugins/_dataTables.bootstrap.scss') }}" rel="stylesheet"/>
    <link href="{{ asset('/admin/assets/scss/plugins/_buttons.bootstrap5.scss') }}" rel="stylesheet"/>
    <link href="{{ asset('/admin/assets/scss/plugins/_responsive.bootstrap.scss') }}" rel="stylesheet"/>

    <style>
        th, td {
            text-align: right !important;
        }
        thead th {
            border-width: 1px !important;
            border-style: solid;
            border-color: #dee2e6
        }
        tbody td{
            border-width: 1px !important;
            border-style: solid;
            border-color: #dee2e6
        }
        .table > :not(:first-child){
            border-top: 0
        }
        div.dataTables_wrapper div.dataTables_filter{
            text-align: left;
        }
    </style>
@endsection

@section('scripts')
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
    <script>
        //______Basic Data Table
       $('#basic-datatable').DataTable({
           "info": false,
           language: {
               searchPlaceholder: 'بحث...',
               sSearch: '',
               "url": "https://cdn.datatables.net/plug-ins/1.12.0/i18n/ar.json"
   
           }
       });
       </script>
    {{-- <script src="{{ asset('/admin/assets/js/table-data.js')}}"></script> --}}

@endsection