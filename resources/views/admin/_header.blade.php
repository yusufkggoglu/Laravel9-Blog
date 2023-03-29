<!-- partial:partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img
                    src="{{asset('assets')}}/admin/images/logo-mini.svg" alt="logo"/></a>
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-sort-variant"></span>
            </button>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <!-- messages -->
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown me-1">
                <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center"
                   id="messageDropdown" href="/admin/message">
                    <i class="mdi mdi-message-text mx-0"></i>
                    <span class="count"></span>
                </a>
            </li>
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                    <span class="nav-profile-name"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                   
                        <a href="{{route('admin_setting')}}" class="dropdown-item">
                            <i class="mdi mdi-settings text-primary"></i>
                            Ayarlar
                        </a>
                        <a href="{{route('logoutuser')}}" class="dropdown-item">
                            <i class="mdi mdi-logout text-primary"></i>
                            Çıkış
                        </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
<!-- partial -->
