@extends('AdminLTE.layouts.main')

@section('main-content')
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Form Tambah Data Divisi</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('divisi.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Divisi</label>
                        <input type="text" class="form-control" name="nama_divisi" placeholder="Masukkan Nama Divisi" maxlength="100" required>
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
