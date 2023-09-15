@extends('AdminLTE.layouts.main')

@section('main-content')
    <div class="col-12">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Form Edit Data Jabatan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('jabatan.update', ['jabatan' => $jabatan->id]) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Jabatan</label>
                        <input type="text" class="form-control" name="nama_jabatan" placeholder="Masukkan Nama Jabatan"
                            maxlength="100" required value="{{ $jabatan->nama_jabatan }}">
                    </div>
                    <div class="form-group">
                        <label>Nama Divisi</label>
                        <select name="divisi_id" class="form-control">
                            <option value="">Pilih Divisi</option>
                            @foreach ($divisis as $divisi)
                                <option value="{{ $divisi->id }}" @if ($jabatan->divisi_id === $divisi->id) selected @endif>
                                    {{ $divisi->nama_divisi }}</option>
                            @endforeach
                        </select>
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
