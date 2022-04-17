<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @php ($user = DB::table('users')->where('id', session()->get('Profile'))->first() )

        <title>Cargo | @yield('title')</title>
        <link rel="icon" type="image/x-icon" href="{{asset('/')}}backend/assets/img/favicon.png">
        @toastr_css

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('/')}}backend/assets/plugin/toastr/toastr.min.css">
        <!-- Toastr -->
        <link rel="stylesheet" href="{{asset('/')}}backend/assets/plugin/fontawesome-free/css/all.min.css">
        @yield('css')
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('/')}}backend/assets/css/adminlte.min.css">        

        <style>
            .form-control.is-invalid, .was-validated .form-control:invalid{
                background:none
            }
        </style>
        @livewireStyles
    </head>
    <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{route('admin.dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">Home</a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" role="button">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge">15</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" role="button">
                            <i class="fas fa-cog"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" role="button">
                            <i class="far fa-question-circle"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" role="button">
                            <i class="fas fa-globe"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.logout')}}" role="button">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{route('admin.dashboard')}}" class="brand-link">
                    <img src="{{asset('/')}}backend/assets/img/favicon.png" alt="AdminLTE Logo" class="brand-image img-circle">
                    <span class="brand-text font-weight-light">Administration</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img class="img-circle elevation-2" src="{{asset('/')}}backend/assets/img/{{ Auth::guard('employee')->user()->image == NULL ? 'icons/user.png' : 'employees/'.Auth::guard('employee')->user()->image }}" alt="user profile picture">
                        </div>
                        <div class="info">
                            <a href="{{route('admin.profile')}}" class="d-block text-capitalize">{{Auth::guard('employee')->user()->name}}</a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="{{route('admin.dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">                                    
                                    <i class="nav-icon fas fa-home"></i>
                                    <p> Dashboard </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.users')}}" class="nav-link @if(Request::segment(2) == 'users') active @endif">                                    
                                    <i class="nav-icon fas fa-users"></i>
                                    <p> Users </p>
                                </a>
                            </li>
                            <li class="nav-item @if(Request::segment(2) == 'orders') menu-open @endif">
                                <a href="#" class="nav-link @if(Request::segment(2) == 'manuel') active @endif">
                                    <i class="nav-icon fas fa-truck"></i>
                                    <p>Orders Manager <i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('admin.orders.manuel')}}" class="nav-link @if(Request::segment(3) == 'manuel') active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Manuel Order</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.orders.bulk')}}" class="nav-link @if(Request::segment(3) == 'bulk') active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Bulk Order</p>
                                        </a>
                                    </li>
                                </ul>
                            </li> 
                            <li class="nav-header text-uppercase">Configurations</li>                                                                            
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>           
            
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>@yield('title')</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    @yield('breadcrumb')
                                    <li class="breadcrumb-item active">@yield('title')</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>                    
                </section>
            </div>
            <footer class="main-footer">
                <div class="float-right d-none d-sm-block"> <b>Version</b> 3.2.0 </div>
                <strong>Copyright &copy; 2022 <a target="_blank" href="https://deirvlon.com/az">Deirvlon MMC</a>.</strong> All rights reserved.
            </footer>
        </div>

        <!-- jQuery -->
        <script src="{{asset('/')}}backend/assets/plugin/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('/')}}backend/assets/plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Toastr -->
        <script src="{{asset('/')}}backend/assets/plugin/toastr/toastr.min.js"></script>
        @yield('js')
        <!-- AdminLTE App -->
        <script src="{{asset('/')}}backend/assets/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('/')}}backend/assets/js/demo.js"></script>        
        
        @toastr_js
        @toastr_render

        @livewireScripts
    </body>
</html>
