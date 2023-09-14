@extends('AdminLTE.layouts.main')

@section('main-content')
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Form Tambah Data Pegawai</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('pegawai.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Pegawai</label>
                        <input type="text" class="form-control" name="nama_pegawai" placeholder="Masukkan Nama Pegawai"
                            maxlength="100" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jk" class="form-control">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="date" class="form-control" name="tanggal_masuk" required>
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <select name="jabatan_id" class="form-control" required>
                            <option value="">Pilih Jabatan</option>
                            @foreach ($jabatans as $jabatan)
                            <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
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
