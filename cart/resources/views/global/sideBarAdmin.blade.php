<!--APP-SIDEBAR-->
<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
                <img src="{{ asset('/front/images/logo.png') }}" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ asset('/front/images/logo.png') }}" class="header-brand-img toggle-logo" alt="logo">
                <img src="{{ asset('/front/images/logo.png') }}" class="header-brand-img light-logo" alt="logo">
                <img src="{{ asset('/front/images/logo.png') }}" class="header-brand-img light-logo1" alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/></svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="index.html">
                        <i class="side-menu__icon fe fe-home"></i>
                        <span class="side-menu__label">لوحة التحكم</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('categories_index') }}">
                        <i class="side-menu__icon fe fe-grid"></i>
                        <span class="side-menu__label">الاقسام</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('admin.suppliers') }}">
                        <i class="side-menu__icon fe fe-users"></i>
                        <span class="side-menu__label">الموردين</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('products_index') }}">
                        <i class="side-menu__icon fe fe-shopping-bag"></i>
                        <span class="side-menu__label">المنتجات</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('orders.index') }}">
                        <i class="side-menu__icon fe fe-box"></i>
                        <span class="side-menu__label">الطلبات</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                </li>
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
        </div>
    </div>
    <!--/APP-SIDEBAR-->
</div>