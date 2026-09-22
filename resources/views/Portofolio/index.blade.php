@extends('portofolio.layout')
 
@section('konten')
<div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-7">
  <div>
    <h1 class="font-display text-[26px] font-bold leading-tight">Portofolio Saya</h1>
    <p class="text-[13.5px] text-[var(--ink-soft)] mt-1">Semua sertifikat dan dokumen prestasi yang sudah kamu unggah ke sistem.</p>
  </div>
  <div class="flex gap-3">
    <div class="surface-card px-4 py-3 min-w-[104px]">
      <p class="font-display text-xl font-bold text-[var(--primary)]">{{ $portofolios->count() }}</p>
      <p class="text-[11.5px] text-[var(--ink-soft)] font-medium">Total berkas</p>
    </div>
    <div class="surface-card px-4 py-3 min-w-[104px]">
      <p class="font-display text-xl font-bold text-[var(--success)]">{{ $portofolios->where('kategori', 'akademik')->count() }}</p>
      <p class="text-[11.5px] text-[var(--ink-soft)] font-medium">Akademik</p>
    </div>
    <div class="surface-card px-4 py-3 min-w-[104px]">
      <p class="font-display text-xl font-bold text-[var(--warning)]">{{ $portofolios->where('kategori', 'non akademik')->count() }}</p>
      <p class="text-[11.5px] text-[var(--ink-soft)] font-medium">Non Akademik</p>
    </div>
  </div>
</div>
 
@if(session('sukses'))
  <div class="surface-card !border-[var(--success)] bg-[var(--success-soft)] text-[var(--success)] px-4 py-3 rounded-xl mb-6 text-sm font-semibold flex items-center gap-2">
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6 9 17l-5-5" stroke-linecap="round" stroke-linejoin="round"/></svg>
    {{ session('sukses') }}
  </div>
@endif
 
<div class="flex items-center justify-between mb-3">
  <h2 class="font-display text-[17px] font-bold">Daftar Dokumen</h2>
  <a href="/portofolio/create" class="flex items-center gap-1.5 text-[13px] font-bold text-white bg-[var(--primary)] rounded-lg px-3.5 py-2 hover:bg-[var(--primary-dark)] transition-colors">
    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.2"><path d="M12 5v14M5 12h14" stroke-linecap="round"/></svg>
    Tambah Data Baru
  </a>
</div>
 
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
  @forelse($portofolios as $item)
  @php
    $isAkademik = $item->kategori === 'akademik';
    $stripColor = $isAkademik ? 'var(--primary)' : 'var(--warning)';
    $badgeBg = $isAkademik ? 'var(--primary-soft)' : 'var(--warning-soft)';
    $badgeText = $isAkademik ? 'var(--primary-dark)' : 'var(--warning)';
    $ext = strtolower(pathinfo($item->file_berkas, PATHINFO_EXTENSION));
  @endphp
  <div class="surface-card flex overflow-hidden">
    <div class="status-strip" style="background:{{ $stripColor }}"></div>
    <div class="flex-1 p-4">
      <div class="flex items-start justify-between gap-3">
        <div class="flex items-start gap-3">
          <div class="w-9 h-9 rounded-lg bg-[var(--primary-soft)] flex items-center justify-center shrink-0 mt-0.5">
            @if($ext === 'pdf')
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2"><path d="M7 3h7l5 5v13H7z"/><path d="M14 3v5h5"/></svg>
            @else
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2"><rect x="4" y="4" width="16" height="16" rx="2"/><path d="m4 15 4-4 4 4 4-6 4 5"/></svg>
            @endif
          </div>
          <div>
            <p class="text-[11.5px] font-semibold text-[var(--ink-faint)] uppercase">{{ $item->kategori }}</p>
            <h3 class="font-display font-bold text-[14.5px] mt-0.5 leading-snug">{{ $item->nama_prestasi }}</h3>
          </div>
        </div>
        <span class="badge shrink-0" style="background:{{ $badgeBg }}; color:{{ $badgeText }}">{{ ucfirst($item->kategori) }}</span>
      </div>
 
      <div class="flex items-center justify-between mt-4 pt-3 border-t border-[var(--border)]">
        <a href="{{ asset('storage/' . $item->file_berkas) }}" target="_blank" class="text-[12.5px] font-bold text-[var(--primary)] hover:text-[var(--primary-dark)] flex items-center gap-1.5">
          Lihat dokumen
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 6 6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
        <div class="flex items-center gap-3">
          <a href="/portofolio/{{ $item->id_portofolio }}/edit" class="text-[12.5px] font-bold text-[var(--ink-soft)] hover:text-[var(--primary)]">
            Edit
          </a>
          <form action="/portofolio/{{ $item->id_portofolio }}" method="post" onsubmit="return confirm('Hapus data ini?')">
            @csrf
            @method('delete')
            <button type="submit" class="text-[12.5px] font-bold text-[var(--danger)] hover:underline">
              Hapus data
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @empty
  <div class="col-span-2 surface-card !border-dashed !border-[#C7D3EE] flex flex-col items-center justify-center text-center p-10">
    <div class="w-11 h-11 rounded-full bg-[var(--primary-soft)] flex items-center justify-center mb-3">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2"><path d="M14 3H7a1.5 1.5 0 0 0-1.5 1.5v15A1.5 1.5 0 0 0 7 21h10a1.5 1.5 0 0 0 1.5-1.5V8.5L14 3Z"/><path d="M13.5 3v4.5a1 1 0 0 0 1 1H19"/></svg>
    </div>
    <p class="text-[13.5px] font-bold">Belum ada data portofolio</p>
    <p class="text-[12px] text-[var(--ink-soft)] mt-1 max-w-[260px]">Dokumen yang kamu unggah ke sistem akan muncul di sini.</p>
  </div>
  @endforelse
</div>
@endsection