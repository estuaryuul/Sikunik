@extends('layouts.main')


@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Pengisian Kunjungan Eletronik</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('addRiwayat') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="tujuan">Tujuan Kunjungan</label>
                    <select class="form-control" id="tujuan" name="tujuan">
                        <option disabled selected>Pilih Tujuan Kunjungan</option>
                        <option value="Konsultaasi JDIHN">Konsultaasi JDIHN</option>
                        <option value="Bimbingan Teknis">Bimbingan Teknis</option>
                        <option value="Peminjaman Dokumen Hukum">Peminjaman Dokumen Hukum</option>
                    </select>
                    @error('tujuan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Penanggung Jawab Kunjungan</label>
                    <input type="text" class="form-control" id="productName" name="name"
                        placeholder="Masukan Penanggung Jawab Kunjungan">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukan Jabatan">
                    @error('jabatan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="Jumlah">Jumlah Perserta Kunjungan</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah"
                        placeholder="Masukan Jumlah Peserta Kunjungan">
                    @error('jumlah')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="surel">Email Instansi</label>
                    <input type="email" class="form-control" id="surel" name="surel"
                        placeholder="Masukan Email Akun Instansi">
                    @error('surel')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="hp">Nomor Telepon</label>
                    <input type="text" class="form-control" id="hp" name="hp"
                        placeholder="Contoh: 081234567890" maxlength="13" pattern="\d*" inputmode="numeric"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    @error('hp')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal Kunjungan</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal"
                        placeholder="Masukan Tanggal Kunjungan">
                    @error('tanggal')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="waktu">Waktu Jam Kunjungan</label>
                    <select class="form-control" id="waktu" name="waktu">
                        <option value="">Pilih Waktu Kunjungan</option>
                        <option value="08:00 - 10:00">08:00 - 10:00</option>
                        <option value="10:00 - 12:00">10:00 - 12:00</option>
                        <option value="13:00 - 15:00">13:00 - 15:00</option>
                    </select>
                    @error('waktu')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pdf_file">Upload File Surat Permohonan Kunjungan (PDF)</label>
                    <input type="file" class="form-control" id="pdf_file" name="pdf_file" accept="application/pdf">
                    @error('pdf_file')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
        </form>
    </div>
@endsection
