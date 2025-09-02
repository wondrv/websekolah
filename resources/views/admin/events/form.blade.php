@extends('layouts.app')
@section('title', ($event->id ? 'Edit' : 'Tambah').' Event')
@section('content')
@if ($errors->any())
  <div class="p-3 mb-4 border bg-red-50 text-red-700 rounded">
    <div class="font-semibold">Periksa kembali isian Anda:</div>
    <ul class="list-disc list-inside">
      @foreach ($errors->all() as $err) <li>{{ $err }}</li> @endforeach
    </ul>
  </div>
@endif
<form method="post" action="{{ $event->id ? route('events.update',$event) : route('events.store') }}" class="grid gap-3 max-w-2xl">
  @csrf
  @if($event->id) @method('PUT') @endif
  <input name="title" class="border p-2 rounded" placeholder="Judul Event" value="{{ old('title',$event->title) }}" required>
  <textarea name="description" rows="6" class="border p-2 rounded" placeholder="Deskripsi (opsional)">{{ old('description',$event->description) }}</textarea>
  <div class="grid md:grid-cols-2 gap-3">
    <div>
      <label class="text-sm block mb-1">Mulai</label>
      <input type="datetime-local" name="starts_at" class="border p-2 rounded w-full" value="{{ old('starts_at', optional($event->starts_at)->format('Y-m-d\TH:i')) }}" required>
    </div>
    <div>
      <label class="text-sm block mb-1">Selesai (opsional)</label>
      <input type="datetime-local" name="ends_at" class="border p-2 rounded w-full" value="{{ old('ends_at', optional($event->ends_at)->format('Y-m-d\TH:i')) }}">
    </div>
  </div>
  <input name="location" class="border p-2 rounded" placeholder="Lokasi (opsional)" value="{{ old('location',$event->location) }}">
  <label class="inline-flex items-center gap-2">
    <input type="checkbox" name="is_public" value="1" {{ old('is_public', $event->is_public) ? 'checked' : '' }}>
    <span>Publikasikan (tampil di halaman publik)</span>
  </label>
  <div class="flex gap-2">
    <button class="bg-blue-600 text-white px-4 py-2 rounded">{{ $event->id ? 'Update' : 'Simpan' }}</button>
    <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 border rounded">Batal</a>
  </div>
</form>
@endsection
