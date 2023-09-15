@extends('AdminLTE.layouts.main')

@section('main-content')
<div class="col-12">
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Form Edit Data Skala Nilai</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('skalaNilai.update', ['skalaNilai' => $skalaNilai->id]) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Skala Nilai</label>
                    <input type="text" class="form-control" name="nama_skala" placeholder="Masukkan Nama Skala"
                    maxlength="100" required value="{{ $skalaNilai->nama_skala }}">
                    <label>Nilai Min</label>
                    <input type="number" class="form-control" name="nilai_min"
                    maxlength="2" required value="{{ $skalaNilai->nilai_min }}">
                    <label>Nilai Max</label>
                    <input type="number" class="form-control" name="nilai_max"
                    maxlength="3" required value="{{ $skalaNilai->nilai_max }}">
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
