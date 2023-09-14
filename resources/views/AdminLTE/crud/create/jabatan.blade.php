@extends('AdminLTE.layouts.main')

@section('main-content')
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Form Tambah Data Jabatan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('jabatan.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Divisi</label>
                        <select name="divisi_id" class="form-control" required>
                            <option value="">Pilih Divisi</option>
                            @foreach ($divisis as $divisi)
                            <option value="{{ $divisi->id }}">{{ $divisi->nama_divisi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Jabatan</label>
                        <input type="text" class="form-control" name="nama_jabatan" placeholder="Masukkan Nama Jabatan"
                            maxlength="100">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
