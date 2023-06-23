<!-- Begin SideBar-->
<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href="{{ route('index') }}"><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>
             <li class="nav-item"><a href="{{ route('section.index') }}"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الاقسام</span>

                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{ route('section.index') }}"
                            data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{ route('section.create') }}" data-i18n="nav.dash.crypto">
                            اضافة </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""></i>
                    <span class="menu-title" data-i18n="nav.dash.main">المنتجات </span>

                </a>
                <ul class="menu-content">
                    <li class=""><a class="menu-item" href="{{ route('product.index') }}"
                            data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{ route('product.create') }}" data-i18n="nav.dash.crypto">
                            اضافة </a>
                    </li>
                </ul>
            </li>
              

        </ul>
    </div>
</div>

<!--End Sidebare-->
