<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>portofolio mahasiswa</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<style>
  :root{
    --bg:#F5F8FF;
    --surface:#FFFFFF;
    --border:#E2E8F5;
    --ink:#0B1626;
    --ink-soft:#5B6B87;
    --ink-faint:#93A1BD;
    --primary:#2A4CDB;
    --primary-dark:#1B2F8F;
    --primary-soft:#E7ECFC;
    --sky:#4C8DF6;
    --success:#1B9C63;
    --success-soft:#E4F6ED;
    --warning:#C98A11;
    --warning-soft:#FBF0DD;
    --danger:#D1483F;
    --danger-soft:#FBEAE8;
  }
  html,body{background:var(--bg); color:var(--ink); font-family:'Plus Jakarta Sans',system-ui,sans-serif;}
  .font-display{font-family:'Space Grotesk',system-ui,sans-serif;}
  ::-webkit-scrollbar{width:8px; height:8px;}
  ::-webkit-scrollbar-thumb{background:#C9D5EE; border-radius:99px;}
  ::-webkit-scrollbar-track{background:transparent;}

  .nav-item{position:relative; display:flex; align-items:center; gap:.75rem; padding:.65rem .9rem; border-radius:.65rem; color:var(--ink-soft); font-weight:600; font-size:.875rem; transition:background .15s,color .15s;}
  .nav-item:hover{background:var(--primary-soft); color:var(--primary-dark);}
  .nav-item.active{background:var(--primary); color:#fff;}
  .nav-item.active svg{stroke:#fff;}

  .surface-card{background:var(--surface); border:1px solid var(--border); border-radius:1rem;}

  .dropzone{
    border:1.5px dashed #B9C6E8;
    border-radius:1rem;
    background:
      repeating-linear-gradient(135deg, rgba(42,76,219,0.025) 0 10px, transparent 10px 20px),
      var(--surface);
    transition:border-color .15s, background .15s;
  }
  .dropzone:hover{border-color:var(--primary);}

  .status-strip{width:4px; border-radius:99px;}
  .badge{display:inline-flex; align-items:center; gap:.35rem; font-size:.72rem; font-weight:700; padding:.25rem .6rem; border-radius:.5rem; letter-spacing:.01em;}
  .file-row{display:flex; align-items:center; gap:.75rem; padding:.6rem .75rem; border:1px solid var(--border); border-radius:.65rem; background:#FBFCFF;}
</style>
</head>
<body class="min-h-screen">

<div class="flex min-h-screen">

  <!-- SIDEBAR -->
  <aside class="hidden lg:flex flex-col w-64 shrink-0 border-r border-[var(--border)] bg-white px-5 py-6">
    <div class="flex items-center gap-2.5 px-1 mb-8">
      <div class="w-9 h-9 rounded-lg bg-[var(--primary)] flex items-center justify-center">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 2 3 7l9 5 9-5-9-5Z" stroke="#fff" stroke-width="1.8" stroke-linejoin="round"/><path d="M7 12.5v4.2c0 .5 2.2 2.3 5 2.3s5-1.8 5-2.3v-4.2" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </div>
      <div>
        <p class="font-display font-bold text-[15px] leading-none">KampusLomba</p>
        <p class="text-[11px] text-[var(--ink-faint)] mt-1">Portal Kemahasiswaan</p>
      </div>
    </div>

    <nav class="flex flex-col gap-1">
      <a class="nav-item {{ request()->routeIs('portofolio.index') ? 'active' : '' }}" href="/portofolio">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M14 3H7a1.5 1.5 0 0 0-1.5 1.5v15A1.5 1.5 0 0 0 7 21h10a1.5 1.5 0 0 0 1.5-1.5V8.5L14 3Z"/><path d="M13.5 3v4.5a1 1 0 0 0 1 1H19"/><path d="M9 13h6M9 16.5h6" stroke-linecap="round"/></svg>
        Portofolio Saya
      </a>
      <a class="nav-item {{ request()->routeIs('portofolio.create') ? 'active' : '' }}" href="/portofolio/create">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 16V4m0 0-4 4m4-4 4 4" stroke-linecap="round" stroke-linejoin="round"/><path d="M4 16.5v2A1.5 1.5 0 0 0 5.5 20h13a1.5 1.5 0 0 0 1.5-1.5v-2" stroke-linecap="round"/></svg>
        Unggah Berkas
      </a>
    </nav>

    <div class="mt-auto surface-card !bg-[var(--primary-soft)] !border-none p-4">
      <p class="text-[12.5px] font-semibold text-[var(--primary-dark)] leading-snug">Butuh bantuan mengunggah sertifikat?</p>
      <button class="mt-2.5 text-[12.5px] font-bold text-white bg-[var(--primary)] rounded-lg px-3 py-1.5 hover:bg-[var(--primary-dark)] transition-colors">Hubungi admin</button>
    </div>
  </aside>

  <!-- MAIN -->
  <div class="flex-1 flex flex-col min-w-0">

    <!-- TOPBAR -->
    <header class="flex items-center gap-4 px-6 lg:px-8 py-4 border-b border-[var(--border)] bg-white/80 backdrop-blur sticky top-0 z-10">
      <div class="relative flex-1 max-w-md">
        <svg class="absolute left-3 top-1/2 -translate-y-1/2" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--ink-faint)" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.2-3.2" stroke-linecap="round"/></svg>
        <input type="text" placeholder="Cari prestasi atau kategori" class="w-full text-sm bg-[var(--bg)] border border-[var(--border)] rounded-xl pl-9 pr-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-[var(--primary)]/30 focus:border-[var(--primary)] placeholder:text-[var(--ink-faint)]">
      </div>
      <div class="flex-1"></div>
      <div class="flex items-center gap-3 pl-3 border-l border-[var(--border)]">
        <div class="w-9 h-9 rounded-full bg-[var(--primary-soft)] flex items-center justify-center font-display font-bold text-[13px] text-[var(--primary-dark)]">
          {{ strtoupper(substr(auth()->user()->name ?? 'M', 0, 1)) }}
        </div>
        <div class="hidden sm:block">
          <p class="text-[13px] font-bold leading-none">{{ auth()->user()->name ?? 'Mahasiswa' }}</p>
          <p class="text-[11.5px] text-[var(--ink-faint)] mt-1">Portofolio Prestasi</p>
        </div>
      </div>
    </header>

    <main class="flex-1 min-w-0 px-6 lg:px-8 py-7 overflow-y-auto">
      @yield('konten')
    </main>

  </div>
</div>

</body>
</html>
