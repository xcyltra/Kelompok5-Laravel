@extends('AdminLTE.layouts.main')

@section('main-content')
    <div class="col-12">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Form Edit Data Pegawai</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('pegawai.update', ['pegawai' => $pegawai->id]) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Pegawai</label>
                        <input type="text" class="form-control" name="nama_pegawai" placeholder="Masukkan Nama Pegawai"
                            maxlength="100" required value="{{ $pegawai->nama_pegawai }}">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jk" class="form-control">
                            @if ($pegawai->jk == 'Laki-laki')
                                <option value="Laki-laki" selected>Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            @else
                                <option value="Perempuan" selected>Perempuan</option>
                                <option value="Laki-laki">Laki-laki</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="date" class="form-control" name="tanggal_masuk" required
                            value="{{ $pegawai->tanggal_masuk }}">
                    </div>
                    <div class="form-group">
                        <label>Nama Jabatan</label>
                        <select name="jabatan_id" class="form-control">
                            <option value="">Pilih Divisi</option>
                            @foreach ($jabatans as $jabatan)
                                <option value="{{ $jabatan->id }}" @if ($pegawai->jabatan_id === $jabatan->id) selected @endif>
                                    {{ $jabatan->nama_jabatan }}</option>
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
