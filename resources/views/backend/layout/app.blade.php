<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        @php ($user = DB::table('users')->where('id', session()->get('Profile'))->first() )

        @php ($message = DB::table('messages')->where('status', '1')->get() )
        @php ($career_applies = DB::table('career_applies')->where('status', '2')->get() )

        <title>Cargo | @yield('title')</title>
        <link rel="icon" type="image/x-icon" href="{{asset('/')}}backend/assets/img/favicon.png">
        @toastr_css

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Toastr -->
        <link rel="stylesheet" href="{{asset('/')}}backend/assets/plugin/toastr/toastr.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{asset('/')}}backend/assets/plugin/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="{{asset('/')}}backend/assets/plugin/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="{{asset('/')}}backend/assets/plugin/datatables-buttons/css/buttons.bootstrap4.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        @yield('css')
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('/')}}backend/assets/css/adminlte.min.css">
        <link rel="stylesheet" href="{{asset('/')}}backend/assets/css/custom_style.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>

        <style>
            .form-control.is-invalid, .was-validated .form-control:invalid{
                background:none
            }
            tr, td{
                vertical-align:middle !important;
            }
            th{
                text-align:center
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
                    <li class="nav-item">
                        <a class="nav-link btn btn-success text-white text-uppercase" href="{{route('index')}}" role="button"> <i class="fas fa-globe" style="margin-right:7px"></i> Go to Website</a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" >
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge">{{count($message)+count($career_applies)}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header">{{count($message)+count($career_applies)}} Notifications</span>
                            <div class="dropdown-divider"></div>

                            @if( count($message) > 0)
                            <a href="{{route('admin.messages.inbox')}}" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> {{count($message)}} new messages
                            </a>
                            <div class="dropdown-divider"></div>
                            @endif

                            @if( count($career_applies) > 0)
                            <a href="{{route('admin.human.careers.index')}}" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> {{count($career_applies)}} new cv
                            </a>
                            <div class="dropdown-divider"></div>
                            @endif
                        </div>
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
                            <img class="img-circle elevation-2" src="{{asset('/')}}images/{{ Auth::user()->image == NULL ? 'icons/user.png' : Auth::user()->image }}" alt="user profile picture">
                        </div>
                        <div class="info">
                            <a href="{{route('admin.profile')}}" class="d-block text-capitalize">{{Auth::user()->name}}</a>
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
                            <li class="nav-item">
                                <a href="{{route('admin.orders.index')}}" class="nav-link @if(Request::segment(2) == 'orders') active @endif">
                                    <i class="nav-icon fas fa-file-alt"></i>
                                    <p> Orders Manager</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.cargo-requests.index')}}" class="nav-link @if(Request::segment(3) == 'cargo-request-index') active @endif">
                                    <i class="nav-icon fas fa-code-pull-request"></i>
                                    <p> Cargo Requests</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.cargo-requests.packages')}}" class="nav-link @if(Request::segment(3) == 'packages') active @endif">
                                    <i class="nav-icon fas fa-box"></i>
                                    <p> Packages </p>
                                </a>
                            </li>

                            <li class="nav-item @if(Request::segment(2) == 'scanners') menu-open @endif">
								<a href="#" class="nav-link  @if(Request::segment(2) == 'scanners') active @endif">
									<i class="nav-icon fa-solid fa-scanner"></i>
									<p>
										Scanners
										<i class="fas fa-angle-left right"></i>
                                        <span class="badge badge-info right">{{count($message) > 0 ? count($message) : ''}}</span>
									</p>
								</a>
								<ul class="nav nav-treeview">
                                    <li class="nav-item">
										<a href="{{route('admin.scanners.searchscan')}}" class="nav-link @if(Request::segment(3) == 'searchscan') active @endif">
											<i class="far fa-circle nav-icon"></i>
											<p>Search Scan</p>
                                            <span class="badge badge-info right">{{count($message) > 0 ? count($message) : ''}}</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="{{route('admin.scanners.facilityscan')}}" class="nav-link @if(Request::segment(3) == 'facilityscan') active @endif">
											<i class="far fa-circle nav-icon"></i>
											<p>Facility Scan</p>
                                            <span class="badge badge-info right">{{count($message) > 0 ? count($message) : ''}}</span>
										</a>
									</li>
                                    <li class="nav-item">
										<a href="{{route('admin.scanners.workerscan')}}" class="nav-link @if(Request::segment(3) == 'workerscan') active @endif">
											<i class="far fa-circle nav-icon"></i>
											<p>Courier Scan</p>
                                            <span class="badge badge-info right">{{count($message) > 0 ? count($message) : ''}}</span>
										</a>
									</li>
                                    <li class="nav-item">
										<a href="{{route('admin.scanners.measurement')}}" class="nav-link @if(Request::segment(3) == 'measurement') active @endif">
											<i class="far fa-circle nav-icon"></i>
											<p>Measurement</p>
                                            <span class="badge badge-info right">{{count($message) > 0 ? count($message) : ''}}</span>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item @if(Request::segment(2) == 'messages') menu-open @endif">
								<a href="#" class="nav-link  @if(Request::segment(2) == 'messages') active @endif">
									<i class="nav-icon far fa-envelope"></i>
									<p>
										Mailbox
										<i class="fas fa-angle-left right"></i>
                                        <span class="badge badge-info right">{{count($message) > 0 ? count($message) : ''}}</span>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="{{route('admin.messages.inbox')}}" class="nav-link @if(Request::segment(3) == 'inbox' || Request::segment(3) == 'settings') active @endif">
											<i class="far fa-circle nav-icon"></i>
											<p>Inbox</p>
                                            <span class="badge badge-info right">{{count($message) > 0 ? count($message) : ''}}</span>
										</a>
									</li>
								</ul>
							</li>
                            <li class="nav-header text-uppercase">Configurations</li>

                            <li class="nav-item @if(Request::segment(3) == 'cargo' || Request::segment(3) == 'domestic') menu-open @endif">
                                <a href="#" class="nav-link @if(Request::segment(3) == 'cargo' || Request::segment(3) == 'domestic') active @endif">
                                    <i class="nav-icon fas fa-truck-moving"></i>
                                    <p>Cargo Manager <i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('admin.companies.cargo')}}" class="nav-link @if(Request::segment(3) == 'cargo') active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Cargo Company</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.companies.domestic')}}" class="nav-link @if(Request::segment(3) == 'domestic') active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Domestic Cargo</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
							<li class="nav-item @if(Request::segment(2) == 'wardrobes') menu-open @endif">
                                <a href="#" class="nav-link @if(Request::segment(2) == 'wardrobes') active @endif">
                                    <i class="nav-icon fas fa-swatchbook"></i>
                                    <p>Wardrobes / Shelves<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('admin.wardrobes.index')}}" class="nav-link @if(Request::segment(3) == 'index') active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Wardrobes</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.wardrobes.shelves.index')}}" class="nav-link @if(Request::segment(3) == 'shelves') active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Shelves</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.warehouses.index')}}" class="nav-link @if(Request::segment(2) == 'warehouses') active @endif">
                                    <i class="nav-icon fas fa-warehouse"></i>
                                    <p> Warehouses </p>
                                </a>
                            </li>
                            <li class="nav-item @if(Request::segment(2) == 'payments') menu-open @endif">
                                <a href="#" class="nav-link @if(Request::segment(2) == 'payments') active @endif">
                                    <i class="nav-icon fas fa-credit-card"></i>
                                    <p>Payments<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('admin.payments.payments')}}" class="nav-link @if(Request::segment(3) == 'payments') active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Payments</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.payments.comissions')}}" class="nav-link @if(Request::segment(3) == 'comissions') active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Comissions</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.payments.balance')}}" class="nav-link @if(Request::segment(3) == 'balance') active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Balance</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.payments.moneyBackRequests')}}" class="nav-link @if(Request::segment(3) == 'moneyBackRequests') active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Money-Back requests</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('admin.services.index')}}" class="nav-link @if(Request::segment(2) == 'services') active @endif">
                                    <i class="nav-icon fab fa-servicestack"></i>
                                    <p> Additional Services </p>
                                </a>
                            </li>

                            <li class="nav-header text-uppercase">Site Settings</li>

							<li class="nav-item">
                                <a href="{{route('admin.faqs.index')}}" class="nav-link @if(Request::segment(2) == 'faqs') active @endif">
                                    <i class="nav-icon fas fa-question"></i>
                                    <p> FAQS </p>
                                </a>
                            </li>
                            <li class="nav-item @if(Request::segment(2) == 'branches') menu-open @endif">
								<a href="#" class="nav-link  @if(Request::segment(2) == 'branches') active @endif">
									<i class="nav-icon fas fa-university"></i>
									<p>
                                        Branches
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="{{route('admin.branches.index')}}" class="nav-link @if(Request::segment(3) == 'index') active @endif">
											<i class="far fa-circle nav-icon"></i>
											<p>List Branch</p>
										</a>
									</li>
                                    <li class="nav-item">
										<a href="{{route('admin.branches.create')}}" class="nav-link @if(Request::segment(3) == 'create') active @endif">
											<i class="far fa-circle nav-icon"></i>
											<p>Add Branch</p>
										</a>
									</li>
								</ul>
							</li>
                            <li class="nav-item @if(Request::segment(2) == 'human') menu-open @endif">
								<a href="#" class="nav-link  @if(Request::segment(2) == 'human') active @endif">
                                <i class="nav-icon fas fa-user-shield"></i>
									<p>
                                        Human Resources
										<i class="fas fa-angle-left right"></i>
                                        <span class="badge badge-info right">{{count($career_applies) > 0 ? count($career_applies) : ''}}</span>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="{{route('admin.human.careers.index')}}" class="nav-link @if(Request::segment(3) == 'careers') active @endif">
											<i class="far fa-circle nav-icon"></i>
											<p>Careers</p>
                                            <span class="badge badge-info right">{{count($career_applies) > 0 ? count($career_applies) : ''}}</span>
										</a>
									</li>
								</ul>
							</li>
                            <li class="nav-item">
                                <a href="{{route('admin.blogs.index')}}" class="nav-link @if(Request::segment(2) == 'blogs') active @endif">
                                    <i class="nav-icon fas fa-blog"></i>
                                    <p> Blogs </p>
                                </a>
                            </li>
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
        <!-- DataTables  & Plugins -->
        <script src="{{asset('/')}}backend/assets/plugin/datatables/jquery.dataTables.min.js"></script>
        <script src="{{asset('/')}}backend/assets/plugin/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{asset('/')}}backend/assets/plugin/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{asset('/')}}backend/assets/plugin/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="{{asset('/')}}backend/assets/plugin/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{asset('/')}}backend/assets/plugin/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="{{asset('/')}}backend/assets/plugin/jszip/jszip.min.js"></script>
        <script src="{{asset('/')}}backend/assets/plugin/pdfmake/pdfmake.min.js"></script>
        <script src="{{asset('/')}}backend/assets/plugin/pdfmake/vfs_fonts.js"></script>
        <script src="{{asset('/')}}backend/assets/plugin/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="{{asset('/')}}backend/assets/plugin/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="{{asset('/')}}backend/assets/plugin/datatables-buttons/js/buttons.colVis.min.js"></script>

        <script>
            $(function () {
                $("#example1").DataTable({
                    "responsive": false,
                    "lengthChange": false,
                    "autoWidth": true,
                    scrollY: '50vh',
                    scrollCollapse: true,
                    paging: false,
                    scrollX: true,
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
        </script>
        @yield('js')

        @toastr_js
        @toastr_render

        @livewireScripts

        <!-- AdminLTE App -->
        <script src="{{asset('/')}}backend/assets/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
    </body>
</html>
