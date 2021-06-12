<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Buku</title>
  <style>
      table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
      }

      thead {
        background-color: deepskyblue;
      }

      th, td {
        text-align: left;
        padding: 8px;
      }

      tr:nth-child(even) { background-color: #f2f2f2}

      .tambah {
        padding: 8px 16px ;
        text-decoration: none;
      }
  </style>
</head>
<body>
  <div style="overflow-x:auto;">
    <a class="tambah" href="{{ route('buku0184.create') }}">Tambah</a>
  <table>
      <thead>
          <tr>
              <th>id</th>
              <th>Judul Buku</th>
              <th>Jenis Buku</th>
              <th>Tahun terbit</th>
              <th>Aksi</th>
          </tr>
      </thead>
      <tbody>
          <?php $no=1; ?>
          @foreach($buku as $bukus)
          <tr>
              <td>{{ $bukus->id }}</td>
              <td>{{ $bukus->judul }}</td>
              <td>{{ $bukus->jenis }}</td>
              <td>{{ $bukus->tahun_terbit }}</td>
              <td>
                  <a class="tambah" href="{{ url('buku0184/' . $bukus->id . '/edit') }}">Edit</a>
                  |
                  <form action="{{ url('buku0184/' . $bukus->id) }}" method="POST">
                      @csrf
                      <input type="hidden" name="_method" value="delete">
                      <button type="submit">Hapus</button>
                  </form>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
  <a class="tambah" href="/BukuController/export_excel" class="btn btn-success my-3" target="_blank">Export Ke Excel</a>
  </div>