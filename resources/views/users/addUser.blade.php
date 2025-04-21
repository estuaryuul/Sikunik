@extends('layouts.main')


@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pengaturan Akun</h3>

            <div class="d-flex justify-content-end align-items-center gap-2" style="width: 100%;">
                @if (auth()->user()->role == 'admin')
                    <a href="/register" class="btn btn-success btn-tambah-akun">
                        Tambahkan Akun Baru <i class="fas fa-plus-square"></i>
                    </a>
                @endif
                <form action="{{ route('addUser') }}" method="GET" class="d-flex align-items-center me-2">
                    <input type="text" name="search" class="form-control me-2" placeholder="Cari instansi..."
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
            </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th style="text-align: center;">Nama Instansi</th>
                        <th style="text-align: center;">Jenis Instansi</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataUser as $user)
                        @if ($user->name !== 'Admin')
                            <tr>
                                <td style="text-align: center;" class="wrap-text">{{ $user->name }}</td>
                                <td style="text-align: center;">{{ $user->jenisInstansi }}</td>
                                <td style="text-align: center;">
                                    @if (auth()->user()->role == 'admin')
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('user.edit', $user->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                        </form>
                                    @endif
                                <td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-3">
                {{ $dataUser->links() }}
            </div>
        </div>
    </div>
@endsection
