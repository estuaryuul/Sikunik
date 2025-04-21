@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pemberitahuan Catatan</h3>
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
                        <th style="text-align: center;">Detail Kunjungan</th>
                        <th style="text-align: center;">Tanggal Kunjungan</th>
                        <th style="text-align: center;">Catatan </th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ($dataTamu as $tamu)
                        @if (auth()->user()->name == $tamu->instansi)
                            <tr> <!-- Tambahkan baris ini -->
                                <td>{{ $i }}</td>
                                <td style="text-align: center;">
                                    <strong>{{ $tamu->instansi }}</strong>
                                </td>
                                <td style="text-align: center;">
                                    <div class="d-flex flex-column align-items-center" style="width: 100%;">
                                        <a href="{{ route('riwayat.show', $tamu->id) }}"
                                            class="btn btn-primary btn-sm mb-2">Detail</a>
                                    </div>
                                </td>
                                <td style="text-align: center;">
                                    {{ $tamu->tanggal }}
                                </td>
                                <td style="text-align: center;">
                                    @if (!empty($tamu->mail))
                                        {{ $tamu->mail }}
                                    @else
                                        -
                                    @endif
                                </td>
                                {{-- <td>
                                    @if (!empty($tamu->mail))
                                        @php
                                            $maxLength = 100; // jumlah karakter awal yang ditampilkan
                                            $isLong = strlen($tamu->mail) > $maxLength;
                                            $shortText = substr($tamu->mail, 0, $maxLength);
                                        @endphp

                                        <p>
                                            <strong>Pesan :</strong>
                                            <em id="mail-{{ $tamu->id }}">
                                                {{ $isLong ? $shortText . '...' : $tamu->mail }}
                                            </em>
                                        </p>

                                        @if ($isLong)
                                            <button onclick="togglemail({{ $tamu->id }})"
                                                id="toggle-btn-{{ $tamu->id }}" class="btn btn-link p-0">
                                                Lihat lebih banyak
                                            </button>

                                            <script>
                                                function togglemail(id) {
                                                    const fullText = @json($tamu->mail);
                                                    const shortText = fullText.substring(0, {{ $maxLength }}) + '...';
                                                    const mailEl = document.getElementById('mail-' + id);
                                                    const btn = document.getElementById('toggle-btn-' + id);

                                                    if (btn.innerText === 'Lihat lebih banyak') {
                                                        mailEl.innerText = fullText;
                                                        btn.innerText = 'Sembunyikan';
                                                    } else {
                                                        mailEl.innerText = shortText;
                                                        btn.innerText = 'Lihat lebih banyak';
                                                    }
                                                }
                                            </script>
                                        @endif
                                    @else
                                        <p>Sedang Diproses</p>
                                    @endif
                                </td> --}}
                            </tr> <!-- Tambahkan baris ini -->
                            @php $i++; @endphp
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
