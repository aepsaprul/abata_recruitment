@extends('layouts.app')

@section('style')

<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('public/themes/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/themes/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/themes/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section('content')

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
                    <div class="callout callout-info">
                        <span class="font-weight-light">Selamat Datang <strong class="text-uppercase"> {{ $LoggedUserInfo['name'] }} </strong>  </span>
                        <span class="font-weight-light float-right"> <strong class="text-danger"> Note: </strong> Lengkapi data Anda, sebelum mengirim lamaran pekerjaan</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="img-fluid img-circle"
                                    src="{{ asset('public/assets/no-image.jpg') }}"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">Nina Mcintire</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#biodata" data-toggle="tab">Biodata</a></li>
                                <li class="nav-item"><a class="nav-link" href="#pendidikan" data-toggle="tab">Pendidikan</a></li>
                                <li class="nav-item"><a class="nav-link" href="#penghargaan" data-toggle="tab">Penghargaan</a></li>
                                <li class="nav-item"><a class="nav-link" href="#organisasi" data-toggle="tab">Organisasi</a></li>
                                <li class="nav-item"><a class="nav-link" href="#riwayat_pekerjaan" data-toggle="tab">Riwayat Pekerjaan</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                {{-- biodata --}}
                                <div class="active tab-pane" id="biodata">
                                    <form id="biodata_form">

                                        {{-- id --}}
                                        <input type="hidden" id="id" value="{{ $LoggedUserInfo['email'] }}" name="id">

                                        <div class="row" id="biodata_data">
                                            {{-- data di jquery --}}
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button class="btn btn-primary btn-biodata-spinner d-none" disabled style="width: 130px;">
                                                    <span class="spinner-grow spinner-grow-sm"></span>
                                                    Loading...
                                                </button>
                                                <button class="btn btn-primary btn-biodata-save" style="width: 130px;"><i class="fas fa-save"></i> Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                {{-- pendidikan --}}
                                <div class="tab-pane" id="pendidikan">
                                    <form id="pendidikan_form">
                                        <div class="row">
                                            b
                                        </div>
                                    </form>
                                </div>
                                {{-- penghargaan --}}
                                <div class="tab-pane" id="penghargaan">
                                    <form id="penghargaan_form">
                                        <div class="row">
                                            c
                                        </div>
                                    </form>
                                </div>
                                {{-- organisasi --}}
                                <div class="tab-pane" id="organisasi">
                                    <form id="organisasi_form">
                                        <div class="row">
                                            c
                                        </div>
                                    </form>
                                </div>
                                {{-- riwayat_pekerjaan --}}
                                <div class="tab-pane" id="riwayat_pekerjaan">
                                    <form id="riwayat_pekerjaan_form">
                                        <div class="row">
                                            c
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<!-- DataTables  & Plugins -->
<script src="{{ asset('public/themes/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/themes/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/themes/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('public/themes/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/themes/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('public/themes/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/themes/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('public/themes/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('public/themes/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('public/themes/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('public/themes/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('public/themes/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script type="text/javascript">

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    // biodata
    biodata();
    function biodata() {
        let formData = {
            email: $('#id').val()
        }

        $.ajax({
            url: "{{ URL::route('profile.biodata') }}",
            type: 'post',
            data: formData,
            success: function(response) {
                console.log(response);
                var biodata_data = "" +
                    "<div class=\"col-lg-3 col-md-3 col-sm-12 col-12\">" +
                        "<div class=\"form-group\">" +
                            "<label for=\"nama_lengkap\" class=\"col-form-label col-form-label-sm\">Nama Lengkap</label>" +
                            "<input type=\"text\" class=\"form-control form-control-sm\" id=\"nama_lengkap\" name=\"nama_lengkap\" maxlength=\"50\" value=\"" + response.biodatas.nama_lengkap + "\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "<small id=\"error_nama_lengkap\" class=\"form-text text-danger font-italic\"></small>" +
                        "</div>" +
                    "</div>" +
                    "<div class=\"col-lg-3 col-md-3 col-sm-12 col-12\">" +
                        "<div class=\"form-group\">" +
                            "<label for=\"nama_panggilan\" class=\"col-form-label col-form-label-sm\">Nama Panggilan</label>" +
                            "<input type=\"text\" class=\"form-control form-control-sm\" id=\"nama_panggilan\" name=\"nama_panggilan\" maxlength=\"20\" value=\"" + response.biodatas.nama_panggilan + "\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "<small id=\"error_nama_panggilan\" class=\"form-text text-danger font-italic\"></small>" +
                        "</div>" +
                    "</div>" +
                    "<div class=\"col-lg-3 col-md-3 col-sm-12 col-12\">" +
                        "<div class=\"form-group\">" +
                            "<label for=\"jenis_kelamin\" class=\"col-form-label col-form-label-sm\">Jenis Kelamin</label>" +
                            "<select name=\"jenis_kelamin\" id=\"jenis_kelamin\" class=\"form-control form-control-sm\">" +
                                "<option value=\"\">-- Pilih Jenis Kelamin --</option>" +
                                "<option value=\"L\"";

                                if (response.biodatas.jenis_kelamin == 'L' ) {
                                    biodata_data += "selected";
                                }

                                biodata_data += ">L (Laki - laki)</option>";
                                biodata_data += "<option value=\"P\"";

                                if ( response.biodatas.jenis_kelamin == "P" ) {
                                    biodata_data += "selected";
                                }

                                biodata_data += ">P (Perempuan)</option>" +
                            "</select>" +
                            "<small id=\"error_jenis_kelamin\" class=\"form-text text-danger font-italic\"></small>" +
                        "</div>" +
                    "</div>" +
                    "<div class=\"col-lg-3 col-md-3 col-sm-12 col-12\">" +
                        "<div class=\"form-group\">" +
                            "<label for=\"nomor_ktp\" class=\"col-form-label col-form-label-sm\">Nomor KTP</label>" +
                            "<input type=\"number\" class=\"form-control form-control-sm\" id=\"nomor_ktp\" name=\"nomor_ktp\" maxlength=\"18\" value=\"" + response.biodatas.nomor_ktp + "\">" +
                            "<small id=\"error_nomor_ktp\" class=\"form-text text-danger font-italic\"></small>" +
                        "</div>" +
                    "</div>" +
                    "<div class=\"col-lg-3 col-md-3 col-sm-12 col-12\">" +
                        "<div class=\"form-group\">" +
                            "<label for=\"status_perkawinan\" class=\"col-form-label col-form-label-sm\">Status Perkawinan</label>" +
                            "<select name=\"status_perkawinan\" id=\"status_perkawinan\" class=\"form-control form-control-sm\">" +
                                "<option value=\"\">-- Pilih Status --</option>" +
                                "<option value=\"lajang\"";

                                if ( response.biodatas.status_perkawinan == "lajang" ) {
                                    biodata_data += "selected";
                                }

                                biodata_data += ">LAJANG</option>" +
                                "<option value=\"menikah\"";

                                if ( response.biodatas.status_perkawinan == "menikah" ) {
                                    biodata_data += "selected";
                                }

                                biodata_data += ">MENIKAH</option>" +
                                "<option value=\"cerai\"";

                                if ( response.biodatas.status_perkawinan == "cerai" ) {
                                    biodata_data += "selected";
                                }

                                biodata_data += ">CERAI</option>" +
                            "</select>" +
                            "<small id=\"error_status_perkawinan\" class=\"form-text text-danger font-italic\"></small>" +
                        "</div>" +
                    "</div>" +
                    "<div class=\"col-lg-3 col-md-3 col-sm-12 col-12\">" +
                        "<div class=\"form-group\">" +
                            "<label for=\"agama\" class=\"col-form-label col-form-label-sm\">Agama</label>" +
                            "<select name=\"agama\" id=\"agama\" class=\"form-control form-control-sm\">" +
                                "<option value=\"\">-- Pilih Agama --</option>" +

                                "<option value=\"islam\"";
                                if ( response.biodatas.agama == "islam" ) {
                                    biodata_data += "selected";
                                }
                                biodata_data += ">ISLAM</option>" +

                                "<option value=\"kristen\"";
                                if ( response.biodatas.agama == "kristen" ) {
                                    biodata_data += "selected";
                                }
                                biodata_data += ">KRISTEN</option>" +

                                "<option value=\"hindu\"";
                                if ( response.biodatas.agama == "hindu" ) {
                                    biodata_data += "selected";
                                }
                                biodata_data += ">HINDU</option>" +

                                "<option value=\"budha\"";
                                if ( response.biodatas.agama == "budha" ) {
                                    biodata_data += "selected";
                                }
                                biodata_data += ">BUDHA</option>" +

                            "</select>" +
                            "<small id=\"error_agama\" class=\"form-text text-danger font-italic\"></small>" +
                        "</div>" +
                    "</div>" +
                    "<div class=\"col-lg-3 col-md-3 col-sm-12 col-12\">" +
                        "<div class=\"form-group\">" +
                            "<label for=\"tempat_lahir\" class=\"col-form-label col-form-label-sm\">Tempat Lahir</label>" +
                            "<input type=\"text\" class=\"form-control form-control-sm\" id=\"tempat_lahir\" name=\"tempat_lahir\" maxlength=\"50\" value=\"" + response.biodatas.tempat_lahir + "\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "<small id=\"error_tempat_lahir\" class=\"form-text text-danger font-italic\"></small>" +
                        "</div>" +
                    "</div>" +
                    "<div class=\"col-lg-3 col-md-3 col-sm-12 col-12\">" +
                        "<div class=\"form-group\">" +
                            "<label for=\"tanggal_lahir\" class=\"col-form-label col-form-label-sm\">Tanggal Lahir</label>" +
                            "<input type=\"date\" class=\"form-control form-control-sm\" id=\"tanggal_lahir\" name=\"tanggal_lahir\" value=\"" + response.biodatas.tanggal_lahir + "\">" +
                            "<small id=\"error_tanggal_lahir\" class=\"form-text text-danger font-italic\"></small>" +
                        "</div>" +
                    "</div>" +
                    "<div class=\"col-lg-6 col-md-6 col-sm-12 col-12\">" +
                        "<div class=\"form-group\">" +
                            "<label for=\"alamat_asal\" class=\"col-form-label col-form-label-sm\">Alamat KTP</label>" +
                            "<textarea class=\"form-control form-control-sm\" rows=\"3\" id=\"alamat_asal\" name=\"alamat_asal\" onkeyup=\"this.value = this.value.toUpperCase()\">" + response.biodatas.alamat_asal + "</textarea>" +
                            "<small id=\"error_alamat_asal\" class=\"form-text text-danger font-italic\"></small>" +
                        "</div>" +
                    "</div>" +
                    "<div class=\"col-lg-6 col-md-6 col-sm-12 col-12\">" +
                        "<div class=\"form-group\">" +
                            "<label for=\"alamat_domisili\" class=\"col-form-label col-form-label-sm\">Alamat Sekarang</label>" +
                            "<textarea class=\"form-control form-control-sm\" rows=\"3\" id=\"alamat_domisili\" name=\"alamat_domisili\" onkeyup=\"this.value = this.value.toUpperCase()\" readonly>" + response.biodatas.alamat_domisili + "</textarea>" +
                            "<small id=\"error_alamat_domisili\" class=\"form-text text-danger font-italic\"></small>" +
                        "</div>" +
                    "</div>" +
                    "<div class=\"col-lg-3 col-md-3 col-sm-12 col-12\">" +
                        "<div class=\"form-group\">" +
                            "<label for=\"sim\">Jenis & Nomor SIM</label>" +
                            "<div class=\"row\">" +
                                "<div class=\"col-md-4 col-sm-4 col-4\">" +
                                    "<input type=\"text\" id=\"edit_jenis_sim\" name=\"jenis_sim\" class=\"form-control form-control-sm\" maxlength=\"10\" value=\"" + response.biodatas.jenis_sim + "\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                                    "<small id=\"errorJenisSim\" class=\"form-text text-danger\"></small>" +
                                "</div>" +
                                "<div class=\"col-md-8 col-sm-8 col-8\">" +
                                    "<input type=\"text\" id=\"edit_nomor_sim\" name=\"nomor_sim\" class=\"form-control form-control-sm\" maxlength=\"15\" value=\"" + response.biodatas.nomor_sim + "\">" +
                                    "<small id=\"errorNomorSim\" class=\"form-text text-danger\"></small>" +
                                "</div>" +
                            "</div>" +
                        "</div>" +
                    "</div>" +
                    "<div class=\"col-lg-3 col-md-3 col-sm-12 col-12\">" +
                        "<div class=\"form-group\">" +
                            "<label for=\"email\" class=\"col-form-label col-form-label-sm\">Email</label>" +
                            "<input type=\"email\" class=\"form-control form-control-sm\" id=\"email\" name=\"email\" maxlength=\"50\" value=\"" + response.biodatas.email + "\">" +
                            "<small id=\"error_email\" class=\"form-text text-danger font-italic\"></small>" +
                        "</div>" +
                    "</div>" +
                    "<div class=\"col-lg-3 col-md-3 col-sm-12 col-12\">" +
                        "<div class=\"form-group\">" +
                            "<label for=\"telepon\" class=\"col-form-label col-form-label-sm\">Telepon</label>" +
                            "<input type=\"text\" class=\"form-control form-control-sm\" id=\"telepon\" name=\"telepon\" maxlength=\"15\" value=\"" + response.biodatas.telepon + "\">" +
                            "<small id=\"error_telepon\" class=\"form-text text-danger font-italic\"></small>" +
                        "</div>" +
                    "</div>";
                    $('#biodata_data').append(biodata_data);
            }

        });
    }

    $('#biodata_form').submit(function(e) {
        e.preventDefault();
        if ($('#nama_lengkap').val() == "") {
            $('#error_nama_lengkap').append("Nama lengkap harus diisi");
        } else if ($('#nama_panggilan').val() == "") {
            $('#error_nama_panggilan').append("Nama panggilan harus diisi");
        } else if ($('#email').val() == "") {
            $('#error_email').append("Email harus diisi");
        } else if ($('#telepon').val() == "") {
            $('#error_telepon').append("Telepon harus diisi");
        } else if ($('#nomor_sim').val() == "") {
            $('#error_nomor_sim').append("Nomor SIM harus diisi");
        } else if ($('#nomor_ktp').val() == "") {
            $('#error_nomor_ktp').append("Nomor KTP harus diisi");
        } else if ($('#alamat_asal').val() == "") {
            $('#error_alamat_asal').append("Alamat KTP harus diisi");
        } else if ($('#tempat_lahir').val() == "") {
            $('#error_tempat_lahir').append("Tempat lahir harus diisi");
        } else if ($('#tanggal_lahir').val() == "") {
            $('#error_tanggal_lahir').append("Tanggal lahir harus diisi");
        } else if ($('#jenis_kelamin').val() == "") {
            $('#error_jenis_kelamin').append("Jenis kelamin harus diisi");
        } else if ($('#status_perkawinan').val() == "") {
            $('#error_status_perkawinan').append("Status perkawinan harus diisi");
        } else if ($('#agama').val() == "") {
            $('#error_agama').append("Agama harus diisi");
        } else {

            var formData = new FormData($('#biodata_form')[0]);

            $.ajax({
                url: "{{ URL::route('profile.biodata_update') }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('.btn-biodata-spinner').removeClass('d-none');
                    $('.btn-biodata-save').addClass('d-none');
                },
                success: function(response) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Data behasil diperbaharui'
                    });

                    setTimeout(() => {
                        window.location.reload(1);
                    }, 1000);
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + error

                    Toast.fire({
                        icon: 'error',
                        title: 'Error - ' + errorMessage
                    });
                }
            });
        }
    });
});

</script>

@endsection
