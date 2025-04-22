@extends('layouts.main')
@section('title', 'Pembuatan Jurusan Baru')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pembuatan Jurusan Baru</h5>
                        <form action="{{ route('majors.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="col-form-label">Nama Jurusan</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama Jurusan" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-form-label">Status</label>
                                <select name="is_active" class="form-select" required>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <a href="{{ route('majors.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
