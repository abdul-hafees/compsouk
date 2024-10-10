<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="bootstrap admin template">
<meta name="author" content="">

<title>@yield('title') | {{ config('app.name') }}</title>

<link rel="apple-touch-icon" href="{{ asset('assets/admin/images/favicon.png') }}">
<link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.png') }}">

<!-- Stylesheets -->
<link rel="stylesheet" href="{{ mix('assets/admin/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ mix('assets/admin/css/bootstrap-extend.css') }}">
<link rel="stylesheet" href="{{ mix('assets/admin/css/site.css') }}">

<!-- Plugins -->
<link rel="stylesheet" href="{{ asset('/vendor/animsition/animsition.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/asscrollable/asScrollable.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/switchery/switchery.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/intro-js/introjs.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/slidepanel/slidePanel.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/flag-icon-css/flag-icon.css') }}">

<link rel="stylesheet" href="{{ asset('/vendor/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.css') }}">

<link rel="stylesheet" href="{{ asset('/vendor/toastr/toastr.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/ladda/ladda.min.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/alertify/alertify.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/dropify/dropify.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/jquery-intlTelInput/css/intlTelInput.min.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/bootstrap-datepicker/bootstrap-datepicker.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/summernote/summernote.css') }}" />
<link rel="stylesheet" href="{{ asset('/vendor/summernote/summernote.css') }}" />
<link rel="stylesheet" href="{{ asset('/vendor/magnific-popup/magnific-popup.css') }}" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
@stack('css_vendor')

@stack('css')

<!-- Fonts -->
<link rel="stylesheet" href="{{ asset('/fonts/web-icons/web-icons.min.css') }}">
<link rel="stylesheet" href="{{ asset('/fonts/brand-icons/brand-icons.min.css') }}">
<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.0/croppie.css">
<style>
    .image-container {
        position: relative;
        display: inline-block;
    }

    .delete-icon {
        position: absolute;
        top: 60px;
        right: 60px;
        background-color: transparent;
        color: white;
        font-size: 23px;
        padding: 5px;
        cursor: pointer;
        visibility: hidden;
    }

    .image-container:hover .delete-icon {
        visibility: visible;
    }

    .view-icon {
        position: absolute;
        top: 60px;
        right: 80px;
        background-color: transparent;
        color: white;
        font-size: 23px;
        padding: 5px;
        cursor: pointer;
        visibility: hidden;
    }

    .image-container:hover .view-icon {
        visibility: visible;
    }
    .select2-dropdown {
        z-index: 0; /* Adjust the value as needed */
        position: relative !important;
    }
    .modal{
        z-index: 10000 !important;
    }
    .category-item {
        position: relative;
    }

    .horizontal-line {
        border-bottom: 1px solid #000; /* Adjust the color and style as needed */
        width: 32px;
        position: absolute;
        top: 20px;
        left: -16px;
        margin-top: auto;
        margin-bottom: auto;
    }
    /*.vertical-line {*/
    /*    position: absolute;*/
    /*    top: 20px;*/
    /*    left: 5px;*/
    /*    border-left: 1px solid #000; !* Adjust the color and style as needed *!*/
    /*    height: auto;*/
    /*    margin-right: 10px; !* Adjust the spacing as needed *!*/
    /*}*/
    .toggle-icon {
        cursor: pointer;
    }
</style>
@stack('fonts')

<!--[if lt IE 9]>
<script src="{{ asset('/vendor/html5shiv/html5shiv.min.js') }}"></script>
<![endif]-->

<!--[if lt IE 10]>
<script src="{{ asset('/vendor/media-match/media.match.min.js') }}"></script>
<script src="{{ asset('/vendor/respond/respond.min.js') }}"></script>
<![endif]-->

<!-- Scripts -->
<script src="{{ asset('/vendor/breakpoints/breakpoints.js') }}"></script>
<script>
  Breakpoints();
</script>
