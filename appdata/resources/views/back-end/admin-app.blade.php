<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
  <title>Mash Able Admin || @yield('title')</title>
  <!-- Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta name="description" content="#">
  <meta name="keywords"
    content="flat ui, Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
  <meta name="author" content="#">
  <!-- token   -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- token   -->
  <!-- Favicon icon -->
  <link rel="icon" href="{{asset('admin-assets/assets/images/favicon.ico')}}" type="image/x-icon">
  <!-- Google font-->
  <link href="https://fonts.googleapis.com/css?family=Mada:300,400,500,600,700" rel="stylesheet">
  <!-- Required Fremwork -->
  <link rel="stylesheet" type="text/css"
    href="{{asset('admin-assets/bower_components/bootstrap/css/bootstrap.min.css')}}">
  <!-- themify icon -->
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/icon/themify-icons/themify-icons.css')}}">
  <!-- ico font -->
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/icon/icofont/css/icofont.css')}}">
  <!-- flag icon framework css -->
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/icon/flag-icons/css/flag-icon.css')}}">
  <!--SVG Icons Animated-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/icon/SVG-animated/svg-weather.css')}}">
  <!-- Menu-Search css -->
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/pages/menu-search/css/component.css')}}">
  <!-- Select 2 css -->
  <link rel="stylesheet" href="{{asset('admin-assets/bower_components/select2/css/select2.min.css')}}" />
  <!-- Multi Select css -->
  <link rel="stylesheet" type="text/css"
    href="{{asset('admin-assets/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css')}}" />
  <link rel="stylesheet" type="text/css"
    href="{{asset('admin-assets/bower_components/multiselect/css/multi-select.css')}}" />
  <!-- Horizontal-Timeline css -->
  <link rel="stylesheet" type="text/css"
    href="{{asset('admin-assets/assets/pages/dashboard/horizontal-timeline/css/style.css')}}">
  <!-- amchart css -->
  <link rel="stylesheet" type="text/css"
    href="{{asset('admin-assets/assets/pages/dashboard/amchart/css/amchart.css')}}">
  <!-- Calender css -->
  <!-- <link rel="stylesheet" type="text/css" href="{{--asset('admin-assets/assets/pages/widget/calender/pignose.calendar.min.css')--}}"> -->
  <!-- flag icon framework css -->
  {{-- <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/pages/flag-icon/flag-icon.min.css')}}">
  --}}
  <!-- Style.css -->

  <!-- datatables -->
  <link rel="stylesheet" type="text/css"
    href="{{asset('admin-assets/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css"
    href="{{asset('admin-assets/assets/pages/data-table/css/buttons.dataTables.min.css')}}">
  <link rel="stylesheet" type="text/css"
    href="{{asset('admin-assets/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">

  <!-- datatables -->
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/css/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/css/custom.css')}}">
  <!--color css-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/css/linearicons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/css/simple-line-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/css/ionicons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/css/jquery.mCustomScrollbar.css')}}">

  @yield('style')
</head>

