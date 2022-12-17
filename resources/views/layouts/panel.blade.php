<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('panel/plugins/fontawesome-free/css/all.min.css')}}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('panel/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('panel/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('panel/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('panel/dist/css/adminlte.min.css')}}">
    @yield('css')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="font-size: large"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user" style="font-size: large"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                        <i class="fas fa-arrow-alt-circle-right mr-2"></i>{{__('auth.logout')}}
                    </a>
                    <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">@csrf</form>
                </div>
            </li>
{{--            Expand screen button--}}
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt" style="font-size: large"></i>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link" style="text-decoration: none">
            <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    @if(Auth::user()->ProfilResim == null)
                        <img src="{{ asset('panel/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                    @else
                        <img src="{{ asset('panel-images').'/'.Auth::user()->ProfilResim}}" class="img-circle elevation-2" alt="User Image">
                    @endif
                </div>
                <div class="info">
                    <a href="" class="d-block" style="text-decoration: none">{{Auth::user()->name}}</a>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link {{request()->routeIs('home*') ? 'active' : ''}} ">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                             Anasayfa
                            </p>
                        </a>
                    </li>
            @role('Super-Admin')
                    <li class="nav-item">
                        <a  href="{{route('user.index')}}"  class="nav-link {{request()->routeIs('user.index*') ? 'active' : ''}} {{request()->routeIs('user.edit*') ? 'active' : ''}} {{request()->routeIs('user.edit*') }} {{request()->routeIs('register')}}">
                            <i class="nav-icon fas fa-user-alt"></i>
                            <p>
                                Kullanıcılar

                            </p>
                        </a>

                    </li>

                    <li class="nav-item">
                        <a  href="{{route('academic-year.index')}}"  class="nav-link {{request()->routeIs('academic-year.index*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-calendar"></i>
                            <p>
                                Akademik Sene

                            </p>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a  href="{{route('semesters.index')}}"  class="nav-link {{request()->routeIs('semesters.index*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-sign"></i>
                            <p>
                                Dönem

                            </p>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a  href="{{route('students.index')}}"  class="nav-link {{request()->routeIs('semesters.index*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-sign"></i>
                            <p>
                                Öğrenciler

                            </p>
                        </a>

                    </li>
           @endrole
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
 @yield('content')
    </div>
    <!-- /.content-wrapper -->


    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- Default to the left -->
        <strong>Copyright &copy; {{now()->year}}  {{config('app.name')}} </strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('panel/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('panel/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('panel/dist/js/adminlte.min.js')}}"></script>

<!-- DataTables  & Plugins -->
<script src="{{asset('panel/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('panel//plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('panel/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('panel/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('panel/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('panel/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('panel/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('panel/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('panel/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('panel/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('panel/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('panel/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('panel/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>

@stack('other-scripts')
</body>
</html>
