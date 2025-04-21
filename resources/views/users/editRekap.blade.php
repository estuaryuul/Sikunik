@extends('layouts.main')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Akun Instansi</h3>
        </div>
        <form action="{{ route('tamu.update', $tamu->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="tujuan">Tujuan Kunjungan</label>
                    <!-- <input type="text" class="form-control" id="tujuan" name="tujuan" value="{{ $tamu->tujuan }}">
                                                    </div> -->
                    <select class="form-control" id="tujuan" name="tujuan">
                        <option value="">Pilih Tujuan Kunjungan</option>
                        <option value="Konsultan JDIHN" {{ $tamu->tujuan == 'Konsultan JDIHN' ? 'selected' : '' }}>Konsultan
                            JDIHN</option>
                        <option value="Bimbingan Teknis" {{ $tamu->tujuan == 'Bimbingan Teknis' ? 'selected' : '' }}>
                            Bimbingan Teknis</option>
                        <option value="Peminjaman Dokumentasi hukum"
                            {{ $tamu->tujuan == 'Peminjaman Dokumentasi hukum' ? 'selected' : '' }}>Peminjaman Dokumentasi
                            hukum</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Penanggung Jawab Kunjungan</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $tamu->name }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $tamu->jabatan }}">
                    @error('jabatan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Peserta Kunjungan</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $tamu->jumlah }}">
                    @error('jumlah')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="hp">Nomor HP</label>
                    <input type="tel" class="form-control" id="hp" name="hp" value="{{ $tamu->hp }}">
                    @error('hp')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="surel">Email Instansi</label>
                    <input type="text" class="form-control" id="surel" name="surel" value="{{ $tamu->surel }}">
                    @error('surel')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal Kunjungan</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $tamu->tanggal }}">
                    @error('tanggal')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="waktu">Waktu Kunjungan</label>
                    <select class="form-control" id="waktu" name="waktu">
                        <option value="">Pilih Waktu Kunjungan</option>
                        <option value="08:00 - 10:00" {{ $tamu->waktu == '08:00 - 10:00' ? 'selected' : '' }}>08:00 - 10:00
                        </option>
                        <option value="10:00 - 12:00" {{ $tamu->waktu == '10:00 - 12:00' ? 'selected' : '' }}>10:00 - 12:00
                        </option>
                        <option value="13:00 - 15:00" {{ $tamu->waktu == '13:00 - 15:00' ? 'selected' : '' }}>13:00 - 15:00
                        </option>
                    </select>
                    @error('waktu')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pdf_file">Upload File (PDF)</label>
                    <input type="file" class="form-control" id="pdf_file" name="pdf_file" accept="application/pdf">
                    @error('pdf_file')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary">Perbarui Daftar Kunjungan</button>
                </div>
        </form>
    </div>
@endsection
