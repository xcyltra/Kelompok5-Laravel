@extends('AdminLTE.layouts.main')

@section('main-content')
<div class="col-12">
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Form Edit Data Kategori</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('kategori.update', ['kategori' => $kategori->id]) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" class="form-control" name="nama_kategori" placeholder="Masukkan Nama Kategori"
                    maxlength="100" required value="{{ $kategori->nama_kategori }}">
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
