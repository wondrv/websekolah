@extends('layouts.app')
@section('title','Berita & Pengumuman')
@section('content')
<h1 class="text-2xl font-bold mb-4">Berita & Pengumuman</h1>
@if($posts->count() === 0)
  <div class="p-4 border rounded bg-gray-50">Belum ada posting.</div>
@else
  <div class="grid md:grid-cols-3 gap-4">
    @foreach($posts as $p)
      <a href="{{ route('posts.show',$p->slug) }}" class="border rounded p-3 hover:bg-gray-50 block">
        @if($p->cover_path)
          <img src="/{{ $p->cover_path }}" alt="{{ $p->title }}" class="w-full h-36 object-cover rounded mb-2" loading="lazy" decoding="async" width="640" height="144">
        @endif
        <div class="font-semibold">{{ $p->title }}</div>
        <div class="text-xs text-gray-500">{{ optional($p->published_at)->format('d M Y') }}</div>
        @if($p->excerpt)
          <div class="text-sm text-gray-700 mt-1">{{ $p->excerpt }}</div>
        @endif
      </a>
    @endforeach
  </div>
  <div class="mt-6">{{ $posts->links() }}</div>
@endif
@endsection
