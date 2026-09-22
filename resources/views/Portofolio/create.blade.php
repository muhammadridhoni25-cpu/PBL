@extends('portofolio.layout')

@section('konten')
<div class="flex items-center justify-between gap-4 mb-7">
  <div>
    <h1 class="font-display text-[26px] font-bold leading-tight">Unggah Dokumen Portofolio</h1>
    <p class="text-[13.5px] text-[var(--ink-soft)] mt-1">Simpan sertifikat, karya, dan dokumen pendukung untuk dipakai ulang saat mendaftar lomba.</p>
  </div>
</div>

@if(session('sukses'))
  <div class="surface-card !border-[var(--success)] bg-[var(--success-soft)] text-[var(--success)] px-4 py-3 rounded-xl mb-6 text-sm font-semibold flex items-center gap-2">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6 9 17l-5-5" stroke-linecap="round" stroke-linejoin="round"/></svg>
    {{ session('sukses') }}
  </div>
@endif

<form action="{{ route('portofolio.store') }}" method="post" enctype="multipart/form-data" class="surface-card p-6 max-w-2xl space-y-5">
  @csrf

  <div>
    <label class="block text-[12.5px] font-bold text-[var(--ink)] mb-1.5">Nama Prestasi</label>
    <input type="text" name="nama_prestasi" required placeholder="contoh: Juara 2 National Business Case Challenge"
      class="w-full text-sm bg-[var(--bg)] border border-[var(--border)] rounded-xl px-3.5 py-2.5 focus:outline-none focus:ring-2 focus:ring-[var(--primary)]/30 focus:border-[var(--primary)] placeholder:text-[var(--ink-faint)]">
  </div>

  <div>
    <label class="block text-[12.5px] font-bold text-[var(--ink)] mb-1.5">Kategori</label>
    <select name="kategori" required
      class="w-full text-sm bg-[var(--bg)] border border-[var(--border)] rounded-xl px-3.5 py-2.5 focus:outline-none focus:ring-2 focus:ring-[var(--primary)]/30 focus:border-[var(--primary)] text-[var(--ink)]">
      <option value="">-- pilih kategori --</option>
      <option value="akademik">Akademik</option>
      <option value="non akademik">Non Akademik</option>
    </select>
  </div>

  <div>
    <label class="block text-[12.5px] font-bold text-[var(--ink)] mb-1.5">File Sertifikat</label>
    <label for="file_berkas" class="dropzone flex flex-col items-center justify-center text-center px-6 py-9 cursor-pointer block">
      <div class="w-11 h-11 rounded-full bg-[var(--primary-soft)] flex items-center justify-center mb-3">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2"><path d="M12 16V4m0 0-4 4m4-4 4 4" stroke-linecap="round" stroke-linejoin="round"/><path d="M4 16.5v2A1.5 1.5 0 0 0 5.5 20h13a1.5 1.5 0 0 0 1.5-1.5v-2" stroke-linecap="round"/></svg>
      </div>
      <p class="text-[13.5px] font-bold" id="nama-file">Seret berkas ke sini</p>
      <p class="text-[12px] text-[var(--ink-soft)] mt-1">atau <span class="text-[var(--primary)] font-semibold">telusuri dari perangkat</span></p>
      <p class="text-[11px] text-[var(--ink-faint)] mt-3">PDF, JPG, PNG · maksimal 10 MB</p>
      <input id="file_berkas" type="file" name="file_berkas" required accept=".pdf,.jpg,.jpeg,.png" class="hidden"
        onchange="document.getElementById('nama-file').textContent = this.files.length ? this.files[0].name : 'Seret berkas ke sini'">
    </label>
  </div>

  <button type="submit" class="w-full sm:w-auto flex items-center justify-center gap-1.5 text-[13.5px] font-bold text-white bg-[var(--primary)] rounded-xl px-5 py-2.5 hover:bg-[var(--primary-dark)] transition-colors">
    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.2"><path d="M12 5v14M5 12h14" stroke-linecap="round"/></svg>
    Simpan Portofolio
  </button>
</form>
@endsection
