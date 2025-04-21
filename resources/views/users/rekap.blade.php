@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Rekapitulasi Daftar Kunjungan</h3>
            <div class="card-tools">
                <a href="{{ route('export.kunjungan') }}" class="btn btn-success">Unduh Daftar Kunjungan <i
                        class="fas fa-download"></i></a>
            </div>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- Tabs -->
            <ul class="nav nav-tabs" id="statusTabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#all">Semua Tamu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#pending">Disetujui</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#assigned">Disetujui Dengan Catatan</a>
                </li>
            </ul>

            <div class="tab-content mt-3">
                <!-- Semua Tamu -->
                <div class="tab-pane fade show active" id="all">
                    @include('users.table_tamu', ['data' => $dataTamuAll])
                </div>

                <!-- Tamu Disetujui -->
                <div class="tab-pane fade" id="pending">
                    @include('users.table_tamu', ['data' => $dataTamuDisetujui])
                </div>

                <!-- Tamu Disetujui Dengan Catatan -->
                <div class="tab-pane fade" id="assigned">
                    @include('users.table_tamu', ['data' => $dataTamuCatatan])
                </div>

            </div>
        </div>
    </div>
@endsection
