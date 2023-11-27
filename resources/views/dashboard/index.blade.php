@extends('layouts.app', ['title' => 'Dashboard'])
@section('content')
    <main id="main" class="main">

        <!-- ======= Page Title ======= -->
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    {{-- <li class="breadcrumb-item"><a href="index.html">chuask</a></li> --}}
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section dashboard">
            <!-- Left side columns -->
            <div class="row">

                <!-- books Card -->
                <div class="col-xxl-3 col-md-6 col-lg-3">
                    <div class="card info-card sales-card">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li><a class="dropdown-item" href="{{ route('book-list') }}">View Details</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Books <span>| Total</span></h5>

                            <div class="d-flex align-items-center">
                                <div style="width: 60px; height: 60px;"
                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-book fs-3"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $books }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Data Books</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Sales Card -->

                @if (auth()->user()->role == 'user')
                    <!-- books Card -->
                    <div class="col-xxl-3 col-md-6 col-lg-3">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li><a class="dropdown-item"
                                            href="{{ route('user.rent-logs.index', auth()->user()->username) }}">View
                                            Details</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Rent Logs <span>| Total</span></h5>

                                <div class="d-flex align-items-center">
                                    <div style="width: 60px; height: 60px;"
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person-lines-fill fs-3"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $rentLogUser }}</h6>
                                        <span class="text-muted small pt-2 ps-1">Rent Logs</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Sales Card -->

                    <!-- books Card -->
                    <div class="col-xxl-3 col-md-6 col-lg-3">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li><a class="dropdown-item"
                                            href="{{ route('user.rent-logs.index', auth()->user()->username) }}">View
                                            Details</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Book Rent <span>| Total</span></h5>

                                <div class="d-flex align-items-center">
                                    <div style="width: 60px; height: 60px;"
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-calendar-day fs-3"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $userNotReturned }}</h6>
                                        <span class="text-muted small pt-2 ps-1">Not Returned</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-3 col-md-6 col-lg-3">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Fines <span>| Total</span></h5>

                                <div class="d-flex align-items-center">
                                    <div style="width: 60px; height: 60px;"
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-credit-card-2-front fs-3"></i>
                                    </div>
                                    <div class="ps-3">
                                        <span class="fw-bold d-block">{{ formatRupiah($userFines) }}</span>
                                        <span class="text-muted small pt-2 ps-1">Total</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Revenue Card -->
                @endif

                @if (auth()->user()->role != 'user')
                    <!-- Revenue Card -->
                    <div class="col-xxl-3 col-md-6 col-lg-3">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Revenue <span>| Complete</span></h5>

                                <div class="d-flex align-items-center">
                                    <div style="width: 60px; height: 60px;"
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-bank fs-3"></i>
                                    </div>
                                    <div class="ps-3">
                                        <span class="fw-bold d-block">{{ formatRupiah($totalFines) }}</span>
                                        <span class="text-muted small pt-2 ps-1">Total</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Revenue Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-3 col-md-6 col-lg-3">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Revenue <span>| This Week</span></h5>

                                <div class="d-flex align-items-center">
                                    <div style="width: 60px; height: 60px;"
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-credit-card-2-front fs-3"></i>
                                    </div>
                                    <div class="ps-3">
                                        <span class="fw-bold d-block">{{ formatRupiah($totalSubWeekFines) }}</span>
                                        <span class="text-muted small pt-2 ps-1">Total</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Revenue Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-3 col-md-6 col-lg-3">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li><a class="dropdown-item" href="{{ route('users.index') }}">View Details</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Users <span>| Core</span></h5>

                                <div class="d-flex align-items-center">
                                    <div style="width: 60px; height: 60px;"
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people fs-3"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $users }}</h6>
                                        <span class="text-muted small pt-2 ps-1">Data Users</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Revenue Card -->
                @endif
            </div>
            <!-- End Left side columns -->

            @if (auth()->user()->role != 'user')
                <div class="row">
                    <div class="col-lg-7">
                        <!-- Website Traffic -->
                        <div class="card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li><a class="dropdown-item" href="{{ route('rent-logs.index') }}">View Details</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">Main Traffic <span>| Core</span></h5>

                                <div style="min-height: 300px;">
                                    {{ $rentLogsChart->container() }}
                                </div>

                            </div>
                        </div>
                        <!-- End Website Traffic -->
                    </div>

                    <div class="col-lg-5">

                        <!-- Recent Activity -->
                        <div class="card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li><a class="dropdown-item" href="{{ route('rent-logs.index') }}">View Details</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Recent Activity <span>| Today</span></h5>

                                <div class="activity">
                                    @forelse ($recentActivities as $item)
                                        <div class="activity-item d-flex">
                                            <div class="activite-label">
                                                {{ $item->created_at->shortRelativeDiffForHumans() }}
                                            </div>
                                            <i
                                                class='bi bi-circle-fill activity-badge align-self-start {{ $item->setColorActivity() }}'></i>
                                            <div class="activity-content text-capitalize">
                                                <a href="{{ route('rent-logs.show', $item->id) }}"
                                                    class="fw-bold">{{ $item->user->name }}</a>
                                                rent <span class="fw-bold text-dark">
                                                    {{ $item->book->title }}
                                                </span>
                                                book
                                            </div>
                                        </div>
                                        <!-- End activity item-->
                                    @empty
                                        <div class="activity-item d-flex">
                                            <div class="activite-label">0 sec</div>
                                            <i
                                                class='bi bi-circle-fill activity-badge text-secondary align-self-start'></i>
                                            <div class="activity-content">
                                                no activity
                                            </div>
                                    @endforelse
                                    <!-- End activity item-->

                                </div>

                            </div>
                        </div>
                        <!-- End Recent Activity -->

                    </div>
                </div>
            @else
                @if ($rentLogUser >= 1)
                    <!-- Right side columns -->
                    <div class="col">
                        <!-- Budget Report -->
                        <div class="card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('user.rent-logs.index', auth()->user()->username) }}">
                                            View Details</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">
                                    Rent Logs <span>| This Month</span>
                                    <div style="min-height: 300px;">
                                        <div id="lineChart"></div>
                                    </div>

                            </div>
                        </div>
                        <!-- End Budget Report -->
                    </div>
                    <!-- End Right side columns -->
                @endif
            @endif
        </section>

    </main>
    <script src="{{ $statusBooksChart->cdn() }}"></script>

    {{ $statusBooksChart->script() }}
    {{ $rentLogsChart->script() }}

    @push('chart')
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            var options = {
                series: [{
                    name: "Rent Logs",
                    data: @json($monthlyBookRentChart)
                }],
                chart: {
                    height: 410,
                    type: 'line',
                    zoom: {
                        enabled: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'straight'
                },
                title: {
                    text: 'Monthly Book Rent Chart',
                    align: 'left'
                },
                subtitle: {
                    text: 'Monthly Book Rent Chart in ' + new Date().getFullYear(),
                    align: 'left'
                },
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.5
                    },
                },
                xaxis: {
                    categories: @json($monthlyBookRentChartMonth),
                },
                yaxis: {
                    labels: {
                        formatter: function(val) {
                            return val.toFixed(0);
                            // return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#lineChart"), options);
            chart.render();
        </script>
    @endpush
@endsection
