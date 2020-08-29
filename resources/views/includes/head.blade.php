  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Orion admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="OrionMedical">
    <title>{{   $mycompany->legal_name }}</title>
    <link rel="apple-touch-icon" href="{{ asset('/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/app-assets/images/ico/favicon.ico')}}">
     {{-- <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet"> --}}
    {{-- <link rel="preload" href="{{ asset('/app-assets/fonts/masfont.woff2')}}" as="font" type="font/woff2" crossorigin="anonymous"> --}}

    <style>
      /* Roboto regular */

        @font-face {
            font-family: "Montserrat";
            src: url("/app-assets/fonts/Montserrat-Regular.eot");
            src: url("/app-assets/fonts/Montserrat-Regular.eot?#iefix") format('embedded-opentype'),
                url("/app-assets/fonts/Montserrat-Regular.woff2") format('woff2'),
                url("/app-assets/fonts/Montserrat-Regular.woff") format('woff'),
                url("/app-assets/fonts/Montserrat-Regular.ttf") format('truetype');
            font-weight: 400;
            font-style: normal;
        }

    </style>

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" href="{{ asset('/css/print.css')}}" type="text/css" media="print" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/extensions/tether-theme-arrows.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/extensions/tether.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/extensions/shepherd-theme-default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/ag-grid/ag-grid.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/ag-grid/ag-theme-material.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/plugins/extensions/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/extensions/toastr.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
  
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/plugins/forms/validation/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/pages/authentication.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/pages/invoice.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/plugins/forms/wizard.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/plugins/file-uploaders/dropzone.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/pages/data-list-view.css')}}">

    {{-- <link rel="stylesheet" href="{{ asset('/js/sweetalert.css')}}" type="text/css"/> --}}
    <link rel="stylesheet" href="{{ asset('/js/toastr/toastr.css')}}" type="text/css" />
    {{-- <link rel="stylesheet" href="{{ asset('/js/datepicker/datepicker.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/js/daterangepicker.css')}}" type="text/css" /> --}}
    <link rel="stylesheet" href="{{ asset('/js/datepicker/datepicker.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/js/daterangepicker.css')}}" type="text/css" />

 <!-- BEGIN: Vendor CSS-->
 <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/vendors.min.css')}}">
 <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/calendars/fullcalendar.min.css')}}">
 <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/calendars/extensions/daygrid.min.css')}}">
 <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/calendars/extensions/timegrid.min.css')}}">
 <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">
 <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/plugins/calendars/fullcalendar.css')}}">

</head>
<!-- END: Head-->