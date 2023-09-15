@extends('AdminLTE.layouts.main')

@section('main-content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Data Pegawai</h3>
                @if (Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isManager()))
                    <button class="btn btn-info float-right" onclick="window.location.href='{{ route('pegawai.create') }}'"><i class="fa fa-plus"></i> Tambah Data</button>
                @else
                    <button class="btn btn-info float-right" onclick="window.location.href='{{ route('pegawai.create') }}'" disabled><i class="fa fa-plus"></i> Tambah Data</button>
                @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th width="2%">No</th>
                            <th>Nama Pegawai</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Masuk</th>
                            <th>Jabatan</th>
                            <th width="10%"><i class="fa fa-cog fa-2x"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawais as $pegawai)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $pegawai->nama_pegawai }}</td>
                                <td class="text-center">{{ $pegawai->jk }}</td>
                                <td class="text-center">{{ $pegawai->tanggal_masuk }}</td>
                                <td>{{ $pegawai->jabatan->nama_jabatan }}</td>
                                <td class="text-center">
                                    @if (Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isManager()))
                                        <button class="btn btn-warning"
                                            onclick="window.location.href='{{ route('pegawai.edit', ['pegawai' => $pegawai->id]) }}'"><i
                                                class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
    </div>
@endsection
