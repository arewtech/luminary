@extends('layouts.app')
@section('content')
    <main id="main" class="main">

        <!-- ======= Page Title ======= -->
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Books <span>| Total</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-book"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $books }}</h6>
                                            <span class="text-success small pt-1 fw-bold">12%</span> <span
                                                class="text-muted small pt-2 ps-1">increase</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Revenue <span>| This Month</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-credit-card-2-front"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h5 class="fw-bold">{{ formatRupiah($totalFines) }}</h5>
                                            <span class="text-success small pt-1 fw-bold">8%</span> <span
                                                class="text-muted small pt-2 ps-1">increase</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                    </div>
                    <div class="row">
                        <div class="col-xxl-4 col-md-6">
                            <!-- Budget Report -->
                            <div class="card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body pb-0">
                                    <h5 class="card-title">Status Books <span>| This Month</span></h5>

                                    <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                                                legend: {
                                                    data: ['Book is Available', 'Book is Unavailable']
                                                },
                                                radar: {
                                                    // shape: 'circle',
                                                    indicator: [{
                                                            name: 'Sales',
                                                            max: 6500
                                                        },
                                                        {
                                                            name: 'Administration',
                                                            max: 16000
                                                        },
                                                        {
                                                            name: 'Information Technology',
                                                            max: 30000
                                                        },
                                                        {
                                                            name: 'Customer Support',
                                                            max: 38000
                                                        },
                                                        {
                                                            name: 'Development',
                                                            max: 52000
                                                        },
                                                        {
                                                            name: 'Marketing',
                                                            max: 25000
                                                        }
                                                    ]
                                                },
                                                series: [{
                                                    name: 'Budget vs spending',
                                                    type: 'radar',
                                                    data: [{
                                                            value: [4200, 3000, 20000, 35000, 50000, 18000],
                                                            name: 'Book is Available'
                                                        },
                                                        {
                                                            value: [5000, 14000, 28000, 26000, 42000, 21000],
                                                            name: 'Book is Unavailable'
                                                        }
                                                    ]
                                                }]
                                            });
                                        });
                                    </script>

                                </div>
                            </div><!-- End Budget Report -->
                        </div>
                        <div class="col-xxl-4 col-md-6">
                            <!-- Website Traffic -->
                            <div class="card">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body pb-0">
                                    <h5 class="card-title">Main Traffic <span>| Today</span></h5>

                                    <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", () => {
                                            echarts.init(document.querySelector("#trafficChart")).setOption({
                                                tooltip: {
                                                    trigger: 'item'
                                                },
                                                legend: {
                                                    top: '5%',
                                                    left: 'center'
                                                },
                                                series: [{
                                                    name: 'Access From',
                                                    type: 'pie',
                                                    radius: ['40%', '70%'],
                                                    avoidLabelOverlap: false,
                                                    label: {
                                                        show: false,
                                                        position: 'center'
                                                    },
                                                    emphasis: {
                                                        label: {
                                                            show: true,
                                                            fontSize: '18',
                                                            fontWeight: 'bold'
                                                        }
                                                    },
                                                    labelLine: {
                                                        show: false
                                                    },
                                                    data: [{
                                                            value: 1048,
                                                            name: 'Search Engine'
                                                        },
                                                        {
                                                            value: 735,
                                                            name: 'Direct'
                                                        },
                                                        {
                                                            value: 580,
                                                            name: 'Email'
                                                        },
                                                        {
                                                            value: 484,
                                                            name: 'Union Ads'
                                                        },
                                                        {
                                                            value: 300,
                                                            name: 'Video Ads'
                                                        }
                                                    ]
                                                }]
                                            });
                                        });
                                    </script>

                                </div>
                            </div>
                            <!-- End Website Traffic -->
                        </div>
                    </div>

                </div>
                <!-- End Left side columns -->

                <!-- Right side columns -->
                <div class="col-lg-4">

                    <!-- Recent Activity -->
                    <div class="card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                    class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
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
                                            <a href="#" class="fw-bold text-dark">{{ $item->user->name }}</a>
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
                                        <i class='bi bi-circle-fill activity-badge text-secondary align-self-start'></i>
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
                <!-- End Right side columns -->

            </div>
        </section>

    </main>
@endsection
