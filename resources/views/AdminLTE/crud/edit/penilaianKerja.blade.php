@extends('AdminLTE.layouts.main')

@section('main-content')
    <div class="col-12">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Form Edit Data Penilaian Kinerja</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('penilaianKerja.update', ['penilaianKerja' => $penilaianKerja->id]) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Pegawai</label>
                        <select name="pegawai_id" class="form-control">
                            <option value="">Pilih Pegawai</option>
                            @foreach ($pegawais as $pegawai)
                                <option value="{{ $pegawai->id }}" @if ($penilaianKerja->pegawai_id === $pegawai->id) selected @endif>
                                    {{ $pegawai->nama_pegawai }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Review</label>
                        <input type="date" class="form-control" name="tgl_review" required
                            value="{{ $penilaianKerja->tgl_review }}">
                    </div>
                    <div class="form-group">
                        <label>Evaluator</label>
                        <input type="text" class="form-control" name="evaluator" readonly value="{{ $penilaianKerja->user->name }}">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori_id" class="form-control">
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}" @if ($penilaianKerja->kategori_id === $kategori->id) selected @endif>
                                    {{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nilai</label>
                        <select name="nilai_id" class="form-control">
                            <option value="">Pilih Nilai</option>
                            @foreach ($skalaNilai as $nilai)
                                <option value="{{ $nilai->id }}" @if ($penilaianKerja->nilai_id === $nilai->id) selected @endif>
                                    {{ $nilai->nama_skala }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Komentar</label>
                        <textarea name="komentar" class="form-control" cols="10" rows="5" required maxlength="255">{{ $penilaianKerja->komentar }}</textarea>
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
