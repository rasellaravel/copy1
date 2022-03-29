<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">

        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ @$m_n == 'dashboasd' ? 'active pcoded-trigger' : '' }}">
                <a href="{{ url('admin') }}">
                    <span class="pcoded-micon"><i class="ti-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.ui-element">General Admin Actions</div>
        <ul class="pcoded-item pcoded-left-item">
            @if (@Auth::user()->role == 1)
                <li class="pcoded-hasmenu {{ @$m_m_n == 'users' ? 'active pcoded-trigger' : '' }}">
                    <a href="javascript:void(0)" data-i18n="nav.sticky-notes.main">
                        <span class="pcoded-micon"><i class="ti-layers-alt"></i></span>
                        <span class="pcoded-mtext">Manage Users</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ @$m_n == 'user-list' ? 'active' : '' }}">
                            <a href="{{ route('admin.users') }}" data-i18n="nav.basic-components.alert">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext">User</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="pcoded-hasmenu {{ @$m_m_n == 'vendors' ? 'active pcoded-trigger' : '' }}">
                    <a href="javascript:void(0)" data-i18n="nav.sticky-notes.main">
                        <span class="pcoded-micon"><i class="ti-layers-alt"></i></span>
                        <span class="pcoded-mtext">Manage Vendors</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ @$m_n == 'vendor-list' ? 'active' : '' }}">
                            <a href="{{ route('admin.vendors') }}" data-i18n="nav.basic-components.alert">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext">Vendor</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            <li class="pcoded-hasmenu {{ @$m_m_n == 'shipping' ? 'active pcoded-trigger' : '' }}">
                <a href="javascript:void(0)" data-i18n="nav.sticky-notes.main">
                    <span class="pcoded-micon"><i class="ti-layers-alt"></i></span>
                    <span class="pcoded-mtext">Manage Shipping</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="{{ @$m_n == 'country-list' ? 'active' : '' }}">
                        <a href="{{ route('admin.country') }}" data-i18n="nav.basic-components.alert">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Country</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="{{ @$m_n == 'shipping-type-list' ? 'active' : '' }}">
                        <a href="{{ route('admin.shippingType') }}" data-i18n="nav.basic-components.alert">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Shipping Type</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="{{ @$m_n == 'shipping-category-list' ? 'active' : '' }}">
                        <a href="{{ route('admin.shippingCategory') }}" data-i18n="nav.basic-components.alert">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Shipping Category</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="{{ @$m_n == 'shipping-list' ? 'active' : '' }}">
                        <a href="{{ route('admin.shipping') }}" data-i18n="nav.basic-components.alert">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Shipping</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="{{ @$m_n == 'shipping-setting-list' ? 'active' : '' }}">
                        <a href="{{ route('admin.shippingSetting') }}" data-i18n="nav.basic-components.alert">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Settings</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            @if (@Auth::user()->role == 1)
                <li class="pcoded-hasmenu {{ @$m_m_n == 'custom-sizes' ? 'active pcoded-trigger' : '' }}">
                    <a href="javascript:void(0)" data-i18n="nav.sticky-notes.main">
                        <span class="pcoded-micon"><i class="ti-layers-alt"></i></span>
                        <span class="pcoded-mtext">Manage Custom Sizes</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ @$m_n == 'size-list' ? 'active' : '' }}">
                            <a href="{{ route('admin.customSize') }}" data-i18n="nav.basic-components.alert">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext">Custom Size</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="pcoded-hasmenu {{ @$m_m_n == 'custom-colors' ? 'active pcoded-trigger' : '' }}">
                    <a href="javascript:void(0)" data-i18n="nav.sticky-notes.main">
                        <span class="pcoded-micon"><i class="ti-layers-alt"></i></span>
                        <span class="pcoded-mtext">Manage Custom Colors</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ @$m_n == 'color-list' ? 'active' : '' }}">
                            <a href="{{ route('admin.customColor') }}" data-i18n="nav.basic-components.alert">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext">Custom Color</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="pcoded-hasmenu {{ @$m_m_n == 'specification' ? 'active pcoded-trigger' : '' }}">
                    <a href="javascript:void(0)" data-i18n="nav.sticky-notes.main">
                        <span class="pcoded-micon"><i class="ti-layers-alt"></i></span>
                        <span class="pcoded-mtext">Manage Specifications</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ @$m_n == 'specification-list' ? 'active' : '' }}">
                            <a href="{{ route('admin.specification') }}" data-i18n="nav.basic-components.alert">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext">Specification</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="pcoded-hasmenu {{ @$m_m_n == 'menu' ? 'active pcoded-trigger' : '' }}">
                    <a href="javascript:void(0)" data-i18n="nav.sticky-notes.main">
                        <span class="pcoded-micon"><i class="ti-layers-alt"></i></span>
                        <span class="pcoded-mtext">Manage Menu</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ @$m_n == 'menu-list' ? 'active' : '' }}">
                            <a href="{{ route('admin.menuList') }}" data-i18n="nav.basic-components.alert">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext">Menu</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="{{ @$m_n == 'sub-menu-list' ? 'active' : '' }}">
                            <a href="{{ route('admin.subMenuList') }}" data-i18n="nav.basic-components.alert">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext">Sub Menu</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="{{ @$m_n == 'inner-menu-list' ? 'active' : '' }}">
                            <a href="{{ route('admin.innerMenuList') }}" data-i18n="nav.basic-components.alert">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext">Inner Menu</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            <li class="pcoded-hasmenu {{ @$m_m_n == 'product' ? 'active pcoded-trigger' : '' }}">
                <a href="javascript:void(0)" data-i18n="nav.sticky-notes.main">
                    <span class="pcoded-micon"><i class="ti-layers-alt"></i></span>
                    <span class="pcoded-mtext">Manage Product</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="{{ @$m_n == 'product-list' ? 'active' : '' }}">
                        <a href="{{ route('admin.productList') }}" data-i18n="nav.basic-components.alert">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Product</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            @if (@Auth::user()->role == 1)
                <li class="pcoded-hasmenu {{ @$m_m_n == 'slider' ? 'active pcoded-trigger' : '' }}">
                    <a href="javascript:void(0)" data-i18n="nav.sticky-notes.main">
                        <span class="pcoded-micon"><i class="ti-layers-alt"></i></span>
                        <span class="pcoded-mtext">Manage slider</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ @$m_n == 'main_slider' ? 'active' : '' }}">
                            <a href="{{ url('admin/main-slider') }}" data-i18n="nav.basic-components.alert">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext">Main Slider</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    </ul>
                </li>
                </li>
                <li class="pcoded-hasmenu {{ @$m_m_n == 'manage_package' ? 'active pcoded-trigger' : '' }}">
                    <a href="javascript:void(0)" data-i18n="nav.sticky-notes.main">
                        <span class="pcoded-micon"><i class="ti-layers-alt"></i></span>
                        <span class="pcoded-mtext">Manage Package</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ @$m_n == 'package' ? 'active' : '' }}">
                            <a href="{{ url('admin/package') }}" data-i18n="nav.basic-components.alert">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext">Package</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            <li class="pcoded-hasmenu @if (\Request::route()->getName() ==
                'admin.payment.history') active pcoded-trigger @endif">
                <a href="javascript:void(0)" data-i18n="nav.sticky-notes.main">
                    <span class="pcoded-micon"><i class="ti-layers-alt"></i></span>
                    <span class="pcoded-mtext">Manage Orders</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="@if (\Request::route()->getName() == 'admin.payment.history') active @endif">
                        <a href="{{ route('admin.payment.history') }}" data-i18n="nav.basic-components.alert">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Order List</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            @if (@Auth::user()->role == 1)
                <li class="{{ @$m_m_n == 'blog' ? 'active pcoded-trigger' : '' }}">
                    <a href="{{ route('admin.blog') }}" data-i18n="nav.sticky-notes.main">
                        <span class="pcoded-micon"><i class="ti-layers-alt"></i></span>
                        <span class="pcoded-mtext">Blogs</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="pcoded-hasmenu {{ @$m_m_n == 'pages' ? 'active pcoded-trigger' : '' }}">
                    <a href="javascript:void(0)" data-i18n="nav.sticky-notes.main">
                        <span class="pcoded-micon"><i class="ti-layers-alt"></i></span>
                        <span class="pcoded-mtext">Manage Pages</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ @$m_n == 'page-list' ? 'active' : '' }}">
                            <a href="{{ route('admin.page') }}" data-i18n="nav.basic-components.alert">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext">Page</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            {{-- <li class="pcoded-hasmenu {{ @$m_m_n == 'api' ? 'active pcoded-trigger' : '' }}">
                <a href="javascript:void(0)" data-i18n="nav.sticky-notes.main">
                    <span class="pcoded-micon"><i class="ti-layers-alt"></i></span>
                    <span class="pcoded-mtext">Manage Api</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="{{ @$m_n == 'create-api' ? 'active' : '' }}">
                        <a href="{{ route('admin.api.show') }}" data-i18n="nav.basic-components.alert">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Create Api</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="{{ @$m_n == 'insert-product-api' ? 'active' : '' }}">
                        <a href="{{ route('admin.api.product.insert') }}" data-i18n="nav.basic-components.alert">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Insert Product Api</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ @$m_m_n == 'omniva' ? 'active pcoded-trigger' : '' }}">
                <a href="{{ route('admin.omniva') }}" data-i18n="nav.sticky-notes.main">
                    <span class="pcoded-micon"><i class="ti-layers-alt"></i></span>
                    <span class="pcoded-mtext">Omniva</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li> --}}
            @if (@Auth::user()->role == 1)
                <li class="{{ @$m_m_n == 'settings' ? 'active pcoded-trigger' : '' }}">
                    <a href="{{ route('admin.settings') }}" data-i18n="nav.sticky-notes.main">
                        <span class="pcoded-micon"><i class="ti-layers-alt"></i></span>
                        <span class="pcoded-mtext">Settings</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>
