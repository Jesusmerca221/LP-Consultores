<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('L&P Consultores') }} | @yield('titulo') </title>
    <link rel="shortcut icon" href="{{ asset('dist/img/favicon.png') }}">
    @yield('css')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.6/sweetalert2.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('dist/img/favicon.png') }}" alt="LPLogo" height="60"
                width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user-circle text-big">&nbsp;&nbsp; {{ Auth::user()->nombres }} </i>&nbsp;<i
                            class="fas fa-caret-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">{{ Auth::user()->nombres }} &nbsp;&nbsp;
                            @if (Auth::user()->hasRole('Administrador'))
                                <span class="right badge badge-success"> {{ __('Admin') }} </span>
                            @endif
                            @if (Auth::user()->hasRole('Estudiante'))
                                <span class="right badge badge-success"> {{ __('Estudiante') }} </span>
                            @endif
                        </span>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('profile.edit') }}" class="dropdown-item">
                            <i class="fas fa-user-circle mr-2"></i> {{ __('Ver perfil') }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i> {{ __('Salir') }}
                        </a>
                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                            @csrf
                        </form>
                    </div>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @if (Auth::user()->hasRole('Administrador'))
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
        @endif
        @if (Auth::user()->hasRole('Estudiante'))
            <aside class="main-sidebar sidebar-light-success elevation-4">
        @endif
        <!-- Brand Logo -->
        <span class="brand-link">
            <img style="margin-right: 0;" src="{{ asset('dist/img/favicon.png') }}" alt="AdminLTE Logo"
                class="brand-image img-circle" style="opacity: .8">
            @if (Auth::user()->hasRole('Administrador'))
                <span class="brand-text font-weight-light">
                    <img src="{{ asset('dist/img/logo-letras.png') }}" alt="L&P Consultores"
                        style="width: 70%;"></span>
            @endif
            @if (Auth::user()->hasRole('Estudiante'))
                <span class="brand-text font-weight-light"><img src="{{ asset('dist/img/logo-letras-negra.pn') }}g"
                        alt="L&P Consultores" style="width: 70%;"></span>
            @endif

        </span>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            @if (Auth::user()->hasRole('Administrador'))
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <span class="text-light d-block">{{ Auth::user()->nombres }}</span>
                    </div>
                </div>
            @endif
            @if (Auth::user()->hasRole('Estudiante'))
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('dist/img/user8-128x128.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <span class="text-muted d-block">{{ Auth::user()->nombres }}</span>
                    </div>
                </div>
            @endif

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link @yield('active-inicio')">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                {{ __('Inicio') }}
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">Opciones</li>
                    @if (Auth::user()->hasRole('Administrador'))
                        <li class="nav-item">
                            <a href="{{ route('Usuarios.index') }}" class="nav-link @yield('active-usuarios')">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    {{ __('Usuarios') }}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Noticias.index') }}" class="nav-link @yield('active-noticias')">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>
                                    {{ __('Noticias') }}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Clientes.index') }}" class="nav-link @yield('active-noticias')">
                            <i class="nav-icon fas fa-handshake"></i>
                                <p>
                                    {{ __('Clientes') }}
                                </p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="#" class="nav-link @yield('active-cursos')">
                                <i class="nav-icon fas fa-solid fa-landmark"></i>
                                <p>
                                    {{ __('Contabilidad') }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('Cuentas.index') }}" class="nav-link @yield('active-cursos-add')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Cuentas contables') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('Cursos.index') }}" class="nav-link @yield('active-cursos-show')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Mostrar') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./index3.html" class="nav-link @yield('active-cursos-temas')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Temas') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link @yield('active-capacitaciones')">
                                <i class="nav-icon fas fa-book-reader"></i>
                                <p>
                                    {{ __('Capacitaciones') }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('Capacitaciones.create') }}"
                                        class="nav-link @yield('active-capacitaciones-add')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Agregar') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('Capacitaciones.index') }}"
                                        class="nav-link @yield('active-capacitaciones-show')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Mostrar') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./index3.html" class="nav-link @yield('active-capacitaciones-temas')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Temas') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    @if (Auth::user()->hasRole('Estudiante'))
                        <li class="nav-item">
                            <a href="{{ route('Clientes.index') }}" class="nav-link @yield('active-cursos')">
                                <i class="nav-icon fas fa-handshake"></i>
                                <p>
                                    {{ __('Clientes') }}
                                </p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ route('Cuentas.index') }}" class="nav-link @yield('active-capacitaciones')">
                                <i class="nav-icon fas fa-solid fa-landmark"></i>
                                <p>
                                    {{ __('Cuentas contables') }}
                                </p>
                            </a>
                        </li>
                    @endif

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('tituloPage')</h1>
                        </div><!-- /.col -->
                        @yield('menu')
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            @yield('contenido')
            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2023</strong> L&P Consultores.
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.6/sweetalert2.min.js"></script>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    {{-- <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> --}}
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    @yield('js')
</body>

</html>
