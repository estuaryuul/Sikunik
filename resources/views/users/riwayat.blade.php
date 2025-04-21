@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Riwayat Kunjungan</h3>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th style="text-align: center;">Nama Instansi</th>
                        <th style="text-align: center;">Tujuan Kunjungan</th>
                        <th style="text-align: center;">Tanggal Kunjungan</th>
                        <th style="text-align: center;">Waktu Kunjungan</th>
                        <th style="text-align: center;">Status Kunjungan</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ($dataTamu as $tamu)
                        @if (auth()->user()->name == $tamu->instansi)
                            <tr> <!-- Tambahkan ini untuk membungkus setiap baris tabel -->
                                <td>{{ $i }}</td>
                                <td style="text-align: center;">
                                    <strong>{{ $tamu->instansi }}</strong><br>
                                </td>
                                <td style="text-align: center;">{{ $tamu->tujuan }}</td>
                                <td style="text-align: center;">{{ $tamu->tanggal }}</td>
                                <td style="text-align: center;">{{ $tamu->waktu }}</td>
                                <td style="text-align: center;">{{ $tamu->status }}</td>
                                <td style="text-align: center;"> <!-- Perbaikan: Tambahkan kolom untuk tombol -->
                                    <div class="d-flex flex-column" style="width: 57px;">
                                        <a href="{{ route('riwayat.show', $tamu->id) }}"
                                            class="btn btn-primary btn-sm mb-2">Detail</a>
                                        <form action="{{ route('riwayat.destroy', $tamu->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr> <!-- Tambahkan ini untuk menutup baris -->
                            @php $i++; @endphp
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
