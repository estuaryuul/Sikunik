@extends('layouts.main')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Pengaturan Akun</h3>
        </div>

        <form action="{{ route('saveregister') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nama Instansi</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Masukan Nama Instansi">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis Instansi</label>
                        <select class="form-control" id="jenis" name="jenisInstansi">
                            <option value="" disabled selected>Pilih Jenis Instansi</option>
                            <option value="Kementerian">Kementerian</option>
                            <option value="Perpustakaan Hukum">Perpustakaan Hukum</option>
                            <option value="Sekertariat Lembaga Non Struktural">Sekertariat Lembaga Non Struktural</option>
                            <option value="LPNK">LPNK</option>
                            <option value="Pemerintahan Provinsi">Pemerintahan Provinsi</option>
                            <option value="Pemerintahan Kabupaten">Pemerintahan Kabupaten</option>
                            <option value="Pemerintahan Kota">Pemerintahan Kota</option>
                            <option value="DPRD">DPRD</option>
                            <option value="DPRD Provinsi">DPRD Provinsi</option>
                            <option value="DPRD Kabupaten">DPRD Kabupaten</option>
                            <option value="DPRD Kota">DPRD Kota</option>
                            <option value="Kantor Wilayah Kemenkumham">Kantor Wilayah Kemenkumham</option>
                            <option value="Eselon I Kemenkumham">Eselon I Kemenkumham</option>
                            <option value="Lembaga Lain">Lembaga Lain</option>
                        </select>
                        @error('jenisInstansi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="password">Password Akun</label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Masukan Password Akun Instansi">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
        </form>
        <!-- <a href="/login" class="text-center">Udah Punya Akun Gueh</a>                                                                                            -->
    </div>
    </div>
@endsection
