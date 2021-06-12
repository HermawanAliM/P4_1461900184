<form action="{{ url('buku0184/' . $buku0184->id) }}" method="POST">
  @csrf
  <input type="hidden" name="_method" value="patch">
  Id : <input type="text" name="id" value="{{$buku0184->id}}"><br>
  Judul : <input type="text" name="judul" value="{{$buku0184->judul}}"><br>
  Tahun Terbit: <input type="text" name="tahun_terbit" value="{{$buku0184->tahun_terbit}}"><br>
  <button type="submit">Simpan</button>
</form>