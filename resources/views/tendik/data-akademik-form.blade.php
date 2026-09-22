<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ $dataAkademik->exists ? 'Edit' : 'Tambah' }} Data Akademik | KampusLomba
    </title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            --bg: #F5F8FF;
            --surface: #FFFFFF;
            --border: #E2E8F5;
            --ink: #0B1626;
            --ink-soft: #5B6B87;
            --ink-faint: #93A1BD;
            --primary: #2A4CDB;
            --primary-dark: #1B2F8F;
            --primary-soft: #E7ECFC;
        }

        html,
        body {
            background: var(--bg);
            color: var(--ink);
            font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
        }

        .font-display {
            font-family: 'Space Grotesk', system-ui, sans-serif;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: .75rem;
            padding: .65rem .9rem;
            border-radius: .65rem;
            color: var(--ink-soft);
            font-weight: 600;
            font-size: .875rem;
            text-decoration: none;
            transition: .15s;
        }

        .nav-item:hover {
            background: var(--primary-soft);
            color: var(--primary-dark);
        }

        .nav-item.active {
            background: var(--primary);
            color: white;
        }

        .surface-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 1rem;
        }

        .form-input {
            width: 100%;
            padding: .75rem .9rem;
            border: 1px solid var(--border);
            border-radius: .65rem;
            background: white;
            color: var(--ink);
            outline: none;
            font-size: .875rem;
        }

        .form-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(42, 76, 219, .12);
        }

        .error {
            color: #D1483F;
            font-size: .75rem;
            margin-top: .35rem;
        }
    </style>
</head>

<body class="min-h-screen">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="hidden lg:flex flex-col w-64 shrink-0 border-r border-[var(--border)] bg-white px-5 py-6">

        <div class="flex items-center gap-2.5 px-1 mb-8">

            <div class="w-9 h-9 rounded-lg bg-[var(--primary)] flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                    <path d="M12 2 3 7l9 5 9-5-9-5Z"
                        stroke="#fff"
                        stroke-width="1.8"
                        stroke-linejoin="round" />

                    <path d="M7 12.5v4.2c0 .5 2.2 2.3 5 2.3s5-1.8 5-2.3v-4.2"
                        stroke="#fff"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>

            <div>
                <p class="font-display font-bold text-[15px] leading-none">
                    KampusLomba
                </p>

                <p class="text-[11px] text-[var(--ink-faint)] mt-1">
                    Portal Kemahasiswaan
                </p>
            </div>

        </div>

        <!-- MENU -->
        <nav class="flex flex-col gap-1">

            <a href="{{ route('data-akademik.index') }}"
               class="nav-item active">

                <svg width="18" height="18"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8">

                    <rect x="4" y="3" width="16" height="18" rx="2" />

                    <path d="M8 8h8M8 12h8M8 16h5"
                        stroke-linecap="round" />

                </svg>

                Data Akademik

            </a>

        </nav>

    </aside>


    <!-- MAIN -->
    <div class="flex-1 flex flex-col min-w-0">

        <!-- TOPBAR -->
        <header class="flex items-center gap-4 px-6 lg:px-8 py-4
                       border-b border-[var(--border)] bg-white">

            <div class="flex-1">

                <p class="text-[11.5px] text-[var(--ink-faint)]">
                    TENDIK
                </p>

                <h1 class="font-display font-bold text-xl">
                    Data Akademik
                </h1>

            </div>

            <div class="flex items-center gap-3">

                <div class="w-9 h-9 rounded-full bg-[var(--primary-soft)]
                            flex items-center justify-center
                            font-display font-bold text-[13px]
                            text-[var(--primary-dark)]">

                    T

                </div>

                <div class="hidden sm:block">

                    <p class="text-[13px] font-bold leading-none">
                        Tendik
                    </p>

                    <p class="text-[11.5px] text-[var(--ink-faint)] mt-1">
                        Data Akademik
                    </p>

                </div>

            </div>

        </header>


        <!-- CONTENT -->
        <main class="flex-1 px-6 lg:px-8 py-7">

            <div class="max-w-2xl">

                <!-- TITLE -->
                <div class="mb-6">

                    <h2 class="font-display font-bold text-2xl">

                        {{ $dataAkademik->exists
                            ? 'Edit Data Akademik'
                            : 'Tambah Data Akademik' }}

                    </h2>

                    <p class="text-sm text-[var(--ink-soft)] mt-1">
                        {{ $dataAkademik->exists
                            ? 'Perbarui data akademik mahasiswa.'
                            : 'Tambahkan data akademik mahasiswa.' }}
                    </p>

                </div>


                <!-- FORM -->
                <div class="surface-card p-6">

                    <form
                        action="{{ $dataAkademik->exists
                            ? route('data-akademik.update', $dataAkademik->id)
                            : route('data-akademik.store') }}"
                        method="POST">

                        @csrf

                        @if ($dataAkademik->exists)
                            @method('PUT')
                        @endif


                        <!-- NIM -->
                        <div class="mb-5">

                            <label class="block text-sm font-bold mb-2">
                                NIM
                            </label>

                            <input
                                type="text"
                                name="nim"
                                value="{{ old('nim', $dataAkademik->nim) }}"
                                placeholder="Masukkan NIM mahasiswa"
                                class="form-input">

                            @error('nim')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <!-- NAMA -->
                        <div class="mb-5">

                            <label class="block text-sm font-bold mb-2">
                                Nama Mahasiswa
                            </label>

                            <input
                                type="text"
                                name="nama_mahasiswa"
                                value="{{ old('nama_mahasiswa', $dataAkademik->nama_mahasiswa) }}"
                                placeholder="Masukkan nama mahasiswa"
                                class="form-input">

                            @error('nama_mahasiswa')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <!-- IPK -->
                        <div class="mb-5">

                            <label class="block text-sm font-bold mb-2">
                                IPK
                            </label>

                            <input
                                type="number"
                                name="ipk"
                                value="{{ old('ipk', $dataAkademik->ipk ? number_format($dataAkademik->ipk, 2, '.', '') : '') }}"
                                placeholder="Contoh: 3.50"
                                min="0"
                                max="4"
                                step="0.01"
                                class="form-input">

                            @error('ipk')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <!-- IPS -->
                        <div class="mb-6">

                            <label class="block text-sm font-bold mb-2">
                                IPS
                            </label>

                            <input
                                type="number"
                                name="ips"
                                value="{{ old('ips', $dataAkademik->ips ? number_format($dataAkademik->ips, 2, '.', '') : '') }}"
                                placeholder="Contoh: 3.25"
                                min="0"
                                max="4"
                                step="0.01"
                                class="form-input">

                            @error('ips')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <!-- BUTTON -->
                        <div class="flex items-center gap-3">

                            <button
                                type="submit"
                                class="px-5 py-2.5 rounded-lg
                                       bg-[var(--primary)]
                                       text-white text-sm font-bold
                                       hover:bg-[var(--primary-dark)]
                                       transition">

                                {{ $dataAkademik->exists
                                    ? 'Simpan Perubahan'
                                    : 'Simpan' }}

                            </button>


                            <a
                                href="{{ route('data-akademik.index') }}"
                                class="px-5 py-2.5 rounded-lg
                                       bg-gray-100 text-gray-700
                                       text-sm font-bold
                                       hover:bg-gray-200
                                       transition">

                                Kembali

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </main>

    </div>

</div>

</body>
</html>