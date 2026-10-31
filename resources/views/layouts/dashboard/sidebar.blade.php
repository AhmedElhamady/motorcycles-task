<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <div id="sidebar-menu">

            <div class="logo-box">
                <a class='logo logo-light' href='{{ route('dashboard') }}'>
                    <span class="logo-sm">
                        <img src="{{ asset('logo/logo-light.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('logo/logo-light.png') }}" alt="logo" class="main-logo mt-2">
                    </span>
                </a>
                <a class='logo logo-dark' href='{{ route('dashboard') }}'>
                    <span class="logo-sm">
                        <img src="{{ asset('logo/logo-dark.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('logo/logo-dark.png') }}" alt="logo" class="main-logo mt-2">
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}">
                        <span class="nav-icon">
                            <iconify-icon icon="solar:home-2-bold-duotone"></iconify-icon>
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>

                @can('manage-users')
                    <li>
                        <a href="{{ route('users.index') }}">
                            <span class="nav-icon">
                                <iconify-icon icon="solar:users-group-two-rounded-bold-duotone"></iconify-icon>
                            </span>
                            <span>Users</span>
                        </a>
                    </li>
                @endcan

                <li>
                    <a href="#sidebarBrands" data-bs-toggle="collapse">
                        <span class="nav-icon"><iconify-icon
                                icon="solar:tag-horizontal-bold-duotone"></iconify-icon></span>
                        <span>Brands</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarBrands">
                        <ul class="nav-second-level">
                            <li>
                                <a class="tp-link" href="{{ route('brands.index') }}">Brands List</a>
                            </li>
                            @can('create', App\Models\Brand::class)
                                <li>
                                    <a class="tp-link" href="{{ route('brands.create') }}">Add Brand</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarMotorcycles" data-bs-toggle="collapse">
                        <span class="nav-icon"><iconify-icon icon="solar:scooter-bold-duotone"></iconify-icon></span>
                        <span>Motorcycles</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMotorcycles">
                        <ul class="nav-second-level">
                            <li>
                                <a class="tp-link" href="{{ route('motorcycles.index') }}">Motorcycles List</a>
                            </li>
                            @can('create', App\Models\Motorcycle::class)
                                <li>
                                    <a class="tp-link" href="{{ route('motorcycles.create') }}">Add Motorcycle</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>

                @can('manage-categories')
                    <li>
                        <a href="#sidebarCategories" data-bs-toggle="collapse">
                            <span class="nav-icon"><iconify-icon icon="solar:widget-add-bold-duotone"></iconify-icon></span>
                            <span>Categories</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarCategories">
                            <ul class="nav-second-level">
                                <li>
                                    <a class="tp-link" href="{{ route('categories.index') }}">Categories List</a>
                                </li>
                                <li>
                                    <a class="tp-link" href="{{ route('categories.create') }}">Add Category</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endcan

                @can('manage-services')
                    <li>
                        <a href="#sidebarServices" data-bs-toggle="collapse">
                            <span class="nav-icon"><iconify-icon icon="solar:case-round-bold-duotone"></iconify-icon></span>
                            <span>Services</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarServices">
                            <ul class="nav-second-level">
                                <li>
                                    <a class="tp-link" href="{{ route('services.index') }}">Services List</a>
                                </li>
                                <li>
                                    <a class="tp-link" href="{{ route('services.create') }}">Add Service</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endcan

                <li>
                    <a href="{{ route('enquiries.index') }}">
                        <span class="nav-icon">
                            <iconify-icon icon="solar:chat-line-bold-duotone"></iconify-icon>
                        </span>
                        <span>Enquiries</span>
                    </a>
                </li>

            </ul>
        </div>

        <div class="clearfix"></div>

    </div>
    <p class="sidebar-footer">
        Powered by <br>
        <span class="fw-bold">Ahmed Fawzi</span>
    </p>
</div>
