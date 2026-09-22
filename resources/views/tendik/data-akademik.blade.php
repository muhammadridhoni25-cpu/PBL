<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Akademik | KampusLomba</title>

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
            --danger: #D1483F;
            --danger-soft: #FBEAE8;
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

        <!-- MENU TENDIK -->
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
        <header class="flex items-center gap-4 px-6 lg:px-8 py-4 border-b border-[var(--border)] bg-white">

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
        <main class="flex-1 px-6 lg:px-8 py-7 overflow-y-auto">

            @if (session('success'))

                <div class="mb-5 p-4 rounded-xl bg-green-50
                            border border-green-200
                            text-green-700 text-sm font-medium">

                    {{ session('success') }}

                </div>

            @endif


            <!-- TITLE -->
            <div class="flex flex-col sm:flex-row
                        sm:items-center sm:justify-between
                        gap-4 mb-6">

                <div>

                    <h2 class="font-display font-bold text-2xl">
                        Data Akademik Mahasiswa
                    </h2>

                    <p class="text-sm text-[var(--ink-soft)] mt-1">
                        Kelola data IPK dan IPS mahasiswa.
                    </p>

                </div>


                <a href="{{ route('data-akademik.create') }}"
                   class="inline-flex items-center justify-center
                          px-4 py-2.5 rounded-lg
                          bg-[var(--primary)]
                          text-white text-sm font-bold
                          hover:bg-[var(--primary-dark)]
                          transition">

                    + Tambah Data

                </a>

            </div>


            <!-- TABLE -->
            <div class="surface-card overflow-hidden">

                <div class="overflow-x-auto">

                    <table class="w-full text-sm">

                        <thead class="bg-[var(--primary-soft)]">

                            <tr>

                                <th class="px-5 py-4 text-left
                                           font-bold text-[var(--primary-dark)]">
                                    No
                                </th>

                                <th class="px-5 py-4 text-left
                                           font-bold text-[var(--primary-dark)]">
                                    NIM
                                </th>

                                <th class="px-5 py-4 text-left
                                           font-bold text-[var(--primary-dark)]">
                                    Nama Mahasiswa
                                </th>

                                <th class="px-5 py-4 text-left
                                           font-bold text-[var(--primary-dark)]">
                                    IPK
                                </th>

                                <th class="px-5 py-4 text-left
                                           font-bold text-[var(--primary-dark)]">
                                    IPS
                                </th>

                                <th class="px-5 py-4 text-left
                                           font-bold text-[var(--primary-dark)]">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-[var(--border)]">

                            @forelse ($dataAkademik as $item)

                                <tr class="hover:bg-[var(--bg)]">

                                    <td class="px-5 py-4">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="px-5 py-4 font-medium">
                                        {{ $item->nim }}
                                    </td>

                                    <td class="px-5 py-4">
                                        {{ $item->nama_mahasiswa }}
                                    </td>

                                    <td class="px-5 py-4">
                                        {{ number_format($item->ipk, 2) }}
                                    </td>

                                    <td class="px-5 py-4">
                                        {{ number_format($item->ips, 2) }}
                                    </td>

                                    <td class="px-5 py-4">

                                        <div class="flex items-center gap-2">

                                            <a href="{{ route('data-akademik.edit', $item->id) }}"
                                               class="px-3 py-1.5 rounded-lg
                                                      bg-blue-600 text-white
                                                      text-xs font-bold
                                                      hover:bg-blue-700">

                                                Edit

                                            </a>


                                            <form action="{{ route('data-akademik.destroy', $item->id) }}"
                                                  method="POST">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                                                        class="px-3 py-1.5 rounded-lg
                                                               bg-red-600 text-white
                                                               text-xs font-bold
                                                               hover:bg-red-700">

                                                    Hapus

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6"
                                        class="px-5 py-12 text-center
                                               text-[var(--ink-faint)]">

                                        Belum ada data akademik mahasiswa.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </main>

    </div>

</div>

</body>
</html>