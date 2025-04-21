<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto align-items-center">
        <!-- User Info -->
        <li class="nav-item d-flex align-items-center">
            <div class="user-panel d-flex align-items-center">
                <div class="info">
                    <a href="#" class="d-block font-weight-bold text-white">
                        {{ auth()->user()->name }}
                    </a>
                </div>
            </div>
        </li>

        <!-- Logout Button -->
        <li class="nav-item ml-3">
            <a href="{{ route('logout') }}" class="nav-link text-white d-flex align-items-center">
                <i class="fas fa-sign-out-alt mr-1"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>

</nav>
