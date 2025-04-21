@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Hasil Kunjungan</h3>
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
                        <th style="text-align: center;">Tanggal Kunjungan</th>
                        <th style="text-align: center;">Mentor Kunjungan</th>
                        <th style="text-align: center;">Hasil Kunjungan</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ($dataTamu as $tamu)
                        @if (auth()->user()->name == $tamu->instansi)
                            <tr> <!-- Tambahkan baris ini -->
                                <td>{{ $i }}</td>
                                <td style="text-align: center;">
                                    <strong>{{ $tamu->instansi }}</strong><br>
                                </td>
                                <td style="text-align: center;">{{ $tamu->tanggal }}</td>
                                <td style="text-align: center;">
                                    @if (!empty($tamu->mentor))
                                        <em>{{ $tamu->mentor }}</em>
                                    @else
                                        Mentor Belum Ditentukan
                                    @endif
                                </td>

                                <td>
                                    @if (!empty($tamu->ulasan))
                                        @php
                                            $maxLength = 100; // jumlah karakter awal yang ditampilkan
                                            $isLong = strlen($tamu->ulasan) > $maxLength;
                                            $shortText = substr($tamu->ulasan, 0, $maxLength);
                                        @endphp

                                        <p>
                                            <strong>Ulasan :</strong>
                                            <em id="ulasan-{{ $tamu->id }}">
                                                {{ $isLong ? $shortText . '...' : $tamu->ulasan }}
                                            </em>
                                        </p>

                                        @if ($isLong)
                                            <button onclick="toggleUlasan({{ $tamu->id }})"
                                                id="toggle-btn-{{ $tamu->id }}" class="btn btn-link p-0">
                                                Lihat lebih banyak
                                            </button>

                                            <script>
                                                function toggleUlasan(id) {
                                                    const fullText = @json($tamu->ulasan);
                                                    const shortText = fullText.substring(0, {{ $maxLength }}) + '...';
                                                    const ulasanEl = document.getElementById('ulasan-' + id);
                                                    const btn = document.getElementById('toggle-btn-' + id);

                                                    if (btn.innerText === 'Lihat lebih banyak') {
                                                        ulasanEl.innerText = fullText;
                                                        btn.innerText = 'Sembunyikan';
                                                    } else {
                                                        ulasanEl.innerText = shortText;
                                                        btn.innerText = 'Lihat lebih banyak';
                                                    }
                                                }
                                            </script>
                                        @endif
                                    @else
                                        <p>Sedang Diproses</p>
                                    @endif
                                </td>
                            </tr> <!-- Tambahkan baris ini -->
                            @php $i++; @endphp
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
