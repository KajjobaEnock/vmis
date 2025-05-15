<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

    <!-- Sidebar header -->
    <div class="sidebar-section bg-black bg-opacity-10 border-bottom border-bottom-white border-opacity-10">
        <div class="sidebar-logo d-flex justify-content-center align-items-center">
            <a href="index" class="d-inline-flex align-items-center py-2">
                <span class="text-white fw-bold">VETERANS MIS</span>
            </a>

            <div class="sidebar-resize-hide ms-auto">
                <button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                    <i class="ph-arrows-left-right"></i>
                </button>

                <button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                    <i class="ph-x"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- /sidebar header -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" id="navbar-nav" data-nav-type="accordion">
                <li class="nav-item">
                    <a href="index" class="nav-link">
                        <i class="ph-house"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Veterans Management -->
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-user-list"></i>
                        <span>Veterans Management</span>
                    </a>
                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="{{ route('veterans.index') }}" class="nav-link">Veterans List</a></li>
                        <li class="nav-item"><a href="{{ route('ex-combatants.index') }}" class="nav-link">Ex Combants List</a></li>
                    </ul>
                </li>
                <!-- /Veterans Management -->

                <!-- Payments Management -->
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-money"></i>
                        <span>Payments Management</span>
                    </a>
                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="table_basic" class="nav-link">Payments List</a></li>
                    </ul>
                </li>
                <!-- /Payments Management -->

                <!-- Reports & Analytics Management -->
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-chart-line-up"></i>
                        <span>Reports & Analytics</span>
                    </a>
                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="" class="nav-link">Reports & Analytics</a></li>
                    </ul>
                </li>
                <!-- /Reports & Analytics Management -->

                <!-- Settings -->
                <li class="nav-item-header">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Settings</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-gear-six"></i>
                        <span>General Settings</span>
                    </a>
                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="{{ route('regions.index') }}" class="nav-link">Localization</a></li>
                        <li class="nav-item"><a href="{{ route('ranks.index) }}" class="nav-link">Army &amp; Ranks</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-users"></i>
                        <span>Users Management</span>
                    </a>
                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link">Users List</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Army &amp; Permissions List</a></li>
                    </ul>
                </li>
                <!-- /Settings -->

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
<!-- /main sidebar -->
