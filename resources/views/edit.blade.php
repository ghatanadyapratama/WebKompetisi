<form action="/update-peserta/{{$peserta->id}}" method="POST">
    @csrf
    @method('PUT') 

    <div>
        <label>Nama Tim:</label>
        <input type="text" name="nama_tim" value="{{ $peserta->nama_tim }}">
    </div>
<br>
    <div>
        <label>Asal Sekolah:</label>
        <input type="text" name="asal_sekolah" value="{{ $peserta->asal_sekolah }}">
    </div>

    <button type="submit">Update</button>
</form>