@extends('layouts.app')
@section('title','Pages (Admin)')
@section('content')
<div class="flex items-center justify-between mb-4">
  <h1 class="text-2xl font-bold">Pages</h1>
  <a href="{{ route('pages.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah Halaman</a>
</div>
@if(session('ok'))
  <div class="p-3 mb-4 border bg-green-50 text-green-700 rounded">{{ session('ok') }}</div>
@endif
<div class="overflow-x-auto border rounded">
  <table class="min-w-full text-sm">
    <thead class="bg-gray-50">
      <tr>
        <th class="px-3 py-2 text-left">Slug</th>
        <th class="px-3 py-2 text-left">Judul</th>
        <th class="px-3 py-2 text-left">Published</th>
        <th class="px-3 py-2 text-right">Aksi</th>
      </tr>
    </thead>
    <tbody class="divide-y">
      @forelse($pages as $pg)
      <tr>
        <td class="px-3 py-2 text-gray-600">{{ $pg->slug }}</td>
        <td class="px-3 py-2">{{ $pg->title }}</td>
        <td class="px-3 py-2">{{ $pg->published_at ? $pg->published_at->format('d M Y H:i') : '—' }}</td>
        <td class="px-3 py-2 text-right">
          <a href="{{ route('pages.edit',$pg) }}" class="px-3 py-1 border rounded hover:bg-gray-50">Edit</a>
          <form action="{{ route('pages.destroy',$pg) }}" method="post" class="inline">
            @csrf @method('DELETE')
            <button type="submit" class="px-3 py-1 border rounded text-red-600 hover:bg-red-50 js-delete">Hapus</button>
          </form>
        </td>
      </tr>
      @empty
      <tr><td class="px-3 py-6 text-center text-gray-500" colspan="4">Belum ada data.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
<div class="mt-4">{{ $pages->links() }}</div>
<script>
  document.querySelectorAll('.js-delete').forEach(btn=>{
    btn.addEventListener('click', (e)=>{
      if(!confirm('Yakin hapus halaman ini?')) e.preventDefault();
    });
  });
</script>
@endsection
