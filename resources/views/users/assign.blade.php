@extends('layouts.main')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Input Hasil Kunjungan</h3>
        </div>
        <form action="{{ route('assign.update', $tamu->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="instansi">Nama Instansi :</label>
                    {{ $tamu->instansi }}
                </div>
                <div class="form-group">
                    <label for="instansi">Nama Mentor :</label>
                    {{ $tamu->mentor }}
                </div>
                <div class="form-group">
                    <label for="ulasan">Ulasan Kunjungan :</label>
                    <textarea class="form-control" id="ulasan" name="ulasan" rows="4">{{ $tamu->ulasan }}</textarea>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary">Perbarui Daftar Kunjungan</button>
                </div>
        </form>
    </div>
@endsection
