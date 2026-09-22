<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah data mahasiswa</title>

    <!-- tailwind play cdn -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- font modern: inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-slate-100 flex items-center justify-center p-4 sm:p-6">

    <div class="w-full max-w-2xl">

        <!-- card -->
        <div class="bg-white rounded-2xl shadow-xl border border-blue-100 overflow-hidden">

            <!-- header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-500 px-6 py-8 sm:px-10 sm:py-10 relative overflow-hidden">
                <div class="absolute -right-6 -top-6 w-32 h-32 bg-white/10 rounded-full"></div>
                <div class="absolute -right-2 top-10 w-16 h-16 bg-white/10 rounded-full"></div>

                <div class="relative flex items-center gap-4">
                    <div class="w-14 h-14 bg-white/15 backdrop-blur rounded-xl overflow-hidden shrink-0">
                   <img src="{{ asset('images/Picture1.png') }}" alt="logo" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h1 class="text-xl sm:text-2xl font-bold text-white">tambah data mahasiswa</h1>
                        <p class="text-blue-100 text-sm mt-1">lengkapi formulir di bawah untuk menambahkan data baru</p>
                    </div>
                </div>
            </div>

            <!-- body -->
            <div class="px-6 py-8 sm:px-10 sm:py-10">

                <!-- alert sukses -->
                @if (session('sukses'))
                    <div x-data="{ show: true }" x-show="show" class="mb-6 flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-800">
                        <i class="fa-solid fa-circle-check text-emerald-500 mt-0.5"></i>
                        <p class="flex-1 text-sm font-medium">{{ session('sukses') }}</p>
                        <button type="button" onclick="this.closest('div.flex').remove()" class="text-emerald-500 hover:text-emerald-700 transition">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                @endif

                <!-- alert error -->
                @if ($errors->any())
                    <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3">
                        <div class="flex items-start gap-3">
                            <i class="fa-solid fa-triangle-exclamation text-red-500 mt-0.5"></i>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-red-800 mb-1">periksa kembali data yang anda masukkan</p>
                                <ul class="text-sm text-red-700 space-y-1 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('mahasiswa.store') }}" method="post" class="space-y-5">
                    @csrf

                    <!-- nim -->
                    <div>
                        <label for="nim" class="block text-sm font-semibold text-slate-700 mb-1.5">nim</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                <i class="fa-solid fa-id-card"></i>
                            </span>
                            <input type="text" id="nim" name="nim" value="{{ old('nim') }}"
                                class="w-full rounded-xl border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-slate-800 placeholder:text-slate-400
                                       focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500 focus:bg-white
                                       transition duration-200">
                        </div>
                    </div>

                    <!-- nama -->
                    <div>
                        <label for="nama" class="block text-sm font-semibold text-slate-700 mb-1.5">nama</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                                class="w-full rounded-xl border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-slate-800 placeholder:text-slate-400
                                       focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500 focus:bg-white
                                       transition duration-200">
                        </div>
                    </div>

                    <!-- prodi -->
                    <div>
                        <label for="prodi" class="block text-sm font-semibold text-slate-700 mb-1.5">program studi</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                <i class="fa-solid fa-building-columns"></i>
                            </span>
                            <input type="text" id="prodi" name="prodi" value="{{ old('prodi') }}"
                                placeholder="Teknologi Informasi"
                                class="w-full rounded-xl border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-slate-800 placeholder:text-slate-400
                                       focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500 focus:bg-white
                                       transition duration-200">
                        </div>
                    </div>

                    <!-- ipk & ips -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label for="ipk" class="block text-sm font-semibold text-slate-700 mb-1.5">ipk</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                    <i class="fa-solid fa-chart-line"></i>
                                </span>
                                <input type="number" step="0.01" min="0" max="4" id="ipk" name="ipk" value="{{ old('ipk') }}"
                                    placeholder="0.00"
                                    class="w-full rounded-xl border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-slate-800 placeholder:text-slate-400
                                           focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500 focus:bg-white
                                           transition duration-200">
                            </div>
                        </div>

                        <div>
                            <label for="ips" class="block text-sm font-semibold text-slate-700 mb-1.5">ips</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                    <i class="fa-solid fa-chart-simple"></i>
                                </span>
                                <input type="number" step="0.01" min="0" max="4" id="ips" name="ips" value="{{ old('ips') }}"
                                    placeholder="0.00"
                                    class="w-full rounded-xl border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-slate-800 placeholder:text-slate-400
                                           focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500 focus:bg-white
                                           transition duration-200">
                            </div>
                        </div>
                    </div>

                    <!-- nilai keaktifan -->
                    <div>
                        <label for="nilai_keaktifan" class="block text-sm font-semibold text-slate-700 mb-1.5">nilai keaktifan</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                <i class="fa-solid fa-bolt"></i>
                            </span>
                            <input type="number" step="0.01" min="0" max="100" id="nilai_keaktifan" name="nilai_keaktifan" value="{{ old('nilai_keaktifan') }}"
                                placeholder="0.00"
                                class="w-full rounded-xl border border-slate-300 bg-slate-50 py-2.5 pl-10 pr-4 text-slate-800 placeholder:text-slate-400
                                       focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500 focus:bg-white
                                       transition duration-200">
                        </div>
                    </div>

                    <!-- tombol simpan -->
                    <div class="pt-3">
                        <button type="submit"
                            class="w-full flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-blue-600 to-blue-500
                                   px-6 py-3 text-white font-semibold shadow-lg shadow-blue-500/30
                                   hover:from-blue-700 hover:to-blue-600 hover:shadow-xl hover:shadow-blue-500/40 hover:scale-[1.01]
                                   active:scale-[0.99]
                                   transition-all duration-200 ease-out">
                            <i class="fa-solid fa-floppy-disk"></i>
                            simpan
                        </button>
                    </div>

                </form>
            </div>
        </div>

        <p class="text-center text-xs text-slate-400 mt-6">sistem informasi akademik &middot; data mahasiswa</p>
    </div>

</body>
</html>