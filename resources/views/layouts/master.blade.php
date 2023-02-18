@php
    $direction = (app()->getLocale() == 'ar')?'rtl':'ltr';
@endphp
    <!DOCTYPE html>
<html class="loading" lang="{{app()->getLocale()}}" data-textdirection="{{$direction}}">
<!-- BEGIN: Head-->
@php $direction = (app()->getLocale() == 'ar')?'-rtl':''; @endphp

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Task</title>
{{--    <link rel="apple-touch-icon" href="{{asset(auth()->user()->image)}}">--}}
{{--    <link rel="shortcut icon" type="image/x-icon" href="{{asset(auth()->user()->image)}}">--}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/vendors/css/vendors$direction.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/vendors/css/extensions/tether-theme-arrows.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/tether.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/vendors/css/extensions/shepherd-theme-default.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/editors/quill/katex.min.css">

    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/editors/quill/monokai-sublime.min.css">

    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/editors/quill/quill.snow.css">

    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/editors/quill/quill.bubble.css">

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css$direction/bootstrap.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css$direction/bootstrap-extended.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css$direction/colors.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css$direction/components.css")}}">
    @if(auth()->user()->theme == 'dark')
        <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css$direction/themes/dark-layout.css")}}">
        <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css$direction/themes/semi-dark-layout.css")}}">
    @endif

<!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{asset("app-assets/css$direction/core/menu/menu-types/vertical-menu.css")}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset("app-assets/css$direction/core/colors/palette-gradient.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css$direction/pages/dashboard-analytics.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css$direction/pages/card-analytics.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css$direction/plugins/tour/tour.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css$direction/pages/invoice.css")}}">
    <!-- END: Page CSS-->
    @yield('style')
<!-- BEGIN: Custom CSS-->
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" type="text/css" href="{{asset("app-assets/css-rtl/custom-rtl.css")}}">
    @endif
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/style.css")}}">
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" type="text/css" href="{{asset("assets/css/style$direction.css")}}">
@endif
<!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern dark-layout 2-columns  navbar-floating footer-static  "
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="dark-layout">

<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                    class="ficon feather icon-menu"></i></a></li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">

                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                class="ficon feather icon-maximize"></i></a></li>


                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                                                                   href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span
                                    class="user-name text-bold-600">{{\Auth::user()->name}}</span><span
                                    class="user-status">{{trans('sidebar.available')}}</span></div>
                            <span><img class="round" src="{{asset(\Auth::user()->image)}}" alt="{{\Auth::user()->name}}"
                                       height="40" width="40"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                    class="feather icon-power"></i> {{trans('sidebar.logout')}}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<ul class="main-search-list-defaultlist d-none">
    <li class="d-flex align-items-center"><a class="pb-25" href="#">
            <h6 class="text-primary mb-0">Files</h6>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
            class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="../../../app-assets/images/icons/xls.png" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing
                        Manager</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">&apos;17kb</small>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
            class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="../../../app-assets/images/icons/jpg.png" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd
                        Developer</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">&apos;11kb</small>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
            class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="../../../app-assets/images/icons/pdf.png" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital
                        Marketing Manager</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">&apos;150kb</small>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
            class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="../../../app-assets/images/icons/doc.png" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">&apos;256kb</small>
        </a></li>
    <li class="d-flex align-items-center"><a class="pb-25" href="#">
            <h6 class="text-primary mb-0">Members</h6>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
            class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="../../../app-assets/images/portrait/small/avatar-s-8.jpg" alt="png"
                                               height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
            class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="../../../app-assets/images/portrait/small/avatar-s-1.jpg" alt="png"
                                               height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd
                        Developer</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
            class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="../../../app-assets/images/portrait/small/avatar-s-14.jpg" alt="png"
                                               height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing
                        Manager</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
            class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="../../../app-assets/images/portrait/small/avatar-s-6.jpg" alt="png"
                                               height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                </div>
            </div>
        </a></li>
</ul>
<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer"><a
            class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start"><span class="mr-75 feather icon-alert-circle"></span><span>No results found.</span>
            </div>
        </a></li>
</ul>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mx-auto"><a class="navbar-brand" href="{{route('dashboard')}}">
                    <div class="brand-logo">
                        <img src="{{asset(auth()->user()->image)}}" class="img-thumbnail">
                        {{--                        <img src="{{asset('img/logo.png')}}" class="img-thumbnail">--}}
                    </div>
                    {{--                    <h2 class="brand-text mb-0">Vuexy</h2>--}}
                </a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content mt-3">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{(url()->current() == route('dashboard'))?'active':''}}"><a
                    href="{{route('dashboard')}}">
                    <i class="feather icon-home"></i>
                    <span
                        class="menu-title">Home</span></a></li>
            @can('view employees')
            <li class=" nav-item {{(url()->current() == route('users.index'))?'active':''}}"><a
                    href="{{route('users.index')}}">
                    <i class="feather icon-home"></i>
                    <span
                        class="menu-title">Employees</span></a></li>
            @endcan
            @can('view departments')
            <li class=" nav-item {{(url()->current() == route('departments.index'))?'active':''}}"><a
                    href="{{route('departments.index')}}">
                    <i class="feather icon-home"></i>
                    <span
                        class="menu-title">Departments</span></a></li>
            @endcan
            @can('view tasks')
            <li class=" nav-item {{(url()->current() == route('tasks.index'))?'active':''}}"><a
                    href="{{route('tasks.index')}}">
                    <i class="feather icon-home"></i>
                    <span
                        class="menu-title">Tasks</span></a></li>
            @endcan


        </ul>
    </div>
</div>
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Analytics Start -->
        @yield('content')
        <!-- Dashboard Analytics end -->

        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; {{date('Y')}}
            {{--            <a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent,</a>--}}
            All rights Reserved</span>
        <span class="float-md-right d-none d-md-block">Developed By <a
                href="https://awafi.sa/">Ahmed Farag</a></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="../../../app-assets/vendors/js/editors/quill/katex.min.js"></script>

<script src="../../../app-assets/vendors/js/editors/quill/highlight.min.js"></script>

<script src="../../../app-assets/vendors/js/editors/quill/quill.min.js"></script>
<script src="{{asset('app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/extensions/tether.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/extensions/shepherd.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('app-assets/js/core/app.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/components.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('app-assets/js/scripts/pages/dashboard-analytics.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/datatables/datatable.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/pages/invoice.js')}}"></script>
<script src="../../../app-assets/js/scripts/editors/editor-quill.js"></script>


<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $('.zero-configuration').DataTable({
        @if(app()->getLocale() == 'ar')
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Arabic.json'
        },
        @endif
    });


    @if(\Illuminate\Support\Facades\Session::has('message'))
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '{{\Illuminate\Support\Facades\Session::get('message')}}',
        showConfirmButton: false,
        timer: 1500
    });
    @endif
    @if(\Illuminate\Support\Facades\Session::has('error'))
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: '{{\Illuminate\Support\Facades\Session::get('error')}}',
        showConfirmButton: false,
        timer: 1500
    });
    @endif
    function fireDeleteEvent(id) {
        console.log(id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                );
                $('#form-' + id).submit();
            }
        })
    }//end fireDeleteEvent
</script>

<!-- END: Page JS-->
<script src="{{asset('assets/js/scripts.js')}}"></script>
@yield('script')

</body>
<!-- END: Body-->

</html>
