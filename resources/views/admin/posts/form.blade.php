@extends('layouts.app')
@section('title', ($post->id ? 'Edit' : 'Tambah').' Post')
@section('content')
@if ($errors->any())
  <div class="p-3 mb-4 border bg-red-50 text-red-700 rounded">
    <div class="font-semibold">Periksa kembali isian Anda:</div>
    <ul class="list-disc list-inside">
      @foreach ($errors->all() as $err) <li>{{ $err }}</li> @endforeach
    </ul>
  </div>
@endif
<form method="post" enctype="multipart/form-data"
      action="{{ $post->id ? route('posts.update',$post) : route('posts.store') }}"
      class="grid gap-3 max-w-2xl">
  @csrf
  @if($post->id) @method('PUT') @endif
  <div class="grid md:grid-cols-2 gap-3">
    <input name="title" class="border p-2 rounded" placeholder="Judul" value="{{ old('title',$post->title) }}" required>
    <input name="slug" class="border p-2 rounded" placeholder="slug-kecil-dengan-strip" value="{{ old('slug',$post->slug) }}" required>
  </div>
  <div class="grid md:grid-cols-2 gap-3">
    <select name="type" class="border p-2 rounded">
      <option value="news" {{ old('type',$post->type)=='news'?'selected':'' }}>Berita</option>
      <option value="announcement" {{ old('type',$post->type)=='announcement'?'selected':'' }}>Pengumuman</option>
    </select>
    <input type="datetime-local" name="published_at" class="border p-2 rounded" value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}">
  </div>
  <input name="excerpt" class="border p-2 rounded" placeholder="Ringkasan (opsional)" value="{{ old('excerpt',$post->excerpt) }}">
  <textarea name="body" rows="10" class="border p-2 rounded" placeholder="Konten" required>{{ old('body',$post->body) }}</textarea>
  <div>
    <label class="block mb-1">Cover (opsional)</label>
    <input id="cover" type="file" name="cover" accept="image/*" class="block">
    <img id="coverPreview" class="mt-2 rounded max-h-48 {{ $post->cover_path ? '' : 'hidden' }}" src="/{{ $post->cover_path }}" alt="Preview">
  </div>
  <div class="flex gap-2">
    <button class="bg-blue-600 text-white px-4 py-2 rounded">{{ $post->id ? 'Update' : 'Simpan' }}</button>
    <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 border rounded">Batal</a>
  </div>
</form>
<script>previewImage('cover','coverPreview')</script>
@endsection
