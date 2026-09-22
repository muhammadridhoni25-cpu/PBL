<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form buku 3d</title>
    <style>
        * {
            box-sizing: border-box;
            color: #7c2d12;
        }
        body {
            font-family: 'segoe ui', tahoma, geneva, verdana, sans-serif;
            background-color: #fff7ed;
            padding: 2rem;
            display: flex;
            justify-content: center;
            margin: 0;
        }
        .kartu-3d {
            background-color: #ffffff;
            border: 4px solid #fdba74;
            border-radius: 1.5rem;
            box-shadow: 10px 10px 0px #fdba74;
            padding: 2.5rem;
            width: 100%;
            max-width: 500px;
        }
        h2 {
            color: #ea580c;
            font-weight: 900;
            font-size: 2rem;
            text-shadow: 2px 2px 0px #fed7aa;
            margin-top: 0;
            text-align: center;
            margin-bottom: 2rem;
        }
        .grup-input {
            margin-bottom: 1.25rem;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        label {
            font-weight: 900;
            color: #ea580c;
        }
        input {
            padding: 0.75rem 1rem;
            border: 3px solid #fdba74;
            border-radius: 0.75rem;
            font-weight: bold;
            outline: none;
            background-color: #fffbeb;
            width: 100%;
        }
        input:focus {
            border-color: #ea580c;
        }
        .baris-input {
            display: flex;
            gap: 1rem;
        }
        .baris-input .grup-input {
            flex: 1;
        }
        .tombol-3d {
            padding: 1rem;
            font-weight: 900;
            text-transform: uppercase;
            border-radius: 0.75rem;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: transform 0.1s, box-shadow 0.1s;
            text-align: center;
            width: 100%;
            margin-bottom: 0.75rem;
            border: none;
        }
        .tombol-3d:active {
            transform: translatey(6px);
            box-shadow: 0 0px 0px transparent !important;
        }
        .t-simpan {
            background-color: #f472b6;
            border: 3px solid #db2777;
            box-shadow: 0 6px 0px #db2777;
            color: #ffffff;
        }
        .t-batal {
            background-color: #facc15;
            border: 3px solid #ca8a04;
            box-shadow: 0 6px 0px #ca8a04;
            color: #7c2d12;
            display: block;
        }
        .peringatan-merah {
            background-color: #fecdd3;
            border: 3px solid #f43f5e;
            padding: 1rem;
            border-radius: 1rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            box-shadow: 4px 4px 0px #f43f5e;
            color: #be123c;
        }
    </style>
</head>
<body>
    <div class="kartu-3d">
        <h2>{{ $buku->exists ? 'edit buku' : 'tambah buku' }}</h2>

        @if ($errors->any())
            <div class="peringatan-merah">
                periksa kembali kolom yang diisi.
            </div>
        @endif

        <form action="{{ $buku->exists ? route('buku.update', $buku) : route('buku.store') }}" method="post">
            @csrf
            @if ($buku->exists)
                @method('put')
            @endif

            <div class="grup-input">
                <label>judul buku</label>
                <input type="text" name="judul" value="{{ old('judul', $buku->judul) }}" required>
            </div>

            <div class="grup-input">
                <label>penulis</label>
                <input type="text" name="penulis" value="{{ old('penulis', $buku->penulis) }}" required>
            </div>

            <div class="baris-input">
                <div class="grup-input">
                    <label>tahun</label>
                    <input type="number" name="tahun" value="{{ old('tahun', $buku->tahun) }}" required>
                </div>
                <div class="grup-input">
                    <label>stok</label>
                    <input type="number" name="stok" value="{{ old('stok', $buku->stok ?? 0) }}" required>
                </div>
            </div>

            <div style="margin-top: 1.5rem;">
                <button type="submit" class="tombol-3d t-simpan">simpan data</button>
                <a href="{{ route('buku.index') }}" class="tombol-3d t-batal">batal</a>
            </div>
        </form>
    </div>
</body>
</html>