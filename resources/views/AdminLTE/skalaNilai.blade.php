@extends('AdminLTE.layouts.main')

@section('main-content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Data Skala Nilai</h3>
                @if (Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isManager()))
                    <button class="btn btn-info float-right" onclick="window.location.href='{{ route('skalaNilai.create') }}'"><i class="fa fa-plus"></i> Tambah Data</button>
                @else
                    <button class="btn btn-info float-right" onclick="window.location.href='{{ route('skalaNilai.create') }}'" disabled><i class="fa fa-plus"></i> Tambah Data</button>
                @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th width="2%">No</th>
                            <th>Nama Skala Nilai</th>
                            <th>Nilai Min</th>
                            <th>Nilai Max</th>
                            <th width="10%"><i class="fa fa-cog fa-2x"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($skalanilai as $skala)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $skala->nama_skala }}</td>
                                <td>{{ $skala->nilai_min }}</td>
                                <td>{{ $skala->nilai_max }}</td>
                                <td class="text-center">
                                    <button class="btn btn-warning"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
