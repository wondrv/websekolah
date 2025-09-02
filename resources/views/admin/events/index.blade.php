@extends('layouts.app')
@section('title','Events (Admin)')
@section('content')
<div class="flex items-center justify-between mb-4">
  <h1 class="text-2xl font-bold">Events</h1>
  <a href="{{ route('events.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah Event</a>
</div>
@if(session('ok'))
  <div class="p-3 mb-4 border bg-green-50 text-green-700 rounded">{{ session('ok') }}</div>
@endif
<div class="overflow-x-auto border rounded">
  <table class="min-w-full text-sm">
    <thead class="bg-gray-50">
      <tr>
        <th class="px-3 py-2 text-left">Judul</th>
        <th class="px-3 py-2 text-left">Mulai</th>
        <th class="px-3 py-2 text-left">Selesai</th>
        <th class="px-3 py-2 text-left">Lokasi</th>
        <th class="px-3 py-2 text-left">Publik?</th>
        <th class="px-3 py-2 text-right">Aksi</th>
      </tr>
    </thead>
    <tbody class="divide-y">
      @forelse($events as $ev)
      <tr>
        <td class="px-3 py-2">{{ $ev->title }}</td>
        <td class="px-3 py-2">{{ optional($ev->starts_at)->format('d M Y H:i') }}</td>
        <td class="px-3 py-2">{{ $ev->ends_at ? $ev->ends_at->format('d M Y H:i') : '—' }}</td>
        <td class="px-3 py-2">{{ $ev->location ?: '—' }}</td>
        <td class="px-3 py-2">{{ $ev->is_public ? 'Ya' : 'Tidak' }}</td>
        <td class="px-3 py-2 text-right">
          <a href="{{ route('events.edit',$ev) }}" class="px-3 py-1 border rounded hover:bg-gray-50">Edit</a>
          <form action="{{ route('events.destroy',$ev) }}" method="post" class="inline">
            @csrf @method('DELETE')
            <button type="submit" class="px-3 py-1 border rounded text-red-600 hover:bg-red-50 js-delete">Hapus</button>
          </form>
        </td>
      </tr>
      @empty
      <tr><td class="px-3 py-6 text-center text-gray-500" colspan="6">Belum ada data.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
<div class="mt-4">{{ $events->links() }}</div>
<script>
  document.querySelectorAll('.js-delete').forEach(btn=>{
    btn.addEventListener('click', (e)=>{
      if(!confirm('Yakin hapus event ini?')) e.preventDefault();
    });
  });
</script>
@endsection