<body>
  <div id="snackbar">Some text some message..</div>
  <!-- Pre-loader start -->
  <div class="theme-loader">
    <div class="ball-scale">
      <div></div>
    </div>
  </div>
  <!-- Pre-loader end -->
  <!-- Menu header start -->
  <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
      @include('back-end.inc.admin-header')
      <!-- Sidebar chat start -->
      <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
          @include('back-end.inc.admin-sidebar')
          @yield('content')
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="{{asset('admin-assets/bower_components/jquery/js/jquery.min.js')}}"></script>
  <script src="{{asset('admin-assets/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('admin-assets/bower_components/popper.js/js/popper.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('admin-assets/bower_components/bootstrap/js/bootstrap.min.js')}}">
  </script>
  <!-- jquery slimscroll js -->
  <script type="text/javascript"
    src="{{asset('admin-assets/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>
  <!-- modernizr js -->
  <script type="text/javascript" src="{{asset('admin-assets/bower_components/modernizr/js/modernizr.js')}}"></script>
  <script type="text/javascript" src="{{asset('admin-assets/bower_components/modernizr/js/css-scrollbars.js')}}">
  </script>
  <!-- Calender js -->
  <!-- <script type="text/javascript" src="{{asset('admin-assets/bower_components/moment/js/moment.min.js')}}"></script> -->
  <!-- <script type="text/javascript" src="{{asset('admin-assets/assets/pages/widget/calender/pignose.calendar.min.js')}}"></script> -->
  <!-- classie js -->

  <!-- c3 chart js -->
  <script src="{{asset('admin-assets/bower_components/c3/js/c3.js')}}"></script>
  <script type="text/javascript" src="{{asset('admin-assets/bower_components/classie/js/classie.js')}}"></script>
  <!-- knob js -->

  <!-- validation -->
  <script src="{{asset('admin-assets/assets/ajax/libs/underscore.js/1.8.3/underscore-min.js')}}"></script>
  <script src="{{asset('admin-assets/assets/ajax/libs/moment.js/2.10.6/moment.min.js')}}"></script>
  <script src="{{asset('admin-assets/assets/pages/form-validation/validate.js')}}" type="text/javascript"></script>
  <!-- validation -->

  <script src="{{asset('admin-assets/assets/pages/chart/knob/jquery.knob.js')}}"></script>
  <script type="text/javascript" src="{{asset('admin-assets/assets/pages/widget/jquery.sparkline.js')}}"></script>
  <!-- Rickshow Chart js -->
  <script src="{{asset('admin-assets/bower_components/d3/js/d3.js')}}"></script>
  <script src="{{asset('admin-assets/bower_components/rickshaw/js/rickshaw.js')}}"></script>
  <!-- Morris Chart js -->
  <script src="{{asset('admin-assets/bower_components/raphael/js/raphael.min.js')}}"></script>
  <script src="{{asset('admin-assets/bower_components/morris.js/js/morris.js')}}"></script>
  <!-- Float Chart js -->
  <script src="{{asset('admin-assets/assets/pages/chart/float/jquery.flot.js')}}"></script>
  <script src="{{asset('admin-assets/assets/pages/chart/float/jquery.flot.categories.js')}}"></script>
  <script src="{{asset('admin-assets/assets/pages/chart/float/jquery.flot.pie.js')}}"></script>
  <!-- Horizontal-Timeline js -->
  <script type="text/javascript" src="{{asset('admin-assets/assets/pages/dashboard/horizontal-timeline/js/main.js')}}">
  </script>
  <!-- amchart js -->
  <script type="text/javascript" src="{{asset('admin-assets/assets/pages/dashboard/amchart/js/amcharts.js')}}"></script>
  <script type="text/javascript" src="{{asset('admin-assets/assets/pages/dashboard/amchart/js/serial.js')}}"></script>
  <script type="text/javascript" src="{{asset('admin-assets/assets/pages/dashboard/amchart/js/light.js')}}"></script>
  <script type="text/javascript" src="{{asset('admin-assets/assets/pages/dashboard/amchart/js/custom-amchart.js')}}">
  </script>
  <!-- i18next.min.js -->
  <script type="text/javascript" src="{{asset('admin-assets/bower_components/i18next/js/i18next.min.js')}}"></script>
  <script type="text/javascript"
    src="{{asset('admin-assets/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js')}}"></script>
  <script type="text/javascript"
    src="{{asset('admin-assets/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js')}}">
  </script>
  <script type="text/javascript"
    src="{{asset('admin-assets/bower_components/jquery-i18next/js/jquery-i18next.min.js')}}"></script>
  <!-- Select 2 js -->
  <script type="text/javascript" src="{{asset('admin-assets/bower_components/select2/js/select2.full.min.js')}}">
  </script>
  <!-- Multiselect js -->
  <script type="text/javascript"
    src="{{asset('admin-assets/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js')}}">
  </script>
  <script type="text/javascript" src="{{asset('admin-assets/bower_components/multiselect/js/jquery.multi-select.js')}}">
  </script>
  <script type="text/javascript" src="{{asset('admin-assets/assets/js/jquery.quicksearch.js')}}"></script>
  <!-- Custom js -->
  <script type="text/javascript" src="{{asset('admin-assets/assets/pages/dashboard/custom-dashboard.js')}}"></script>
  <script type="text/javascript" src="{{asset('admin-assets/assets/js/script.js')}}"></script>
  <script type="text/javascript" src="{{asset('admin-assets/assets/pages/advance-elements/select2-custom.js')}}">
  </script>

  <!-- pcmenu js -->
  <script src="{{asset('admin-assets/assets/js/pcoded.min.js')}}"></script>
  <script src="{{asset('admin-assets/assets/js/demo-12.js')}}"></script>
  <script src="{{asset('admin-assets/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
  <script src="{{asset('admin-assets/assets/js/jquery.mousewheel.min.js')}}"></script>
  <!-- datatable -->
  <script src="{{asset('admin-assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('admin-assets/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('admin-assets/assets/pages/data-table/js/jszip.min.js')}}"></script>
  <script src="{{asset('admin-assets/assets/pages/data-table/js/pdfmake.min.js')}}"></script>
  <script src="{{asset('admin-assets/assets/pages/data-table/js/vfs_fonts.js')}}"></script>
  <script src="{{asset('admin-assets/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{asset('admin-assets/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('admin-assets/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('admin-assets/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}">
  </script>
  <script
    src="{{asset('admin-assets/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}">
  </script>
  <!-- datatable -->
  <script src="{{asset('admin-assets/assets/pages/form-validation/form-validation.js')}}" type="text/javascript">
  </script>
  <script type="text/javascript" src="{{asset('admin-assets/assets/pages/flag-icons.js')}}"></script>
  <script type="text/javascript" src="{{ asset('admin-assets/assets/js/BsMultiSelect.js') }}"></script>
  <script src="{{asset('admin-assets/assets/js/custom.js')}}"></script>


  @yield('script')
</body>

</html>