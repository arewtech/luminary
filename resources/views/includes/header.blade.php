<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
            <img class="rounded-circle"
                src="{{ setting('app_logo') !== null ? asset('storage/' . setting('app_logo')) : 'https://ui-avatars.com/api/?name=' . auth()->user()->name . '&color=7F9CF5&background=EBF4FF' }}"
                alt="">
            <span class="d-none d-lg-block">{{ setting('app_title', 'format PT') }}</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="get" action="">
            <input type="search" name="q" value="{{ request()->q }}" placeholder="Search"
                title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div>
    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span
                        class="badge bg-primary badge-number">{{ auth()->user()->unreadNotifications->count() }}</span>
                </a><!-- End Notification Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">
                        You have {{ auth()->user()->unreadNotifications->count() }} new notifications
                        <a href="{{ route('user.rent-logs.index', auth()->user()->username) }}">
                            <span class="badge rounded-pill bg-primary p-2 ms-2">View all</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    @foreach (auth()->user()->unreadNotifications as $notification)
                        @if (url()->current() == route('user.rent-logs.index', auth()->user()->username))
                            <a href="{{ $notification->data['url'] }}">
                            @elseif (Route::current()->getName() == 'user.rent-logs.show')
                                <a href="{{ $notification->data['id'] }}">
                                @else
                                    <a href="{{ auth()->user()->username . '/' . $notification->data['url'] }}">
                        @endif
                        <li class="notification-item">
                            <i
                                class="bi {{ $notification->data['status'] == 'returned' ? 'bi-check-circle text-success' : ($notification->data['status'] == 'not returned' ? 'bi-journal-check text-success' : 'bi-x-circle text-danger') }}"></i>
                            <div>
                                <h4 class="line-clamp-1 text-dark">{{ $notification->data['title'] }}</h4>
                                <p>{{ $notification->data['message'] }}</p>
                                <p>
                                    <small>{{ $notification->created_at->diffForHumans() }}</small>
                                </p>
                            </div>
                        </li>
                        </a>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    @endforeach
                    <li class="dropdown-footer">
                        <a href="{{ route('user.rent-logs.index', auth()->user()->username) }}">Show all
                            notifications</a>
                    </li>

                </ul>
                <!-- End Notification Dropdown Items -->

            </li>
            <!-- End Notification Nav -->


            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{ auth()->user()->image !== null ? asset('storage/' . auth()->user()->image) : 'https://ui-avatars.com/api/?name=' . auth()->user()->name . '&color=7F9CF5&background=EBF4FF' }}"
                        alt="Profile" class="rounded-circle">
                    <span
                        class="d-none d-md-block dropdown-toggle text-capitalize ps-2">{{ auth()->user()->username }}</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ auth()->user()->name }}</h6>
                        <span>{{ auth()->user()->role }}</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('profile') }}">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    @if (auth()->user()->role != 'user')
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('settings') }}">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    @endif


                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </form>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header>
