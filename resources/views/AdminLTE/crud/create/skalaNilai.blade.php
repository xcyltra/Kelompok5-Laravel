@extends('AdminLTE.layouts.main')

@section('main-content')
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Form Tambah Data Skala Nilai</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('skalaNilai.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Skala Nilai</label>
                        <input type="text" class="form-control" name="nama_skala" placeholder="Masukkan Nama Skala Nilai" maxlength="100" required>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nilai Min</label>
                        <input type="number" class="form-control" name="nilai_min" maxlength="2" required>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nilai Max</label>
                        <input type="number" class="form-control" name="nilai_max" maxlength="3" required>
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