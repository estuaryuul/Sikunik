@extends('layouts.main')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Informasi Kunjungan</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label><strong>Tujuan Kunjungan:</strong></label>
                <p>{{ $tamu->tujuan }}</p>
            </div>
            <div class="form-group">
                <label><strong>Penanggung Jawab Kunjungan:</strong></label>
                <p>{{ $tamu->name }}</p>
            </div>
            <div class="form-group">
                <label><strong>Jabatan:</strong></label>
                <p>{{ $tamu->jabatan }}</p>
            </div>
            <div class="form-group">
                <label><strong>Jenis Instansi:</strong></label>
                <p>{{ $tamu->jenis }}</p>
            </div>
            <div class="form-group">
                <label><strong>Jumlah Peserta Kunjungan:</strong></label>
                <p>{{ $tamu->jumlah }}</p>
            </div>
            <div class="form-group">
                <label><strong>Nomor HP:</strong></label>
                <p>{{ $tamu->hp }}</p>
            </div>
            <div class="form-group">
                <label><strong>Email Instansi:</strong></label>
                <p>{{ $tamu->surel }}</p>
            </div>
            <div class="form-group">
                <label><strong>Tanggal Kunjungan:</strong></label>
                <p>{{ $tamu->tanggal }}</p>
            </div>
            <div class="form-group">
                <label><strong>Waktu Kunjungan:</strong></label>
                <p>{{ $tamu->waktu }}</p>
            </div>
            <div class="form-group">
                <label><strong>File PDF:</strong></label>
                @if ($tamu->pdf_file)
                    <p><a href="{{ asset('/' . $tamu->pdf_file) }}" target="_blank">Lihat File</a></p>
                @else
                    <p>Tidak ada file yang diunggah.</p>
                @endif
            </div>
            @if (auth()->user()->role == 'admin')
                <div class="">
                    <form action="{{ route('tamu.disetujui', $tamu->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success">Disetujui</button>
                    </form>

                    <form action="{{ route('tamu.disetujuiDgnCtt', $tamu->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-warning">Disetujui Dengan Catatan</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
@endsection
