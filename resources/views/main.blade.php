@extends('plain')

@section('body')

<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            <!-- sidebar -->
            @include('partials/sidebar')  
            <!-- /sidebar -->

            <!-- top navigation -->
            @include('partials/topbar')
            <!-- /top navigation -->

            <!-- page content -->
            @yield('content-body')
            <!-- /page content -->

            <!-- footer content -->
            @include('partials/footer')
            <!-- /footer content -->
        </div>
    </div>
</body>

@endsection