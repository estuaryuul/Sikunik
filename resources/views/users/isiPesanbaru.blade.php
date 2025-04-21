@extends('layouts.main')

@section('content')
    <div class="card card-primary">
        <form action="{{ route('tamu.disetujuiUpdate', $tamu->id) }}" method="POST">
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
                <div class="">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
        </form>
    </div>
@endsection
