<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>daftar buku </title>
    <style>
        * {
            box-sizing: border-box;
            color: #7c2d12;
        }
        body {
            font-family: 'segoe ui', tahoma, geneva, verdana, sans-serif;
            background-color: #fff7ed;
            padding: 2rem;
            margin: 0;
        }
        .wadah {
            max-width: 900px;
            margin: 0 auto;
        }
        .kartu-3d {
            background-color: #ffffff;
            border: 4px solid #fdba74;
            border-radius: 1.5rem;
            box-shadow: 10px 10px 0px #fdba74;
            padding: 2rem;
        }
        h2 {
            color: #ea580c;
            font-weight: 900;
            font-size: 2.5rem;
            text-shadow: 3px 3px 0px #fed7aa;
            margin-top: 0;
        }
        .baris-atas {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        .form-cari {
            display: flex;
            gap: 0.5rem;
            margin: 0;
        }
        input {
            padding: 0.75rem 1rem;
            border: 3px solid #fdba74;
            border-radius: 0.75rem;
            font-weight: bold;
            outline: none;
            background-color: #fffbeb;
        }
        input:focus {
            border-color: #ea580c;
        }
        .tombol-3d {
            padding: 0.75rem 1.5rem;
            font-weight: 900;
            text-transform: uppercase;
            border-radius: 0.75rem;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: transform 0.1s, box-shadow 0.1s;
        }
        .tombol-3d:active {
            transform: translatey(6px);
            box-shadow: 0 0px 0px transparent !important;
        }
        .t-cari {
            background-color: #facc15;
            border: 3px solid #ca8a04;
            box-shadow: 0 6px 0px #ca8a04;
            color: #7c2d12;
        }
        .t-tambah {
            background-color: #f472b6;
            border: 3px solid #db2777;
            box-shadow: 0 6px 0px #db2777;
            color: #ffffff;
        }
        .t-edit {
            background-color: #facc15;
            border: 3px solid #ca8a04;
            box-shadow: 0 4px 0px #ca8a04;
            color: #7c2d12;
            padding: 0.4rem 0.8rem;
            font-size: 0.8rem;
        }
        .t-hapus {
            background-color: #fb7185;
            border: 3px solid #e11d48;
            box-shadow: 0 4px 0px #e11d48;
            color: #ffffff;
            padding: 0.4rem 0.8rem;
            font-size: 0.8rem;
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 1rem;
            border: 3px solid #fdba74;
            border-radius: 1rem;
            overflow: hidden;
        }
        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 2px solid #ffedd5;
        }
        th {
            background-color: #ffedd5;
            font-weight: 900;
            color: #ea580c;
            text-transform: uppercase;
        }
        tr:last-child td {
            border-bottom: none;
        }
        .peringatan {
            background-color: #fef08a;
            border: 3px solid #eab308;
            padding: 1rem;
            border-radius: 1rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            box-shadow: 4px 4px 0px #eab308;
        }
        .badge {
            background-color: #ffedd5;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-weight: 900;
            color: #ea580c;
            border: 2px solid #fdba74;
        }
        nav svg {
            height: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="wadah">
        <div class="kartu-3d">
            <div class="baris-atas">
                <h2>perpustakaan 3d</h2>
                <a href="{{ route('buku.create') }}" class="tombol-3d t-tambah">tambah buku</a>
            </div>

            @if(session('ok'))
                <div class="peringatan">{{ session('ok') }}</div>
            @endif

            <form method="get" class="form-cari">
                <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="cari judul...">
                <button type="submit" class="tombol-3d t-cari">cari</button>
            </form>

            <table>
                <thead>
                    <tr>
                        <th>judul</th>
                        <th>penulis</th>
                        <th>tahun</th>
                        <th>stok</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($buku as $b)
                    <tr>
                        <td><strong>{{ $b->judul }}</strong></td>
                        <td>{{ $b->penulis }}</td>
                        <td><span class="badge">{{ $b->tahun }}</span></td>
                        <td><span class="badge">{{ $b->stok }}</span></td>
                        <td style="display: flex; gap: 0.5rem;">
                            <a href="{{ route('buku.edit', $b) }}" class="tombol-3d t-edit">edit</a>
                            <form action="{{ route('buku.destroy', $b) }}" method="post" style="margin: 0;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="tombol-3d t-hapus" onclick="return confirm('yakin hapus?')">hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align: center; font-weight: bold;">belum ada data buku</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div style="margin-top: 2rem;">
                {{ $buku->links() }}
            </div>
        </div>
    </div>
</body>
</html>