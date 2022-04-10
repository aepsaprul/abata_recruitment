<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('public/themes/dist/img/logo-daun.png') }}" rel="icon" type="image/x-icon">
    <title>{{ config('app.name', 'HO') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{ asset('public/themes/plugins/font-google/font-google.css') }}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('public/themes/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/themes/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand">
                <img src="{{ asset('public/assets/logo-biru.png') }}" alt="AdminLTE Logo" class="brand-image">
                <span class="brand-text font-weight-light">Abata</span>
            </a>

            <!-- Right navbar links -->
            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item">
                    <a href="#" class="btn btn-outline-primary" style="width: 100px;">Register</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="btn bg-gradient-primary ml-3" style="width: 100px;">Login</a>
                </li>
            </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">

            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                                <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                    <div class="row">
                                        <div class="d-flex justify-content-between">
                                            <div class="col-3">
                                                <img src="{{ asset('public/assets/maskot.png') }}" alt="maskot" style="max-width: 100%;">
                                            </div>
                                            <div>
                                                <table style="height: 100%;">
                                                    <tbody>
                                                        <tr>
                                                            <td class="align-middle">
                                                                <h1 class="text-uppercase font-weight-bold p-2 selamatdatang text-center">selamat datang</h1>
                                                                <p>Saat ini kami membutuhkan tenaga kerja sebagai berikut:</p>
                                                                <ol class="pl-3">
                                                                    @foreach ($current_lokers as $item)
                                                                        <li class="brand-text font-weight-light">{{ $item->masterJabatan->nama_jabatan }}</li>
                                                                    @endforeach
                                                                </ol>
                                                                <p class="p-0 m-0">Punya Akun / sudah daftar sebelumnya?</p>
                                                                <ul class="pl-3 pt-0 pr-0 pb-0 m-0">
                                                                    <li class="brand-text font-weight-light">Silahkan Login</li>
                                                                </ul>
                                                                <p class="p-0 m-0">Baru daftar?</p>
                                                                <ul class="pl-3 pt-0 pr-0 pb-0 m-0">
                                                                    <li class="brand-text font-weight-light">Silahkan Register</li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                  </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('public/themes/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/themes/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/themes/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
