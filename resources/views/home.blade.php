@extends('layouts.app')
@section('title','Beranda')
@section('content')
<section class="relative overflow-hidden rounded-lg border bg-gradient-to-r from-sky-50 to-white">
  <div class="p-8 md:p-12 grid md:grid-cols-2 gap-6 items-center">
    <div>
      <div class="text-sm text-sky-700 font-semibold mb-2">Selamat Datang</div>
      <h1 class="text-3xl md:text-4xl font-extrabold leading-tight mb-3">{{ config('school.name') }}</h1>
      <p class="text-gray-700 mb-5">Sekolah unggul dengan lingkungan belajar yang religius, disiplin, dan berprestasi.</p>
      <div class="flex gap-3">
        <a href="{{ route('pages.show','ppdb') }}" class="bg-sky-600 text-white px-4 py-2 rounded">PPDB</a>
        <a href="{{ route('posts.index') }}" class="border px-4 py-2 rounded">Berita</a>
      </div>
    </div>
    <div class="hidden md:block">
      <div class="aspect-[4/3] w-full rounded-lg bg-gradient-to-br from-sky-100 via-white to-sky-50 flex items-center justify-center">
        <div class="text-sky-700 font-semibold">Sekolah Berkarakter & Berprestasi</div>
      </div>
    </div>
  </div>
  <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-sky-100 rounded-full blur-2xl opacity-70"></div>
</section>

<section class="grid md:grid-cols-2 gap-6 mt-8">
  <div>
    <h2 class="font-semibold text-lg mb-3">Berita Terbaru</h2>
    <div class="space-y-3">
      @foreach($news as $n)
        <a href="{{ route('posts.show',$n->slug) }}" class="block border p-3 rounded hover:bg-gray-50">
          <div class="font-medium">{{ $n->title }}</div>
          <div class="text-sm text-gray-600">{{ $n->excerpt }}</div>
        </a>
      @endforeach
    </div>
  </div>
  <div>
    <h2 class="font-semibold text-lg mb-3">Pengumuman</h2>
    <div class="space-y-3">
      @foreach($ann as $a)
        <a href="{{ route('posts.show',$a->slug) }}" class="block border p-3 rounded hover:bg-gray-50">
          <div class="font-medium">{{ $a->title }}</div>
          <div class="text-sm text-gray-600">{{ $a->excerpt }}</div>
        </a>
      @endforeach
    </div>
  </div>
</section>

<section class="mt-10 grid md:grid-cols-3 gap-6">
  <div class="border rounded p-5">
    <div class="text-sky-700 text-sm font-semibold mb-1">Program Unggulan</div>
    <div class="font-bold mb-1">Tahfidz & Literasi</div>
    <p class="text-gray-700">Mendukung pembentukan karakter dan kompetensi siswa melalui pembiasaan harian.</p>
  </div>
  <div class="border rounded p-5">
    <div class="text-sky-700 text-sm font-semibold mb-1">Galeri</div>
    <div class="font-bold mb-1">Kegiatan Siswa</div>
    <p class="text-gray-700">Dokumentasi event, ekstrakurikuler, dan karya siswa.</p>
  </div>
  <div class="border rounded p-5">
    <div class="text-sky-700 text-sm font-semibold mb-1">Testimoni</div>
    <div class="font-bold mb-1">Suara Orang Tua</div>
    <p class="text-gray-700">Pengalaman belajar yang menyenangkan dan bermakna.</p>
  </div>
</section>
@endsection
