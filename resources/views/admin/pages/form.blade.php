@extends('layouts.app')
@section('title', ($page->id ? 'Edit' : 'Tambah').' Halaman')
@section('content')
@if ($errors->any())
  <div class="p-3 mb-4 border bg-red-50 text-red-700 rounded">
    <div class="font-semibold">Periksa kembali isian Anda:</div>
    <ul class="list-disc list-inside">
      @foreach ($errors->all() as $err) <li>{{ $err }}</li> @endforeach
    </ul>
  </div>
@endif
<form method="post" action="{{ $page->id ? route('pages.update',$page) : route('pages.store') }}" class="grid gap-3 max-w-2xl">
  @csrf
  @if($page->id) @method('PUT') @endif
  <div class="grid md:grid-cols-2 gap-3">
    <div>
      <label class="text-sm block mb-1">Slug</label>
      <input name="slug" class="border p-2 rounded w-full" placeholder="visi-misi" value="{{ old('slug',$page->slug) }}" required>
    </div>
    <div>
      <label class="text-sm block mb-1">Judul</label>
      <input name="title" class="border p-2 rounded w-full" placeholder="Judul" value="{{ old('title',$page->title) }}" required>
    </div>
  </div>
  <label class="text-sm block">Konten</label>
  <textarea name="content" rows="12" class="border p-2 rounded" placeholder="Isi halaman" required>{{ old('content',$page->content) }}</textarea>
  <div>
    <label class="text-sm block mb-1">Tanggal Publikasi (opsional)</label>
    <input type="datetime-local" name="published_at" class="border p-2 rounded" value="{{ old('published_at', optional($page->published_at)->format('Y-m-d\TH:i')) }}">
  </div>
  <div class="flex gap-2">
    <button class="bg-blue-600 text-white px-4 py-2 rounded">{{ $page->id ? 'Update' : 'Simpan' }}</button>
    <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 border rounded">Batal</a>
  </div>
</form>
@endsection
