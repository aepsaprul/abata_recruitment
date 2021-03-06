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
                        <span class="font-weight-light">Selamat Datang <strong class="text-uppercase"> {{ Auth::user()->name }} </strong>  </span>
                        <span class="font-weight-light float-right"> <strong class="text-danger"> Note: </strong> Lengkapi data Anda, sebelum mengirim lamaran pekerjaan</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    {{-- pas foto --}}
                    <div class="card card-primary card-outline">
                        <form id="form_foto" method="post" enctype="multipart/form-data">
                            <div class="card-body box-profile">
                                <div class="text-center profile_img">
                                    @if ($biodata->foto)
                                        @if(file_exists('public/image/' . $biodata->foto))
                                        <img
                                            class="img-fluid"
                                            src="{{ asset('public/image/' . $biodata->foto) }}"
                                            alt="User profile picture"
                                            style="width: 100%;">
                                        @else
                                        <img
                                            class="img-fluid"
                                            src="{{ asset('public/assets/no-image.jpg') }}"
                                            alt="User profile picture"
                                            style="width: 100%;">
                                        @endif
                                    @else
                                        <img
                                            class="img-fluid"
                                            src="{{ asset('public/assets/no-image.jpg') }}"
                                            alt="User profile picture"
                                            style="width: 100%;">
                                    @endif
                                </div>
                                <small>Pas Foto</small>
                            </div>
                            <div class="card-footer">
                                {{-- id --}}
                                <input type="hidden" id="id" value="{{ Auth::user()->email }}" name="id">

                                <div class="custom-file mb-2">
                                    <input type="file" class="custom-file-input" id="customFile" name="foto">
                                    <label class="custom-file-label" for="customFile">Pilih Foto</label>
                                </div>
                                <button class="btn btn-primary btn-foto-spinner d-none btn-block" disabled>
                                    <span class="spinner-grow spinner-grow-sm"></span>
                                    Loading...
                                </button>
                                <button type="submit" class="btn btn-primary btn-sm btn-block btn-foto">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-2">
                    {{-- kartu keluarga --}}
                    <div class="card card-primary card-outline">
                        <form id="form_kk" method="post" enctype="multipart/form-data">
                            <div class="card-body box-profile">
                                <div class="text-center img_kk">
                                    @if ($biodata->kk)
                                        @if(file_exists('public/image/' . $biodata->kk))
                                        <img
                                            class="img-fluid"
                                            src="{{ asset('public/image/' . $biodata->kk) }}"
                                            alt="User profile picture"
                                            style="width: 100%;">
                                        @else
                                        <img
                                            class="img-fluid"
                                            src="{{ asset('public/assets/no-image.jpg') }}"
                                            alt="User profile picture"
                                            style="width: 100%;">
                                        @endif
                                    @else
                                        <img
                                            class="img-fluid"
                                            src="{{ asset('public/assets/no-image.jpg') }}"
                                            alt="User profile picture"
                                            style="width: 100%;">
                                    @endif
                                </div>
                                <small>Kartu Keluarga</small>
                            </div>
                            <div class="card-footer">
                                {{-- id --}}
                                <input type="hidden" id="id" value="{{ Auth::user()->email }}" name="id">

                                <div class="custom-file mb-2">
                                    <input type="file" class="custom-file-input" id="customFile" name="kk">
                                    <label class="custom-file-label" for="customFile">Pilih Kartu Keluarga</label>
                                </div>
                                <button class="btn btn-primary btn-kk-spinner d-none btn-block" disabled>
                                    <span class="spinner-grow spinner-grow-sm"></span>
                                    Loading...
                                </button>
                                <button type="submit" class="btn btn-primary btn-sm btn-block btn-kk">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-2">
                    {{-- ktp --}}
                    <div class="card card-primary card-outline">
                        <form id="form_ktp" method="post" enctype="multipart/form-data">
                            <div class="card-body box-profile">
                                <div class="text-center img_ktp">
                                    @if ($biodata->ktp)
                                        @if(file_exists('public/image/' . $biodata->ktp))
                                        <img
                                            class="img-fluid"
                                            src="{{ asset('public/image/' . $biodata->ktp) }}"
                                            alt="User profile picture"
                                            style="width: 100%;">
                                        @else
                                        <img
                                            class="img-fluid"
                                            src="{{ asset('public/assets/no-image.jpg') }}"
                                            alt="User profile picture"
                                            style="width: 100%;">
                                        @endif
                                    @else
                                        <img
                                            class="img-fluid"
                                            src="{{ asset('public/assets/no-image.jpg') }}"
                                            alt="User profile picture"
                                            style="width: 100%;">
                                    @endif
                                </div>
                                <small>KTP</small>
                            </div>
                            <div class="card-footer">
                                {{-- id --}}
                                <input type="hidden" id="id" value="{{ Auth::user()->email }}" name="id">

                                <div class="custom-file mb-2">
                                    <input type="file" class="custom-file-input" id="customFile" name="ktp">
                                    <label class="custom-file-label" for="customFile">Pilih KTP</label>
                                </div>
                                <button class="btn btn-primary btn-ktp-spinner d-none btn-block" disabled>
                                    <span class="spinner-grow spinner-grow-sm"></span>
                                    Loading...
                                </button>
                                <button type="submit" class="btn btn-primary btn-sm btn-block btn-ktp">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-2">
                    {{-- surat lamaran --}}
                    <div class="card card-primary card-outline">
                        <form id="form_surat_lamaran" method="post" enctype="multipart/form-data">
                            <div class="card-body box-profile">
                                <div class="text-center img_surat_lamaran">
                                    @if ($biodata->surat_lamaran)
                                        @if(file_exists('public/image/' . $biodata->surat_lamaran))
                                        <img
                                            class="img-fluid"
                                            src="{{ asset('public/image/' . $biodata->surat_lamaran) }}"
                                            alt="User profile picture"
                                            style="width: 100%;">
                                        @else
                                        <img
                                            class="img-fluid"
                                            src="{{ asset('public/assets/no-image.jpg') }}"
                                            alt="User profile picture"
                                            style="width: 100%;">
                                        @endif
                                    @else
                                        <img
                                            class="img-fluid"
                                            src="{{ asset('public/assets/no-image.jpg') }}"
                                            alt="User profile picture"
                                            style="width: 100%;">
                                    @endif
                                </div>
                                <small>Surat Lamaran</small>
                            </div>
                            <div class="card-footer">
                                {{-- id --}}
                                <input type="hidden" id="id" value="{{ Auth::user()->email }}" name="id">

                                <div class="custom-file mb-2">
                                    <input type="file" class="custom-file-input" id="customFile" name="surat_lamaran">
                                    <label class="custom-file-label" for="customFile">Pilih Surat Lamaran</label>
                                </div>
                                <button class="btn btn-primary btn-surat-lamaran-spinner d-none btn-block" disabled>
                                    <span class="spinner-grow spinner-grow-sm"></span>
                                    Loading...
                                </button>
                                <button type="submit" class="btn btn-primary btn-sm btn-block btn-surat-lamaran">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-2">
                    {{-- cv --}}
                    <div class="card card-primary card-outline">
                        <form id="form_cv" method="post" enctype="multipart/form-data">
                            <div class="card-body box-profile">
                                <div class="text-center img_cv">
                                    @if ($biodata->cv)
                                        @if(file_exists('public/image/' . $biodata->cv))
                                        <img
                                            class="img-fluid"
                                            src="{{ asset('public/image/' . $biodata->cv) }}"
                                            alt="User profile picture"
                                            style="width: 100%;">
                                        @else
                                        <img
                                            class="img-fluid"
                                            src="{{ asset('public/assets/no-image.jpg') }}"
                                            alt="User profile picture"
                                            style="width: 100%;">
                                        @endif
                                    @else
                                        <img
                                            class="img-fluid"
                                            src="{{ asset('public/assets/no-image.jpg') }}"
                                            alt="User profile picture"
                                            style="width: 100%;">
                                    @endif
                                </div>
                                <small>Curriculum Vitae</small>
                            </div>
                            <div class="card-footer">
                                {{-- id --}}
                                <input type="hidden" id="id" value="{{ Auth::user()->email }}" name="id">

                                <div class="custom-file mb-2">
                                    <input type="file" class="custom-file-input" id="customFile" name="cv">
                                    <label class="custom-file-label" for="customFile">Pilih Curriculum Vitae</label>
                                </div>
                                <button class="btn btn-primary btn-cv-spinner d-none btn-block" disabled>
                                    <span class="spinner-grow spinner-grow-sm"></span>
                                    Loading...
                                </button>
                                <button type="submit" class="btn btn-primary btn-sm btn-block btn-cv">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-2">
                    {{-- ijazah --}}
                    <div class="card card-primary card-outline">
                        <form id="form_ijazah" method="post" enctype="multipart/form-data">
                            <div class="card-body box-profile">
                                <div class="text-center img_ijazah">
                                    @if ($biodata->ijazah)
                                        @if(file_exists('public/image/' . $biodata->ijazah))
                                        <img
                                            class="img-fluid"
                                            src="{{ asset('public/image/' . $biodata->ijazah) }}"
                                            alt="User profile picture"
                                            style="width: 100%;">
                                        @else
                                        <img
                                            class="img-fluid"
                                            src="{{ asset('public/assets/no-image.jpg') }}"
                                            alt="User profile picture"
                                            style="width: 100%;">
                                        @endif
                                    @else
                                        <img
                                            class="img-fluid"
                                            src="{{ asset('public/assets/no-image.jpg') }}"
                                            alt="User profile picture"
                                            style="width: 100%;">
                                    @endif
                                </div>
                                <small>Ijazah</small>
                            </div>
                            <div class="card-footer">
                                {{-- id --}}
                                <input type="hidden" id="id" value="{{ Auth::user()->email }}" name="id">

                                <div class="custom-file mb-2">
                                    <input type="file" class="custom-file-input" id="customFile" name="ijazah">
                                    <label class="custom-file-label" for="customFile">Pilih Ijazah</label>
                                </div>
                                <button class="btn btn-primary btn-ijazah-spinner d-none btn-block" disabled>
                                    <span class="spinner-grow spinner-grow-sm"></span>
                                    Loading...
                                </button>
                                <button type="submit" class="btn btn-primary btn-sm btn-block btn-ijazah">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#biodata" data-toggle="tab">Biodata</a></li>
                                <li class="nav-item"><a class="nav-link" href="#medsos" data-toggle="tab">Medis Sosial</a></li>
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
                                        <div class="row" id="biodata_data">
                                            {{-- data di jquery --}}
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button class="btn btn-primary btn-sm btn-biodata-spinner d-none" disabled style="width: 130px;">
                                                    <span class="spinner-grow spinner-grow-sm"></span>
                                                    Loading...
                                                </button>
                                                <button class="btn btn-primary btn-sm btn-biodata-save" style="width: 130px;"><i class="fas fa-save"></i> Simpan</button>
                                            </div>
                                        </div>
                                    </form>

                                    <hr>

                                    {{-- sebelum menikah --}}
                                    <div class="card bg-light">
                                        <div class="card-header">
                                            <span class="font-weight-bold">Keluarga Sebelum Menikah</span>
                                        </div>
                                        <div class="card-body">
                                            <p>
                                                <button class="btn btn-primary btn-sm px-3" type="button" data-toggle="collapse" data-target="#formInputSebelumMenikah" aria-expanded="false" aria-controls="formInputSebelumMenikah">
                                                    <i class="fas fa-plus"></i> Tambah Data
                                                </button>
                                            </p>
                                            <div class="collapse" id="formInputSebelumMenikah">
                                                <div class="card card-body">
                                                    <form id="sebelum_menikah_form">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="sebelum_menikah_hubungan" class="col-form-label col-form-label-sm font-weight-light">Hubungan</label>
                                                                    <select name="sebelum_menikah_hubungan" id="sebelum_menikah_hubungan" class="form-control form-control-sm">
                                                                        <option value="">--Pilih Hubungan--</option>
                                                                        <option value="AYAH">AYAH</option>
                                                                        <option value="IBU">IBU</option>
                                                                        <option value="SDR LAKI - LAKI">SDR LAKI - LAKI</option>
                                                                        <option value="SDR PEREMPUAN">SDR PEREMPUAN</option>
                                                                        <option value="KAKEK">KAKEK</option>
                                                                        <option value="NENEK">NENEK</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="sebelum_menikah_nama" class="col-form-label col-form-label-sm font-weight-light">Nama</label>
                                                                    <input
                                                                        type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="sebelum_menikah_nama"
                                                                        name="sebelum_menikah_nama"
                                                                        maxlength="30"
                                                                        onkeyup="this.value = this.value.toUpperCase()">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="sebelum_menikah_usia" class="col-form-label col-form-label-sm font-weight-light">Usia</label>
                                                                    <input
                                                                        type="number"
                                                                        class="form-control form-control-sm"
                                                                        id="sebelum_menikah_usia"
                                                                        name="sebelum_menikah_usia"
                                                                        maxlength="2">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="sebelum_menikah_jenis_kelamin" class="col-form-label col-form-label-sm font-weight-light">Jenis Kelamin</label>
                                                                    <select name="sebelum_menikah_jenis_kelamin" id="sebelum_menikah_jenis_kelamin" class="form-control form-control-sm">
                                                                        <option value="">--Pilih Jenis Kelamin--</option>
                                                                        <option value="l">Laki - laki</option>
                                                                        <option value="p">Perempuan</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="sebelum_menikah_pendidikan" class="col-form-label col-form-label-sm font-weight-light">Pendidikan Terakhir</label>
                                                                    <input
                                                                        type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="sebelum_menikah_pendidikan"
                                                                        name="sebelum_menikah_pendidikan"
                                                                        maxlength="10"
                                                                        onkeyup="this.value = this.value.toUpperCase()">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="sebelum_menikah_pekerjaan" class="col-form-label col-form-label-sm font-weight-light">Pekerjaan Terakhir</label>
                                                                    <input
                                                                        type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="sebelum_menikah_pekerjaan"
                                                                        name="sebelum_menikah_pekerjaan"
                                                                        maxlength="30"
                                                                        onkeyup="this.value = this.value.toUpperCase()">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <button class="btn btn-primary btn-sm btn-sebelum-menikah-spinner d-none" disabled style="width: 130px;">
                                                                    <span class="spinner-grow spinner-grow-sm"></span>
                                                                    Loading...
                                                                </button>
                                                                <button
                                                                    type="submit"
                                                                    class="btn btn-primary btn-sm btn-sebelum-menikah-save"
                                                                    style="width: 130px;">
                                                                        <i class="fas fa-save"></i> Simpan
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <div style="overflow-x: auto;">
                                                <table id="tabel_sebelum_menikah" class="table table-bordered table-striped" style="font-size: 14px; width: 100%;">
                                                    <thead>
                                                        <tr class="bg-primary">
                                                            <th class="text-center">Hubungan</th>
                                                            <th class="text-center">Nama</th>
                                                            <th class="text-center">Usia</th>
                                                            <th class="text-center">Jenis Kelamin</th>
                                                            <th class="text-center">Pendidikan</th>
                                                            <th class="text-center">Pekerjaan</th>
                                                            <th class="text-center">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="data_sebelum_menikah">
                                                        {{-- sebelum menikah data di jquery --}}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- setelah menikah --}}
                                    <div class="card bg-light">
                                        <div class="card-header">
                                            <span class="font-weight-bold">Keluarga Setelah Menikah</span>
                                        </div>
                                        <div class="card-body">
                                            <p>
                                                <button class="btn btn-primary btn-sm px-3" type="button" data-toggle="collapse" data-target="#formInputSetelahMenikah" aria-expanded="false" aria-controls="formInputSetelahMenikah">
                                                    <i class="fas fa-plus"></i> Tambah Data
                                                </button>
                                            </p>
                                            <div class="collapse" id="formInputSetelahMenikah">
                                                <div class="card card-body">
                                                    <form id="setelah_menikah_form">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="setelah_menikah_hubungan" class="col-form-label col-form-label-sm">Hubungan</label>
                                                                    <select name="setelah_menikah_hubungan" id="setelah_menikah_hubungan" class="form-control form-control-sm">
                                                                        <option value="">--Pilih Hubungan--</option>
                                                                        <option value="ISTRI">ISTRI</option>
                                                                        <option value="ANAK">ANAK</option>
                                                                        <option value="AYAH">AYAH</option>
                                                                        <option value="IBU">IBU</option>
                                                                        <option value="SDR LAKI - LAKI">SDR LAKI - LAKI</option>
                                                                        <option value="SDR PEREMPUAN">SDR PEREMPUAN</option>
                                                                        <option value="KAKEK">KAKEK</option>
                                                                        <option value="NENEK">NENEK</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="setelah_menikah_nama" class="col-form-label col-form-label-sm">Nama</label>
                                                                    <input
                                                                        type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="setelah_menikah_nama"
                                                                        name="setelah_menikah_nama"
                                                                        maxlength="30"
                                                                        onkeyup="this.value = this.value.toUpperCase()">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="setelah_menikah_tempat_lahir" class="col-form-label col-form-label-sm">Tempat Lahir</label>
                                                                    <input
                                                                        type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="setelah_menikah_tempat_lahir"
                                                                        name="setelah_menikah_tempat_lahir"
                                                                        maxlength="30"
                                                                        onkeyup="this.value = this.value.toUpperCase()">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="setelah_menikah_tanggal_lahir" class="col-form-label col-form-label-sm">Tanggal Lahir</label>
                                                                    <input
                                                                        type="date"
                                                                        class="form-control form-control-sm"
                                                                        id="setelah_menikah_tanggal_lahir"
                                                                        name="setelah_menikah_tanggal_lahir">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="setelah_menikah_pekerjaan" class="col-form-label col-form-label-sm">Pekerjaan Terakhir</label>
                                                                    <input
                                                                        type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="setelah_menikah_pekerjaan"
                                                                        name="setelah_menikah_pekerjaan"
                                                                        maxlength="30"
                                                                        onkeyup="this.value = this.value.toUpperCase()">
                                                                    <small id="pekerjaan_help" class="form-text text-muted">Isi strip (-) jika tidak ada</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <button class="btn btn-primary btn-sm btn-setelah-menikah-spinner d-none" disabled style="width: 130px;">
                                                                    <span class="spinner-grow spinner-grow-sm"></span>
                                                                    Loading...
                                                                </button>
                                                                <button
                                                                    type="submit"
                                                                    class="btn btn-primary btn-sm btn-setelah-menikah-save"
                                                                    style="width: 130px;">
                                                                        <i class="fas fa-save"></i> Simpan
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <div style="overflow-x: auto;">
                                                <table id="tabel_setelah_menikah" class="table table-bordered table-striped" style="font-size: 14px; width: 100%;">
                                                    <thead>
                                                        <tr class="bg-primary">
                                                            <th class="text-center">Hubungan</th>
                                                            <th class="text-center">Nama</th>
                                                            <th class="text-center">Tempat Lahir</th>
                                                            <th class="text-center">Tanggal Lahir</th>
                                                            <th class="text-center">Pekerjaan Terakhir</th>
                                                            <th class="text-center">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="data_setelah_menikah">
                                                        {{-- setelah menikah data di jquery --}}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- kerabat darurat --}}
                                    <div class="card bg-light">
                                        <div class="card-header">
                                            <span class="font-weight-bold">Kerabat Darurat</span>
                                        </div>
                                        <div class="card-body">
                                            <p>
                                                <button class="btn btn-primary btn-sm px-3" type="button" data-toggle="collapse" data-target="#formInputKerabatDarurat" aria-expanded="false" aria-controls="formInputKerabatDarurat">
                                                    <i class="fas fa-plus"></i> Tambah Data
                                                </button>
                                            </p>
                                            <div class="collapse" id="formInputKerabatDarurat">
                                                <div class="card card-body">
                                                    <form id="kerabat_darurat_form">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="kerabat_darurat_hubungan" class="col-form-label col-form-label-sm">Hubungan</label>
                                                                    <input
                                                                        type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="kerabat_darurat_hubungan"
                                                                        name="kerabat_darurat_hubungan"
                                                                        maxlength="30"
                                                                        onkeyup="this.value = this.value.toUpperCase()">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="kerabat_darurat_nama" class="col-form-label col-form-label-sm">Nama</label>
                                                                    <input
                                                                        type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="kerabat_darurat_nama"
                                                                        name="kerabat_darurat_nama"
                                                                        maxlength="50"
                                                                        onkeyup="this.value = this.value.toUpperCase()">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="kerabat_darurat_jenis_kelamin" class="col-form-label col-form-label-sm">Jenis Kelamin</label>
                                                                    <select name="kerabat_darurat_jenis_kelamin" id="kerabat_darurat_jenis_kelamin" class="form-control form-control-sm">
                                                                        <option value="">--Pilih Jenis Kelamin--</option>
                                                                        <option value="l">Laki - laki</option>
                                                                        <option value="p">Perempuan</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="kerabat_darurat_telepon" class="col-form-label col-form-label-sm">Telepon</label>
                                                                    <input
                                                                        type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="kerabat_darurat_telepon"
                                                                        name="kerabat_darurat_telepon"
                                                                        maxlength="15">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="kerabat_darurat_alamat" class="col-form-label col-form-label-sm">Alamat</label>
                                                                    <input
                                                                        type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="kerabat_darurat_alamat"
                                                                        name="kerabat_darurat_alamat"
                                                                        onkeyup="this.value = this.value.toUpperCase()">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <button class="btn btn-primary btn-sm btn-kerabat-darurat-spinner d-none" disabled style="width: 130px;">
                                                                    <span class="spinner-grow spinner-grow-sm"></span>
                                                                    Loading...
                                                                </button>
                                                                <button
                                                                    type="submit"
                                                                    class="btn btn-primary btn-sm btn-kerabat-darurat-save"
                                                                    style="width: 130px;">
                                                                        <i class="fas fa-save"></i> Simpan
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <div style="overflow-x: auto;">
                                                <table id="tabel_kerabat_darurat" class="table table-bordered table-striped" style="font-size: 14px; width: 100%;">
                                                    <thead>
                                                        <tr class="bg-primary">
                                                            <th class="text-center">Hubungan</th>
                                                            <th class="text-center">Nama</th>
                                                            <th class="text-center">Jenis Kelamin</th>
                                                            <th class="text-center">Telepon</th>
                                                            <th class="text-center">Alamat</th>
                                                            <th class="text-center">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="data_kerabat_darurat">
                                                        {{-- kerabat darurat data di jquery --}}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- media sosial --}}
                                <div class="tab-pane" id="medsos">
                                    <p>
                                        <button class="btn btn-primary btn-sm px-3" type="button" data-toggle="collapse" data-target="#formInputMedsos" aria-expanded="false" aria-controls="formInputMedsos">
                                            <i class="fas fa-plus"></i> Tambah Data
                                        </button>
                                    </p>
                                    <div class="collapse" id="formInputMedsos">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <form id="medsos_form">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col">
                                                            <div class="form-group">
                                                                <label for="nama_medsos" class="col-form-label col-form-label-sm">Nama Media Sosial</label>
                                                                <input
                                                                    type="text"
                                                                    class="form-control form-control-sm"
                                                                    id="nama_medsos"
                                                                    name="nama_medsos"
                                                                    onkeyup="this.value = this.value.toUpperCase()">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col">
                                                            <div class="form-group">
                                                                <label for="nama_akun" class="col-form-label col-form-label-sm">Nama Akun</label>
                                                                <input
                                                                    type="text"
                                                                    class="form-control form-control-sm"
                                                                    id="nama_akun"
                                                                    name="nama_akun">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <button class="btn btn-primary btn-sm btn-medsos-spinner d-none" disabled style="width: 130px;">
                                                                <span class="spinner-grow spinner-grow-sm"></span>
                                                                Loading...
                                                            </button>
                                                            <button
                                                                type="submit"
                                                                class="btn btn-primary btn-sm btn-medsos-save"
                                                                style="width: 130px;">
                                                                    <i class="fas fa-save"></i> Simpan
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="overflow-x: auto;">
                                        <table id="tabel_medsos" class="table table-bordered table-striped" style="font-size: 14px; width: 100%;">
                                            <thead>
                                                <tr class="bg-primary">
                                                    <th class="text-center">Nama Media Sosial</th>
                                                    <th class="text-center">Nama Akun</th>
                                                    <th class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data_medsos">
                                                {{-- medsos data di jquery --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{-- pendidikan --}}
                                <div class="tab-pane" id="pendidikan">
                                    <p>
                                        <button class="btn btn-primary btn-sm px-3" type="button" data-toggle="collapse" data-target="#formInputPendidikan" aria-expanded="false" aria-controls="formInputPendidikan">
                                            <i class="fas fa-plus"></i> Tambah Data
                                        </button>
                                    </p>
                                    <div class="collapse" id="formInputPendidikan">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <form id="pendidikan_form">
                                                    <div class="row">
                                                        <form id="pendidikan_form">
                                                            <div class="row">
                                                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                    <div class="form-group">
                                                                        <label for="pendidikan_tingkat" class="col-form-label col-form-label-sm">Tingkat</label>
                                                                        <input
                                                                            type="text"
                                                                            class="form-control form-control-sm"
                                                                            id="pendidikan_tingkat"
                                                                            name="pendidikan_tingkat"
                                                                            maxlength="20"
                                                                            onkeyup="this.value = this.value.toUpperCase()">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                    <div class="form-group">
                                                                        <label for="pendidikan_nama" class="col-form-label col-form-label-sm">Nama Sekolah / Perguruan Tingi</label>
                                                                        <input
                                                                            type="text"
                                                                            class="form-control form-control-sm"
                                                                            id="pendidikan_nama"
                                                                            name="pendidikan_nama"
                                                                            maxlength="30"
                                                                            onkeyup="this.value = this.value.toUpperCase()">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                    <div class="form-group">
                                                                        <label for="pendidikan_kota" class="col-form-label col-form-label-sm">Kota</label>
                                                                        <input
                                                                            type="text"
                                                                            class="form-control form-control-sm"
                                                                            id="pendidikan_kota"
                                                                            name="pendidikan_kota"
                                                                            maxlength="30"
                                                                            onkeyup="this.value = this.value.toUpperCase()">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                    <div class="form-group">
                                                                        <label for="pendidikan_jurusan" class="col-form-label col-form-label-sm">Jurusan</label>
                                                                        <input
                                                                            type="text"
                                                                            class="form-control form-control-sm"
                                                                            id="pendidikan_jurusan"
                                                                            name="pendidikan_jurusan"
                                                                            maxlength="30"
                                                                            onkeyup="this.value = this.value.toUpperCase()">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                    <div class="form-group">
                                                                        <label for="pendidikan_tahun_masuk" class="col-form-label col-form-label-sm">Tahun Masuk</label>
                                                                        <input
                                                                            type="number"
                                                                            class="form-control form-control-sm"
                                                                            id="pendidikan_tahun_masuk"
                                                                            name="pendidikan_tahun_masuk"
                                                                            maxlength="4"
                                                                            onkeyup="this.value = this.value.toUpperCase()">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                                                    <div class="form-group">
                                                                        <label for="pendidikan_tahun_lulus" class="col-form-label col-form-label-sm">Tahun Lulus</label>
                                                                        <input
                                                                            type="number"
                                                                            class="form-control form-control-sm"
                                                                            id="pendidikan_tahun_lulus"
                                                                            name="pendidikan_tahun_lulus"
                                                                            maxlength="4"
                                                                            onkeyup="this.value = this.value.toUpperCase()">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <button class="btn btn-primary btn-sm btn-pendidikan-spinner d-none" disabled style="width: 130px;">
                                                                        <span class="spinner-grow spinner-grow-sm"></span>
                                                                        Loading...
                                                                    </button>
                                                                    <button
                                                                        type="submit"
                                                                        class="btn btn-primary btn-sm btn-pendidikan-save"
                                                                        style="width: 130px;">
                                                                            <i class="fas fa-save"></i> Simpan
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="overflow-x: auto;">
                                        <table id="tabel_pendidikan" class="table table-bordered table-striped" style="font-size: 14px; width: 100%;">
                                            <thead>
                                                <tr class="bg-primary">
                                                    <th class="text-center">Tingkat</th>
                                                    <th class="text-center">Nama Sekolah</th>
                                                    <th class="text-center">Kota</th>
                                                    <th class="text-center">Jurusan</th>
                                                    <th class="text-center">Tahun Masuk</th>
                                                    <th class="text-center">Tahun Lulus</th>
                                                    <th class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data_pendidikan">
                                                {{-- pendidikan data di jquery --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{-- penghargaan --}}
                                <div class="tab-pane" id="penghargaan">
                                    <p>
                                        <button class="btn btn-primary btn-sm px-3" type="button" data-toggle="collapse" data-target="#formInputPenghargaan" aria-expanded="false" aria-controls="formInputPenghargaan">
                                            <i class="fas fa-plus"></i> Tambah Data
                                        </button>
                                    </p>
                                    <div class="collapse" id="formInputPenghargaan">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <form id="penghargaan_form">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col">
                                                            <div class="form-group">
                                                                <label for="penghargaan_nama" class="col-form-label col-form-label-sm">Nama Penghargaan</label>
                                                                <input
                                                                    type="text"
                                                                    class="form-control form-control-sm"
                                                                    id="penghargaan_nama"
                                                                    name="penghargaan_nama"
                                                                    onkeyup="this.value = this.value.toUpperCase()">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col">
                                                            <div class="form-group">
                                                                <label for="penghargaan_tahun" class="col-form-label col-form-label-sm">Tahun</label>
                                                                <input
                                                                    type="text"
                                                                    class="form-control form-control-sm"
                                                                    id="penghargaan_tahun"
                                                                    name="penghargaan_tahun">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <button class="btn btn-primary btn-sm btn-penghargaan-spinner d-none" disabled style="width: 130px;">
                                                                <span class="spinner-grow spinner-grow-sm"></span>
                                                                Loading...
                                                            </button>
                                                            <button
                                                                type="submit"
                                                                class="btn btn-primary btn-sm btn-penghargaan-save"
                                                                style="width: 130px;">
                                                                    <i class="fas fa-save"></i> Simpan
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="overflow-x: auto;">
                                        <table id="tabel_penghargaan" class="table table-bordered table-striped" style="font-size: 14px; width: 100%;">
                                            <thead>
                                                <tr class="bg-primary">
                                                    <th class="text-center">Nama Penghargaan</th>
                                                    <th class="text-center">Tahun</th>
                                                    <th class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data_penghargaan">
                                                {{-- penghargaan data di jquery --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{-- organisasi --}}
                                <div class="tab-pane" id="organisasi">
                                    <p>
                                        <button class="btn btn-primary btn-sm px-3" type="button" data-toggle="collapse" data-target="#formInputOrganisasi" aria-expanded="false" aria-controls="formInputOrganisasi">
                                            <i class="fas fa-plus"></i> Tambah Data
                                        </button>
                                    </p>
                                    <div class="collapse" id="formInputOrganisasi">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <form id="organisasi_form">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-12">
                                                            <div class="form-group">
                                                                <label for="organisasi_nama" class="col-form-label col-form-label-sm">Nama Organisasi</label>
                                                                <input
                                                                    type="text"
                                                                    class="form-control form-control-sm"
                                                                    id="organisasi_nama"
                                                                    name="organisasi_nama"
                                                                    onkeyup="this.value = this.value.toUpperCase()">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-12">
                                                            <div class="form-group">
                                                                <label for="organisasi_jabatan" class="col-form-label col-form-label-sm">Jabatan</label>
                                                                <input
                                                                    type="text"
                                                                    class="form-control form-control-sm"
                                                                    id="organisasi_jabatan"
                                                                    name="organisasi_jabatan">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-12">
                                                            <div class="form-group">
                                                                <label for="organisasi_masa_kerja" class="col-form-label col-form-label-sm">Masa Kerja</label>
                                                                <input
                                                                    type="text"
                                                                    class="form-control form-control-sm"
                                                                    id="organisasi_masa_kerja"
                                                                    name="organisasi_masa_kerja">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <button class="btn btn-primary btn-sm btn-organisasi-spinner d-none" disabled style="width: 130px;">
                                                                <span class="spinner-grow spinner-grow-sm"></span>
                                                                Loading...
                                                            </button>
                                                            <button
                                                                type="submit"
                                                                class="btn btn-primary btn-sm btn-organisasi-save"
                                                                style="width: 130px;">
                                                                    <i class="fas fa-save"></i> Simpan
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="overflow-x: auto;">
                                        <table id="tabel_organisasi" class="table table-bordered table-striped" style="font-size: 14px; width: 100%;">
                                            <thead>
                                                <tr class="bg-primary">
                                                    <th class="text-center">Nama Organisasi</th>
                                                    <th class="text-center">Jabatan</th>
                                                    <th class="text-center">Masa Kerja</th>
                                                    <th class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data_organisasi">
                                                {{-- organisasi data di jquery --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{-- riwayat_pekerjaan --}}
                                <div class="tab-pane" id="riwayat_pekerjaan">
                                    <p>
                                        <button class="btn btn-primary btn-sm px-3" type="button" data-toggle="collapse" data-target="#formInputRiwayatPekerjaan" aria-expanded="false" aria-controls="formInputRiwayatPekerjaan">
                                            <i class="fas fa-plus"></i> Tambah Data
                                        </button>
                                    </p>
                                    <div class="collapse" id="formInputRiwayatPekerjaan">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <form id="riwayat_pekerjaan_form">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-12">
                                                            <div class="form-group">
                                                                <label for="riwayat_pekerjaan_nama_perusahaan" class="col-form-label col-form-label-sm">Nama Perusahaan</label>
                                                                <input
                                                                    type="text"
                                                                    class="form-control form-control-sm"
                                                                    id="riwayat_pekerjaan_nama_perusahaan"
                                                                    name="riwayat_pekerjaan_nama_perusahaan">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-12">
                                                            <div class="form-group">
                                                                <label for="riwayat_pekerjaan_jenis_industri" class="col-form-label col-form-label-sm">Jenis Industri</label>
                                                                <input
                                                                    type="text"
                                                                    class="form-control form-control-sm"
                                                                    id="riwayat_pekerjaan_jenis_industri"
                                                                    name="riwayat_pekerjaan_jenis_industri">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-12">
                                                            <div class="form-group">
                                                                <label for="riwayat_pekerjaan_jabatan_awal" class="col-form-label col-form-label-sm">Jabatan Awal</label>
                                                                <input
                                                                    type="text"
                                                                    class="form-control form-control-sm"
                                                                    id="riwayat_pekerjaan_jabatan_awal"
                                                                    name="riwayat_pekerjaan_jabatan_awal">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-12">
                                                            <div class="form-group">
                                                                <label for="riwayat_pekerjaan_jabatan_akhir" class="col-form-label col-form-label-sm">Jabatan Akhir</label>
                                                                <input
                                                                    type="text"
                                                                    class="form-control form-control-sm"
                                                                    id="riwayat_pekerjaan_jabatan_akhir"
                                                                    name="riwayat_pekerjaan_jabatan_akhir">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-12">
                                                            <div class="form-group">
                                                                <label for="riwayat_pekerjaan_awal_bekerja" class="col-form-label col-form-label-sm">Awal Bekerja</label>
                                                                <input
                                                                    type="date"
                                                                    class="form-control form-control-sm"
                                                                    id="riwayat_pekerjaan_awal_bekerja"
                                                                    name="riwayat_pekerjaan_awal_bekerja">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-12">
                                                            <div class="form-group">
                                                                <label for="riwayat_pekerjaan_akhir_bekerja" class="col-form-label col-form-label-sm">Akhir Bekerja</label>
                                                                <input
                                                                    type="date"
                                                                    class="form-control form-control-sm"
                                                                    id="riwayat_pekerjaan_akhir_bekerja"
                                                                    name="riwayat_pekerjaan_akhir_bekerja">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-12">
                                                            <div class="form-group">
                                                                <label for="riwayat_pekerjaan_gaji_awal" class="col-form-label col-form-label-sm">Gaji Awal</label>
                                                                <input
                                                                    type="text"
                                                                    class="form-control form-control-sm"
                                                                    id="riwayat_pekerjaan_gaji_awal"
                                                                    name="riwayat_pekerjaan_gaji_awal">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-12">
                                                            <div class="form-group">
                                                                <label for="riwayat_pekerjaan_gaji_akhir" class="col-form-label col-form-label-sm">Gaji Akhir</label>
                                                                <input
                                                                    type="text"
                                                                    class="form-control form-control-sm"
                                                                    id="riwayat_pekerjaan_gaji_akhir"
                                                                    name="riwayat_pekerjaan_gaji_akhir">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-12">
                                                            <div class="form-group">
                                                                <label for="riwayat_pekerjaan_nama_atasan" class="col-form-label col-form-label-sm">Nama Atasan</label>
                                                                <input
                                                                    type="text"
                                                                    class="form-control form-control-sm"
                                                                    id="riwayat_pekerjaan_nama_atasan"
                                                                    name="riwayat_pekerjaan_nama_atasan">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-12">
                                                            <div class="form-group">
                                                                <label for="riwayat_pekerjaan_alasan_berhenti" class="col-form-label col-form-label-sm">Alasan Berhenti</label>
                                                                <input
                                                                    type="text"
                                                                    class="form-control form-control-sm"
                                                                    id="riwayat_pekerjaan_alasan_berhenti"
                                                                    name="riwayat_pekerjaan_alasan_berhenti">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <button class="btn btn-primary btn-sm btn-riwayat-pekerjaan-spinner d-none" disabled style="width: 130px;">
                                                                <span class="spinner-grow spinner-grow-sm"></span>
                                                                Loading...
                                                            </button>
                                                            <button
                                                                type="submit"
                                                                class="btn btn-primary btn-sm btn-riwayat-pekerjaan-save"
                                                                style="width: 130px;">
                                                                    <i class="fas fa-save"></i> Simpan
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div id="data_riwayat_pekerjaan">
                                        {{-- riwayat pekerjaan data di jquery --}}
                                    </div>
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

    // upload pas foto
    $('input[type="file"][name="foto"]').on('change', function() {
        var img_path = $(this)[0].value;
        var img_holder = $('.profile_img');
        var currentImagePath = $(this).data('value');
        var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
        if (extension == 'jpg' || extension == 'jpeg' || extension == 'png') {
            if (typeof(FileReader) != 'undefind') {
                img_holder.empty();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('<img/>', {'src':e.target.result, 'class':'img-fluid'}).appendTo(img_holder);
                }
                img_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                $(img_holder).html('Browser tidak support FileReader');
            }
        } else {
            $(img_holder).html(currentImagePath);
        }
    });

    $(document).on('submit', '#form_foto', function(e) {
        e.preventDefault();

        var formData = new FormData($('#form_foto')[0]);

        $.ajax({
            url: "{{ URL::route('profile.foto_update') }}",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('.btn-foto-spinner').removeClass('d-none');
                $('.btn-foto').addClass('d-none');
            },
            success: function (response) {
                Toast.fire({
                    icon: 'success',
                    title: 'Foto berhasil diubah'
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
        })
    })

    // upload kartu keluarga
    $('input[type="file"][name="kk"]').on('change', function() {
        var img_path = $(this)[0].value;
        var img_holder = $('.img_kk');
        var currentImagePath = $(this).data('value');
        var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
        if (extension == 'jpg' || extension == 'jpeg' || extension == 'png') {
            if (typeof(FileReader) != 'undefind') {
                img_holder.empty();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('<img/>', {'src':e.target.result, 'class':'img-fluid'}).appendTo(img_holder);
                }
                img_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                $(img_holder).html('Browser tidak support FileReader');
            }
        } else {
            $(img_holder).html(currentImagePath);
        }
    });

    $(document).on('submit', '#form_kk', function(e) {
        e.preventDefault();

        var formData = new FormData($('#form_kk')[0]);

        $.ajax({
            url: "{{ URL::route('profile.kk_update') }}",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('.btn-kk-spinner').removeClass('d-none');
                $('.btn-kk').addClass('d-none');
            },
            success: function (response) {
                Toast.fire({
                    icon: 'success',
                    title: 'Kartu keluarga berhasil diubah'
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
        })
    })

    // upload ktp
    $('input[type="file"][name="ktp"]').on('change', function() {
        var img_path = $(this)[0].value;
        var img_holder = $('.img_ktp');
        var currentImagePath = $(this).data('value');
        var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
        if (extension == 'jpg' || extension == 'jpeg' || extension == 'png') {
            if (typeof(FileReader) != 'undefind') {
                img_holder.empty();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('<img/>', {'src':e.target.result, 'class':'img-fluid'}).appendTo(img_holder);
                }
                img_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                $(img_holder).html('Browser tidak support FileReader');
            }
        } else {
            $(img_holder).html(currentImagePath);
        }
    });

    $(document).on('submit', '#form_ktp', function(e) {
        e.preventDefault();

        var formData = new FormData($('#form_ktp')[0]);

        $.ajax({
            url: "{{ URL::route('profile.ktp_update') }}",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('.btn-ktp-spinner').removeClass('d-none');
                $('.btn-ktp').addClass('d-none');
            },
            success: function (response) {
                Toast.fire({
                    icon: 'success',
                    title: 'KTP berhasil diubah'
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
        })
    })

    // upload surat lamaran
    $('input[type="file"][name="surat_lamaran"]').on('change', function() {
        var img_path = $(this)[0].value;
        var img_holder = $('.img_surat_lamaran');
        var currentImagePath = $(this).data('value');
        var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
        if (extension == 'jpg' || extension == 'jpeg' || extension == 'png') {
            if (typeof(FileReader) != 'undefind') {
                img_holder.empty();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('<img/>', {'src':e.target.result, 'class':'img-fluid'}).appendTo(img_holder);
                }
                img_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                $(img_holder).html('Browser tidak support FileReader');
            }
        } else {
            $(img_holder).html(currentImagePath);
        }
    });

    $(document).on('submit', '#form_surat_lamaran', function(e) {
        e.preventDefault();

        var formData = new FormData($('#form_surat_lamaran')[0]);

        $.ajax({
            url: "{{ URL::route('profile.surat_lamaran_update') }}",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('.btn-surat-lamaran-spinner').removeClass('d-none');
                $('.btn-surat-lamaran').addClass('d-none');
            },
            success: function (response) {
                Toast.fire({
                    icon: 'success',
                    title: 'Surat lamaran berhasil diubah'
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
        })
    })

    // upload cv
    $('input[type="file"][name="cv"]').on('change', function() {
        var img_path = $(this)[0].value;
        var img_holder = $('.img_cv');
        var currentImagePath = $(this).data('value');
        var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
        if (extension == 'jpg' || extension == 'jpeg' || extension == 'png') {
            if (typeof(FileReader) != 'undefind') {
                img_holder.empty();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('<img/>', {'src':e.target.result, 'class':'img-fluid'}).appendTo(img_holder);
                }
                img_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                $(img_holder).html('Browser tidak support FileReader');
            }
        } else {
            $(img_holder).html(currentImagePath);
        }
    });

    $(document).on('submit', '#form_cv', function(e) {
        e.preventDefault();

        var formData = new FormData($('#form_cv')[0]);

        $.ajax({
            url: "{{ URL::route('profile.cv_update') }}",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('.btn-cv-spinner').removeClass('d-none');
                $('.btn-cv').addClass('d-none');
            },
            success: function (response) {
                Toast.fire({
                    icon: 'success',
                    title: 'Curriculum vitae berhasil diubah'
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
        })
    })

    // upload ijazah
    $('input[type="file"][name="ijazah"]').on('change', function() {
        var img_path = $(this)[0].value;
        var img_holder = $('.img_ijazah');
        var currentImagePath = $(this).data('value');
        var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
        if (extension == 'jpg' || extension == 'jpeg' || extension == 'png') {
            if (typeof(FileReader) != 'undefind') {
                img_holder.empty();
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('<img/>', {'src':e.target.result, 'class':'img-fluid'}).appendTo(img_holder);
                }
                img_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                $(img_holder).html('Browser tidak support FileReader');
            }
        } else {
            $(img_holder).html(currentImagePath);
        }
    });

    $(document).on('submit', '#form_ijazah', function(e) {
        e.preventDefault();

        var formData = new FormData($('#form_ijazah')[0]);

        $.ajax({
            url: "{{ URL::route('profile.ijazah_update') }}",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('.btn-ijazah-spinner').removeClass('d-none');
                $('.btn-ijazah').addClass('d-none');
            },
            success: function (response) {
                Toast.fire({
                    icon: 'success',
                    title: 'Ijazah berhasil diubah'
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
        })
    })

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
                var biodata_data = "" +
                "<div class=\"col-lg-3 col-md-3 col-sm-12 col-12\">" +
                    "<div class=\"form-group\">" +
                        "<label for=\"nama_lengkap\" class=\"col-form-label col-form-label-sm font-weight-light\">Nama Lengkap</label>" +
                        "<input type=\"text\" class=\"form-control form-control-sm\" id=\"nama_lengkap\" name=\"nama_lengkap\" maxlength=\"50\" value=\"" + response.biodatas.nama_lengkap + "\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                        "<small id=\"error_nama_lengkap\" class=\"form-text text-danger font-italic\"></small>" +
                    "</div>" +
                "</div>" +
                "<div class=\"col-lg-3 col-md-3 col-sm-12 col-12\">" +
                    "<div class=\"form-group\">" +
                        "<label for=\"nama_panggilan\" class=\"col-form-label col-form-label-sm font-weight-light\">Nama Panggilan</label>" +
                        "<input type=\"text\" class=\"form-control form-control-sm\" id=\"nama_panggilan\" name=\"nama_panggilan\" maxlength=\"20\" value=\"" + response.biodatas.nama_panggilan + "\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                        "<small id=\"error_nama_panggilan\" class=\"form-text text-danger font-italic\"></small>" +
                    "</div>" +
                "</div>" +
                "<div class=\"col-lg-3 col-md-3 col-sm-12 col-12\">" +
                    "<div class=\"form-group\">" +
                        "<label for=\"gender\" class=\"col-form-label col-form-label-sm font-weight-light\">Jenis Kelamin</label>" +
                        "<select name=\"gender\" id=\"gender\" class=\"form-control form-control-sm\">" +
                            "<option value=\"\">-- Pilih Jenis Kelamin --</option>" +
                            "<option value=\"L\"";

                            if (response.biodatas.gender == 'L' ) {
                                biodata_data += "selected";
                            }

                            biodata_data += ">L (Laki - laki)</option>";
                            biodata_data += "<option value=\"P\"";

                            if ( response.biodatas.gender == "P" ) {
                                biodata_data += "selected";
                            }

                            biodata_data += ">P (Perempuan)</option>" +
                        "</select>" +
                        "<small id=\"error_gender\" class=\"form-text text-danger font-italic\"></small>" +
                    "</div>" +
                "</div>" +
                "<div class=\"col-lg-3 col-md-3 col-sm-12 col-12\">" +
                    "<div class=\"form-group\">" +
                        "<label for=\"nomor_ktp\" class=\"col-form-label col-form-label-sm font-weight-light\">Nomor KTP</label>" +
                        "<input type=\"number\" class=\"form-control form-control-sm\" id=\"nomor_ktp\" name=\"nomor_ktp\" maxlength=\"18\" value=\"" + response.biodatas.nomor_ktp + "\">" +
                        "<small id=\"error_nomor_ktp\" class=\"form-text text-danger font-italic\"></small>" +
                    "</div>" +
                "</div>" +
                "<div class=\"col-lg-3 col-md-3 col-sm-12 col-12\">" +
                    "<div class=\"form-group\">" +
                        "<label for=\"status_kawin\" class=\"col-form-label col-form-label-sm font-weight-light\">Status Perkawinan</label>" +
                        "<select name=\"status_kawin\" id=\"status_kawin\" class=\"form-control form-control-sm\">" +
                            "<option value=\"\">-- Pilih Status --</option>" +
                            "<option value=\"lajang\"";

                            if ( response.biodatas.status_kawin == "lajang" ) {
                                biodata_data += "selected";
                            }

                            biodata_data += ">LAJANG</option>" +
                            "<option value=\"menikah\"";

                            if ( response.biodatas.status_kawin == "menikah" ) {
                                biodata_data += "selected";
                            }

                            biodata_data += ">MENIKAH</option>" +
                            "<option value=\"cerai\"";

                            if ( response.biodatas.status_kawin == "cerai" ) {
                                biodata_data += "selected";
                            }

                            biodata_data += ">CERAI</option>" +
                        "</select>" +
                        "<small id=\"error_status_kawin\" class=\"form-text text-danger font-italic\"></small>" +
                    "</div>" +
                "</div>" +
                "<div class=\"col-lg-3 col-md-3 col-sm-12 col-12\">" +
                    "<div class=\"form-group\">" +
                        "<label for=\"agama\" class=\"col-form-label col-form-label-sm font-weight-light\">Agama</label>" +
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
                        "<label for=\"tempat_lahir\" class=\"col-form-label col-form-label-sm font-weight-light\">Tempat Lahir</label>" +
                        "<input type=\"text\" class=\"form-control form-control-sm\" id=\"tempat_lahir\" name=\"tempat_lahir\" maxlength=\"50\" value=\"" + response.biodatas.tempat_lahir + "\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                        "<small id=\"error_tempat_lahir\" class=\"form-text text-danger font-italic\"></small>" +
                    "</div>" +
                "</div>" +
                "<div class=\"col-lg-3 col-md-3 col-sm-12 col-12\">" +
                    "<div class=\"form-group\">" +
                        "<label for=\"tanggal_lahir\" class=\"col-form-label col-form-label-sm font-weight-light\">Tanggal Lahir</label>" +
                        "<input type=\"date\" class=\"form-control form-control-sm\" id=\"tanggal_lahir\" name=\"tanggal_lahir\" value=\"" + response.biodatas.tanggal_lahir + "\">" +
                        "<small id=\"error_tanggal_lahir\" class=\"form-text text-danger font-italic\"></small>" +
                    "</div>" +
                "</div>" +
                "<div class=\"col-lg-6 col-md-6 col-sm-12 col-12\">" +
                    "<div class=\"form-group\">" +
                        "<label for=\"alamat_asal\" class=\"col-form-label col-form-label-sm font-weight-light\">Alamat KTP</label>" +
                        "<textarea class=\"form-control form-control-sm\" rows=\"3\" id=\"alamat_asal\" name=\"alamat_asal\" onkeyup=\"this.value = this.value.toUpperCase()\">" + response.biodatas.alamat_asal + "</textarea>" +
                        "<small id=\"error_alamat_asal\" class=\"form-text text-danger font-italic\"></small>" +
                    "</div>" +
                "</div>" +
                "<div class=\"col-lg-6 col-md-6 col-sm-12 col-12\">" +
                    "<div class=\"form-group\">" +
                        "<label for=\"alamat_domisili\" class=\"col-form-label col-form-label-sm font-weight-light\">Alamat Sekarang</label>" +
                        "<textarea class=\"form-control form-control-sm\" rows=\"3\" id=\"alamat_domisili\" name=\"alamat_domisili\" onkeyup=\"this.value = this.value.toUpperCase()\">" + response.biodatas.alamat_domisili + "</textarea>" +
                        "<small id=\"error_alamat_domisili\" class=\"form-text text-danger font-italic\"></small>" +
                    "</div>" +
                "</div>" +
                "<div class=\"col-lg-3 col-md-3 col-sm-12 col-12\">" +
                    "<div class=\"form-group\">" +
                        "<label for=\"sim\" class=\"font-weight-light\">Jenis & Nomor SIM</label>" +
                        "<div class=\"row\">" +
                            "<div class=\"col-md-4 col-sm-4 col-4\">" +
                                "<input type=\"text\" id=\"edit_jenis_sim\" name=\"jenis_sim\" class=\"form-control form-control-sm\" maxlength=\"10\" value=\"" + response.biodatas.jenis_sim + "\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                                "<small id=\"error_jenis_sim\" class=\"form-text text-danger\"></small>" +
                            "</div>" +
                            "<div class=\"col-md-8 col-sm-8 col-8\">" +
                                "<input type=\"text\" id=\"edit_nomor_sim\" name=\"nomor_sim\" class=\"form-control form-control-sm\" maxlength=\"15\" value=\"" + response.biodatas.nomor_sim + "\">" +
                                "<small id=\"error_nomor_sim\" class=\"form-text text-danger\"></small>" +
                            "</div>" +
                        "</div>" +
                    "</div>" +
                "</div>" +
                "<div class=\"col-lg-3 col-md-3 col-sm-12 col-12\">" +
                    "<div class=\"form-group\">" +
                        "<label for=\"email\" class=\"col-form-label col-form-label-sm font-weight-light\">Email</label>" +
                        "<input type=\"email\" class=\"form-control form-control-sm\" id=\"email\" name=\"email\" maxlength=\"50\" value=\"" + response.biodatas.email + "\" disabled>" +
                        "<small id=\"error_email\" class=\"form-text text-danger font-italic\"></small>" +
                    "</div>" +
                "</div>" +
                "<div class=\"col-lg-3 col-md-3 col-sm-12 col-12\">" +
                    "<div class=\"form-group\">" +
                        "<label for=\"telepon\" class=\"col-form-label col-form-label-sm font-weight-light\">Telepon</label>" +
                        "<input type=\"text\" class=\"form-control form-control-sm\" id=\"telepon\" name=\"telepon\" maxlength=\"15\" value=\"" + response.biodatas.telepon + "\">" +
                        "<small id=\"error_telepon\" class=\"form-text text-danger font-italic\"></small>" +
                    "</div>" +
                "</div>" +
                "<div class=\"col-lg-3 col-md-3 col-sm-12 col-12\">" +
                    "<div class=\"form-group\">" +
                        "<label for=\"penghasilan_ortu\" class=\"col-form-label col-form-label-sm font-weight-light\">Penghasilan Orang Tua</label>" +
                        "<input type=\"text\" class=\"form-control form-control-sm\" id=\"penghasilan_ortu\" name=\"penghasilan_ortu\" maxlength=\"15\" value=\"" + format_rupiah(response.biodatas.penghasilan_ortu) + "\">" +
                        "<small id=\"error_penghasilan_ortu\" class=\"form-text text-danger font-italic\"></small>" +
                    "</div>" +
                "</div>";
                $('#biodata_data').append(biodata_data);

                var penghasilan_ortu = document.getElementById("penghasilan_ortu");
                penghasilan_ortu.addEventListener("keyup", function(e) {
                    penghasilan_ortu.value = formatRupiah(this.value, "");
                });
            }
        });
    }

    $(document).on('submit', '#biodata_form', function (e) {
        e.preventDefault();

        $('#error_telepon').empty();
        $('#error_nama_lengkap').empty();
        $('#error_nama_panggilan').empty();
        $('#error_nomor_ktp').empty();
        $('#error_gender').empty();
        $('#error_agama').empty();
        $('#error_status_kawin').empty();
        $('#error_tempat_lahir').empty();
        $('#error_tanggal_lahir').empty();
        $('#error_alamat_asal').empty();
        $('#error_alamat_domisili').empty();
        $('#error_jenis_sim').empty();
        $('#error_nomor_sim').empty();
        $('#error_penghasilan_ortu').empty();

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
                if (response.status == 400) {
                    $('#error_telepon').append(response.errors.telepon);
                    $('#error_nama_lengkap').append(response.errors.nama_lengkap);
                    $('#error_nama_panggilan').append(response.errors.nama_panggilan);
                    $('#error_nomor_ktp').append(response.errors.nomor_ktp);
                    $('#error_gender').append(response.errors.gender);
                    $('#error_agama').append(response.errors.agama);
                    $('#error_status_kawin').append(response.errors.status_kawin);
                    $('#error_tempat_lahir').append(response.errors.tempat_lahir);
                    $('#error_tanggal_lahir').append(response.errors.tanggal_lahir);
                    $('#error_alamat_asal').append(response.errors.alamat_asal);
                    $('#error_alamat_domisili').append(response.errors.alamat_domisili);
                    $('#error_jenis_sim').append(response.errors.jenis_sim);
                    $('#error_nomor_sim').append(response.errors.nomor_sim);
                    $('#error_penghasilan_ortu').append(response.errors.penghasilan_ortu);

                    setTimeout(() => {
                        $('.btn-biodata-spinner').addClass('d-none');
                        $('.btn-biodata-save').removeClass('d-none');
                    }, 1000);
                } else {
                    Toast.fire({
                        icon: 'success',
                        title: 'Data behasil ditambah'
                    });

                    setTimeout(() => {
                        window.location.reload(1);
                    }, 1000);
                }
            },
            error: function(xhr, status, error) {
                var errorMessage = xhr.status + ': ' + error

                Toast.fire({
                    icon: 'error',
                    title: 'Error - ' + errorMessage
                });
            }
        });
    });

    // sebelum menikah
    $('#sebelum_menikah_jenis_kelamin').prop('disabled', true);

    $('#sebelum_menikah_hubungan').on('change', function() {
        if ($(this).val() == "AYAH" || $(this).val() == "KAKEK" || $(this).val() == "SDR LAKI - LAKI") {
            $('#sebelum_menikah_jenis_kelamin').val("l");
            $('#sebelum_menikah_jenis_kelamin').prop('disabled', true);
        } else if ($(this).val() == "IBU" || $(this).val() == "NENEK" || $(this).val() == "SDR PEREMPUAN") {
            $('#sebelum_menikah_jenis_kelamin').val("p");
            $('#sebelum_menikah_jenis_kelamin').prop('disabled', true);
        } else if ($(this).val() == "") {
            $('#sebelum_menikah_jenis_kelamin').val("");
            $('#sebelum_menikah_jenis_kelamin').prop('disabled', true);
        } else {
            $('#sebelum_menikah_jenis_kelamin').val("");
            $('#sebelum_menikah_jenis_kelamin').prop('disabled', false);
        }
    });

    sebelumMenikah();
    function sebelumMenikah() {
        var id = $('#id').val();
        var url = '{{ route("profile.sebelum_menikah", ":id") }}';
        url = url.replace(':id', id );

        $.ajax({
            url:url,
            type: 'GET',
            success: function(response) {
                var sebelum_menikah_data = "";

                if (response.sebelum_menikahs.length == 0) {
                    sebelum_menikah_data += "" +
                        "<tr>" +
                            "<td class=\"text-center\" colspan=\"7\">Kosong</td>";
                        "</tr>";
                } else {
                    $.each(response.sebelum_menikahs, function(index, value) {
                        sebelum_menikah_data += "" +
                        "<tr>" +
                            "<td class=\"text-center\">" + value.hubungan + "</td>" +
                            "<td class=\"text-center\">" + value.nama + "</td>" +
                            "<td class=\"text-center\">" + value.usia + "</td>" +
                            "<td class=\"text-center\">" + (value.gender == 'l' ? 'Laki-laki' : 'Perempuan') + "</td>" +
                            "<td class=\"text-center\">" + value.pendidikan + "</td>" +
                            "<td class=\"text-center\">" + value.pekerjaan + "</td>" +
                            "<td class=\"text-center\">" +
                                "<button class=\"sebelum_menikah_btn_delete border-0 bg-transparent text-danger\" title=\"hapus\" data-id=\"" + value.id + "\">" +
                                        "<i class=\"fa fa-trash\"></i>" +
                                "</button>" +
                            "</td>" +
                        "</tr>";
                    });
                }
                $('#data_sebelum_menikah').append(sebelum_menikah_data);
            }
        });
    }

    $('#sebelum_menikah_form').submit(function(e) {
        e.preventDefault();
        if ($('#sebelum_menikah_hubungan').val() == "" || $('#sebelum_menikah_nama').val() == "" || $('#sebelum_menikah_usia').val() == "" || $('#sebelum_menikah_jenis_kelamin').val() == "" || $('#sebelum_menikah_pendidikan').val() == "" || $('#sebelum_menikah_pekerjaan').val() == "") {
            alert('Formulir tidak boleh kosong');
        } else {
            $('#data_sebelum_menikah').empty();

            var formData = {
                id: $('#id').val(),
                hubungan: $('#sebelum_menikah_hubungan').val(),
                nama: $('#sebelum_menikah_nama').val(),
                usia: $('#sebelum_menikah_usia').val(),
                gender: $('#sebelum_menikah_jenis_kelamin').val(),
                pendidikan: $('#sebelum_menikah_pendidikan').val(),
                pekerjaan: $('#sebelum_menikah_pekerjaan').val()
            }

            $.ajax({
                url: "{{ URL::route('profile.sebelum_menikah_store') }}",
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    $('.btn-sebelum-menikah-spinner').removeClass('d-none');
                    $('.btn-sebelum-menikah-save').addClass('d-none');
                },
                success: function(response) {
                    var sebelum_menikah_data = "";

                    if (response.sebelum_menikahs.length == 0) {
                        sebelum_menikah_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\" colspan=\"7\">Kosong</td>";
                            "</tr>";
                    } else {
                        $.each(response.sebelum_menikahs, function(index, value) {
                            sebelum_menikah_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\">" + value.hubungan + "</td>" +
                                "<td class=\"text-center\">" + value.nama + "</td>" +
                                "<td class=\"text-center\">" + value.usia + "</td>" +
                                "<td class=\"text-center\">" + (value.gender == 'l' ? 'Laki-laki' : 'Perempuan') + "</td>" +
                                "<td class=\"text-center\">" + value.pendidikan + "</td>" +
                                "<td class=\"text-center\">" + value.pekerjaan + "</td>" +
                                "<td class=\"text-center\">" +
                                    "<button class=\"sebelum_menikah_btn_delete border-0 bg-transparent text-danger\" title=\"hapus\" data-id=\"" + value.id + "\">" +
                                            "<i class=\"fa fa-trash\"></i>" +
                                    "</button>" +
                                "</td>" +
                            "</tr>";
                        });
                    }
                    $('#data_sebelum_menikah').append(sebelum_menikah_data);

                    // empty value
                    $('#sebelum_menikah_hubungan').val("");
                    $('#sebelum_menikah_nama').val("");
                    $('#sebelum_menikah_usia').val("");
                    $('#sebelum_menikah_jenis_kelamin').val("");
                    $('#sebelum_menikah_pendidikan').val("");
                    $('#sebelum_menikah_pekerjaan').val("");

                    Toast.fire({
                        icon: 'success',
                        title: 'Data sebelum menikah berhasil diperbaharui'
                    });

                    setTimeout(() => {
                        $('.btn-sebelum-menikah-spinner').addClass('d-none');
                        $('.btn-sebelum-menikah-save').removeClass('d-none');
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

    $('body').on('click', '.sebelum_menikah_btn_delete', function() {
        var result = confirm('Yakin akan dihapus?');
        if (result) {
            $('#data_sebelum_menikah').empty();

            var id = $(this).attr('data-id');
            var url = '{{ route("profile.sebelum_menikah_delete", ":id") }}';
            url = url.replace(':id', id );

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    var sebelum_menikah_data = "";

                    if (response.sebelum_menikahs.length == 0) {
                        sebelum_menikah_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\" colspan=\"7\">Kosong</td>";
                            "</tr>";
                    } else {
                        $.each(response.sebelum_menikahs, function(index, value) {
                            sebelum_menikah_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\">" + value.hubungan + "</td>" +
                                "<td class=\"text-center\">" + value.nama + "</td>" +
                                "<td class=\"text-center\">" + value.usia + "</td>" +
                                "<td class=\"text-center\">" + (value.gender == 'l' ? 'Laki-laki' : 'Perempuan') + "</td>" +
                                "<td class=\"text-center\">" + value.pendidikan + "</td>" +
                                "<td class=\"text-center\">" + value.pekerjaan + "</td>" +
                                "<td class=\"text-center\">" +
                                    "<button class=\"sebelum_menikah_btn_delete border-0 bg-transparent text-danger\" title=\"hapus\" data-id=\"" + value.id + "\">" +
                                            "<i class=\"fa fa-trash\"></i>" +
                                    "</button>" +
                                "</td>" +
                            "</tr>";
                        });
                    }
                    $('#data_sebelum_menikah').append(sebelum_menikah_data);

                    Toast.fire({
                        icon: 'success',
                        title: 'Data sebelum menikah berhasil dihapus'
                    });
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + error

                    Toast.fire({
                        icon: 'error',
                        title: 'Error - ' + errorMessage
                    });
                }
            });
        } else {
            return false;
        }
    });

    // setelah menikah
    setelahMenikah();
    function setelahMenikah() {
        var id = $('#id').val();
        var url = '{{ route("profile.setelah_menikah", ":id") }}';
        url = url.replace(':id', id );

        $.ajax({
            url:url,
            type: 'GET',
            success: function(response) {
                var setelah_menikah_data = "";

                if (response.setelah_menikahs.length == 0) {
                    setelah_menikah_data += "" +
                        "<tr>" +
                            "<td class=\"text-center\" colspan=\"6\">Kosong</td>";
                        "</tr>";
                } else {
                    $.each(response.setelah_menikahs, function(index, value) {
                        setelah_menikah_data += "" +
                        "<tr>" +
                            "<td class=\"text-center\">" + value.hubungan + "</td>" +
                            "<td class=\"text-center\">" + value.nama + "</td>" +
                            "<td class=\"text-center\">" + value.tempat_lahir + "</td>" +
                            "<td class=\"text-center\">" + value.tanggal_lahir + "</td>" +
                            "<td class=\"text-center\">" + value.pekerjaan + "</td>" +
                            "<td class=\"text-center\">" +
                                "<button class=\"setelah_menikah_btn_delete border-0 bg-transparent text-danger\" title=\"hapus\" data-id=\"" + value.id + "\">" +
                                        "<i class=\"fa fa-trash\"></i>" +
                                "</button>" +
                            "</td>" +
                        "</tr>";
                    });
                }
                $('#data_setelah_menikah').append(setelah_menikah_data);
            }
        });
    }

    $('#setelah_menikah_form').submit(function(e) {
        e.preventDefault();
        if ($('#setelah_menikah_hubungan').val() == "" || $('#setelah_menikah_nama').val() == "" || $('#setelah_menikah_tempat_lahir').val() == "" || $('#setelah_menikah_tanggal_lahir').val() == "" || $('#setelah_menikah_pekerjaan').val() == "") {
            alert('Formulir tidak boleh kosong');
        } else {
            $('#data_setelah_menikah').empty();

            var formData = {
                id: $('#id').val(),
                hubungan: $('#setelah_menikah_hubungan').val(),
                nama: $('#setelah_menikah_nama').val(),
                tempat_lahir: $('#setelah_menikah_tempat_lahir').val(),
                tanggal_lahir: $('#setelah_menikah_tanggal_lahir').val(),
                pekerjaan: $('#setelah_menikah_pekerjaan').val()
            }

            $.ajax({
                url: "{{ URL::route('profile.setelah_menikah_store') }}",
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    $('.btn-setelah-menikah-spinner').removeClass('d-none');
                    $('.btn-setelah-menikah-save').addClass('d-none');
                },
                success: function(response) {
                    var setelah_menikah_data = "";

                    if (response.setelah_menikahs.length == 0) {
                        setelah_menikah_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\" colspan=\"6\">Kosong</td>";
                            "</tr>";
                    } else {
                        $.each(response.setelah_menikahs, function(index, value) {
                            setelah_menikah_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\">" + value.hubungan + "</td>" +
                                "<td class=\"text-center\">" + value.nama + "</td>" +
                                "<td class=\"text-center\">" + value.tempat_lahir + "</td>" +
                                "<td class=\"text-center\">" + value.tanggal_lahir + "</td>" +
                                "<td class=\"text-center\">" + value.pekerjaan + "</td>" +
                                "<td class=\"text-center\">" +
                                    "<button class=\"setelah_menikah_btn_delete border-0 bg-transparent text-danger\" title=\"hapus\" data-id=\"" + value.id + "\">" +
                                            "<i class=\"fa fa-trash\"></i>" +
                                    "</button>" +
                                "</td>" +
                            "</tr>";
                        });
                    }
                    $('#data_setelah_menikah').append(setelah_menikah_data);

                    // empty value
                    $('#setelah_menikah_hubungan').val("");
                    $('#setelah_menikah_nama').val("");
                    $('#setelah_menikah_tempat_lahir').val("");
                    $('#setelah_menikah_tanggal_lahir').val("");
                    $('#setelah_menikah_pekerjaan').val("");

                    Toast.fire({
                        icon: 'success',
                        title: 'Data setelah menikah berhasil diperbaharui'
                    });

                    setTimeout(() => {
                        $('.btn-setelah-menikah-spinner').addClass('d-none');
                        $('.btn-setelah-menikah-save').removeClass('d-none');
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

    $('body').on('click', '.setelah_menikah_btn_delete', function() {
        var result = confirm('Yakin akan dihapus?');
        if (result) {
            $('#data_setelah_menikah').empty();

            var id = $(this).attr('data-id');
            var url = '{{ route("profile.setelah_menikah_delete", ":id") }}';
            url = url.replace(':id', id );

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    var setelah_menikah_data = "";

                    if (response.setelah_menikahs.length == 0) {
                        setelah_menikah_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\" colspan=\"6\">Kosong</td>";
                            "</tr>";
                    } else {
                        $.each(response.setelah_menikahs, function(index, value) {
                            setelah_menikah_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\">" + value.hubungan + "</td>" +
                                "<td class=\"text-center\">" + value.nama + "</td>" +
                                "<td class=\"text-center\">" + value.tempat_lahir + "</td>" +
                                "<td class=\"text-center\">" + value.tanggal_lahir + "</td>" +
                                "<td class=\"text-center\">" + value.pekerjaan + "</td>" +
                                "<td class=\"text-center\">" +
                                    "<button class=\"setelah_menikah_btn_delete border-0 bg-transparent text-danger\" title=\"hapus\" data-id=\"" + value.id + "\">" +
                                            "<i class=\"fa fa-trash\"></i>" +
                                    "</button>" +
                                "</td>" +
                            "</tr>";
                        });
                    }
                    $('#data_setelah_menikah').append(setelah_menikah_data);

                    Toast.fire({
                        icon: 'success',
                        title: 'Data setelah menikah berhasil dihapus'
                    });
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + error

                    Toast.fire({
                        icon: 'error',
                        title: 'Error - ' + errorMessage
                    });
                }
            });
        } else {
            return false;
        }
    });

    // kerabat darurat
    kerabatDarurat();
    function kerabatDarurat() {
        var id = $('#id').val();
        var url = '{{ route("profile.kerabat_darurat", ":id") }}';
        url = url.replace(':id', id );

        $.ajax({
            url:url,
            type: 'GET',
            success: function(response) {
                var kerabat_darurat_data = "";

                if (response.kerabat_darurats.length == 0) {
                    kerabat_darurat_data += "" +
                        "<tr>" +
                            "<td class=\"text-center\" colspan=\"6\">Kosong</td>";
                        "</tr>";
                } else {
                    $.each(response.kerabat_darurats, function(index, value) {
                        kerabat_darurat_data += "" +
                        "<tr>" +
                            "<td class=\"text-center\">" + value.hubungan + "</td>" +
                            "<td class=\"text-center\">" + value.nama + "</td>" +
                            "<td class=\"text-center\">" + (value.gender == 'l' ? 'Laki-laki' : 'Perempuan') + "</td>" +
                            "<td class=\"text-center\">" + value.telepon + "</td>" +
                            "<td class=\"text-center\">" + value.alamat + "</td>" +
                            "<td class=\"text-center\">" +
                                "<button class=\"kerabat_darurat_btn_delete border-0 bg-transparent text-danger\" title=\"hapus\" data-id=\"" + value.id + "\">" +
                                        "<i class=\"fa fa-trash\"></i>" +
                                "</button>" +
                            "</td>" +
                        "</tr>";
                    });
                }
                $('#data_kerabat_darurat').append(kerabat_darurat_data);
            }
        });
    }

    $('#kerabat_darurat_form').submit(function(e) {
        e.preventDefault();
        if ($('#kerabat_darurat_hubungan').val() == "" || $('#kerabat_darurat_nama').val() == "" || $('#kerabat_darurat_jenis_kelamin').val() == "" || $('#kerabat_darurat_telepon').val() == "" || $('#kerabat_darurat_alamat').val() == "") {
            alert('Formulir tidak boleh kosong');
        } else {
            $('#data_kerabat_darurat').empty();

            var formData = {
                id: $('#id').val(),
                hubungan: $('#kerabat_darurat_hubungan').val(),
                nama: $('#kerabat_darurat_nama').val(),
                gender: $('#kerabat_darurat_jenis_kelamin').val(),
                telepon: $('#kerabat_darurat_telepon').val(),
                alamat: $('#kerabat_darurat_alamat').val()
            }

            $.ajax({
                url: "{{ URL::route('profile.kerabat_darurat_store') }}",
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    $('.btn-kerabat-darurat-spinner').removeClass('d-none');
                    $('.btn-kerabat-darurat-save').addClass('d-none');
                },
                success: function(response) {
                    var kerabat_darurat_data = "";

                    if (response.kerabat_darurats.length == 0) {
                        kerabat_darurat_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\" colspan=\"6\">Kosong</td>";
                            "</tr>";
                    } else {
                        $.each(response.kerabat_darurats, function(index, value) {
                            kerabat_darurat_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\">" + value.hubungan + "</td>" +
                                "<td class=\"text-center\">" + value.nama + "</td>" +
                                "<td class=\"text-center\">" + (value.gender == 'l' ? 'Laki-laki' : 'Perempuan') + "</td>" +
                                "<td class=\"text-center\">" + value.telepon + "</td>" +
                                "<td class=\"text-center\">" + value.alamat + "</td>" +
                                "<td class=\"text-center\">" +
                                    "<button class=\"kerabat_darurat_btn_delete border-0 bg-transparent text-danger\" title=\"hapus\" data-id=\"" + value.id + "\">" +
                                            "<i class=\"fa fa-trash\"></i>" +
                                    "</button>" +
                                "</td>" +
                            "</tr>";
                        });
                    }
                    $('#data_kerabat_darurat').append(kerabat_darurat_data);

                    // empty value
                    $('#kerabat_darurat_hubungan').val("");
                    $('#kerabat_darurat_nama').val("");
                    $('#kerabat_darurat_jenis_kelamin').val("");
                    $('#kerabat_darurat_tanggal_telepon').val("");
                    $('#kerabat_darurat_alamat').val("");

                    Toast.fire({
                        icon: 'success',
                        title: 'Data kerabat darurat berhasil diperbaharui'
                    });

                    setTimeout(() => {
                        $('.btn-kerabat-darurat-spinner').addClass('d-none');
                        $('.btn-kerabat-darurat-save').removeClass('d-none');
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

    $('body').on('click', '.kerabat_darurat_btn_delete', function() {
        var result = confirm('Yakin akan dihapus?');
        if (result) {
            $('#data_kerabat_darurat').empty();

            var id = $(this).attr('data-id');
            var url = '{{ route("profile.kerabat_darurat_delete", ":id") }}';
            url = url.replace(':id', id );

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    var kerabat_darurat_data = "";

                    if (response.kerabat_darurats.length == 0) {
                        kerabat_darurat_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\" colspan=\"6\">Kosong</td>";
                            "</tr>";
                    } else {
                        $.each(response.kerabat_darurats, function(index, value) {
                            kerabat_darurat_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\">" + value.hubungan + "</td>" +
                                "<td class=\"text-center\">" + value.nama + "</td>" +
                                "<td class=\"text-center\">" + (value.gender == 'l' ? 'Laki-laki' : 'Perempuan') + "</td>" +
                                "<td class=\"text-center\">" + value.telepon + "</td>" +
                                "<td class=\"text-center\">" + value.alamat + "</td>" +
                                "<td class=\"text-center\">" +
                                    "<button class=\"kerabat_darurat_btn_delete border-0 bg-transparent text-danger\" title=\"hapus\" data-id=\"" + value.id + "\">" +
                                            "<i class=\"fa fa-trash\"></i>" +
                                    "</button>" +
                                "</td>" +
                            "</tr>";
                        });
                    }
                    $('#data_kerabat_darurat').append(kerabat_darurat_data);

                    Toast.fire({
                        icon: 'success',
                        title: 'Data kerabat darurat berhasil dihapus'
                    });
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + error

                    Toast.fire({
                        icon: 'error',
                        title: 'Error - ' + errorMessage
                    });
                }
            });
        } else {
            return false;
        }
    });

    // medsos
    medsos();
    function medsos() {
        var id = $('#id').val();
        var url = '{{ route("profile.medsos", ":id") }}';
        url = url.replace(':id', id );

        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                var medsos_data = "";

                if (response.medsos.length == 0) {
                    medsos_data += "" +
                        "<tr>" +
                            "<td class=\"text-center\" colspan=\"3\">Kosong</td>";
                        "</tr>";
                } else {
                    $.each(response.medsos, function(index, value) {
                        medsos_data += "" +
                                "<tr>" +
                                    "<td class=\"text-center\">" + value.nama_medsos + "</td>" +
                                    "<td class=\"text-center\">" + value.nama_akun + "</td>" +
                                    "<td class=\"text-center\">" +
                                        "<button class=\"medsos_btn_delete border-0 bg-transparent text-danger\" title=\"hapus\" data-id=\"" + value.id + "\">" +
                                                "<i class=\"fa fa-trash\"></i>" +
                                        "</button>" +
                                    "</td>" +
                                "</tr>";
                    });
                }
                $('#data_medsos').append(medsos_data);
            }
        });
    }

    $('#medsos_form').submit(function(e) {
        e.preventDefault();
        if ($('#nama_medsos').val() == "" || $('#nama_akun').val() == "") {
            alert('Formulir tidak boleh kosong');
        } else {
            $('#data_medsos').empty();

            var formData = {
                id: $('#id').val(),
                nama_medsos: $('#nama_medsos').val(),
                nama_akun: $('#nama_akun').val()
            }

            $.ajax({
                url: "{{ URL::route('profile.medsos_store') }}",
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    $('.btn-medsos-spinner').removeClass('d-none');
                    $('.btn-medsos-save').addClass('d-none');
                },
                success: function(response) {
                    var medsos_data = "";

                    if (response.medsoss.length == 0) {
                        medsos_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\" colspan=\"3\">Kosong</td>";
                            "</tr>";
                    } else {
                        $.each(response.medsoss, function(index, value) {
                            medsos_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\">" + value.nama_medsos + "</td>" +
                                "<td class=\"text-center\">" + value.nama_akun + "</td>" +
                                "<td class=\"text-center\">" +
                                    "<button class=\"medsos_btn_delete border-0 bg-transparent text-danger\" title=\"hapus\" data-id=\"" + value.id + "\">" +
                                            "<i class=\"fa fa-trash\"></i>" +
                                    "</button>" +
                                "</td>" +
                            "</tr>";
                        });
                    }
                    $('#data_medsos').append(medsos_data);

                    $('#nama_medsos').val("");
                    $('#nama_akun').val("");

                    Toast.fire({
                        icon: 'success',
                        title: 'Medsos berhasil diperbaharui'
                    });

                    setTimeout(() => {
                        $('.btn-medsos-spinner').addClass('d-none');
                        $('.btn-medsos-save').removeClass('d-none');
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

    $('body').on('click', '.medsos_btn_delete', function() {
        var result = confirm('Yakin akan dihapus?');
        if (result) {
            $('#data_medsos').empty();

            var id = $(this).attr('data-id');
            var url = '{{ route("profile.medsos_delete", ":id") }}';
            url = url.replace(':id', id );

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    var medsos_data = "";

                    if (response.medsoss.length == 0) {
                        medsos_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\" colspan=\"3\">Kosong</td>";
                            "</tr>";
                    } else {
                        $.each(response.medsoss, function(index, value) {
                            medsos_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\">" + value.nama_medsos + "</td>" +
                                "<td class=\"text-center\">" + value.nama_akun + "</td>" +
                                "<td class=\"text-center\">" +
                                    "<button class=\"medsos_btn_delete border-0 bg-transparent text-danger\" title=\"hapus\" data-id=\"" + value.id + "\">" +
                                            "<i class=\"fa fa-trash\"></i>" +
                                    "</button>" +
                                "</td>" +
                            "</tr>";
                        });
                    }
                    $('#data_medsos').append(medsos_data);

                    Toast.fire({
                        icon: 'success',
                        title: 'Medsos behasil dihapus'
                    });
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + error

                    Toast.fire({
                        icon: 'error',
                        title: 'Error - ' + errorMessage
                    });
                }
            });
        } else {
            return false;
        }
    });

    // pendidikan
    pendidikan();
    function pendidikan() {
        var id = $('#id').val();
        var url = '{{ route("profile.pendidikan", ":id") }}';
        url = url.replace(':id', id );

        $.ajax({
            url:url,
            type: 'GET',
            success: function(response) {
                var pendidikan_data = "";

                if (response.pendidikans.length == 0) {
                    pendidikan_data += "" +
                        "<tr>" +
                            "<td class=\"text-center\" colspan=\"7\">Kosong</td>";
                        "</tr>";
                } else {
                    $.each(response.pendidikans, function(index, value) {
                        pendidikan_data += "" +
                        "<tr>" +
                            "<td class=\"text-center\">" + value.tingkat + "</td>" +
                            "<td class=\"text-center\">" + value.nama + "</td>" +
                            "<td class=\"text-center\">" + value.kota + "</td>" +
                            "<td class=\"text-center\">" + value.jurusan + "</td>" +
                            "<td class=\"text-center\">" + value.tahun_masuk + "</td>" +
                            "<td class=\"text-center\">" + value.tahun_lulus + "</td>" +
                            "<td class=\"text-center\">" +
                                "<button class=\"pendidikan_btn_delete border-0 bg-transparent text-danger\" title=\"hapus\" data-id=\"" + value.id + "\">" +
                                        "<i class=\"fa fa-trash\"></i>" +
                                "</button>" +
                            "</td>" +
                        "</tr>";
                    });
                }
                $('#data_pendidikan').append(pendidikan_data);
            }
        });
    }

    $('#pendidikan_form').submit(function(e) {
        e.preventDefault();
        if ($('#pendidikan_tingkat').val() == "" || $('#pendidikan_nama').val() == "" || $('#pendidikan_kota').val() == "" || $('#pendidikan_jurusan').val() == "" || $('#pendidikan_tahun_masuk').val() == "" || $('#pendidikan_tahun_lulus').val() == "") {
            alert('Formulir tidak boleh kosong');
        } else {
            $('#data_pendidikan').empty();

            var formData = {
                id: $('#id').val(),
                tingkat: $('#pendidikan_tingkat').val(),
                nama: $('#pendidikan_nama').val(),
                kota: $('#pendidikan_kota').val(),
                jurusan: $('#pendidikan_jurusan').val(),
                tahun_masuk: $('#pendidikan_tahun_masuk').val(),
                tahun_lulus: $('#pendidikan_tahun_lulus').val()
            }

            $.ajax({
                url: "{{ URL::route('profile.pendidikan_store') }}",
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    $('.btn-pendidikan-spinner').removeClass('d-none');
                    $('.btn-pendidikan-save').addClass('d-none');
                },
                success: function(response) {
                    var pendidikan_data = "";

                    if (response.pendidikans.length == 0) {
                        pendidikan_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\" colspan=\"7\">Kosong</td>";
                            "</tr>";
                    } else {
                        $.each(response.pendidikans, function(index, value) {
                            pendidikan_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\">" + value.tingkat + "</td>" +
                                "<td class=\"text-center\">" + value.nama + "</td>" +
                                "<td class=\"text-center\">" + value.kota + "</td>" +
                                "<td class=\"text-center\">" + value.jurusan + "</td>" +
                                "<td class=\"text-center\">" + value.tahun_masuk + "</td>" +
                                "<td class=\"text-center\">" + value.tahun_lulus + "</td>" +
                                "<td class=\"text-center\">" +
                                    "<button class=\"pendidikan_btn_delete border-0 bg-transparent text-danger\" title=\"hapus\" data-id=\"" + value.id + "\">" +
                                            "<i class=\"fa fa-trash\"></i>" +
                                    "</button>" +
                                "</td>" +
                            "</tr>";
                        });
                    }
                    $('#data_pendidikan').append(pendidikan_data);

                    // empty value
                    $('#pendidikan_tingkat').val("");
                    $('#pendidikan_nama').val("");
                    $('#pendidikan_kota').val("");
                    $('#pendidikan_jurusan').val("");
                    $('#pendidikan_tahun_masuk').val("");
                    $('#pendidikan_tahun_lulus').val("");

                    Toast.fire({
                        icon: 'success',
                        title: 'Data pendidikan berhasil diperbaharui'
                    });

                    setTimeout(() => {
                        $('.btn-pendidikan-spinner').addClass('d-none');
                        $('.btn-pendidikan-save').removeClass('d-none');
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

    $('body').on('click', '.pendidikan_btn_delete', function() {
        var result = confirm('Yakin akan dihapus?');
        if (result) {
            $('#data_pendidikan').empty();

            var id = $(this).attr('data-id');
            var url = '{{ route("profile.pendidikan_delete", ":id") }}';
            url = url.replace(':id', id );

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    var pendidikan_data = "";

                    if (response.pendidikans.length == 0) {
                        pendidikan_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\" colspan=\"7\">Kosong</td>";
                            "</tr>";
                    } else {
                        $.each(response.pendidikans, function(index, value) {
                            pendidikan_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\">" + value.tingkat + "</td>" +
                                "<td class=\"text-center\">" + value.nama + "</td>" +
                                "<td class=\"text-center\">" + value.kota + "</td>" +
                                "<td class=\"text-center\">" + value.jurusan + "</td>" +
                                "<td class=\"text-center\">" + value.tahun_masuk + "</td>" +
                                "<td class=\"text-center\">" + value.tahun_lulus + "</td>" +
                                "<td class=\"text-center\">" +
                                    "<button class=\"pendidikan_btn_delete border-0 bg-transparent text-danger\" title=\"hapus\" data-id=\"" + value.id + "\">" +
                                            "<i class=\"fa fa-trash\"></i>" +
                                    "</button>" +
                                "</td>" +
                            "</tr>";
                        });
                    }
                    $('#data_pendidikan').append(pendidikan_data);

                    Toast.fire({
                        icon: 'success',
                        title: 'Data pendidikan berhasil diperbaharui'
                    });
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + error

                    Toast.fire({
                        icon: 'error',
                        title: 'Error - ' + errorMessage
                    });
                }
            });
        } else {
            return false;
        }
    });

    // penghargaan
    penghargaan();
    function penghargaan() {
        var id = $('#id').val();
        var url = '{{ route("profile.penghargaan", ":id") }}';
        url = url.replace(':id', id );

        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                var penghargaan_data = "";

                if (response.penghargaans.length == 0) {
                    penghargaan_data += "" +
                        "<tr>" +
                            "<td class=\"text-center\" colspan=\"3\">Kosong</td>";
                        "</tr>";
                } else {
                    $.each(response.penghargaans, function(index, value) {
                        penghargaan_data += "" +
                                "<tr>" +
                                    "<td class=\"text-center\">" + value.nama + "</td>" +
                                    "<td class=\"text-center\">" + value.tahun + "</td>" +
                                    "<td class=\"text-center\">" +
                                        "<button class=\"penghargaan_btn_delete border-0 bg-transparent text-danger\" title=\"hapus\" data-id=\"" + value.id + "\">" +
                                                "<i class=\"fa fa-trash\"></i>" +
                                        "</button>" +
                                    "</td>" +
                                "</tr>";
                    });
                }
                $('#data_penghargaan').append(penghargaan_data);
            }
        });
    }

    $('#penghargaan_form').submit(function(e) {
        e.preventDefault();
        if ($('#penghargaan_nama').val() == "" || $('#penghargaan_tahun').val() == "") {
            alert('Formulir tidak boleh kosong');
        } else {
            $('#data_penghargaan').empty();

            var formData = {
                id: $('#id').val(),
                nama: $('#penghargaan_nama').val(),
                tahun: $('#penghargaan_tahun').val()
            }

            $.ajax({
                url: "{{ URL::route('profile.penghargaan_store') }}",
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    $('.btn-penghargaan-spinner').removeClass('d-none');
                    $('.btn-penghargaan-save').addClass('d-none');
                },
                success: function(response) {
                    var penghargaan_data = "";

                    if (response.penghargaans.length == 0) {
                        penghargaan_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\" colspan=\"3\">Kosong</td>";
                            "</tr>";
                    } else {
                        $.each(response.penghargaans, function(index, value) {
                            penghargaan_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\">" + value.nama + "</td>" +
                                "<td class=\"text-center\">" + value.tahun + "</td>" +
                                "<td class=\"text-center\">" +
                                    "<button class=\"penghargaan_btn_delete border-0 bg-transparent text-danger\" title=\"hapus\" data-id=\"" + value.id + "\">" +
                                            "<i class=\"fa fa-trash\"></i>" +
                                    "</button>" +
                                "</td>" +
                            "</tr>";
                        });
                    }
                    $('#data_penghargaan').append(penghargaan_data);

                    $('#penghargaan_nama').val("");
                    $('#penghargaan_tahun').val("");

                    Toast.fire({
                        icon: 'success',
                        title: 'Penghargaan berhasil diperbaharui'
                    });

                    setTimeout(() => {
                        $('.btn-penghargaan-spinner').addClass('d-none');
                        $('.btn-penghargaan-save').removeClass('d-none');
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

    $('body').on('click', '.penghargaan_btn_delete', function() {
        var result = confirm('Yakin akan dihapus?');
        if (result) {
            $('#data_penghargaan').empty();

            var id = $(this).attr('data-id');
            var url = '{{ route("profile.penghargaan_delete", ":id") }}';
            url = url.replace(':id', id );

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    var penghargaan_data = "";

                    if (response.penghargaans.length == 0) {
                        penghargaan_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\" colspan=\"3\">Kosong</td>";
                            "</tr>";
                    } else {
                        $.each(response.penghargaans, function(index, value) {
                            penghargaan_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\">" + value.nama + "</td>" +
                                "<td class=\"text-center\">" + value.tahun + "</td>" +
                                "<td class=\"text-center\">" +
                                    "<button class=\"penghargaan_btn_delete border-0 bg-transparent text-danger\" title=\"hapus\" data-id=\"" + value.id + "\">" +
                                            "<i class=\"fa fa-trash\"></i>" +
                                    "</button>" +
                                "</td>" +
                            "</tr>";
                        });
                    }
                    $('#data_penghargaan').append(penghargaan_data);

                    Toast.fire({
                        icon: 'success',
                        title: 'Penghargaan behasil dihapus'
                    });
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + error

                    Toast.fire({
                        icon: 'error',
                        title: 'Error - ' + errorMessage
                    });
                }
            });
        } else {
            return false;
        }
    });

    // organisasi
    organisasi();
    function organisasi() {
        var id = $('#id').val();
        var url = '{{ route("profile.organisasi", ":id") }}';
        url = url.replace(':id', id );

        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                var organisasi_data = "";

                if (response.organisasis.length == 0) {
                    organisasi_data += "" +
                        "<tr>" +
                            "<td class=\"text-center\" colspan=\"3\">Kosong</td>";
                        "</tr>";
                } else {
                    $.each(response.organisasis, function(index, value) {
                        organisasi_data += "" +
                                "<tr>" +
                                    "<td class=\"text-center\">" + value.nama + "</td>" +
                                    "<td class=\"text-center\">" + value.jabatan + "</td>" +
                                    "<td class=\"text-center\">" + value.masa_kerja + "</td>" +
                                    "<td class=\"text-center\">" +
                                        "<button class=\"organisasi_btn_delete border-0 bg-transparent text-danger\" title=\"hapus\" data-id=\"" + value.id + "\">" +
                                                "<i class=\"fa fa-trash\"></i>" +
                                        "</button>" +
                                    "</td>" +
                                "</tr>";
                    });
                }
                $('#data_organisasi').append(organisasi_data);
            }
        });
    }

    $('#organisasi_form').submit(function(e) {
        e.preventDefault();
        if ($('#organisasi_nama').val() == "" || $('#organisasi_jabatan').val() == "") {
            alert('Formulir tidak boleh kosong');
        } else {
            $('#data_organisasi').empty();

            var formData = {
                id: $('#id').val(),
                nama: $('#organisasi_nama').val(),
                jabatan: $('#organisasi_jabatan').val(),
                masa_kerja: $('#organisasi_masa_kerja').val()
            }

            $.ajax({
                url: "{{ URL::route('profile.organisasi_store') }}",
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    $('.btn-organisasi-spinner').removeClass('d-none');
                    $('.btn-organisasi-save').addClass('d-none');
                },
                success: function(response) {
                    var organisasi_data = "";

                    if (response.organisasis.length == 0) {
                        organisasi_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\" colspan=\"3\">Kosong</td>";
                            "</tr>";
                    } else {
                        $.each(response.organisasis, function(index, value) {
                            organisasi_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\">" + value.nama + "</td>" +
                                "<td class=\"text-center\">" + value.jabatan + "</td>" +
                                "<td class=\"text-center\">" + value.masa_kerja + "</td>" +
                                "<td class=\"text-center\">" +
                                    "<button class=\"organisasi_btn_delete border-0 bg-transparent text-danger\" title=\"hapus\" data-id=\"" + value.id + "\">" +
                                            "<i class=\"fa fa-trash\"></i>" +
                                    "</button>" +
                                "</td>" +
                            "</tr>";
                        });
                    }
                    $('#data_organisasi').append(organisasi_data);

                    $('#organisasi_nama').val("");
                    $('#organisasi_jabatan').val("");
                    $('#organisasi_masa_kerja').val("");

                    Toast.fire({
                        icon: 'success',
                        title: 'Organisasi berhasil diperbaharui'
                    });

                    setTimeout(() => {
                        $('.btn-organisasi-spinner').addClass('d-none');
                        $('.btn-organisasi-save').removeClass('d-none');
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

    $('body').on('click', '.organisasi_btn_delete', function() {
        var result = confirm('Yakin akan dihapus?');
        if (result) {
            $('#data_organisasi').empty();

            var id = $(this).attr('data-id');
            var url = '{{ route("profile.organisasi_delete", ":id") }}';
            url = url.replace(':id', id );

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    var organisasi_data = "";

                    if (response.organisasis.length == 0) {
                        organisasi_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\" colspan=\"3\">Kosong</td>";
                            "</tr>";
                    } else {
                        $.each(response.organisasis, function(index, value) {
                            organisasi_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\">" + value.nama + "</td>" +
                                "<td class=\"text-center\">" + value.jabatan + "</td>" +
                                "<td class=\"text-center\">" + value.masa_kerja + "</td>" +
                                "<td class=\"text-center\">" +
                                    "<button class=\"organisasi_btn_delete border-0 bg-transparent text-danger\" title=\"hapus\" data-id=\"" + value.id + "\">" +
                                            "<i class=\"fa fa-trash\"></i>" +
                                    "</button>" +
                                "</td>" +
                            "</tr>";
                        });
                    }
                    $('#data_organisasi').append(organisasi_data);

                    Toast.fire({
                        icon: 'success',
                        title: 'Organisasi behasil dihapus'
                    });
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + error

                    Toast.fire({
                        icon: 'error',
                        title: 'Error - ' + errorMessage
                    });
                }
            });
        } else {
            return false;
        }
    });

    // riwayat_pekerjaan
    riwayat_pekerjaan();
    function riwayat_pekerjaan() {
        var id = $('#id').val();
        var url = '{{ route("profile.riwayat_pekerjaan", ":id") }}';
        url = url.replace(':id', id );

        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                var riwayat_pekerjaan_data = "";
                $.each(response.riwayat_pekerjaans, function(index, value) {
                    riwayat_pekerjaan_data += "" +
                    "<div class=\"row\">" +
                        "<div class=\"col-lg-6 col-md-6 col-12\">" +
                            "<div class=\"form-horizontal\">" +
                                "<div class=\"form-group row\">" +
                                    "<label for=\"nama_perusahaan\" class=\"col-sm-5 col-form-label\">Nama Perusahaan</label>" +
                                    "<div class=\"col-sm-7\">" +
                                        "<input type=\"text\" class=\"form-control text-right border-0\" value=\"" + value.nama_perusahaan + "\">" +
                                    "</div>" +
                                "</div>" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-12\">" +
                            "<div class=\"form-horizontal\">" +
                                "<div class=\"form-group row\">" +
                                    "<label for=\"jenis_industri\" class=\"col-sm-5 col-form-label\">Jenis Industri</label>" +
                                    "<div class=\"col-sm-7\">" +
                                        "<input type=\"text\" class=\"form-control text-right border-0\" value=\"" + value.jenis_industri + "\">" +
                                    "</div>" +
                                "</div>" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-12\">" +
                            "<div class=\"form-horizontal\">" +
                                "<div class=\"form-group row\">" +
                                    "<label for=\"jabatan_awal\" class=\"col-sm-5 col-form-label\">Jabatan Awal</label>" +
                                    "<div class=\"col-sm-7\">" +
                                        "<input type=\"text\" class=\"form-control text-right border-0\" value=\"" + value.jabatan_awal + "\">" +
                                    "</div>" +
                                "</div>" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-12\">" +
                            "<div class=\"form-horizontal\">" +
                                "<div class=\"form-group row\">" +
                                    "<label for=\"jabatan_akhir\" class=\"col-sm-5 col-form-label\">Jabatan Akhir</label>" +
                                    "<div class=\"col-sm-7\">" +
                                        "<input type=\"text\" class=\"form-control text-right border-0\" value=\"" + value.jabatan_akhir + "\">" +
                                    "</div>" +
                                "</div>" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-12\">" +
                            "<div class=\"form-horizontal\">" +
                                "<div class=\"form-group row\">" +
                                    "<label for=\"awal_bekerja\" class=\"col-sm-5 col-form-label\">Awal Bekerja</label>" +
                                    "<div class=\"col-sm-7\">" +
                                        "<input type=\"text\" class=\"form-control text-right border-0\" value=\"" + tanggalIndo(value.awal_bekerja) + "\">" +
                                    "</div>" +
                                "</div>" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-12\">" +
                            "<div class=\"form-horizontal\">" +
                                "<div class=\"form-group row\">" +
                                    "<label for=\"akhir_bekerja\" class=\"col-sm-5 col-form-label\">Akhir Bekerja</label>" +
                                    "<div class=\"col-sm-7\">" +
                                        "<input type=\"text\" class=\"form-control text-right border-0\" value=\"" + tanggalIndo(value.akhir_bekerja) + "\">" +
                                    "</div>" +
                                "</div>" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-12\">" +
                            "<div class=\"form-horizontal\">" +
                                "<div class=\"form-group row\">" +
                                    "<label for=\"gaji_awal\" class=\"col-sm-5 col-form-label\">Gaji Awal</label>" +
                                    "<div class=\"col-sm-7\">" +
                                        "<input type=\"text\" class=\"form-control text-right border-0\" value=\"" + value.gaji_awal + "\">" +
                                    "</div>" +
                                "</div>" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-12\">" +
                            "<div class=\"form-horizontal\">" +
                                "<div class=\"form-group row\">" +
                                    "<label for=\"gaji_akhir\" class=\"col-sm-5 col-form-label\">Gaji Akhir</label>" +
                                    "<div class=\"col-sm-7\">" +
                                        "<input type=\"text\" class=\"form-control text-right border-0\" value=\"" + value.gaji_akhir + "\">" +
                                    "</div>" +
                                "</div>" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-12\">" +
                            "<div class=\"form-horizontal\">" +
                                "<div class=\"form-group row\">" +
                                    "<label for=\"nama_atasan\" class=\"col-sm-5 col-form-label\">Nama Atasan</label>" +
                                    "<div class=\"col-sm-7\">" +
                                        "<input type=\"text\" class=\"form-control text-right border-0\" value=\"" + value.nama_atasan + "\">" +
                                    "</div>" +
                                "</div>" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-12\">" +
                            "<div class=\"form-horizontal\">" +
                                "<div class=\"form-group row\">" +
                                    "<label for=\"alasan_berhenti\" class=\"col-sm-5 col-form-label\">Alasan Berhenti</label>" +
                                    "<div class=\"col-sm-7\">" +
                                        "<input type=\"text\" class=\"form-control text-right border-0\" value=\"" + value.alasan_berhenti + "\">" +
                                    "</div>" +
                                "</div>" +
                            "</div>" +
                        "</div>" +
                    "</div>" +
                    "<hr>";
                });
                $('#data_riwayat_pekerjaan').append(riwayat_pekerjaan_data);
            }
        });
    }

    $('#riwayat_pekerjaan_form').submit(function(e) {
        e.preventDefault();
        if ($('#riwayat_pekerjaan_nama_perusahaan').val() == "") {
            alert('Formulir tidak boleh kosong');
        } else {
            $('#data_riwayat_pekerjaan').empty();

            var formData = {
                id: $('#id').val(),
                nama_perusahaan: $('#riwayat_pekerjaan_nama_perusahaan').val(),
                jenis_industri: $('#riwayat_pekerjaan_jenis_industri').val(),
                jabatan_awal: $('#riwayat_pekerjaan_jabatan_awal').val(),
                jabatan_akhir: $('#riwayat_pekerjaan_jabatan_akhir').val(),
                awal_bekerja: $('#riwayat_pekerjaan_awal_bekerja').val(),
                akhir_bekerja: $('#riwayat_pekerjaan_akhir_bekerja').val(),
                gaji_awal: $('#riwayat_pekerjaan_gaji_awal').val(),
                gaji_akhir: $('#riwayat_pekerjaan_gaji_akhir').val(),
                nama_atasan: $('#riwayat_pekerjaan_nama_atasan').val(),
                alasan_berhenti: $('#riwayat_pekerjaan_alasan_berhenti').val()
            }

            $.ajax({
                url: "{{ URL::route('profile.riwayat_pekerjaan_store') }}",
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    $('.btn-riwayat-pekerjaan-spinner').removeClass('d-none');
                    $('.btn-riwayat-pekerjaan-save').addClass('d-none');
                },
                success: function(response) {
                    var riwayat_pekerjaan_data = "";

                    if (response.riwayat_pekerjaans.length == 0) {
                        riwayat_pekerjaan_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\" colspan=\"3\">Kosong</td>";
                            "</tr>";
                    } else {
                        $.each(response.riwayat_pekerjaans, function(index, value) {
                            riwayat_pekerjaan_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\">" + value.nama_perusahaan + "</td>" +
                                "<td class=\"text-center\">" + value.jenis_industri + "</td>" +
                                "<td class=\"text-center\">" + value.jabatan_awal + "</td>" +
                                "<td class=\"text-center\">" + value.jabatan_akhir + "</td>" +
                                "<td class=\"text-center\">" + value.awal_bekerja + "</td>" +
                                "<td class=\"text-center\">" + value.akhir_bekerja + "</td>" +
                                "<td class=\"text-center\">" + value.gaji_awal + "</td>" +
                                "<td class=\"text-center\">" + value.gaji_akhir + "</td>" +
                                "<td class=\"text-center\">" + value.nama_atasan + "</td>" +
                                "<td class=\"text-center\">" + value.alasan_berhenti + "</td>" +
                                "<td class=\"text-center\">" +
                                    "<button class=\"riwayat_pekerjaan_btn_delete border-0 bg-transparent text-danger\" title=\"hapus\" data-id=\"" + value.id + "\">" +
                                            "<i class=\"fa fa-trash\"></i>" +
                                    "</button>" +
                                "</td>" +
                            "</tr>";
                        });
                    }
                    $('#data_riwayat_pekerjaan').append(riwayat_pekerjaan_data);

                    $('#riwayat_pekerjaan_nama').val("");
                    $('#riwayat_pekerjaan_jabatan').val("");
                    $('#riwayat_pekerjaan_masa_kerja').val("");

                    Toast.fire({
                        icon: 'success',
                        title: 'Riwayat Pekerjaan berhasil diperbaharui'
                    });

                    setTimeout(() => {
                        $('.btn-riwayat-pekerjaan-spinner').addClass('d-none');
                        $('.btn-riwayat-pekerjaan-save').removeClass('d-none');
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

    $('body').on('click', '.riwayat_pekerjaan_btn_delete', function() {
        var result = confirm('Yakin akan dihapus?');
        if (result) {
            $('#data_riwayat_pekerjaan').empty();

            var id = $(this).attr('data-id');
            var url = '{{ route("profile.riwayat_pekerjaan_delete", ":id") }}';
            url = url.replace(':id', id );

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    var riwayat_pekerjaan_data = "";

                    if (response.riwayat_pekerjaans.length == 0) {
                        riwayat_pekerjaan_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\" colspan=\"3\">Kosong</td>";
                            "</tr>";
                    } else {
                        $.each(response.riwayat_pekerjaans, function(index, value) {
                            riwayat_pekerjaan_data += "" +
                            "<tr>" +
                                "<td class=\"text-center\">" + value.nama_perusahaan + "</td>" +
                                "<td class=\"text-center\">" + value.jenis_industri + "</td>" +
                                "<td class=\"text-center\">" + value.jabatan_awal + "</td>" +
                                "<td class=\"text-center\">" + value.jabatan_akhir + "</td>" +
                                "<td class=\"text-center\">" + value.awal_bekerja + "</td>" +
                                "<td class=\"text-center\">" + value.akhir_bekerja + "</td>" +
                                "<td class=\"text-center\">" + value.gaji_awal + "</td>" +
                                "<td class=\"text-center\">" + value.gaji_akhir + "</td>" +
                                "<td class=\"text-center\">" + value.nama_atasan + "</td>" +
                                "<td class=\"text-center\">" + value.alasan_berhenti + "</td>" +
                                "<td class=\"text-center\">" +
                                    "<button class=\"riwayat_pekerjaan_btn_delete border-0 bg-transparent text-danger\" title=\"hapus\" data-id=\"" + value.id + "\">" +
                                            "<i class=\"fa fa-trash\"></i>" +
                                    "</button>" +
                                "</td>" +
                            "</tr>";
                        });
                    }
                    $('#data_riwayat_pekerjaan').append(riwayat_pekerjaan_data);

                    Toast.fire({
                        icon: 'success',
                        title: 'Riwayat Pekerjaan berhasil dihapus'
                    });
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + error

                    Toast.fire({
                        icon: 'error',
                        title: 'Error - ' + errorMessage
                    });
                }
            });
        } else {
            return false;
        }
    });
});

</script>

@endsection
