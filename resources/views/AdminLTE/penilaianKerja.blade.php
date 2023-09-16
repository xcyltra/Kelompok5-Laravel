@extends('AdminLTE.layouts.main')

@section('main-content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Data Pegawai</h3>
                @if (Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isEvaluator()))
                    <button class="btn btn-info float-right" onclick="window.location.href='{{ route('penilaianKerja.create') }}'"><i
                            class="fa fa-plus"></i> Tambah Data</button>
                @else
                    <button class="btn btn-info float-right" onclick="window.location.href='{{ route('penilaianKerja.create') }}'"
                        disabled><i class="fa fa-plus"></i> Tambah Data</button>
                @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th width="2%">No</th>
                            <th>Nama Pegawai</th>
                            <th width="13%">Tanggal Review</th>
                            <th>Evaluator</th>
                            <th>Kategori</th>
                            <th>Nilai</th>
                            <th>Komentar</th>
                            <th width="10%"><i class="fa fa-cog fa-2x"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penilaianKerja as $kerja)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $kerja->pegawai->nama_pegawai ?? '' }}</td>
                                <td class="text-center">{{ $kerja->tgl_review ?? '' }}</td>
                                <td>{{ $kerja->user->name ?? '' }}</td>
                                <td class="text-center">{{ $kerja->kategori->nama_kategori ?? '' }}</td>
                                <td class="text-center">{{ $kerja->skalaNilai->nama_skala ?? '' }}</td>
                                <td>{{ $kerja->komentar ?? ''}}</td>
                                <td class="text-center">
                                    @if (Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isEvaluator()))
                                        <button class="btn btn-warning"
                                            onclick="window.location.href='{{ route('penilaianKerja.edit', ['penilaianKerja' => $kerja->id]) }}'"><i
                                                class="fa fa-edit"></i></button>

                                        <form action="{{ route('penilaianKerja.destroy', ['penilaianKerja' => $kerja->id]) }}"
                                            method="POST" style="display:inline-block"
                                            id="delete-form-{{ $kerja->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger delete-button"
                                                data-id="{{ $kerja->id }}"><i class="fa fa-trash"></i></button>
                                        </form>
                                    @else
                                        <button class="btn btn-warning" disabled><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger" disabled><i class="fa fa-trash"></i></button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            // Delete Function
            document.addEventListener('DOMContentLoaded', function() {
                const deleteButtons = document.querySelectorAll('.delete-button');

                deleteButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const dataId = button.getAttribute('data-id');

                        Swal.fire({
                            icon: 'warning',
                            title: 'Apakah Anda Yakin Data ini Dihapus?',
                            showDenyButton: true,
                            showCancelButton: false,
                            confirmButtonText: '<i class="fa fa-trash"></i> Ya, Hapus!',
                            confirmButtonColor: 'red',
                            denyButtonText: `<i class="fa fa-times"></i> Batal`,
                            denyButtonColor: 'grey',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                const form = document.getElementById(`delete-form-${dataId}`);
                                form.submit();
                            }
                        });
                    });
                });
            });
        </script>
        @if (session('delete_success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Data Berhasil di Hapus.',
                        showConfirmButton: false,
                        timer: 2000
                    });
                });
            </script>
        @endif
        @if (session('delete_error'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan.',
                        text: '{{ session('delete_error') }}'
                    });
                });
            </script>
        @endif
    </div>
@endsection
