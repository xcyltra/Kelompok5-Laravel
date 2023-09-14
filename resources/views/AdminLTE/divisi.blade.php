@extends('AdminLTE.layouts.main')

@section('main-content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Data Divisi</h3>
                <button class="btn btn-info float-right"><i class="fa fa-plus"></i> Tambah Data</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th width="2%">No</th>
                            <th>Nama Divisi</th>
                            <th width="10%"><i class="fa fa-cog fa-2x"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($divisions as $divisi)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $divisi->nama_divisi }}</td>
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
