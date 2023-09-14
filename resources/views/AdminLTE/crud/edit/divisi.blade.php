@extends('AdminLTE.layouts.main')

@section('main-content')
<div class="col-12">
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Form Edit Data Divisi</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('divisi.update', ['divisi' => $divisi->id]) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Divisi</label>
                    <input type="text" class="form-control" name="nama_divisi" placeholder="Masukkan Nama Divisi"
                    maxlength="100" required value="{{ $divisi->nama_divisi }}">
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
