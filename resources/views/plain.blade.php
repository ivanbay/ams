<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Asset Management System | </title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}"/>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}"/>
        <!-- NProgress -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/nprogress/nprogress.css') }}"/>
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/iCheck/skins/flat/green.css') }}"/>
        <!-- bootstrap-daterangepicker -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.css') }}"/>
        <!-- Animate.css -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/animate.css/animate.min.css') }}"/>
        <!-- Switchery -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/switchery/dist/switchery.min.css') }}"/>
        <!-- Datetimepicker -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}"/>
        <!-- Select-bootstrap -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-select/css/bootstrap-select.css') }}"/>
        <!-- jquery-confirm -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-confirm/dist/jquery-confirm.min.css') }}"/>
        <!-- Datatables -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}"/>
        
        <!-- color picker  -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/colorpicker/1.2.3/css/pick-a-color-1.2.3.min.css') }}"/>
        
        <!-- tagsinput  -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}"/>
        
        <!-- Custom Theme Style -->
        <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css') }}"/>

        <!-- App Custom Style -->
        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}"/>
        
        {!! Notify::render() !!}
        
    </head>

    @yield('body')

    <!-- jQuery -->
    <script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('assets/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('assets/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- jQuery Sparklines -->
    <script src="{{ asset('assets/vendors/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('assets/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('assets/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('assets/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('assets/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('assets/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('assets/vendors/DateJS/build/date.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('assets/vendors/moment/min/moment.min.js') }}"></script>
    <!-- bootstrap-datetimerangepicker -->    
    <script src="{{ asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="{{ asset('assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- Switchery -->
    <script src="{{ asset('assets/vendors/switchery/dist/switchery.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('assets/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Select-bootstrap -->
    <script src="{{ asset('assets/vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <!-- validator -->
    <script src="{{ asset('assets/vendors/validator/validator.js') }}"></script>
    <!-- jquery-confirm -->
    <script src="{{ asset('assets/vendors/jquery-confirm/dist/jquery-confirm.min.js') }}"></script>
    <!-- Parsley -->
    <script src="{{ asset('assets/vendors/parsleyjs/dist/parsley.min.js') }}"></script>
    <!-- QRCode -->
    <script src="{{ asset('assets/vendors/qrcode/jquery.qrcode.js') }}"></script>
    <script src="{{ asset('assets/vendors/qrcode/qrcode.js') }}"></script>
    

    <!-- Datatables -->
    <script src="{{ asset('assets/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <!--<script src="{{ asset('assets/vendors/validator/validator.js') }}"></script>-->
    <script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    
    <!-- tagsinput -->
    <script src="{{ asset('assets/vendors/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js') }}"></script>
    
    <script src="{{ asset('assets/vendors/colorpicker/dependencies/tinycolor-0.9.15.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/colorpicker/1.2.3/js/pick-a-color-1.2.3.min.js') }}"></script>
    
    <!-- morris.js -->
    <script src="{{ asset('assets/vendors/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/morris.js/morris.min.js') }}"></script>
    
    <script src="{{ asset('assets/vendors/echarts/echarts.min.js') }}"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <!-- Custom -->
    <script src="{{ asset('assets/js/app.js') }}"></script>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        var APP_URL = {!! json_encode(url('/')) !!}

        $('#datepicker').datetimepicker({
            format: 'DD.MM.YYYY'
        });
        
        $('#assetListTable').DataTable({
            "order": [[9, "desc"]]
        });
        
        $(".pick-a-color").pickAColor();
        
        init_morris_chart();
        init_echart();
    </script>

</html>