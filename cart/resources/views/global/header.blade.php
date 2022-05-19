<header>
    <div class="container">
        <div class="row align-items-center desktop">
            <div class="logo col-auto">
                <a href="/">
                    <img src="{{ asset('/front/images/Component 51 – 2.png') }}" alt="" color="">
                </a>
            </div>
            @if (Auth::check())
                <div class="account col-auto">
                      <div class="dropdown">
                        <button class="btn btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="outline: 0 !important;box-shadow: 0 0 0 0 !important;">
                            <img src="{{  Auth::user()->avatar }}" alt="" srcset="" width="24" style="border-radius: 40px;margin-left: 5px;"> 
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="font-size: 14px !important">
                            <li>
                                <a class="dropdown-item" href="#" style="padding: 0.35rem 1rem;">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" style="width: 16px !important;height: 16px !important;">
                                        <path fill="none" d="M0 0h24v24H0z"></path><path d="M4 22a8 8 0 1 1 16 0h-2a6 6 0 1 0-12 0H4zm8-9c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z"></path>
                                    </svg>
                                    {{ Auth::user()->name }}
                                    </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" style="padding: 0.35rem 1rem;">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" style="width: 16px !important;height: 16px !important;"><path fill="none" d="M0 0h24v24H0z"></path><path d="M12 20.9l4.95-4.95a7 7 0 1 0-9.9 0L12 20.9zm0 2.828l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zM12 13a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 2a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"></path>
                                    </svg>
                                تغيير العنوان
                                </a>
                            </li>
                          <li>
                            <a class="dropdown-item" href="#" style="padding: 0.35rem 1rem;"> 
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" style="width: 16px !important;height: 16px !important;"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 1l9.5 5.5v11L12 23l-9.5-5.5v-11L12 1zm0 2.311L4.5 7.653v8.694l7.5 4.342 7.5-4.342V7.653L12 3.311zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                                الاعدادات
                              </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#" style="padding: 0.35rem 1rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" style="width: 16px !important;height: 16px !important;"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-1-5h2v2h-2v-2zm2-1.645V14h-2v-1.5a1 1 0 0 1 1-1 1.5 1.5 0 1 0-1.471-1.794l-1.962-.393A3.501 3.501 0 1 1 13 13.355z"/></svg>
                                طلب المساعدة
                              </a>
                          </li>
                          <hr>
                          <li>
                            <a class="dropdown-item" href="#" style="padding: 0.35rem 1rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" style="width: 16px !important;height: 16px !important;"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2a9.985 9.985 0 0 1 8 4h-2.71a8 8 0 1 0 .001 12h2.71A9.985 9.985 0 0 1 12 22zm7-6v-3h-8v-2h8V8l5 4-5 4z"/></svg>
                                تسجيل الخروج
                              </a>
                          </li>
                        </ul>
                      </div>
                </div>
            @else
                <div class="account col-auto">
                    <a href="{{ route('login') }}" class="login">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                            <path fill="none" d="M0 0h24v24H0z"></path><path d="M4 22a8 8 0 1 1 16 0h-2a6 6 0 1 0-12 0H4zm8-9c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z"></path>
                        </svg>
                        تسجيل الدخول
                    </a>
                </div>
            @endif

            @if (Auth::check())
            <div class="cart col-auto">
                <a href="{{route('basket')}}">
                    <span class="badge cartcount">
                        0
                    </span>
                    <svg id="cart-fill" xmlns="http://www.w3.org/2000/svg" width="31" height="32" viewBox="0 0 31.999 32" style="width: 26px !important;height: 26px !important;">
                        <path id="Path_36" data-name="Path 36" d="M0,3.067A1.067,1.067,0,0,1,1.067,2h3.2A1.067,1.067,0,0,1,5.3,2.809l.865,3.458H30.933A1.067,1.067,0,0,1,31.981,7.53L28.781,24.6a1.067,1.067,0,0,1-1.048.87H8.533a1.067,1.067,0,0,1-1.048-.87L4.288,7.562,3.435,4.133H1.067A1.067,1.067,0,0,1,0,3.067Zm10.667,22.4a4.267,4.267,0,1,0,4.267,4.267A4.267,4.267,0,0,0,10.667,25.467Zm14.933,0a4.267,4.267,0,1,0,4.267,4.267A4.267,4.267,0,0,0,25.6,25.467ZM10.667,27.6A2.133,2.133,0,1,0,12.8,29.733,2.133,2.133,0,0,0,10.667,27.6Zm14.933,0a2.133,2.133,0,1,0,2.133,2.133A2.133,2.133,0,0,0,25.6,27.6Z" transform="translate(0 -2)" fill="#149e00" fill-rule="evenodd"/>
                      </svg>                      
                </a>
            </div>
            @else
            <div class="cart col-auto">
                <a href="{{route('basket')}}">
                    <!-- <span class="badge">
                    5
                    </span> -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M4 16V4H2V2h3a1 1 0 0 1 1 1v12h12.438l2-8H8V5h13.72a1 1 0 0 1 .97 1.243l-2.5 10a1 1 0 0 1-.97.757H5a1 1 0 0 1-1-1zm2 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm12 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"></path>
                    </svg>
                    عربة التسوق
                </a>
            </div>
            @endif

            <div class="search col-auto">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20">
                    <g>
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path d="M11 2c4.968 0 9 4.032 9 9s-4.032 9-9 9-9-4.032-9-9 4.032-9 9-9zm0 16c3.867 0 7-3.133 7-7 0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7zm8.485.071l2.829 2.828-1.415 1.415-2.828-2.829 1.414-1.414z"></path>
                    </g>
                </svg>
                <div class="search-input-item">
                    <input class="search-input" type="text" name="search" placeholder="بحث..."> 
                </div>
            </div>
            <div class="location col-auto">             
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M12 20.9l4.95-4.95a7 7 0 1 0-9.9 0L12 20.9zm0 2.828l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zM12 13a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 2a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"></path>
                </svg>
                <div class="details">
                    <span class=""> التوصيل الي  </span>
                    <div style="font-weight: bold;flex: 1 1 0%;min-width: 0px;display: flex;max-width: 200px;-webkit-box-align: center;align-items: center;">
                        <span class="place d-block get-state" style="text-decoration: underline;cursor: pointer;">استخدم موقعك</span>
                        <span class="hstate" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;display: inline;">
                        </span>
                </div>
                </div>
            </div>
            <div class="pna col-auto">
                <button>
                    طلب منتجات غير متوفرة
                </button>
            </div>
        </div>
        <div class="row align-items-center mobile">
            <div class="logo col-auto">
                <svg class="open-menu" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" style="margin-right: 10px;"><path fill="none" d="M0 0h24v24H0z"></path><path d="M3 4h18v2H3V4zm0 7h18v2H3v-2zm0 7h18v2H3v-2z"></path></svg>
                <img src="/front/images/noon-black-ar.svg" alt="" color="">
            </div>
            <div class="row align-items-center col-auto">
                <div class="search-icon col-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20">
                        <g>
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path d="M11 2c4.968 0 9 4.032 9 9s-4.032 9-9 9-9-4.032-9-9 4.032-9 9-9zm0 16c3.867 0 7-3.133 7-7 0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7zm8.485.071l2.829 2.828-1.415 1.415-2.828-2.829 1.414-1.414z"></path>
                        </g>
                    </svg>
                </div>
                <div class="account col-auto">
                    <a href="#" class="login">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                            <path fill="none" d="M0 0h24v24H0z"></path><path d="M4 22a8 8 0 1 1 16 0h-2a6 6 0 1 0-12 0H4zm8-9c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z"></path>
                        </svg>
                    </a>
                </div>
                <div class="cart col-auto">
                    <a href="#">
                        <!-- <span class="badge">
                        5
                        </span> -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M4 16V4H2V2h3a1 1 0 0 1 1 1v12h12.438l2-8H8V5h13.72a1 1 0 0 1 .97 1.243l-2.5 10a1 1 0 0 1-.97.757H5a1 1 0 0 1-1-1zm2 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm12 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
