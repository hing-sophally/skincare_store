<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route('admin.index') }}" class="logo">
                <img
                    src="{{ asset('admin/assets/img/kaiadmin/logo_light.svg') }}"
                    alt="navbar brand"
                    class="navbar-brand"
                    height="20"
                />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>

    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                {{-- Dashboard --}}
                <li class="nav-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.index') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- Section Header --}}
                <li class="nav-section">
                    <span class="sidebar-mini-icon"><i class="fa fa-ellipsis-h"></i></span>
                    <h4 class="text-section">Components</h4>
                </li>

                {{-- Category --}}
                @php
                    $categoryActive = request()->is('admin/category*');
                @endphp
                <li class="nav-item {{ $categoryActive ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#categoryMenu" {{ $categoryActive ? 'aria-expanded=true' : '' }}>
                        <i class="fas fa-layer-group"></i>
                        <p>Category</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ $categoryActive ? 'show' : '' }}" id="categoryMenu">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->is('admin/category') ? 'active' : '' }}">
                                <a href="{{ url('admin/category') }}">
                                    <span class="sub-item">All Categories</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('admin/category/create') ? 'active' : '' }}">
                                <a href="{{ url('admin/category/create') }}">
                                    <span class="sub-item">Add Category</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- Product --}}
                @php
                    $productActive = request()->is('admin/product*');
                @endphp
                <li class="nav-item {{ $productActive ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#productMenu" {{ $productActive ? 'aria-expanded=true' : '' }}>
                        <i class="fas fa-box-open"></i>
                        <p>Product</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ $productActive ? 'show' : '' }}" id="productMenu">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->is('admin/product') ? 'active' : '' }}">
                                <a href="{{ url('admin/product') }}">
                                    <span class="sub-item">All Products</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('admin/product/create') ? 'active' : '' }}">
                                <a href="{{ url('admin/product/create') }}">
                                    <span class="sub-item">Add Product</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- Roles --}}
                @php
                    $rolesActive = request()->is('admin/roles*');
                @endphp
                <li class="nav-item {{ $rolesActive ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#rolesMenu" {{ $rolesActive ? 'aria-expanded=true' : '' }}>
                        <i class="fas fa-user-check"></i>
                        <p>Roles</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ $rolesActive ? 'show' : '' }}" id="rolesMenu">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->is('admin/roles') ? 'active' : '' }}">
                                <a href="{{ url('admin/roles') }}">
                                    <span class="sub-item">All Roles</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('admin/roles/create') ? 'active' : '' }}">
                                <a href="{{ url('admin/roles/create') }}">
                                    <span class="sub-item">Add Role</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                @php
                    $rolesActive = request()->is('admin/skincare-tip*');
                @endphp
                <li class="nav-item {{ $rolesActive ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#rolesMenu" {{ $rolesActive ? 'aria-expanded=true' : '' }}>
                        <i class="fas fa-user-check"></i>
                        <p>Skincare Tips </p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ $rolesActive ? 'show' : '' }}" id="rolesMenu">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->is('admin/skincare-tip') ? 'active' : '' }}">
                                <a href="{{ url('admin/skincare-tip') }}">
                                    <span class="sub-item">All skincare tip</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('admin/skincare-tip/create') ? 'active' : '' }}">
                                <a href="{{ url('admin/skincare-tip/create') }}">
                                    <span class="sub-item">Add skincare tip</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
{{--                @php--}}
{{--                    $discountsActive = request()->is('admin/discounts*');--}}
{{--                @endphp--}}

{{--                <li class="nav-item {{ $discountsActive ? 'active' : '' }}">--}}
{{--                    <a data-bs-toggle="collapse" href="#discountsMenu" {{ $discountsActive ? 'aria-expanded=true' : '' }}>--}}
{{--                        <i class="fas fa-tags"></i>--}}
{{--                        <p>Discount</p>--}}
{{--                        <span class="caret"></span>--}}
{{--                    </a>--}}
{{--                    <div class="collapse {{ $discountsActive ? 'show' : '' }}" id="discountsMenu">--}}
{{--                        <ul class="nav nav-collapse">--}}
{{--                            <li class="{{ request()->is('admin/discounts') ? 'active' : '' }}">--}}
{{--                                <a href="{{ url('admin/discounts') }}">--}}
{{--                                    <span class="sub-item">All Discounts</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="{{ request()->is('admin/discounts/create') ? 'active' : '' }}">--}}
{{--                                <a href="{{ url('admin/discounts/create') }}">--}}
{{--                                    <span class="sub-item">Add Discount</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}

            </ul>
        </div>
    </div>
</div>
