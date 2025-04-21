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
        @php $i = ($data->currentPage() - 1) * $data->perPage() + 1; @endphp
        @foreach ($data as $tamu)
            <!-- <tr onclick="window.location.href='{{ route('tamu.show', $tamu->id) }}'" style="cursor: pointer;"> -->
            <td>{{ $i }}</td>
            <td style="text-align: center;">
                <strong>{{ $tamu->instansi }}</strong><br>
            </td>
            <td style="text-align: center;">{{ $tamu->tujuan }}</td>
            <td style="text-align: center;">{{ $tamu->tanggal }}</td>
            <td style="text-align: center;">{{ $tamu->waktu }}</td>
            <td style="text-align: center;">{{ $tamu->status }}</td>
            <td style="text-align: center;">
                <div>
                    <a href="{{ route('tamu.show', $tamu->id) }}" class="btn btn-primary btn-sm mb-2">Detail</a>
                    {{-- <a href="{{ route('assign.edit', $tamu->id) }}" class="btn btn-success btn-sm mb-2">Ulasan</a> --}}
                    <form action="{{ route('tamu.destroy', $tamu->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </div>
            </td>
            </tr>
            @php $i++; @endphp
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center mt-3">
    {{ $data->links() }}
</div>
