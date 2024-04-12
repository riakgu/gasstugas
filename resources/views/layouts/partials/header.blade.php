<header>
    <nav class="navbar navbar-expand navbar-light navbar-top">
        <div class="container-fluid">
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3"></i>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-lg-0">
                    <li class="nav-item dropdown me-3">
                        <a class="nav-link active dropdown-toggle text-gray-600" href="#" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                            <i id="theme-icon" class='bi bi-sun bi-sub fs-4'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                            <li>
                                <a class="dropdown-item" href="#" id="theme-light">
                                    <i class="icon-mid bi bi-sun me-2"></i>
                                    Light
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" id="theme-dark">
                                    <i class="icon-mid bi bi-moon me-2"></i>
                                    Dark
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3">
                                <h6 class="mb-0 text-gray-600">{{ auth()->user()->name }}</h6>
                                <p class="mb-0 text-sm text-gray-600">
                                    @if(auth()->user()->hasRole('admin'))
                                        Administrator
                                    @elseif(auth()->user()->hasRole('user'))
                                        User
                                    @endif
                                </p>
                            </div>
                            <div class="user-img d-flex align-items-center">
                                <div class="avatar bg-secondary avatar-md">
                                    <span class="avatar-content">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                    <span class="avatar-status bg-success"></span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                        <li><a class="dropdown-item" href="/settings"><i class="icon-mid bi bi-gear me-2"></i>
                                Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
