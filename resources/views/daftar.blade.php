@extends('layouts.master')

@section('konten')
    <h2>Formulir Pendaftaran Tim</h2>

    <form action="/simpan-pendaftaran" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="nama_tim" class="form-label">Nama Tim SMP:</label>
            <input type="text" class="form-control" id="nama_tim" name="nama_tim" value="{{ old('nama_tim') }}">
             @error('nama_tim')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        </div>

        <div class="mb-3">
            <label for="asal_sekolah" class="form-label">Asal Sekolah:</label>
            <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah') }}">
            @error('asal_sekolah')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-warning">Kirim Pendaftaran</button>
    </form>
@endsection