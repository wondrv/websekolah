@extends('layouts.app')
@section('title','Beranda')
@section('content')
<section class="grid md:grid-cols-2 gap-6">
  <div class="p-6 rounded border bg-blue-50">
    <h1 class="text-2xl font-semibold mb-2">Sambutan Kepala Sekolah</h1>
    <p>Selamat datang di website resmi …</p>
  </div>
  <div class="p-6 rounded border">
    <h2 class="font-semibold text-lg mb-3">Link Cepat</h2>
    <div class="grid sm:grid-cols-2 gap-3">
      <a class="border p-3 rounded hover:bg-gray-50" href="{{ route('pages.show','visi-misi') }}">Visi & Misi</a>
      <a class="border p-3 rounded hover:bg-gray-50" href="{{ route('events.index') }}">Kalender Akademik</a>
      <a class="border p-3 rounded hover:bg-gray-50" href="{{ route('posts.index') }}">Berita</a>
      <a class="border p-3 rounded hover:bg-gray-50" href="{{ route('contact.create') }}">Kontak</a>
    </div>
  </div>
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
@endsection
