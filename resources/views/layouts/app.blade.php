<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('includes.meta')
    <!-- end meta -->

    <!-- Template Basic CSS -->
    @include('includes.style')
    <!-- end style -->
</head>

<body>

    <!-- ======= Header ======= -->
    @include('includes.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('includes.sidebar')
    <!-- End Sidebar-->

    <!-- Main -->
    @yield('content')
    <!-- End #main -->


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    @include('includes.script')
    <!-- End Vendor JS Files -->
</body>

</html>
