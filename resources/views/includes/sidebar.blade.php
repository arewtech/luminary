<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link
            {{ request()->url('/dashboard') == url('/dashboard') ? '' : 'collapsed' }}"
                href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->

        <li class="nav-heading">Main</li>

        <!-- List Books Page Nav -->
        <li class="nav-item">
            <a class="nav-link {{ request()->url('/list-books') == url('/list-books') ? '' : 'collapsed' }}"
                href="{{ route('list-books') }}">
                <i class="bi bi-card-list"></i>
                <span>List Books</span>
            </a>
        </li>
        <!-- End List Books Page Nav -->

        @if (auth()->user()->role == 'user')
            <!-- List Books Page Nav -->
            <li class="nav-item">
                <a class="nav-link
                {{ url()->current() == route('user.rent-logs.index', auth()->user()->username) ? '' : 'collapsed' }}"
                    href="{{ route('user.rent-logs.index', auth()->user()->username) }}">
                    <i class="bi bi-person"></i>
                    <span class="text-capitalize">{{ auth()->user()->name }}</span>
                </a>
            </li>
            <!-- End List Books Page Nav -->
        @endif

        @if (auth()->user()->role != 'user')
            <!-- Books Page Nav -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('rent-logs*') ? '' : 'collapsed' }}"
                    href="{{ route('rent-logs.index') }}">
                    <i class="bi bi-person-lines-fill"></i>
                    <span>Rent Logs</span>
                </a>
            </li>
            <!-- End Books Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ request()->url('/book-rent') == url('/book-rent') ? '' : 'collapsed' }}"
                    href="{{ route('book-rent.create') }}">
                    <i class="bi bi-calendar-day"></i>
                    <span>Book Rent</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ request()->url('/actual-return-date') == url('/actual-return-date') ? '' : 'collapsed' }}"
                    href="{{ route('actual-return-date.create') }}">
                    <i class="bi bi-calendar-check"></i>
                    <span>Actual Return</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-heading">FORM</li>


            <!-- Books Page Nav -->
            <li class="nav-item active">
                <a class="nav-link {{ request()->is('books*') ? '' : 'collapsed' }}"
                    href="{{ route('books.index') }}">
                    <i class="bi bi-book"></i>
                    <span>Books</span>
                </a>
            </li>
            <!-- End Books Page Nav -->

            <!-- Categories Page Nav -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('categories*') ? '' : 'collapsed' }}"
                    href="{{ route('categories.index') }}">
                    <i class="bi bi-layout-wtf"></i>
                    <span>Categories</span>
                </a>
            </li>
            <!-- End Categories Page Nav -->

            <!-- Users Page Nav -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('operator*') ? '' : 'collapsed' }}"
                    href="{{ route('operator.index') }}">
                    <i class="bi bi-person-check"></i>
                    <span>Operator</span>
                </a>
            </li>
            <!-- End Users Page Nav -->

            <!-- Users Page Nav -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('users*') ? '' : 'collapsed' }}"
                    href="{{ route('users.index') }}">
                    <i class="bi bi-people-fill"></i>
                    <span>Users</span>
                </a>
            </li>
            <!-- End Users Page Nav -->
        @endif


    </ul>

</aside>
