<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TecTrain - Assessment Center</title>




    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}


    <link rel="stylesheet" href="{{ url('css/plugins/datapicker/datepicker3.css') }}">
    <link rel="stylesheet" href="{{ url('css/plugins/dataTables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/animate.css') }}">
    <link rel="stylesheet" href="{{ url('css/sweetalert.css ') }}">
    <link rel="stylesheet" href="{{ url('css/style.css ') }}">



    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    @include("layouts._header")

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


    <script src="{{ url('js/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ url('js/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ url('js/jquery.validate.js') }}"></script>
    <script src="{{ url('js/sweetalert.min.js') }}"></script>

    <script src="{{ url('js/timeago/jquery.timeago.js') }}"></script>

    <!-- Nestable List -->
    <script src="{{ url('js/nestable/jquery.nestable.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ url('js/dataTables/datatables.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ url('js/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Input Mask-->
    <script src="{{ url('js/jquerymask/jquery.mask.min.js') }}"></script>

    <!-- EayPIE -->
    <script src="{{ url('js/Chart.min.js') }}"></script>

     
     <!-- Data picker -->
    <script src="{{ url('js/datapicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ url('js/datapicker/bootstrap-datepicker.pt-BR.min.js') }}"></script>


     <!-- Date range use moment.js same as full calendar plugin -->
     <script src="{{ url('js/fullcalendar/moment.min.js') }}"></script>

     
     <!-- slickgrid -->
     <script src="{{ url('js/slickgrid/jquery.event.drag-2.2.js') }}"></script>

     <script src="{{ url('js/slickgrid/slick.core.js') }}"></script>
     <script src="{{ url('js/slickgrid/slick.dataview.js') }}"></script>
     <script src="{{ url('js/slickgrid/plugins/slick.cellrangedecorator.js') }}"></script>
     <script src="{{ url('js/slickgrid/plugins/slick.cellrangeselector.js') }}"></script>
     <script src="{{ url('js/slickgrid/plugins/slick.cellselectionmodel.js') }}"></script>
     <script src="{{ url('js/slickgrid/slick.formatters.js') }}"></script>
     <script src="{{ url('js/slickgrid/slick.editors.js') }}"></script>

     <script src="{{ url('js/slickgrid/slick.grid.js') }}"></script>

     <!-- Custom and plugin javascript -->
     <script src="{{ url('js/inspinia.js') }}"></script>
     <script src="{{ url('js/pace/pace.min.js') }}"></script>
    
    @yield('scripts')
    
</body>
</html>
