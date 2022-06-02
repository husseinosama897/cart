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
        <section class="col-lg-8 bg-white rounded-3 border pt-1 mb-5 mb-lg-0">
            <!-- Settings-->
            <form enctype="multipart/form-data" method="POST" action="">
                @csrf
                <div class="rounded-3 p-4 mb-4">
                    <div class="d-flex align-items-center">
                        <img id="preview" class="rounded" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/avatars/avatar.jpg" width="90" alt="Susan Gardner" style="height: 90px !important;object-fit: cover" v-if="Avatar == null">
                        {{-- <img class="rounded" src="Avatar" width="90" alt="Susan Gardner" style="height: 90px !important;object-fit: cover" v-else=""> --}}
                        <div class="ms-3 position-relative">
                            <input hidden type="file" id="uploadphoto" class="btn btn-light btn-shadow btn-sm mb-2" style="display: none;opacity: 0">
                            <a onclick="thisFileUpload()" class="btn btn-light btn-shadow btn-sm mb-2 d-flex" style="background: #fff;border-radius: 4px;border: 1px solid #e2e2e2">
                                <i class="ci-loading ms-2"></i>
                                تغيير صورة البروفايل
                            </a>
                            <div class="p mb-0 fs-ms text-muted">يجب ان تكون الصورة JPG أو Jpeg أو PNG</div>
                        </div>
                    </div>
                </div>
                <div class="row gx-4 gy-3">
                    <div class="col-sm-6">
                        <label class="form-label text-right" for="account-fn">الاسم الاول</label>
                        <input class="form-control" type="text" id="account-fn" name="first_name" value="">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label text-right" for="account-ln">اسم العائلة</label>
                        <input class="form-control" type="text" id="account-ln" name="last_name" value="">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label text-right mt-3" for="account-email">البريد الإلكتروني</label>
                        <input class="form-control" type="email" id="account-email" name="email" disabled="" value="{{ $user->email }}">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label text-right mt-3" for="account-phone">رقم الهاتف</label>
                        <input class="form-control" type="text" id="account-phone" name="phone_number" disabled="" value="{{ $user->phone }}">
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label text-right mt-3" for="old-account-pass">كلمة المرور الحالية</label>
                        <div class="password-toggle">
                            <input class="form-control" type="password" id="old-account-pass" name="oldPassword">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label text-right mt-3" for="account-pass">كلمة المرور الجديدة</label>
                        <div class="password-toggle">
                            <input class="form-control" type="password" id="account-pass" name="newPassword">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label text-right mt-3" for="account-confirm-pass">تأكيد كلمة المرور الجديدة</label>
                        <div class="password-toggle">
                            <input class="form-control" type="password" id="account-confirm-pass" name="confirmPassword">
                        </div>
                    </div>
                    <div class="col-12 p-3">
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <button class="btn btn-primary mt-3 mt-sm-0" name="update" type="submit">تحديث</button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
    </div>
</section>
@endsection