<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="description" content="Web ini dibuat oleh Haris Tanone (ICT - 3827-0048)">
    <title>Home</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('admin_new/assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('admin_new/assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet"
        href="{{ url('admin_new/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ url('admin_new/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ url('admin_new/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin_new/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin_new/css/select2-bootstrap.css') }}">
    <meta name="csrf_token" content="{{ csrf_token() }}" id="token" />

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" id="klikx" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="logout" data-slide="true" href="#" role="button">
                        <i class="fas fa-power-off"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary bg-white elevation-3">
            <!-- Brand Logo -->
            <a href="{{ url('/admin/dashboard') }}" class="brand-link">
                <span class="brand-text font-weight-bold h2">TalentFinder</small>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    {{-- <div class="image">
                        <img src="{{ url('assets/img/user.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div> --}}
                    <div class="info">
                        <a href="#" class="d-block reset">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ url('admin/dashboard') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#!" class="nav-link">
                                <i class="nav-icon fas fa-database"></i>
                                <p>
                                    Master
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('admin/job') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lowongan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
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
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">@yield('menu')</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                @yield('konten')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <!-- ZGkgYnVhdCBvbGVoIEhhcmlzIFRhbm9uZSAoVGFub25laGFyaXNAZ21haWwuY29tKQ== -->
            <div class="float-right d-none d-sm-block">
                <b>{{ date('Y') }}</b>
            </div>
            <strong>Powered By JNCK</strong>
        </footer>
        {{-- modal reset password --}}
        <!-- Modal -->
        <div class="modal fade" id="reset-pw" tabindex="-1" data-backdrop="static" role="dialog"
            aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="data-form">
                            <input type="hidden" value="{{ \Auth::id() }}" id="user_id">
                            <input type="hidden" value="" id="idx" name="id">
                            <input type="hidden" value="" id="rolex" name="role">
                            @csrf
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="name" id="namex" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" id="emailx" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="passwordx" class="form-control">
                            </div>
                            <div class="modal-footer border-0">
                                <button type="submit" class="btn btn-outline-primary">
                                    <i class="fa fa-save"></i>
                                    Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- modal reset password --}}
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ url('admin_new/assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('admin_new/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('admin_new/assets/dist/js/adminlte.min.js') }}"></script>
    <!-- FLOT CHARTS -->
    <script src="{{ url('admin_new/assets/plugins/flot/jquery.flot.js') }}"></script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="{{ url('admin_new/assets/plugins/flot/plugins/jquery.flot.resize.js') }}"></script>
    <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
    <script src="{{ url('admin_new/assets/plugins/flot/plugins/jquery.flot.pie.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('admin_new/assets/dist/js/demo.js') }}"></script>
    <script src="{{ url('admin_new/assets/dist/js/sweetalert.min.js') }}"></script>
    {{-- <script src="{{ url('admin_new/assets/dist/js/lg.js') }}"></script> --}}
    <script src="{{ url('admin_new/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('admin_new/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('admin_new/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('admin_new/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('admin_new/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('admin_new/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('admin_new/assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ url('admin_new/assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ url('admin_new/assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ url('admin_new/assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('admin_new/assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('admin_new/assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ url('admin_new/assets/dist/js/pages/dashboard3.js') }}"></script>
    <script src="{{ url('admin_new/assets/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ url('admin_new/js/select2.min.js') }}"></script>
    <script src="{{ url('admin_new/assets/dist/js/moment.min.js') }}"></script>
    <script src="{{ url('admin_new/assets/dist/js/datetime.js') }}"></script>
    <script src="{{ url('admin_new/assets/dist/js/ellipsis.js') }}"></script>

    <!-- Page specific script -->
    @yield('script')
    <script>
        $(document).ready(function() {
            $('#logout').click(function(e) {
                e.preventDefault();
                swal({
                    title: "Logout",
                    text: "Are You Sure?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        // Create a form and submit it to the logout URL
                        var form = document.createElement('form');
                        form.method = 'POST';
                        form.action = '{{ route('logout') }}';
                        form.style.display = 'none';
                        var csrfToken = document.querySelector('meta[name="csrf_token"]').getAttribute('content');
                        var csrfField = document.createElement('input');
                        csrfField.setAttribute('type', 'hidden');
                        csrfField.setAttribute('name', '_token');
                        csrfField.setAttribute('value', csrfToken);
                        form.appendChild(csrfField);
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            });
            $('.reset').click(function(e) {
                e.preventDefault();
                $('#reset-pw').modal('show')
                $.get("{{ url('new/cari/') }}" + "/" + $('#user_id').val(),
                    function(data) {
                        console.log(data)
                        $('#idx').val(data.data.id)
                        $('#namex').val(data.data.name)
                        $('#emailx').val(data.data.email)
                        $('#rolex').val(data.role)
                    },
                    "json"
                );
            });
            $('#data-form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ url('new/update') }}",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(res) {
                        if (res.status == 200) {
                            swal({
                                title: "Success",
                                text: res.message,
                                icon: "success"
                            });
                            $('#reset-pw').modal('hide')
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>