<nav>
    <div class="container desktop">
        <div class="row align-items-center">
            <button class="col-auto">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M3 4h18v2H3V4zm0 7h18v2H3v-2zm0 7h18v2H3v-2z"></path></svg>
                جميع الفئات
            </button>
            <ul class="menu col-6 m-0">
                <li>
                    <a href="/">الرئيسية</a>
                </li>
                <li>
                    <a href="{{ route('suppliers') }}">تسوق حسب المورد</a>
                </li>
                <li>
                    <a href="{{ route('packaging_order') }}">التغليف المخصص</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="mobile-menu">
        <div class="logo col-auto">
            <svg class="colse-menu" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z"></path></svg>
            <img src="/images/noon-black-ar.svg" alt="" color="">
        </div>
        <ul class="p-0">
                <li class="category">
                    <a href="/ar/categories/navigation/">
                        <span>حسابي علي كارت</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M10.828 12l4.95 4.95-1.414 1.414L8 12l6.364-6.364 1.414 1.414z"></path></svg>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M3 3h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm17 11h-3.416a5.001 5.001 0 0 1-9.168 0H4v5h16v-5zm0-2V5H4v7h5a3 3 0 0 0 6 0h5z"></path></svg>
                        الطلبات
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M6.455 19L2 22.5V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H6.455zm-.692-2H20V5H4v13.385L5.763 17zM11 10h2v2h-2v-2zm-4 0h2v2H7v-2zm8 0h2v2h-2v-2z"></path></svg>
                        التقييمات في انتظار التأكيد
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M18 7h3a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h15v4zM4 9v10h16V9H4zm0-4v2h12V5H4zm11 8h3v2h-3v-2z"></path></svg>
                        رصيد
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0H24V24H0z"></path><path d="M16.5 3C19.538 3 22 5.5 22 9c0 7-7.5 11-10 12.5C9.5 20 2 16 2 9c0-3.5 2.5-6 5.5-6C9.36 3 11 4 12 5c1-1 2.64-2 4.5-2zm-3.566 15.604c.881-.556 1.676-1.109 2.42-1.701C18.335 14.533 20 11.943 20 9c0-2.36-1.537-4-3.5-4-1.076 0-2.24.57-3.086 1.414L12 7.828l-1.414-1.414C9.74 5.57 8.576 5 7.5 5 5.56 5 4 6.656 4 9c0 2.944 1.666 5.533 4.645 7.903.745.592 1.54 1.145 2.421 1.7.299.189.595.37.934.572.339-.202.635-.383.934-.571z"></path></svg>
                        المنتجات المحفوظة
                    </a>
                </li>
                <li class="category">
                    <a href="/ar/categories/navigation/">
                        <span>أقسامنا</span>
                        <span>عرض الكل</span>
                    </a>
                </li>
                <li>
                    <a href="/groceries/" class="sdl">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M21 13v7a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-7H2v-2l1-5h18l1 5v2h-1zM5 13v6h14v-6H5zm-.96-2h15.92l-.6-3H4.64l-.6 3zM6 14h8v3H6v-3zM3 3h18v2H3V3z"></path></svg>
                        سوبرماركت
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M21 20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.314a1 1 0 0 1 .38-.785l8-6.311a1 1 0 0 1 1.24 0l8 6.31a1 1 0 0 1 .38.786V20zM7 12a5 5 0 0 0 10 0h-2a3 3 0 0 1-6 0H7z"></path></svg>
                        المنزل و المكتب
                    </a>
                </li>
        </ul>
    </div>
    <div class="overlay"></div>
</nav>