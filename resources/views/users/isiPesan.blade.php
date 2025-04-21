@extends('layouts.main')

@section('content')
    <div class="card card-primary">
        <form action="{{ route('tamu.disetujuiDgnCttupdate', $tamu->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="mentor">Mentor Kunjungan :</label>
                    <input type="text" class="form-control" id="mentor" name="mentor" value="{{ $tamu->mentor }}">
                    @error('mentor')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="mail">Masukan Catatan :</label>
                    <textarea class="form-control" id="mail" name="mail" rows="4">{{ $tamu->mail }}</textarea>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
        </form>
    </div>
@endsection
