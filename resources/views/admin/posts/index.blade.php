@extends('layouts.app')
@section('title','Posts (Admin)')
@section('content')
<div class="flex items-center justify-between mb-4">
  <h1 class="text-2xl font-bold">Posts</h1>
  <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah Post</a>
</div>
@if(session('ok'))
  <div class="p-3 mb-4 border bg-green-50 text-green-700 rounded">{{ session('ok') }}</div>
@endif
<div class="overflow-x-auto border rounded">
  <table class="min-w-full text-sm">
    <thead class="bg-gray-50">
      <tr>
        <th class="px-3 py-2 text-left">Judul</th>
        <th class="px-3 py-2 text-left">Tipe</th>
        <th class="px-3 py-2 text-left">Published</th>
        <th class="px-3 py-2 text-left">Slug</th>
        <th class="px-3 py-2 text-right">Aksi</th>
      </tr>
    </thead>
    <tbody class="divide-y">
      @forelse($posts as $p)
      <tr>
        <td class="px-3 py-2">
          <a class="font-medium hover:underline" href="{{ route('posts.show',$p->slug) }}" target="_blank" rel="noopener">{{ $p->title }}</a>
        </td>
        <td class="px-3 py-2">{{ strtoupper($p->type) }}</td>
        <td class="px-3 py-2">{{ $p->published_at ? $p->published_at->format('d M Y H:i') : '—' }}</td>
        <td class="px-3 py-2 text-gray-600">{{ $p->slug }}</td>
        <td class="px-3 py-2 text-right">
          <a href="{{ route('posts.edit',$p) }}" class="px-3 py-1 border rounded hover:bg-gray-50">Edit</a>
          <form action="{{ route('posts.destroy',$p) }}" method="post" class="inline">
            @csrf @method('DELETE')
            <button type="submit" class="px-3 py-1 border rounded text-red-600 hover:bg-red-50 js-delete">Hapus</button>
          </form>
        </td>
      </tr>
      @empty
      <tr><td class="px-3 py-6 text-center text-gray-500" colspan="5">Belum ada data.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
<div class="mt-4">{{ $posts->links() }}</div>
<script>
  document.querySelectorAll('.js-delete').forEach(btn=>{
    btn.addEventListener('click', (e)=>{
      if(!confirm('Yakin hapus item ini?')) e.preventDefault();
    });
  });
</script>
@endsection
