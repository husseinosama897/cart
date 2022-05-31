@extends('layouts.admin')

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">مراجعة الطلب</h1>
</div>
<!-- PAGE-HEADER END -->
{{ $data }}
<div class="row">
<!-- Content  -->
<section class="col-12 bg-white rounded-3 border pt-3 p-3 mb-5 mb-lg-0">
    <!-- Orders-->
    <div class="row">
        <div class="col-lg-4 mb-2">
            <div class="card border shadow-none">
                <div class="card-body">
                    <h6 class="header-title mb-3">معلومات الشحن</h6>
                    <h6></h6>
                    <address class="ms-2 mt-1 mb-0 font-14 address-lg">
                        <span class="mt-1">الاسم : {{ $data->billing_name }}</span>
                        <br>
                        <span class="mt-1">البريد الالكتروني : {{ $data->billing_email }}</span>
                        <br>
                        <span class="mt-1">رقم الهاتف : {{ $data->billing_number }}</span>
                        <br>
                        <span class="mt-1">المحافظة : بني سويف</span>
                        <br>
                        <span class="mt-1">العنوان : تجريبه العنوان</span>
                        <br>
                        <span class="mt-1">رقم المحمول :</span> 1017738730
                        <br>
                        <span class="mt-1">الرقم البديل :</span> 
                    </address>
                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-lg-4 mb-2">
            <div class="card border shadow-none">
                <div class="card-body" v-if="viewOrder != null" style="height: 170px">
                    <h6 class="header-title mb-3">ملاحظات الطلب</h6>
                                                <p>لا توجد ملاحظات</p>
                                        </div>
            </div>
        </div> <!-- end col -->

        <div class="col-lg-3 mb-2">
            <div class="card border shadow-none">
                <div class="card-body" style="height: 170px">
                    <h6 class="header-title mb-3">معلومات توصيل الطلب</h6>
                    <div>
                        <p class="mb-1"><b>معرف الطلب :</b> 1649960877 </p>


                        <p class="mb-0">
                            <b>حالة الطلب :</b>
                                                            <span class="badge alert-success rounded-3 p-2">
                                تم توصيل الطلب
                            </span>
                                                            </p>

                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <div class="row">
        <div class="col-lg-8 mb-2">
            <div class="card border shadow-none">
                <div class="card-body">
                    <h6 class="header-title mb-3">منتجات الطلب # 1649960877</h6>
                        <div class="table-responsive">
                        <table class="table mb-2 table-bordered">
                            <thead>
                            <tr>
                                <th>اسم المنتج</th>
                                <th>السعر</th>
                                <th>السعر الكلي</th>
                            </tr>
                            </thead>
                            <tbody class="border-top-0">
                                                                                                        <tr>
                                    <td class="align-center">
                                        ساعه سمارت,WATCH J6,متوافقه مع اندرويد وايفون,تدعم اللغه العربيه ( الكمية :  1 )
                                        
                                                                                            ( اللون :  اسود )
                                                                                                                                            ( الحجم :  44 مللي )
                                                                                                                                </td>
                                    <td class="align-middle text-center">
                                        395 جنية
                                    </td>
                                    <td class="align-middle text-center">
                                        395 جنية
                                    </td>
                                </tr>
                                                                                                    </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->

                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-lg-4 mb-2">
            <div class="card border shadow-none">
                <div class="card-body">
                    <h6 class="header-title mb-3">ملخص سعر الطلب</h6>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th>الوصف</th>
                                <th>السعر</th>
                            </tr>
                            </thead>
                            <tbody class="border-top-0" v-if="viewOrder != null">
                            <tr>
                                <td>سعر المنتجات :</td>
                                <td>395 جنية</td>
                            </tr>
                            <tr>
                                <td>تكلفة الشحن :</td>
                                <td>45 جنية</td>
                            </tr>
                            <tr>
                                <th>السعر الكلي :</th>
                                <th> 440 جنية </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->

                </div>
            </div>
        </div> <!-- end col -->
    </div>
</section>
</div>
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