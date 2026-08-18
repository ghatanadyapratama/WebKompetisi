@extends('layouts.master')

@section('konten')
@if(session('sukses'))
    <div style="background-color: lightgreen; padding: 10px; margin-bottom: 20px;">
        {{ session('sukses') }}
    </div>
@endif

<div class="container py-5">
    <h3 class="mb-4 text-center">Daftar Peserta (Dari Database)</h3>
    
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">

            <thead class="table-warning">
                <tr>
                    <th scope="col" style="width: 50px;">#</th>
                    <th scope="col">Nama Tim</th>
                    <th scope="col">Asal Sekolah</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data_peserta as $index => $peserta)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $peserta->nama_tim }}</td>
                        <td>{{ $peserta->asal_sekolah }}</td>
                        <td class="text-center">
                            <!-- Tombol Edit (Hanya berupa link biasa/GET) -->
                            <a href="/edit-peserta/{{ $peserta->id }}" class="btn btn-sm btn-warning">Edit</a>

                            <!-- Tombol Hapus (WAJIB berupa Form dengan method spoofing!) -->
                            <form action="/hapus-peserta/{{ $peserta->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE') <!-- Inilah Method Spoofing -->
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus tim ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">Belum ada peserta yang mendaftar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection