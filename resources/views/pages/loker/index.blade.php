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
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header">
                                <h5>Daftar Lowongan Kerja</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-secondary font-weight-bold">Cabang</th>
                                            <th class="text-center text-secondary font-weight-bold">Lokasi Seleksi</th>
                                            <th class="text-center text-secondary font-weight-bold">Posisi</th>
                                            <th class="text-center text-secondary font-weight-bold">Detail</th>
                                            <th class="text-center text-secondary font-weight-bold">Status</th>
                                            <th class="text-center text-secondary font-weight-bold">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lokers as $item)
                                            <tr>
                                                <td>{{ $item->cabang->nama_cabang }}</td>
                                                <td>{{ $item->lokasi }}</td>
                                                <td>{{ $item->jabatan->nama_jabatan }}</td>
                                                <td class="text-center"><a href="#">Lihat</a></td>
                                                <td class="text-center text-capitalize">
                                                    @foreach ($lamarans as $item_lamaran)
                                                        @if ($item_lamaran->loker_data_id == $item->id)
                                                            {{ $item_lamaran->status }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if (count($item->lamaran) == 0)
                                                        <button class="btn btn-success btn-sm btn-spinner-{{ $item->id }} d-none btn-block" disabled style="margin-top: 0;">
                                                            <span class="spinner-grow spinner-grow-sm"></span>
                                                            Loading...
                                                        </button>
                                                        <button
                                                            type="button"
                                                            id="btn_kirim_{{ $item->id }}"
                                                            class="btn btn-block btn-success btn-sm btn_kirim"
                                                            style="margin-top: 0;"
                                                            data-id="{{ $item->id }}"
                                                            data-cabang="{{ $item->cabang->nama_cabang }}"
                                                            data-lokasi="{{ $item->lokasi }}"
                                                            data-jabatan="{{ $item->jabatan->nama_jabatan }}"
                                                            data-email="{{ Auth::user()->email }}">
                                                            <i class="fas fa-paper-plane"></i> Kirim Lamaran
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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

    $(document).on('click', '.btn_kirim', function (e) {
        e.preventDefault();
        let id = $(this).attr('data-id');

        let formData = {
            id: id,
            email: $(this).attr('data-email'),
            cabang: $(this).attr('data-cabang'),
            lokasi: $(this).attr('data-lokasi'),
            jabatan: $(this).attr('data-jabatan')
        }

        $.ajax({
            url: "{{ URL::route('loker.store') }}",
            type: "post",
            data: formData,
            beforeSend: function() {
                $('.btn-spinner-' + id).removeClass('d-none');
                $('#btn_kirim_' + id).addClass('d-none');
            },
            success: function (response) {
                Toast.fire({
                    icon: 'success',
                    title: 'Data sebelum menikah berhasil diperbaharui'
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
});
</script>

@endsection
